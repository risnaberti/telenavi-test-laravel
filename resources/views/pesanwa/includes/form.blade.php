<div class="row">
    <div class="col-md-12">
        
                <div class="mb-4">
                    <label for="status_pesan" class="form-label">Status Pesan</label>
                    <input 
                        type="text" 
                        name="status_pesan" 
                        class="form-control {{ $errors->has('status_pesan') ? 'is-invalid' : '' }}" 
                        id="status_pesan" 
                        value="{{ old('status_pesan', $pesanwa?->status_pesan) }}" 
                        placeholder="Masukkan Status Pesan" />
                    @error('status_pesan')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="no_pendaftaran" class="form-label">No Pendaftaran</label>
                    <input 
                        type="text" 
                        name="no_pendaftaran" 
                        class="form-control {{ $errors->has('no_pendaftaran') ? 'is-invalid' : '' }}" 
                        id="no_pendaftaran" 
                        value="{{ old('no_pendaftaran', $pesanwa?->no_pendaftaran) }}" 
                        placeholder="Masukkan No Pendaftaran" />
                    @error('no_pendaftaran')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="jenis_pesan" class="form-label">Jenis Pesan</label>
                    <input 
                        type="text" 
                        name="jenis_pesan" 
                        class="form-control {{ $errors->has('jenis_pesan') ? 'is-invalid' : '' }}" 
                        id="jenis_pesan" 
                        value="{{ old('jenis_pesan', $pesanwa?->jenis_pesan) }}" 
                        placeholder="Masukkan Jenis Pesan" />
                    @error('jenis_pesan')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
                <div class="mb-4">
                    <label for="no_hp" class="form-label">No Hp</label>
                    <input 
                        type="text" 
                        name="no_hp" 
                        class="form-control {{ $errors->has('no_hp') ? 'is-invalid' : '' }}" 
                        id="no_hp" 
                        value="{{ old('no_hp', $pesanwa?->no_hp) }}" 
                        placeholder="Masukkan No Hp" />
                    @error('no_hp')<small class="invalid-feedback">{{ $message }}</small>@enderror
                </div>
    </div>
</div>