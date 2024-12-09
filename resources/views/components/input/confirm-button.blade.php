{{-- 
contoh penggunaan:
Submit Button:
<x-input.confirm-button text="Anda akan keluar dari akun ini!" positive="Ya, keluar!" icon="info" class="text-white menu-link bg-dark">
    <i class="menu-icon tf-icons bx bx-exit"></i>
    <div class="text-truncate" data-i18n="Logout">Logout</div>
</x-input.confirm-button>

Link Button:
<x-input.confirm-button url="{{ route('permissions.refresh') }}" class="mb-2 form-control btn btn-danger" title="Refresh Permission?"
    text="Proses ini akan menghapus dan menambah permission dari file konfigurasi!" positive="Ya, lanjut!" icon="warning">
    Refresh Permission
</x-input.confirm-button>
--}}

@props([
    'url' => null,
    'class' => 'btn btn-danger',
    'title' => 'Apakah Anda yakin?',
    'text' => 'Data ini akan dihapus!',
    'icon' => 'warning',
    'positive' => 'Ya, hapus!',
    'negative' => 'Batal',
])

<a href="#" {{ $attributes->merge(['class' => $class . ' confirm-button']) }} data-url="{{ $url }}"
    data-title="{{ $title }}" data-text="{{ $text }}" data-icon="{{ $icon }}"
    data-positive="{{ $positive }}" data-negative="{{ $negative }}">
    {{ $slot }}
</a>

@pushOnce('css')
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endPushOnce

@pushOnce('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.confirm-button').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    Swal.fire({
                        title: this.getAttribute('data-title'),
                        text: this.getAttribute('data-text'),
                        icon: this.getAttribute('data-icon'),
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: this.getAttribute('data-positive'),
                        cancelButtonText: this.getAttribute('data-negative')
                    }).then((result) => {
                        if (result.isConfirmed) {
                            if (this.getAttribute('data-url')) {
                                window.location.href = this.getAttribute('data-url');
                            } else {
                                this.closest('form').submit();
                            }
                        }
                    });
                });
            });
        });
    </script>
@endPushOnce
