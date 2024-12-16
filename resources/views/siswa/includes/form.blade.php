<div class="row">
    <div class="col-md-12">
        
                <div class="mb-4">
                    <label for="no_va" class="form-label">No Va</label>
                    <input 
                        type="text" 
                        name="no_va" 
                        class="form-control {{ $errors->has('no_va') ? 'is-invalid' : '' }}" 
                        id="no_va" 
                        value="{{ old('no_va', $siswa?->no_va) }}" 
                        placeholder="Masukkan No Va" />
                    @error('no_va')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="idasalsekolah" class="form-label">Idasalsekolah</label>
                    <x-input.currency name="idasalsekolah" id="idasalsekolah"
                        value="{{ old('idasalsekolah', $siswa?->idasalsekolah) }}" 
                        placeholder="Masukkan Idasalsekolah"
                        class="form-control text-end {{ $errors->has('idasalsekolah') ? 'is-invalid' : '' }}" />
                    @error('idasalsekolah')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="kodejk" class="form-label">Kodejk</label>
                    <x-input.currency name="kodejk" id="kodejk"
                        value="{{ old('kodejk', $siswa?->kodejk) }}" 
                        placeholder="Masukkan Kodejk"
                        class="form-control text-end {{ $errors->has('kodejk') ? 'is-invalid' : '' }}" />
                    @error('kodejk')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="kodejeniskeringanan" class="form-label">Kodejeniskeringanan</label>
                    <input 
                        type="text" 
                        name="kodejeniskeringanan" 
                        class="form-control {{ $errors->has('kodejeniskeringanan') ? 'is-invalid' : '' }}" 
                        id="kodejeniskeringanan" 
                        value="{{ old('kodejeniskeringanan', $siswa?->kodejeniskeringanan) }}" 
                        placeholder="Masukkan Kodejeniskeringanan" />
                    @error('kodejeniskeringanan')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="nama" class="form-label">Nama</label>
                    <input 
                        type="text" 
                        name="nama" 
                        class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" 
                        id="nama" 
                        value="{{ old('nama', $siswa?->nama) }}" 
                        placeholder="Masukkan Nama" />
                    @error('nama')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="panggilan" class="form-label">Panggilan</label>
                    <input 
                        type="text" 
                        name="panggilan" 
                        class="form-control {{ $errors->has('panggilan') ? 'is-invalid' : '' }}" 
                        id="panggilan" 
                        value="{{ old('panggilan', $siswa?->panggilan) }}" 
                        placeholder="Masukkan Panggilan" />
                    @error('panggilan')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="tempatlahir" class="form-label">Tempatlahir</label>
                    <input 
                        type="text" 
                        name="tempatlahir" 
                        class="form-control {{ $errors->has('tempatlahir') ? 'is-invalid' : '' }}" 
                        id="tempatlahir" 
                        value="{{ old('tempatlahir', $siswa?->tempatlahir) }}" 
                        placeholder="Masukkan Tempatlahir" />
                    @error('tempatlahir')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="tahunmasuk" class="form-label">Tahunmasuk</label>
                    <input 
                        type="text" 
                        name="tahunmasuk" 
                        class="form-control {{ $errors->has('tahunmasuk') ? 'is-invalid' : '' }}" 
                        id="tahunmasuk" 
                        value="{{ old('tahunmasuk', $siswa?->tahunmasuk) }}" 
                        placeholder="Masukkan Tahunmasuk" />
                    @error('tahunmasuk')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="namabapak" class="form-label">Namabapak</label>
                    <input 
                        type="text" 
                        name="namabapak" 
                        class="form-control {{ $errors->has('namabapak') ? 'is-invalid' : '' }}" 
                        id="namabapak" 
                        value="{{ old('namabapak', $siswa?->namabapak) }}" 
                        placeholder="Masukkan Namabapak" />
                    @error('namabapak')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="namaibu" class="form-label">Namaibu</label>
                    <input 
                        type="text" 
                        name="namaibu" 
                        class="form-control {{ $errors->has('namaibu') ? 'is-invalid' : '' }}" 
                        id="namaibu" 
                        value="{{ old('namaibu', $siswa?->namaibu) }}" 
                        placeholder="Masukkan Namaibu" />
                    @error('namaibu')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input 
                        type="text" 
                        name="alamat" 
                        class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" 
                        id="alamat" 
                        value="{{ old('alamat', $siswa?->alamat) }}" 
                        placeholder="Masukkan Alamat" />
                    @error('alamat')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="notelpon" class="form-label">Notelpon</label>
                    <input 
                        type="text" 
                        name="notelpon" 
                        class="form-control {{ $errors->has('notelpon') ? 'is-invalid' : '' }}" 
                        id="notelpon" 
                        value="{{ old('notelpon', $siswa?->notelpon) }}" 
                        placeholder="Masukkan Notelpon" />
                    @error('notelpon')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="namaori" class="form-label">Namaori</label>
                    <input 
                        type="text" 
                        name="namaori" 
                        class="form-control {{ $errors->has('namaori') ? 'is-invalid' : '' }}" 
                        id="namaori" 
                        value="{{ old('namaori', $siswa?->namaori) }}" 
                        placeholder="Masukkan Namaori" />
                    @error('namaori')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="nokartu" class="form-label">Nokartu</label>
                    <input 
                        type="text" 
                        name="nokartu" 
                        class="form-control {{ $errors->has('nokartu') ? 'is-invalid' : '' }}" 
                        id="nokartu" 
                        value="{{ old('nokartu', $siswa?->nokartu) }}" 
                        placeholder="Masukkan Nokartu" />
                    @error('nokartu')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="kelas_id" class="form-label">Kelas Id</label>
                    <input 
                        type="text" 
                        name="kelas_id" 
                        class="form-control {{ $errors->has('kelas_id') ? 'is-invalid' : '' }}" 
                        id="kelas_id" 
                        value="{{ old('kelas_id', $siswa?->kelas_id) }}" 
                        placeholder="Masukkan Kelas Id" />
                    @error('kelas_id')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="pin" class="form-label">Pin</label>
                    <input 
                        type="text" 
                        name="pin" 
                        class="form-control {{ $errors->has('pin') ? 'is-invalid' : '' }}" 
                        id="pin" 
                        value="{{ old('pin', $siswa?->pin) }}" 
                        placeholder="Masukkan Pin" />
                    @error('pin')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="kamar_id" class="form-label">Kamar Id</label>
                    <input 
                        type="text" 
                        name="kamar_id" 
                        class="form-control {{ $errors->has('kamar_id') ? 'is-invalid' : '' }}" 
                        id="kamar_id" 
                        value="{{ old('kamar_id', $siswa?->kamar_id) }}" 
                        placeholder="Masukkan Kamar Id" />
                    @error('kamar_id')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="kamar" class="form-label">Kamar</label>
                    <input 
                        type="text" 
                        name="kamar" 
                        class="form-control {{ $errors->has('kamar') ? 'is-invalid' : '' }}" 
                        id="kamar" 
                        value="{{ old('kamar', $siswa?->kamar) }}" 
                        placeholder="Masukkan Kamar" />
                    @error('kamar')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="asrama" class="form-label">Asrama</label>
                    <input 
                        type="text" 
                        name="asrama" 
                        class="form-control {{ $errors->has('asrama') ? 'is-invalid' : '' }}" 
                        id="asrama" 
                        value="{{ old('asrama', $siswa?->asrama) }}" 
                        placeholder="Masukkan Asrama" />
                    @error('asrama')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="lokasi_asrama" class="form-label">Lokasi Asrama</label>
                    <input 
                        type="text" 
                        name="lokasi_asrama" 
                        class="form-control {{ $errors->has('lokasi_asrama') ? 'is-invalid' : '' }}" 
                        id="lokasi_asrama" 
                        value="{{ old('lokasi_asrama', $siswa?->lokasi_asrama) }}" 
                        placeholder="Masukkan Lokasi Asrama" />
                    @error('lokasi_asrama')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="kodeAsrama" class="form-label">Kodeasrama</label>
                    <input 
                        type="text" 
                        name="kodeAsrama" 
                        class="form-control {{ $errors->has('kodeAsrama') ? 'is-invalid' : '' }}" 
                        id="kodeAsrama" 
                        value="{{ old('kodeAsrama', $siswa?->kodeAsrama) }}" 
                        placeholder="Masukkan Kodeasrama" />
                    @error('kodeAsrama')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="foto" class="form-label">Foto</label>
                    <input 
                        type="text" 
                        name="foto" 
                        class="form-control {{ $errors->has('foto') ? 'is-invalid' : '' }}" 
                        id="foto" 
                        value="{{ old('foto', $siswa?->foto) }}" 
                        placeholder="Masukkan Foto" />
                    @error('foto')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="nisn" class="form-label">Nisn</label>
                    <input 
                        type="text" 
                        name="nisn" 
                        class="form-control {{ $errors->has('nisn') ? 'is-invalid' : '' }}" 
                        id="nisn" 
                        value="{{ old('nisn', $siswa?->nisn) }}" 
                        placeholder="Masukkan Nisn" />
                    @error('nisn')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
    </div>
</div>