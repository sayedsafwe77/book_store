<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Requests\AuthorRequest;


class AuthorController extends Controller
{
    public function index() {
        $authors = Author::filter(request()->all())->orderBy('id','DESC')->paginate();
        return view('dashboard.author.index',compact('authors'));
     }
    public function create() {
        return view('dashboard.author.create');
    }
    public function store(AuthorRequest $request) {



        $author = Author::create($request->except('_token'));
        
        if($request->hasFile('image')){

            $author->addMediaFromRequest('image')
            ->toMediaCollection('image');
        }

        return redirect()->route('dashboard.author.index')
                        ->with('success', $author->name. ' profile has been created successfully');
    }
    public function show(Author $author) {
        return view('dashboard.Author.show',compact('author'));
    }
    public function edit(Author $author) {
        return view('dashboard.Author.edit',compact('author'));
    }
    public function update(AuthorRequest $request, Author $author) {
        $author->update($request->validated());
        return redirect()->route('dashboard.author.index');
     }
    public function destroy(Author $author) {
        $author->delete();
        return redirect()->route('dashboard.author.index');
    }


}
