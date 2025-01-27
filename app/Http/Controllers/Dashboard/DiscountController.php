<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiscountRequest;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Pluralizer;

class DiscountController extends Controller
{
    function index()  {
        $discounts = Discount::filter(request()->all())->orderBy('id','DESC')->paginate();
        return view('dashboard.discount.index',compact('discounts'));
    }
    function show($id)  {
        $discount = Discount::find($id);
        $categories = $discount->categories;
        return view('dashboard.discount.show',compact('discount', 'categories'));
    }
    function create()  {
        return view('dashboard.discount.create');
    }
    function store(DiscountRequest $request)  {
        Discount::create($request->except('_token'));
        return redirect()->route('dashboard.discount.index')->with('success','discount created succefully');
    }
    function destroy(Discount $discount)  {
        $discount->delete();
        return redirect()->route('dashboard.discount.index');
    }

    function edit(Discount $discount)  {
        return view('dashboard.discount.edit',compact('discount'));
    }

    function update(DiscountRequest $request,Discount $discount)  {
        $discount->update($request->validated());
        return redirect()->route('dashboard.discount.index');
    }

    function checkCode(Request $request)  {
        $discount = Discount::where('code',$request->code)->count();
        return response()->json(['data' => ['is_exist' => $discount]]);
    }

    function search(Request $request)  {
        $discounts = Discount::select('code','percentage','id')->whereLike('code',"%$request->q%")->orWhereLike('percentage',"%$request->q%")->limit(5)->get();
        return response()->json(['data' => ['discounts' => $discounts]]);
    }
}
