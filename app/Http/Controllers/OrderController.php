<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {

        try {
            // 1️ Validation
            $validator = Validator::make($request->all(), [
                'billing.name' => 'required|string',
                'billing.email' => 'required|email',
                'billing.password' => 'nullable|string|min:4',

                'billing.address' => 'required|string',
                'billing.country' => 'required|string',
                'billing.region' => 'required|string',
                'billing.city' => 'required|string',
                'billing.zip' => 'nullable|string',
                'billing.notes' => 'nullable|string',

                'payment_method' => 'required|array|string',
                'payment_method.method' => 'required|string',

                'items' => 'required|array|min:1',
                'items.*.id' => 'required|integer',
                'items.*.qty' => 'required|integer|min:1',
                //'total' => 'required|numeric|min:0',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
        
        $billing = $request->billing;

        // 2️ Vérifier/Créer l’utilisateur
        $user = User::where('email', $billing['email'])->first();

        if (!$user) {
            $user = User::create([
                'name' => $billing['name'],
                'email' => $billing['email'],
                'password' => isset($billing['password'])
                    ? Hash::make($billing['password'])
                    : Hash::make('client1234'),
            ]);
        }

        // 3️ Création de la commande



        $total = 0;

        foreach ($request->items as $item) {
            $product = Product::find($item['id']);
            $total += $product->price * $item['qty'];
        }
        $order = Order::create([
            'date'           => now(),
            //'livree'         => false,
            'client_id'      => $user->id,
            'address'        => $billing['address'],
            'country'        => $billing['country'],
            'region'         => $billing['region'],
            'city'           => $billing['city'],
            'zip'            => $billing['zip'] ?? null,
            'payment_method' => json_encode($request->payment_method['method'] ?? 'unknown'),
            'notes'          => $billing['notes'] ?? null,
            'total'          => $total,
        ]);

        // 4️⃣ Enregistrer les items
        foreach ($request->items as $item) {
            OrderItem::create([
                'order_id'  => $order->id,
                'product_id'=> $item['id'],
                'quantite'  => $item['qty']
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Commande enregistrée avec succès.',
            'order_id' => $order->id
        ]);
    }
}
