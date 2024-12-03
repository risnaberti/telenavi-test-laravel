@pushOnce('js')
    <script src="{{ asset('js/checkboxall/jquery.checkboxall-1.0.min.js') }}"></script>
@endPushOnce

<div class="mb-2 row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                placeholder="{{ __('Name') }}" value="{{ isset($role) ? $role->name : old('name') }}" autofocus
                required>
            @error('name')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <label class="mb-1">{{ __('Permissions') }}</label>
        @error('permissions')
            <div class="mt-0 mb-2 text-danger">{{ $message }}</div>
        @enderror
    </div>

    @foreach (config('permission.permissions') as $key => $permission)
        @php
            $containerId = "permission-group-{$key}";
        @endphp
        <div class="col-md-3">
            <div class="border card">
                <div class="card-content">
                    <div class="card-body" id={{ $containerId }}>
                        <div style="d-flex justify-item-center">
                            <h4 class="card-title d-inline">
                                {{ ucwords($permission['group']) }}
                            </h4>
                            <input class="mt-1 form-check-input allcheck" type="checkbox" />
                            @push('js')
                                <script>
                                    $(document).ready(function() {
                                        $("#{{ $containerId }}").checkboxall('allcheck');
                                    })
                                </script>
                            @endpush
                        </div>
                        <div class="mt-2">
                            @foreach ($permission['access'] as $access)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="{{ str()->slug($access) }}"
                                        name="permissions[]" value="{{ $access }}"
                                        {{ isset($role) && $role->hasPermissionTo($access) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="{{ str()->slug($access) }}">
                                        {{ $access }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
