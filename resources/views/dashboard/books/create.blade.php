@extends('dashboard.layout')

@section('title', 'books')


@section('content')
    <form action="{{route('dashboard.book.store')}}" method="post" enctype="multipart/form-data">
        @csrf
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
            <label for="is_available">{{__('book.is_available')}}</label>
            <input type="checkbox" required   name="is_available" id="is_available" value="1" fgroup-class="col-md-4">
        </div>
        <div class="row">
            <label for="discountable_type" class="col-12">Select Discount Type:</label>
            <input type="radio" name="discountable_type" id="discount_id" value="App\Models\Discount">
            <label for="discount_id">Discount</label>
            <input type="radio" name="discountable_type" id="flash_sale_id" value="App\Models\FlashSale">
            <label for="flash_sale_id">FlashSale</label>
        </div>

        <div class="row">
            <select class="js-example-placeholder-single col-md-3 js-states form-control discount-select2" style="display: none" name="discountable_id">
                <option></option>
              </select>
        </div>
        <x-adminlte-button theme="outline-primary" class="btn-lg mx-auto" type="submit" label="{{__('actions.Save')}}"/>
    </form>

    @endsection
@push('js')
<script>
    const discountRadio = document.querySelector('#discount_id');
    const flashSaleRadio = document.querySelector('#flash_sale_id');
    const discountDropDown = document.querySelector('.discount-select2');
    let placeholder= '';
    const discountUrl = "{{route('discount.search')}}";
    const FlashSaleUrl = "{{route('flash_sale.search')}}";
    const local = "{{App::getLocale()}}";

    let url = '';
    discountRadio.addEventListener('change',showDiscountDropDown);
    flashSaleRadio.addEventListener('change',showDiscountDropDown);
    function showDiscountDropDown(){
        discountDropDown.style.display = 'block';
        if(this.id == 'discount_id') {
            placeholder = 'select discount';
            url = discountUrl;
        }
        else{
            placeholder = 'select flash_sale';
            url = FlashSaleUrl;
        }

        enableSelect2();
    }
  function enableSelect2(){
    $('.discount-select2').select2({
        placeholder,
        ajax: {
            url,
            dataType: 'json',
            processResults: function(data){
                return {
                    results: data.data.discounts.map(discount =>  {
                        const text  = url == discountUrl ? discount.code + '-' + discount.percentage : discount.name[local];
                        return {
                            id: discount.id,
                            text
                        }
                    })
                }
            }
        }
    });
  }

</script>
@endpush
