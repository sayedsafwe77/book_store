<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::allows('super-admin')) {
            $admins = Admin::filter(request()->all())->orderByDesc('id')->paginate();
            return view('dashboard.admin-management.index',compact('admins'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Gate::allows('super-admin')) {
            // The user is a super-admin
                return view('dashboard.admin-management.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {

        if (Gate::allows('super-admin')) {
            // The user is a super-admin
            try {
                $admin = Admin::create($request->except('_token'));
                if($request->hasFile('image')){
                    $admin->addMediaFromRequest('image')
                        ->toMediaCollection('image');
                }
            }catch(\Exception $e){
                return redirect()->back()->with(['error' => $e->getMessage()]);
            }
            return redirect()->route('dashboard.admin.index')->with('success','Admin Created Successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (Gate::allows('super-admin')) {
            // The user is a super-admin
            $admin = Admin::findOrFail($id);
            return view('dashboard.admin-management.show',compact('admin'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (Gate::allows('super-admin')) {
            // The user is a super-admin
            $admin = Admin::findOrFail($id);
            return view('dashboard.admin-management.edit',compact('admin'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminUpdateRequest $request, string $id)
    {

        if (Gate::allows('super-admin')) {
            // The user is a super-admin
            $admin = Admin::findOrFail($id);
            // $admin->update($request->validated());
            $data = $request->only('name','email','image','type');
            if($request->filled('password')){
                $data['password'] = $request->password;
            }
            if($request->hasFile('image')){
                $admin->clearMediaCollection('image');
                $admin->addMediaFromRequest('image')
                    ->toMediaCollection('image');
            }
            $admin->update($data);
            return redirect()->route('dashboard.admin.index')->with('success','Admin Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Gate::allows('super-admin')) {
            // The user is a super-admin
            $admin = Admin::findOrFail($id);
            if($admin->id == Auth::user()->id){
                return redirect()->back()->with('error','Cannot Delete Your Admin Account');
            }
            $admin->delete();
            return redirect()->route('dashboard.admin.index')->with('success','Admin Updated Successfully');
        }
    }
}
