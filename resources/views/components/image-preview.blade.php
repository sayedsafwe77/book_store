<div class="box box-primary col-md-6">
    <div class="box-header with-border">
        <h3 class="box-title">{{__('adminlte::adminlte.upload_image')}}</h3>
    </div>
    <div class="box-body">
        <input type="file" id="imageInput" name="{{$name}}" />     
        
        <img id="imagePreview" style="max-width: 200px; display: none;"  />
       
    </div>
</div>
@push('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        FilePond.registerPlugin(FilePondPluginImagePreview);
        const pond = FilePond.create(document.querySelector('#imageInput'), {
            allowImagePreview: true,
            imagePreviewMaxHeight: 200,
            storeAsFile: true,
            allowMultiple: true,
            acceptedFileTypes: ['image/*'],
        });

        @if ($value)
            pond.addFile("{{ $value }}");
        @endif
    });
</script>
@endpush
