<x-layouts.app title="Pesanwa" activeMenu="pesanwa">
    <div class="my-5 container-fluid">
        <x-breadcrumb title="Pesanwa" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Pesanwa'],
        ]" />

        <x-bs-toast />
        
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                @can('pesanwa create')
                    <a href="{{ route('pesanwa.create') }}" class="btn btn-primary">
                        <span class="bx bx-plus me-1"></span>Tambah Data
                    </a>
                @endcan
            </div>
            <div class="card-body">
                <input 
                    type="text" 
                    name="search" 
                    placeholder="Cari pesanwa..."
                    hx-get="{{ route('pesanwa.index') }}"
                    hx-trigger="keyup changed delay:500ms"
                    hx-target="#pesanwa-table"
                >

                <div id="pesanwa-table">
                    @include('pesanwa.index-table', compact('pesanwa'))
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>