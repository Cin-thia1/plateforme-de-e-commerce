<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Courier;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CourierApiController extends Controller
{
    /** GET /api/couriers */
    public function index(Request $request): JsonResponse
    {
        $perPage = (int) $request->query('per_page', 20);
        $couriers = Courier::orderBy('id', 'desc')->paginate($perPage);
        return response()->json($couriers);
    }

    /** POST /api/couriers */
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:50',
            'vehicle' => 'nullable|string|max:255',
            'status' => 'required|in:available,unavailable',
            'order_id' => 'nullable|integer|exists:orders,id',
        ]);

        $courier = Courier::create($data);
        return response()->json($courier, 201);
    }

    /** GET /api/couriers/{id} */
    public function show(Courier $courier): JsonResponse
    {
        return response()->json($courier);
    }

    /** PUT/PATCH /api/couriers/{id} */
    public function update(Request $request, Courier $courier): JsonResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:50',
            'vehicle' => 'nullable|string|max:255',
            'status' => 'required|in:available,unavailable',
            'order_id' => 'nullable|integer|exists:orders,id',
        ]);

        $courier->update($data);
        return response()->json($courier);
    }

    /** DELETE /api/couriers/{id} */
    public function destroy(Courier $courier): JsonResponse
    {
        $courier->delete();
        return response()->json(null, 204);
    }

    /** GET /api/couriers/available */
    public function available(Request $request): JsonResponse
    {
        $perPage = (int) $request->query('per_page', 20);
        $couriers = Courier::where('status', 'available')->whereNull('order_id')->paginate($perPage);
        return response()->json($couriers);
    }

    /** POST /api/couriers/{courier}/assign */
    public function assign(Request $request, Courier $courier): JsonResponse
    {
        $data = $request->validate([
            'order_id' => 'required|integer|exists:orders,id',
        ]);

        if ($courier->order_id) {
            return response()->json(['message' => 'Courier already assigned'], 409);
        }

        $order = Order::find($data['order_id']);
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        // assign
        $courier->order_id = $order->id;
        $courier->status = 'unavailable';
        $courier->save();

        $order->delivery_status = 'assigned';
        $order->save();

        return response()->json(['courier' => $courier, 'order' => $order]);
    }
}
