<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function getCheckoutForm() {
        if (!Session::has('cart')) {
            return view('payment.cart');
        }
        $cart = Session::get('cart');
        
        $total = $cart->totalPrice; 

        return view('payment.checkoutForm', ['total' => $total, 'cartIds' => implode(",", array_keys($cart->items))]);
    }

    public function initTransaction(Request $request)
    {
        $request->validate([
            'c_nombre' => 'required|max:255',
            'c_telefono' => 'required|regex:/^[\+0-9\-\(\)\s]*$/||min:9',
            'c_email' => 'required|email:rfc,dns',
            'c_direccion' => 'required',
            'c_region' => 'required',
            'c_comuna' => 'required',
        ]);
        if (!Session::has('cart')) {
            return view('payment.cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $request->c_amount;
        $amount = $total;
        // Identificador que será retornado en el callback de resultado:
        $session_id = "venmarket-id";
        // Identificador único de orden de compra:
        $buy_order = strval(rand(100000, 999999999));
        $return_url = "http://localhost:8000/checkout-return";

        $transaction = new Transaction();
        $response = $transaction->create($buy_order, $session_id, $amount, $return_url);

        $response_url = $response->getUrl();
        $response_token = $response->getToken();

        $p_cart = $cart->items;
        $serialized_items = serialize($p_cart); 
        $p_datos = serialize($request->toArray());
        $PreOrder = new Preorder;
        $PreOrder->buyOrder = $buy_order;
        $PreOrder->cart = $serialized_items;
        $PreOrder->datos = $p_datos;
        $PreOrder->tokenWS	 = $response_token;
        $PreOrder->save();

        return view('payment.checkout', ['url' => $response_url, 'token' => $response_token]);
    }
}
