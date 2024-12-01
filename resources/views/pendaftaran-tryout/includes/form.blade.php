<div class="row">
    <div class="col-md-12">
        
                <div class="mb-4">
                    <label for="no_peserta" class="form-label">No Peserta</label>
                    <input 
                        type="text" 
                        name="no_peserta" 
                        class="form-control {{ $errors->has('no_peserta') ? 'is-invalid' : '' }}" 
                        id="no_peserta" 
                        value="{{ old('no_peserta', $pendaftaranTryout?->no_peserta) }}" 
                        placeholder="Masukkan No Peserta" />
                    @error('no_peserta')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                    <input 
                        type="text" 
                        name="nama_lengkap" 
                        class="form-control {{ $errors->has('nama_lengkap') ? 'is-invalid' : '' }}" 
                        id="nama_lengkap" 
                        value="{{ old('nama_lengkap', $pendaftaranTryout?->nama_lengkap) }}" 
                        placeholder="Masukkan Nama Lengkap" />
                    @error('nama_lengkap')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <x-input.select2 
                        name="jenis_kelamin" 
                        id="jenis_kelamin"
                        class="form-control {{ $errors->has('jenis_kelamin') ? 'is-invalid' : '' }}" 
                        placeholder="Pilih Jenis Kelamin"
                        :options="array (
  'L' => 'L',
  'P' => 'P',
)" 
                        selected="{{ old('jenis_kelamin', $pendaftaranTryout?->jenis_kelamin) }}" />
                    @error('jenis_kelamin')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="nisn" class="form-label">Nisn</label>
                    <input 
                        type="text" 
                        name="nisn" 
                        class="form-control {{ $errors->has('nisn') ? 'is-invalid' : '' }}" 
                        id="nisn" 
                        value="{{ old('nisn', $pendaftaranTryout?->nisn) }}" 
                        placeholder="Masukkan Nisn" />
                    @error('nisn')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="nama_asal_sekolah" class="form-label">Nama Asal Sekolah</label>
                    <input 
                        type="text" 
                        name="nama_asal_sekolah" 
                        class="form-control {{ $errors->has('nama_asal_sekolah') ? 'is-invalid' : '' }}" 
                        id="nama_asal_sekolah" 
                        value="{{ old('nama_asal_sekolah', $pendaftaranTryout?->nama_asal_sekolah) }}" 
                        placeholder="Masukkan Nama Asal Sekolah" />
                    @error('nama_asal_sekolah')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="nama_ortu" class="form-label">Nama Ortu</label>
                    <input 
                        type="text" 
                        name="nama_ortu" 
                        class="form-control {{ $errors->has('nama_ortu') ? 'is-invalid' : '' }}" 
                        id="nama_ortu" 
                        value="{{ old('nama_ortu', $pendaftaranTryout?->nama_ortu) }}" 
                        placeholder="Masukkan Nama Ortu" />
                    @error('nama_ortu')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="no_wa_ortu" class="form-label">No Wa Ortu</label>
                    <input 
                        type="text" 
                        name="no_wa_ortu" 
                        class="form-control {{ $errors->has('no_wa_ortu') ? 'is-invalid' : '' }}" 
                        id="no_wa_ortu" 
                        value="{{ old('no_wa_ortu', $pendaftaranTryout?->no_wa_ortu) }}" 
                        placeholder="Masukkan No Wa Ortu" />
                    @error('no_wa_ortu')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="no_wa_peserta" class="form-label">No Wa Peserta</label>
                    <input 
                        type="text" 
                        name="no_wa_peserta" 
                        class="form-control {{ $errors->has('no_wa_peserta') ? 'is-invalid' : '' }}" 
                        id="no_wa_peserta" 
                        value="{{ old('no_wa_peserta', $pendaftaranTryout?->no_wa_peserta) }}" 
                        placeholder="Masukkan No Wa Peserta" />
                    @error('no_wa_peserta')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="nominal_tagihan" class="form-label">Nominal Tagihan</label>
                    <x-input.currency name="nominal_tagihan" id="nominal_tagihan"
                        value="{{ old('nominal_tagihan', $pendaftaranTryout?->nominal_tagihan) }}" 
                        placeholder="Masukkan Nominal Tagihan"
                        class="form-control text-end {{ $errors->has('nominal_tagihan') ? 'is-invalid' : '' }}" />
                    @error('nominal_tagihan')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
    </div>
</div>