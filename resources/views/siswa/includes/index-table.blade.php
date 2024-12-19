<div class="table-responsive" >
    <table class="table table-striped" id="data-table">
        <thead>
            <tr>
                <th>No</th>
                
                    <th>No Va</th>
                    <th>Idasalsekolah</th>
                    <th>Kodejk</th>
                    <th>Kodejeniskeringanan</th>
                    <th>Nama</th>
                    <th>Panggilan</th>
                    <th>Tempatlahir</th>
                    <th>Tgllahir</th>
                    <th>Tahunmasuk</th>
                    <th>Namabapak</th>
                    <th>Namaibu</th>
                    <th>Alamat</th>
                    <th>Notelpon</th>
                    <th>Namaori</th>
                    <th>Templatefinger</th>
                    <th>Nokartu</th>
                    <th>Kelas Id</th>
                    <th>Longit</th>
                    <th>Latit</th>
                    <th>Adress</th>
                    <th>Pin</th>
                    <th>Kamar Id</th>
                    <th>Profil</th>
                    <th>Kamar</th>
                    <th>Asrama</th>
                    <th>Lokasi Asrama</th>
                    <th>Kodeasrama</th>
                    <th>Status Ketua Kamar</th>
                    <th>Tgl Mapping</th>
                    <th>Foto</th>
                    <th>Nisn</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswa as $row)
                <tr>
                    <td>{{ $loop->iteration + ($siswa->currentPage() - 1) * $siswa->perPage() }}</td>
                    
                    <td>{{ $row?->no_va }}</td>
                    <td>{{ $row?->idasalsekolah }}</td>
                    <td>{{ $row?->kodejk }}</td>
                    <td>{{ $row?->kodejeniskeringanan }}</td>
                    <td>{{ $row?->nama }}</td>
                    <td>{{ $row?->panggilan }}</td>
                    <td>{{ $row?->tempatlahir }}</td>
                    <td>{{ $row?->tgllahir }}</td>
                    <td>{{ $row?->tahunmasuk }}</td>
                    <td>{{ $row?->namabapak }}</td>
                    <td>{{ $row?->namaibu }}</td>
                    <td>{{ $row?->alamat }}</td>
                    <td>{{ $row?->notelpon }}</td>
                    <td>{{ $row?->namaori }}</td>
                    <td>{{ $row?->templatefinger }}</td>
                    <td>{{ $row?->nokartu }}</td>
                    <td>{{ $row?->kelas_id }}</td>
                    <td>{{ $row?->longit }}</td>
                    <td>{{ $row?->latit }}</td>
                    <td>{{ $row?->adress }}</td>
                    <td>{{ $row?->pin }}</td>
                    <td>{{ $row?->kamar_id }}</td>
                    <td>{{ $row?->profil }}</td>
                    <td>{{ $row?->kamar }}</td>
                    <td>{{ $row?->asrama }}</td>
                    <td>{{ $row?->lokasi_asrama }}</td>
                    <td>{{ $row?->kodeAsrama }}</td>
                    <td>{{ $row?->status_ketua_kamar }}</td>
                    <td>{{ $row?->tgl_mapping }}</td>
                    <td>{{ $row?->foto }}</td>
                    <td>{{ $row?->nisn }}</td>
                    <td class="text-center">
                        <div class="btn-group" role="group">
                            @can('siswa view')
                                <div class="me-1">
                                    <a href="{{ route('siswa.show', $row) }}"
                                        class="btn btn-icon btn-outline-info btn-sm"
                                        data-bs-toggle="tooltip"
                                        data-bs-title="Detail"
                                        data-bs-placement="top">
                                        <span class="bx bx-show"></span>
                                    </a>
                                </div>
                            @endcan
                            @can('siswa edit')
                                <div class="me-1">
                                    <a href="{{ route('siswa.edit', $row) }}"
                                        class="btn btn-icon btn-outline-primary btn-sm"
                                        data-bs-toggle="tooltip" data-bs-title="Edit"
                                        data-bs-placement="top">
                                        <span class="bx bx-pencil"></span>
                                    </a>
                                </div>
                            @endcan
                            @can('siswa delete')
                                <form action="{{ route('siswa.destroy', $row) }}"
                                    method="POST" class="d-inline"
                                    @csrf
                                    @method('DELETE')
                                    <x-input.confirm-button text="Data siswa ini akan dihapus!"
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
    {!! $siswa->withQueryString()->links() !!}
</div>    