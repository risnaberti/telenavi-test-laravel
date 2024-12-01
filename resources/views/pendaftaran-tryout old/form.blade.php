<div class="card">
    <div class="card-body">
        <div class="row padding-1 p-1">
            <div class="col-md-12">
                
    <div class="mb-4">
        <label for="id_pendaftar" class="form-label">Id Pendaftar</label>
        <input type="text" name="id_pendaftar" class="form-control @error('id_pendaftar') is-invalid @enderror" id="id_pendaftar" value="{{ old('id_pendaftar', $pendaftaranTryout?->id_pendaftar) }}" id="id_pendaftar" placeholder="Id Pendaftar">
        @error('id_pendaftar')<small class="invalid-feedback">{{ $message }}</small>@enderror
    </div>    <div class="mb-4">
        <label for="no_peserta" class="form-label">No Peserta</label>
        <input type="text" name="no_peserta" class="form-control @error('no_peserta') is-invalid @enderror" id="no_peserta" value="{{ old('no_peserta', $pendaftaranTryout?->no_peserta) }}" id="no_peserta" placeholder="No Peserta">
        @error('no_peserta')<small class="invalid-feedback">{{ $message }}</small>@enderror
    </div>    <div class="mb-4">
        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" value="{{ old('nama_lengkap', $pendaftaranTryout?->nama_lengkap) }}" id="nama_lengkap" placeholder="Nama Lengkap">
        @error('nama_lengkap')<small class="invalid-feedback">{{ $message }}</small>@enderror
    </div>    <div class="mb-4">
        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
        <input type="text" name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" value="{{ old('jenis_kelamin', $pendaftaranTryout?->jenis_kelamin) }}" id="jenis_kelamin" placeholder="Jenis Kelamin">
        @error('jenis_kelamin')<small class="invalid-feedback">{{ $message }}</small>@enderror
    </div>    <div class="mb-4">
        <label for="nisn" class="form-label">Nisn</label>
        <input type="text" name="nisn" class="form-control @error('nisn') is-invalid @enderror" id="nisn" value="{{ old('nisn', $pendaftaranTryout?->nisn) }}" id="nisn" placeholder="Nisn">
        @error('nisn')<small class="invalid-feedback">{{ $message }}</small>@enderror
    </div>    <div class="mb-4">
        <label for="nama_asal_sekolah" class="form-label">Nama Asal Sekolah</label>
        <input type="text" name="nama_asal_sekolah" class="form-control @error('nama_asal_sekolah') is-invalid @enderror" id="nama_asal_sekolah" value="{{ old('nama_asal_sekolah', $pendaftaranTryout?->nama_asal_sekolah) }}" id="nama_asal_sekolah" placeholder="Nama Asal Sekolah">
        @error('nama_asal_sekolah')<small class="invalid-feedback">{{ $message }}</small>@enderror
    </div>    <div class="mb-4">
        <label for="nama_ortu" class="form-label">Nama Ortu</label>
        <input type="text" name="nama_ortu" class="form-control @error('nama_ortu') is-invalid @enderror" id="nama_ortu" value="{{ old('nama_ortu', $pendaftaranTryout?->nama_ortu) }}" id="nama_ortu" placeholder="Nama Ortu">
        @error('nama_ortu')<small class="invalid-feedback">{{ $message }}</small>@enderror
    </div>    <div class="mb-4">
        <label for="no_wa_ortu" class="form-label">No Wa Ortu</label>
        <input type="text" name="no_wa_ortu" class="form-control @error('no_wa_ortu') is-invalid @enderror" id="no_wa_ortu" value="{{ old('no_wa_ortu', $pendaftaranTryout?->no_wa_ortu) }}" id="no_wa_ortu" placeholder="No Wa Ortu">
        @error('no_wa_ortu')<small class="invalid-feedback">{{ $message }}</small>@enderror
    </div>    <div class="mb-4">
        <label for="no_wa_peserta" class="form-label">No Wa Peserta</label>
        <input type="text" name="no_wa_peserta" class="form-control @error('no_wa_peserta') is-invalid @enderror" id="no_wa_peserta" value="{{ old('no_wa_peserta', $pendaftaranTryout?->no_wa_peserta) }}" id="no_wa_peserta" placeholder="No Wa Peserta">
        @error('no_wa_peserta')<small class="invalid-feedback">{{ $message }}</small>@enderror
    </div>    <div class="mb-4">
        <label for="alamat_domisili" class="form-label">Alamat Domisili</label>
        <input type="text" name="alamat_domisili" class="form-control @error('alamat_domisili') is-invalid @enderror" id="alamat_domisili" value="{{ old('alamat_domisili', $pendaftaranTryout?->alamat_domisili) }}" id="alamat_domisili" placeholder="Alamat Domisili">
        @error('alamat_domisili')<small class="invalid-feedback">{{ $message }}</small>@enderror
    </div>    <div class="mb-4">
        <label for="tanggal_pembayaran" class="form-label">Tanggal Pembayaran</label>
        <input type="text" name="tanggal_pembayaran" class="form-control @error('tanggal_pembayaran') is-invalid @enderror" id="tanggal_pembayaran" value="{{ old('tanggal_pembayaran', $pendaftaranTryout?->tanggal_pembayaran) }}" id="tanggal_pembayaran" placeholder="Tanggal Pembayaran">
        @error('tanggal_pembayaran')<small class="invalid-feedback">{{ $message }}</small>@enderror
    </div>
            </div>
        </div>
    </div>
</div>