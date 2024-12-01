<x-layouts.app title="Pendaftaran Tryout" activeMenu="pendaftaran-tryout">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 card-title">Pendaftaran Tryout</h5>
                    @can('pendaftaran-tryout create')
                        <a href="{{ route('pendaftaran-tryout.create') }}" class="btn btn-primary">
                            <span class="tf-icons bx bx-plus"></span>Tambah Data
                        </a>
                    @endcan
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="data-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    {{tableHeader}}
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (${{modelNamePluralLowerCase}} as ${{modelNameLowerCase}})
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        {{tableBody}}
                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                @can('pendaftaran-tryout view')
                                                    <a href="{{ route('pendaftaran-tryout.show', ${{modelNameLowerCase}}->id) }}" class="btn btn-icon btn-outline-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat">
                                                        <span class="tf-icons bx bx-show"></span>
                                                    </a>
                                                @endcan
                                                @can('pendaftaran-tryout edit')
                                                    <a href="{{ route('pendaftaran-tryout.edit', ${{modelNameLowerCase}}->id) }}" class="btn btn-icon btn-outline-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                        <span class="tf-icons bx bx-pencil"></span>
                                                    </a>
                                                @endcan
                                                @can('pendaftaran-tryout delete')
                                                    <form action="{{ route('pendaftaran-tryout.destroy', ${{modelNameLowerCase}}->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Konfirmasi untuk hapus data ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-icon btn-outline-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                                            <span class="tf-icons bx bx-trash"></span>
                                                        </button>
                                                    </form>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-3 d-flex justify-content-end">
                        {!! ${{modelNamePluralLowerCase}}->withQueryString()->links('vendor.pagination.bootstrap-5') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('js')
    <script>
        // Inisialisasi tooltip
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
    @endpush
</x-layouts.app>