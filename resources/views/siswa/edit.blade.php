<x-layouts.app title="Perbarui Siswa" activeMenu="siswa.edit">
    <div class="container my-5">
        <x-breadcrumb title="Perbarui Siswa" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Siswa', 'url' => route('siswa.index')],
            ['label' => 'Perbarui Siswa'],
        ]" />

        <x-sweet-alert />

        <div class="card">
            <div class="card-body">
                <form action="{{ route('siswa.update', $siswa) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @include('siswa.includes.form')

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary me-2">Perbarui</button>
                        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>