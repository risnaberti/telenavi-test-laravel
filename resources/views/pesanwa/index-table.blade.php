<div>
    <div class="table-responsive" >
        <table class="table table-striped" id="data-table">
            <thead>
                <tr>
                    <th>No</th>
                    
                    <th>Isi Pesan</th>
                    <th>Tgl Kirim</th>
                    <th>Status Pesan</th>
                    <th>No Pendaftaran</th>
                    <th>Jenis Pesan</th>
                    <th>No Hp</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pesanwa as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        
                    <td>{{ $row?->isi_pesan }}</td>
                    <td>{{ $row?->tgl_kirim }}</td>
                    <td>{{ $row?->status_pesan }}</td>
                    <td>{{ $row?->no_pendaftaran }}</td>
                    <td>{{ $row?->jenis_pesan }}</td>
                    <td>{{ $row?->no_hp }}</td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                @can('pesanwa view')
                                    <div class="me-1">
                                        <a href="{{ route('pesanwa.show', $row) }}"
                                            class="btn btn-icon btn-outline-info btn-sm"
                                            data-bs-toggle="tooltip"
                                            data-bs-title="Detail"
                                            data-bs-placement="top">
                                            <span class="bx bx-show"></span>
                                        </a>
                                    </div>
                                @endcan
                                @can('pesanwa edit')
                                    <div class="me-1">
                                        <a href="{{ route('pesanwa.edit', $row) }}"
                                            class="btn btn-icon btn-outline-primary btn-sm"
                                            data-bs-toggle="tooltip" data-bs-title="Edit"
                                            data-bs-placement="top">
                                            <span class="bx bx-pencil"></span>
                                        </a>
                                    </div>
                                @endcan
                                @can('pesanwa delete')
                                    <form action="{{ route('pesanwa.destroy', $row) }}"
                                        method="POST" class="d-inline"
                                        @csrf
                                        @method('DELETE')
                                        <x-input.confirm-button text="Data pesanwa ini akan dihapus!"
                                            positive="Ya, hapus!" icon="info"
                                            class="btn btn-icon btn-outline-danger btn-sm"
                                            data-bs-toggle="tooltip"
                                            data-bs-title="Hapus"
                                            data-bs-placement="top">
                                            <span class="bx bx-trash"></span>
                                        </x-input.confirm-button>
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
        {!! $pesanwa->withQueryString()->links() !!}
    </div>    
</div>