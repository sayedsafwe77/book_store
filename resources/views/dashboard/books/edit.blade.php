@extends('dashboard.layout')

@section('title', 'books')


@section('content')
    <form action="{{route('dashboard.book.update' , $book->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <x-adminlte-input name="name" label="{{__('book.name')}}" value="{{ old('name')}}" type="text" placeholder="ex: book of..."
                fgroup-class="col-md-3"  required/>
            <x-adminlte-input name="slug" label="{{__('book.slug')}}" value="{{ old('slug')}}" type="text" placeholder="new"
                fgroup-class="col-md-3"  required/>
            <x-adminlte-input name="price" label="{{__('book.price')}}" value="{{ old('price')}}" type="number" placeholder="500EGP"
                fgroup-class="col-md-3"  required />
            <x-adminlte-input name="quantity" label="{{__('book.quantity')}}" value="{{ old('quantity')}}" type="number" placeholder="10"
                fgroup-class="col-md-3"  required />
        </div>
        <div class="row">
            <x-adminlte-textarea  name="description" label="{{__('book.description')}}" value="{{ old('description')}}" type="text" placeholder="ex: this book is talking about... "
                fgroup-class="col-md-12" required />
        </div>
        <div class="row">


                <x-image-preview name='image' />
        </div>
        <div class="row">
           <x-adminlte-select  required  name="author_id" id="" fgroup-class="col-md-4">
             <option value="#" class="disabled"> Select author</option>
             @foreach ($authors as $author)

             <option value="{{$author->id}}" class="disabled">{{$author->name}}</option>
             @endforeach

           </x-adminlte-select>
           <x-adminlte-select  required  name="publisher_id" id=""  fgroup-class="col-md-4" >
             <option value="#" class="disabled" > Select publisher</option>
             @foreach ($publishers as $publisher)

             <option value="{{$publisher->id}}" class="disabled">{{$publisher->name}}</option>
             @endforeach

           </x-adminlte-select>
           <x-adminlte-select required   name="category_id" id=""  fgroup-class="col-md-4">
             <option value="#" class="disabled"> Select category</option>
             @foreach ($categories as $category)

             <option value="{{$category->id}}" class="disabled">{{$category->name}}</option>
             @endforeach

           </x-adminlte-select>
        </div>
        <div class="row">
            <x-adminlte-input name="rate" label="{{__('book.rate')}}" value="{{ old('rate')}}" type="text" placeholder="4.4"
                fgroup-class="col-md-6"  required/>
            <x-adminlte-input name="publish_year" label="{{__('book.publish_year')}}" value="{{ old('publish_year')}}" type="text" placeholder="4.4"
                fgroup-class="col-md-6"  required/>
        </div>
        <div class="row">
            <span>{{__('book.is_available')}}</span>
            <input type="checkbox" required  name="is_available" id="" value="1" fgroup-class="col-md-4">
        </div>
        <x-adminlte-button theme="outline-primary" class="btn-lg mx-auto" type="submit" label="{{__('actions.Save')}}"/>
    </form>

    @endsection
