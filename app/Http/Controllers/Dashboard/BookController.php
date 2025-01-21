<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\publisher;
class BookController extends Controller
{
    public function index(){

        //! 001 => Pass query data to targeted page
        $books = Book::latest()->with(['publishers' , 'category'] )->paginate(10);

        //! 002 => Redirect admin to book's main page with data
        return view('dashboard.books.index',compact('books'));

    }

    public function create(){

        //! 001 => Get data of realtion's items
        $authors = Author::all();
        $publishers = Publisher::all();
        $categories = Category::all();

        //! 001 => redirect user to create page
        return view('dashboard.books.create' , compact('authors' , 'publishers' , 'categories'));
    }

    public function store(Request $request){

        //! 001 => store record
        Book::create($request->all());

        //! 002 => redirect with message
        return redirect()->route('dashboard.book.index')->with('success' , 'created successfully');
    }

    public function edit(Book $book){
         //! 001 => Get data of realtion's items
         $authors = Author::all();
         $publishers = Publisher::all();
         $categories = Category::all();

        //! 002 => redirect user to edit page
         return view('dashboard.books.edit' ,compact('book','authors' , 'publishers' , 'categories'));

    }


    public function update(Request $request , Book $book){
        //! 001 => update record
         $book->update($request->all());

        //! 002 => redirect with message
         return redirect()->route('dashboard.book.index')->with('success' , 'updated successfully');

    }
    public function destroy(Book $book) {
        //! 001 => get object data and delete it
        $book->delete();

        //! 002 => Redirect user back
        return redirect()->back()->with('success' , 'deleted succsesfully');
    }
}
