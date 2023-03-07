<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with('book')->get(); 
        return view ('users.cart',compact('carts'));
    }
    public function addToCart(Request $request,$id){
        
        $user = Auth::user();
        if (!$user)
        // return redirect ()->route('login');
        return response()->json(['status' => false, 'message' => 'Please Login to add product in your cart!!'], 200);
           $cart = new Cart();
           $cart->user_id = $user->id;
           $cart->book_id = $request->book_id;
           $cart->quantity = $request->quantity;
          if($cart->save()) {
              return response()->json(['success'=>true, 'message' => ' items added to cart']);
          }
          else{
            return response()->json(['success'=>false]);
          }
        // return redirect()->back();
        }
}
