<x-layouts.app title="Tambah Pesanwa" activeMenu="pesanwa.create">
    <div class="container my-5">
        <x-breadcrumb title="Tambah Pesanwa" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Pesanwa', 'url' => route('pesanwa.index')],
            ['label' => 'Tambah Pesanwa'],
        ]" />

        <x-sweet-alert />

        <div class="card">
            <div class="card-body">
                <form action="{{ route('pesanwa.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    @include('pesanwa.includes.form')

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary me-2">Tambah</button>
                        <a href="{{ route('pesanwa.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>