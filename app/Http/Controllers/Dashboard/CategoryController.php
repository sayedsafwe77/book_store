<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Imports\CategoryImport;
use App\Models\Category;
use App\Models\Discount;
use DragonCode\Support\Facades\Filesystem\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class CategoryController extends Controller
{
    function index()  {
        $categories = Category::filter(request()->all())->orderBy('id','DESC')->paginate();
        return view('dashboard.category.index',compact('categories'));
    }

    function show($id)  {
        $category = Category::find($id);
        $discounts = Discount::get();
        return view('dashboard.category.show',compact('category','discounts'));
    }
    function create()  {
        return view('dashboard.category.create');
    }
    function store(CategoryRequest $request)  {
        $category = Category::create($request->except('_token'));

        $category->addMediaFromRequest('image')
        ->toMediaCollection('image');

        return redirect()->route('dashboard.category.index')->with('success','category created successfully');
    }
    function destroy(Category $category)  {
        $category->delete();
        return redirect()->route('dashboard.category.index');
    }

    function edit(Category $category)  {
        return view('dashboard.category.edit',compact('category'));
    }

    function update(CategoryRequest $request,Category $category)  {
        if($request->hasFile('image')){
            $category->clearMediaCollection('image');
            $category->addMediaFromRequest('image')
            ->toMediaCollection('image');
        }
        $category->update($request->validated());
        return redirect()->route('dashboard.category.index');
    }


    function addDiscount(Category $category,Request $request)  {
        $request->validate(['discount_id' => 'required|exists:discounts,id']);
        $category->update(['discount_id' => $request->discount_id]);
        return redirect()->route('dashboard.category.index');
    }



}
