<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\FlashSale\CreateFlashSaleRequest;
use App\Models\FlashSale;

class FlashSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $flash_sales = FlashSale::filter(request()->all())->orderByDesc('id')->paginate();
        return view('dashboard.flash_sale.index',compact('flash_sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.flash_sale.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateFlashSaleRequest $request)
    {
        FlashSale::create($request->except('_token'));
        return redirect()->route('dashboard.flash_sale.index')->with('success','Flash sale has been created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(FlashSale $flashSale)
    {
        return view('dashboard.flash_sale.show', compact('flashSale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FlashSale $flashSale)
    {
        return view('dashboard.flash_sale.edit', compact('flashSale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateFlashSaleRequest $request, FlashSale $flashSale)
    {
        $flashSale->update($request->validated());
        return redirect()->route('dashboard.flash_sale.index')->with('success', 'Flash sale updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FlashSale $flashSale)
    {
        $flashSale->delete();
        return redirect()->route('dashboard.flash_sale.index')->with('success', 'Flash sale deleted successfully!');
    }
}
