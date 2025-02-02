    <button id="delete-selected" class="btn btn-danger" data-model="{{$model}}" disabled>{{ __('actions.delete_selected')}}</button>
@push('js')
    <script>
        const selectAll =document.getElementById('select-all');

        if(selectAll){
            const rowCheckboxes = document.querySelectorAll('.row-checkbox');
            rowCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updateButtonState);
            });
            handleSelectAllToDelete();
            handleDeleteSelected();
        }
        function handleSelectAllToDelete(){
            selectAll.addEventListener('change', function (event) {
                const checkboxes = document.querySelectorAll('.row-checkbox');
                checkboxes.forEach(checkbox => checkbox.checked = this.checked);
                updateButtonState(event);
            });
        }
        function handleDeleteSelected(){
            const deleteSelected = document.getElementById('delete-selected');
            deleteSelected.addEventListener('click', function (event) {
                const selectedIds = Array.from(document.querySelectorAll('.row-checkbox:checked'))
                    .map(checkbox => checkbox.value);

                if (selectedIds.length === 0) {
                    Swal.fire("{{ __('actions.no_items_selected') }}", 'Please select at least one item to delete.', 'warning');
                    return;
                }

                Swal.fire({
                    title: "Are you sure?",
                    text: "You are about to delete selected items!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete them!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch('/dashboard/delete-items', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({ ids: selectedIds, model: event.target.dataset.model })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire('Deleted!', data.message, 'success').then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire('Error!', data.message, 'error');
                            }
                        })
                        .catch(error => {
                            Swal.fire('Error!', 'Something went wrong.', 'error');
                        });
                    }
                });
            });
        }

        function updateButtonState(event) {
            const deleteButton = document.getElementById('delete-selected');
            deleteButton.disabled = !event.target.checked;
        }


    </script>
@endpush
