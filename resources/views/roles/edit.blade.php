<x-layout.app title="Perbarui role" activeMenu="roles.edit">
    <div class="container my-5">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="order-last col-12 col-md-8 order-md-1">
                        <h3>{{ __('Role') }}</h3>
                        <p class="text-subtitle text-muted">
                            {{ __('Edit a role.') }}
                        </p>
                    </div>

                    <x-breadcrumb>
                        <li class="breadcrumb-item">
                            <a href="/">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('roles.index') }}">{{ __('Role') }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ __('Edit') }}
                        </li>
                    </x-breadcrumb>
                </div>
            </div>

            <section class="section">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('roles.update', $role->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    @include('roles.include.form')

                                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>

                                    <a href="{{ route('roles.index') }}"
                                        class="btn btn-secondary">{{ __('Back') }}</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-layout.app>
