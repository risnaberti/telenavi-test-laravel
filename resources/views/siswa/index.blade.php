<x-layouts.app title="Siswa" activeMenu="siswa">
    <div class="my-5 container-fluid">
        <x-breadcrumb title="Siswa" :breadcrumbs="[['label' => 'Dashboard', 'url' => url('/')], ['label' => 'Siswa']]" />

        <x-bs-toast />

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                @can('siswa create')
                    <a href="{{ route('siswa.create') }}" class="btn btn-primary">
                        <span class="bx bx-plus me-1"></span>Tambah Data
                    </a>
                @endcan

                <div class="d-flex ms-auto">

                    <div class="mb-3 input-group">
                        <input type="text" name="search" class="form-control" placeholder="Cari siswa..."
                            value="{{ old('search', request('search')) }}" hx-get="{{ route('siswa.index') }}"
                            hx-trigger="keyup[keyCode==13], keyup changed delay:500ms" hx-target="#siswa-table"
                            hx-push-url="true" hx-indicator="#search-loading"
                            hx-include="#filter-checkboxes input:checked">

                        <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Filter</button>

                        <ul class="dropdown-menu dropdown-menu-end" id="filter-checkboxes">
                            <li>
                                <div class="mx-2 form-check">
                                    <x-input.checkbox class="form-check-input" id="checkbox-all" :checked="count($columns) == count($selectedColumns)"
                                        :parent="true" />
                                    <label class="form-check-label" for="checkbox-all">-- All --</label>
                                </div>
                            </li>
                            @foreach ($columns as $column)
                                <li>
                                    <div class="mx-2 form-check">
                                        <x-input.checkbox class="form-check-input" id="checkbox-{{ $column }}"
                                            name="col[]" value="{{ $column }}" :checked="in_array($column, $selectedColumns)"
                                            parentId="checkbox-all" />
                                        <label class="form-check-label" for="checkbox-{{ $column }}">
                                            {{ str()->title(str()->replace('_', ' ', $column)) }}
                                        </label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body table-container">
                <div id="search-loading" class="htmx-indicator">
                    <div class="flex-row px-4 py-3 mx-auto mt-5 text-center card d-flex justify-content-center justify-items-center"
                        style="width: 200px;">
                        <div class="loading-spinner"></div>
                        <span>Sedang mencari siswa...</span>
                    </div>
                </div>

                <div id="siswa-table">
                    @include('siswa.includes.index-table', compact('siswa'))
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
