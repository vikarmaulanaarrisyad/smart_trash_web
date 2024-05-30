<form action="{{ route('setting.update', $setting->id) }}" method="post">
    @csrf
    @method('put')

    <x-card>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="footer_aplikasi">Nama Aplikasi</label>
                    <input type="nama_aplikasi" class="form-control @error('nama_aplikasi') is-invalid @enderror"
                        name="text" id="nama_aplikasi" value="{{ old('nama_aplikasi') ?? $setting->nama_aplikasi }}">
                    @error('nama_aplikasi')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="url_aplikasi">Url Aplikasi</label>
                    <input type="url_aplikasi" class="form-control @error('url_aplikasi') is-invalid @enderror"
                        name="text" id="url_aplikasi" value="{{ old('url_aplikasi') ?? $setting->url_aplikasi }}">
                    @error('url_aplikasi')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="footer_aplikasi">Footer Aplikasi</label>
                    <input type="footer_aplikasi" class="form-control @error('footer_aplikasi') is-invalid @enderror"
                        name="text" id="text" value="{{ old('footer_aplikasi') ?? $setting->footer_aplikasi }}">
                    @error('footer_aplikasi')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="deskripsi_aplikasi">Deskripsi Aplikasi</label>
                    <textarea class="form-control" name="deskripsi_aplikasi" id="deskripsi_aplikasi" cols="30" rows="10">{{ $setting->deskripsi_aplikasi }}</textarea>
                </div>
            </div>
        </div>
        <x-slot name="footer">
            <button type="reset" class="btn btn-dark">Reset</button>
            <button class="btn btn-primary">Simpan</button>
        </x-slot>
    </x-card>
</form>
