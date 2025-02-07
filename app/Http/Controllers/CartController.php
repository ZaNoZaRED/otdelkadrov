<?php

namespace App\Http\Controllers;

use App\Models\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderPlaced;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $specialization = Specialization::findOrFail($request->specialization_id);
        $cart = session()->get('cart', []);
        
        if(isset($cart[$specialization->id])) {
            $cart[$specialization->id]['quantity']++;
        } else {
            $cart[$specialization->id] = [
                "name" => $specialization->name,
                "quantity" => 1,
                "price" => $specialization->price,
                "photo" => $specialization->photo_url
            ];
        }
        
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Специальность добавлена в корзину!');
    }

    public function index()
    {
        return view('cart');
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);

        $order = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'items' => session('cart')
        ];

        // Use a valid email address here
        Mail::to('zanozared228@gmail.com')->send(new OrderPlaced($order));

        session()->forget('cart');
        return redirect('/')->with('success', 'Заявка отправлена!');
    }
}