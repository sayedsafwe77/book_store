
<a href="{{route('dashboard.'.$resource_name.'.show',$resource)}}" class="btn text-primary">
    {{-- {{ __('actions.view')}} --}}
    <i class="fas fa-eye"></i>
</a>
<form action="{{route('dashboard.'.$resource_name.'.destroy',$resource)}}" id="delete-form" method="POST">
    @csrf
    @method('DELETE')
    {{-- <x-adminlte-button theme="outline-danger" type="submit" id="delete-btn" label="{{ __('actions.delete')}}"/> --}}
    <button type="submit" class="btn text-danger">
        <i class="fas fa-trash-alt"></i>
    </button>
</form>
<a href="{{route('dashboard.'.$resource_name.'.edit',$resource)}}" class="btn text-warning">
    {{-- {{ __('actions.edit')}} --}}
    <i class="fas fa-edit"></i>
</a>
