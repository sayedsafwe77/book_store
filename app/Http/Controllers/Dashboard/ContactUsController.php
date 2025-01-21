<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts=ContactUs::filter(request()->all())->orderBy('id','DESC')->paginate();
        return view('dashboard.contact_us.index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.contact_us.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ContactUs::create($request->except('_token'));
        return redirect()->route('dashboard.contact_us.index')->with('success','massage send successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact_us = ContactUs::find($id);
        return view('dashboard.contact_us.show',compact('contact_us'));
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactUs $contact_us)
    {
        $contact_us->delete();
        return redirect()->route('dashboard.contact_us.index');
    }
}
