<x-layouts.app title="Tambah Pendaftaran Tryout">
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="fw-bold">Tambah Pendaftaran Tryout</h4>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('pendaftaran-tryout.index') }}">Pendaftaran Tryout</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Tambah Pendaftaran Tryout
                    </li>
                </ol>
            </nav>
        </div>

        <x-sweet-alert />

        <div class="card">
            <div class="card-body">
                <form action="{{ route('pendaftaran-tryout.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    @include('pendaftaran-tryout.includes.form')

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary me-2">Tambah</button>
                        <a href="{{ route('pendaftaran-tryout.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>