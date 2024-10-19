<?php

namespace App\Http\Controllers;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cartItems = Cart::getContent();; 
        return view('card', compact('cartItems'));
    }


    public function addToCart(Request $request)
    {

        $request->validate([
            'item_id' => 'required|integer',
            'title' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer|min:1',
        ]);

        // الحصول على الكمية من الطلب
        $quantity = $request->input('quantity', 1);

        // إضافة العنصر إلى السلة
        Cart::add([
            'id' => $request->item_id,
            'name' => $request->title,
            'price' => $request->price,
            'quantity' => $quantity,
        ]);

        return redirect()->route('card');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, $itemId)
    // {
    //     $cart = session()->get('cart', []);

    //     if(isset($cart[$itemId])) {
    //         if($request->input('action') === 'increment') {
    //             $cart[$itemId]['quantity']++;
    //         } elseif($request->input('action') === 'decrement' && $cart[$itemId]['quantity'] > 1) {
    //             $cart[$itemId]['quantity']--;
    //         }
    //     }

    //     session()->put('cart', $cart);
    //     return redirect()->route('card');
    // }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

