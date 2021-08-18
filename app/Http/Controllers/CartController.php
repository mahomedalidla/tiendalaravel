<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
use Carbon\Carbon;
use App\User;
use App\Mail\NewOrder;
use Mail;

class CartController extends Controller
{
    public function update()
    {
    	$client = auth()->user();
    	$cart = $client->cart;
    	$cart->status = 'Pending';
    	$cart->order_date = Carbon::now();
    	$cart->save();

    	$admins = User::where('admin', true)->get();
    	Mail::to($admins)->send(new NewOrder($client, $cart));

    	$notificationP = 'Tu pedido está en siendo procesado. Te enviaremos un correo para el segimiento de la orden. :)';

    	return back()->with(compact('notificationP'));
    }
}
