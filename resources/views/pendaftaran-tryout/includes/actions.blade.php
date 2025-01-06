<div class="btn-group" role="group">
    @can('pendaftaran-tryout view')
        <div class="me-1">
            <a href="{{ route('pendaftaran-tryout.show', $row) }}" class="btn btn-icon btn-outline-info btn-sm"
                data-bs-toggle="tooltip" data-bs-title="Detail" data-bs-placement="top">
                <span class="bx bx-show"></span>
            </a>
        </div>
    @endcan
    @can('pendaftaran-tryout edit')
        <div class="me-1">
            <a href="{{ route('pendaftaran-tryout.edit', $row) }}" class="btn btn-icon btn-outline-primary btn-sm"
                data-bs-toggle="tooltip" data-bs-title="Edit" data-bs-placement="top">
                <span class="bx bx-pencil"></span>
            </a>
        </div>
    @endcan
    @can('pendaftaran-tryout delete')
        <form action="{{ route('pendaftaran-tryout.destroy', $row) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <x-input.confirm-button text="Data pendaftaran tryout ini akan dihapus!" positive="Ya, hapus!" icon="info"
                class="btn btn-icon btn-outline-danger btn-sm" data-bs-toggle="tooltip" data-bs-title="Hapus"
                data-bs-placement="top">
                <span class="bx bx-trash"></span>
            </x-input.confirm-button>
        </form>
    @endcan
</div>
