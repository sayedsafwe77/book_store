@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>category -> {{ $category->name }}</h1>
@stop

@section('content')
    <h1>{{$category->name}}</h1>
    <form action="{{route('dashboard.category.add.discount',$category->id)}}" method="POST">
        @csrf
        <select class="js-example-placeholder-single col-md-3 js-states form-control discount-select2" name="discount_id">
            <option></option>
          </select>

        <button type="submit">Save</button>
    </form>
@stop


@section('js')
    <script>
        console.log("{{route('discount.search')}}");

        $('.discount-select2').select2({
            placeholder: 'select discount',
            ajax: {
                url: "{{route('discount.search')}}",
                dataType: 'json',
                processResults: function(data){
                    return {
                        results: data.data.discounts.map(discount => ({
                            id: discount.id,
                            text: discount.code + '-' + discount.percentage
                        }))
                    }
                }
            }
        });

    </script>
@stop
