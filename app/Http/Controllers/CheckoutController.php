<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stripe = new \Stripe\StripeClient('sk_test_51MJyvCEAgQFECaeFdof95XMEGHxLe8Bdy1nnl1ihb4aeM5qkg67OD9D2qxAllek8ZtxoENHtJvXq5QYfZH9AkGFu000g1c6YZe');

        $order = Order::where('user_id', '=', auth()->user()->id)
            ->where('payment_intent', null)
            ->first();

        // if (!is_null($order)) {
        //     return redirect()->route('checkout_success.index');
        // }

        $intent = $stripe->paymentIntents->create([
            'amount' => (int) $order->total,
            'currency' => 'usd',
            'payment_method_types' => ['card'],
        ]);

        return Inertia::render('Checkout', [
            'intent' => $intent,
            'order' => $order
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res = Order::where('user_id', '=', auth()->user()->id)
            ->where('payment_intent', null)
            ->first();

        if (!is_null($res)) {
            $res->total = $request->total;
            $res->total_decimal = $request->total_decimal;
            $res->items = json_encode($request->items);
            $res->save();
        } else {
            $order = new Order();
            $order->user_id = auth()->user()->id;
            $order->total = $request->total;
            $order->total_decimal = $request->total_decimal;
            $order->items = json_encode($request->items);
            $order->save();
        }

        return redirect()->route('checkout.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $order = Order::where('user_id', '=', auth()->user()->id)
            ->where('payment_intent', null)
            ->first();
        $order->payment_intent = $request['payment_intent'];
        $order->save();

        Mail::to($request->user())->send(new OrderShipped($order));

        return redirect()->route('checkout_success.index');
    }
}
