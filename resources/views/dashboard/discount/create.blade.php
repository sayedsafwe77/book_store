@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Discount -> create</h1>
@stop

@section('content')
    <form action="{{route('dashboard.discount.store')}}" method="post">
        @csrf
        <div class="row">
            <x-adminlte-input name="code" label="code" type="text" placeholder="ex: ******"
                fgroup-class="col-md-4" />

            <x-adminlte-button theme="outline-primary" class="align-self-center" id="generate-code"  label="generate"/>

            <x-adminlte-input name="quantity" label="quantity" type="number" placeholder="ex: 1 - 100"
                fgroup-class="col-md-6" />

            <x-adminlte-input name="percentage" label="percentage" type="text" placeholder="ex: max-90"
                fgroup-class="col-md-6" />

            <x-adminlte-input name="expiry_date" label="expiry_date" type="datetime-local"
                fgroup-class="col-md-6" />

            <x-adminlte-button theme="outline-primary" class="btn-lg mx-auto" type="submit" label="Save!"/>
        </div>
    </form>

    @stop

@section('js')
    <script>
        const codeElement = document.querySelector('input[name=code]');

        const generateCodeElement = document.querySelector('#generate-code');

        generateCodeElement.addEventListener('click',insertCode);

        async function insertCode() {
            const code = generateDiscountCode();

            const is_exist = await checkCodeAvailable(checkCodeUrl,code);
            if(!is_exist){
                codeElement.value = code;
            }
        }

        const checkCodeUrl = "{{route('discount.check.code')}}" ;

        async function checkCodeAvailable(url,code) {
            const response = await fetch(url);
            const data = await response.json();
            return data.data.is_exist;
        }

        function generateDiscountCode() {
            const prefix = "DISCOUNT";
            const characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            let code = prefix;

            for (let i = 0; i < 4; i++) {
                const randomIndex = Math.floor(Math.random() * characters.length);
                code += characters[randomIndex];
            }

            return code;
        }

    </script>
@stop
