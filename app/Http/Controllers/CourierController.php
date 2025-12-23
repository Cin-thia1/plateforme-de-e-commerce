<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    /** Display a listing of couriers. */
    public function index()
    {
        $couriers = Courier::orderBy('id', 'desc')->paginate(20);
        return view('admin.couriers.index', compact('couriers'));
    }

    /** Show form to create a courier. */
    public function create()
    {
        return view('admin.couriers.create');
    }

    /** Store a newly created courier. */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:50',
            'vehicle' => 'nullable|string|max:255',
            'status' => 'required|in:available,unavailable',
            'order_id' => 'nullable|integer|exists:orders,id',
        ]);

        Courier::create($data);
        return redirect()->route('couriers.index')->with('success', 'Livreur créé.');
    }

    /** Display the specified courier. */
    public function show(Courier $courier)
    {
        return view('admin.couriers.show', compact('courier'));
    }

    /** Show form to edit a courier. */
    public function edit(Courier $courier)
    {
        return view('admin.couriers.edit', compact('courier'));
    }

    /** Update the specified courier. */
    public function update(Request $request, Courier $courier)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:50',
            'vehicle' => 'nullable|string|max:255',
            'status' => 'required|in:available,unavailable',
            'order_id' => 'nullable|integer|exists:orders,id',
        ]);

        $courier->update($data);
        return redirect()->route('couriers.index')->with('success', 'Livreur mis à jour.');
    }

    /** Remove the specified courier. */
    public function destroy(Courier $courier)
    {
        $courier->delete();
        return redirect()->route('couriers.index')->with('success', 'Livreur supprimé.');
    }
}
