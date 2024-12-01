<x-layouts.app title="Perbarui Pendaftaran Tryout">
    <div class="container my-5">
        <x-breadcrumb title="Perbarui Pendaftaran Tryout" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Pendaftaran Tryout', 'url' => route('pendaftaran-tryout.index')],
            ['label' => 'Perbarui Pendaftaran Tryout'],
        ]" />

        <x-sweet-alert />

        <div class="card">
            <div class="card-body">
                <form action="{{ route('pendaftaran-tryout.update', $pendaftaranTryout) }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @include('pendaftaran-tryout.includes.form')

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary me-2">Perbarui</button>
                        <a href="{{ route('pendaftaran-tryout.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>