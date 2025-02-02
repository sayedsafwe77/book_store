<?php

namespace App\Http\Controllers;

use App\Models\AddToCart;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    function index(){
        if(Auth::check()){
            $cart = AddToCart::where('user_id')->get();
        }else{
            $cart = Session::get('cart',[]);
        }
        $books = Book::whereIn('id',array_keys($cart))->get();
        return view('website.cart',compact('books'));
    }
    function addItem($book_id,Request $request)  {
        $quantity = $request->has('quantity') ? $request->get('quantity') : 1;
        if(Auth::check()){
            AddToCart::updateOrCreate(['user_id' => Auth::id(),'book_id' => $book_id],[
                'quantity' => $quantity
            ]);
        }else{
            $cart = Session::get('cart',[]);
            $cart[$book_id] = $quantity;
            Session::put('cart',$cart);
        }
        return redirect()->back()->with(['success' => 'book added to cart']);
    }
    function removeItem($book_id)  {
        if(Auth::check()){
            AddToCart::where('user_id',Auth::id())->where('book_id',$book_id)->delete();
        }else{
            $cart = Session::get('cart',[]);
            unset($cart[$book_id]);
            Session::put('cart',$cart);
        }
        return redirect()->back()->with(['success' => 'book removed from cart']);
    }
}
