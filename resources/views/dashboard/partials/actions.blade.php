
<a href="{{route('dashboard.'.$resource_name.'.show',$resource)}}" class="btn btn-outline-primary">{{ __('actions.view')}}</a>
<form action="{{route('dashboard.'.$resource_name.'.destroy',$resource)}}" method="POST">
    @csrf
    @method('DELETE')
    <x-adminlte-button theme="outline-danger" type="submit" label="{{ __('actions.delete')}}"/>
</form>
<a href="{{route('dashboard.'.$resource_name.'.edit',$resource)}}" class="btn btn-outline-warning">{{ __('actions.edit')}}</a>
