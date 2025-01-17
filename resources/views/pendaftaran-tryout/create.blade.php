<x-layout.app title="Tambah Pendaftaran Tryout">
    <div class="container my-5">
        <x-breadcrumb title="Tambah Pendaftaran Tryout" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Pendaftaran Tryout', 'url' => route('pendaftaran-tryout.index')],
            ['label' => 'Tambah Pendaftaran Tryout'],
        ]" />

        <div class="card">
            <div class="card-body">
                <form action="{{ route('pendaftaran-tryout.store') }}" method="POST" role="form"
                    enctype="multipart/form-data">
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
</x-layout.app>
