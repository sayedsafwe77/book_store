<div class="card card-body mb-4">
    <form action="#" method="GET">
        <div class="row">
            @foreach ($filters as $filter)
                <div class="col-md-{{ $filter['col'] ?? 4 }}">
                    @if ($filter['type'] === 'select')
                        <div class="form-group">
                            <label for="{{ $filter['name'] }}">{{ $filter['label'] }}</label>
                            <select name="{{ $filter['name'] }}" id="{{ $filter['name'] }}" class="form-control">
                                <option value="">{{ $filter['placeholder'] ?? __('Select') }}</option>
                                @foreach ($filter['options'] as $key => $value)
                                    <option value="{{ $key }}" {{ request($filter['name']) == $key ? 'selected' : '' }}>
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @else
                        <div class="form-group">
                            <label for="{{ $filter['name'] }}">{{ $filter['label'] }}</label>
                            <input type="{{ $filter['type'] }}" name="{{ $filter['name'] }}" id="{{ $filter['name'] }}"
                                class="form-control"
                                @isset($filter['placeholder'])
                                        placeholder="{{ $filter['placeholder'] }}"
                                @endisset
                                value="{{ request($filter['name']) }}">
                        </div>
                    @endif
                </div>
            @endforeach

            <div class="col-md-12 text-end">
                @include('dashboard.filter-actions')
            </div>
        </div>
    </form>
</div>
