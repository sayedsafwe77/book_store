@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Discount</h1>
        <a href="{{route('dashboard.discount.create')}}" class="btn btn-success btn-lg">
            <i class="fas fa-plus"></i>
            Create</a>
    </div>
@stop

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>code</th>
                <th>quantity</th>
                <th>percentage</th>
                <th>expiry_date</th>
                <th>created_at</th>
                <th>updated_at</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($discounts as $discount)
                <tr>
                    <td> {{ $discount->id }}</td>
                    <td> {{ $discount->code }}</td>
                    <td> {{ $discount->quantity }}</td>
                    <td> {{ $discount->percentage }}</td>
                    <td> {{ $discount->expiry_date }}</td>
                    <td> {{ $discount->created_at }}</td>
                    <td> {{ $discount->updated_at }}</td>
                    <td>
                        <a href="{{route('dashboard.discount.show',$discount->id)}}" class="btn btn-outline-primary">View</a>
                        <form action="{{route('dashboard.discount.destroy',$discount->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-adminlte-button theme="outline-danger" type="submit" label="Delete"/>
                        </form>
                        <a href="{{route('dashboard.discount.edit',$discount->id)}}" class="btn btn-outline-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$discounts->links()}}
@stop
