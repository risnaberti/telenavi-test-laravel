<x-layouts.app title="Perbarui Pesanwa" activeMenu="pesanwa.edit">
    <div class="container my-5">
        <x-breadcrumb title="Perbarui Pesanwa" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Pesanwa', 'url' => route('pesanwa.index')],
            ['label' => 'Perbarui Pesanwa'],
        ]" />

        <x-sweet-alert />

        <div class="card">
            <div class="card-body">
                <form action="{{ route('pesanwa.update', $pesanwa) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @include('pesanwa.includes.form')

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary me-2">Perbarui</button>
                        <a href="{{ route('pesanwa.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>