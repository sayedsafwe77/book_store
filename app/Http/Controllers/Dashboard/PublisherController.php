<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PublisherRequest;
use App\Models\Publisher;

class PublisherController extends Controller
{
    function index()  {
        $publishers = Publisher::filter(request()->all())->orderBy('id','DESC')->paginate();
        return view('dashboard.publisher.index',compact('publishers'));
    }

    function show(Publisher $publisher)  {
        return view('dashboard.publisher.show',compact('publisher'));
    }
    function create()  {
        return view('dashboard.publisher.create');
    }
    function store(PublisherRequest $request)  {
        Publisher::create($request->except('_token'));
        return redirect()->route('dashboard.publisher.index');
    }
    function destroy(Publisher $publisher)  {
        $publisher->delete();
        return redirect()->route('dashboard.publisher.index');
    }

    function edit(Publisher $publisher)  {
        return view('dashboard.publisher.edit',compact('publisher'));
    }

    function update(PublisherRequest $request,Publisher $publisher)  {
        $publisher->update($request->validated());
        return redirect()->route('dashboard.publisher.index');
    }
}
