@extends('adminlte::page')

@section('title', 'Category')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>category</h1>
        <a href="{{route('dashboard.category.create')}}" class="btn btn-success btn-lg">
            <i class="fas fa-plus"></i>
            Create</a>
    </div>
@stop

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>discount</th>
                <th>created_at</th>
                <th>updated_at</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td> {{ $category->id }}</td>
                    <td> {{ $category->name }}</td>
                    <td> {{ $category->discount?->code  }}</td>
                    <td> {{ $category->created_at }}</td>
                    <td> {{ $category->updated_at }}</td>
                    <td>
                        <a href="{{route('dashboard.category.show',$category->id)}}" class="btn btn-outline-primary">View</a>
                        <form action="{{route('dashboard.category.destroy',$category->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-adminlte-button theme="outline-danger" type="submit" label="Delete"/>
                        </form>
                        <a href="{{route('dashboard.category.edit',$category->id)}}" class="btn btn-outline-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$categories->links()}}
@stop
