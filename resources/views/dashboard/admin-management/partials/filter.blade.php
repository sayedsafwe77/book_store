<div class="card card-body mb-4">
    <form action="{{ route('dashboard.admin.index') }}" method="GET">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">{{__('admins.name')}}</label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="form-control"
                        placeholder="Enter Admin Name"
                        value="{{ request('name') }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">{{__('admins.email')}}</label>
                    <input
                        type="text"
                        name="email"
                        id="email"
                        class="form-control"
                        placeholder="Enter Admin email"
                        value="{{ request('email') }}">
                </div>
            </div>
            <div class="col-md-6">
                <label for="type">{{__('admins.type')}}</label>
                <select name="type" id="type" class="form-control">
                    <option value="" disabled selected>{{__('admins.choose_type')}}</option>
                    <option value="super-admin">{{__('admins.super_admin')}}</option>
                    <option value="content-management">{{__('admins.content_management')}}</option>
                </select>
            </div>
            <div class="col-md-12 text-end mt-2">
                @include('dashboard.partials.filter-actions')
            </div>
        </div>
    </form>
</div>
