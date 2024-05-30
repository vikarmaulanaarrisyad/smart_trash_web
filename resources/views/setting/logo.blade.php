<form action="{{ route('setting.update', $setting->id) }}?pills=logo" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')

    <x-card>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <strong class="d-block text-center">Favicon</strong>
                <div class="text-center">
                    <img src="{{ Storage::url($setting->favicon_aplikasi ?? '') }}" alt=""
                        class="img-thumbnail preview-favicon_aplikasi" width="200">
                </div>
                <div class="form-group mt-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="favicon_aplikasi" name="favicon_aplikasi"
                            onchange="preview('.preview-favicon_aplikasi', this.files[0])">
                        <label class="custom-file-label" for="favicon_aplikasi">Choose file</label>
                    </div>
                </div>
            </div>
            <div class="col-lg-2"></div>
            <div class="col-lg-4">
                <strong class="d-block text-center">Logo Login</strong>
                <div class="text-center">
                    <img src="{{ Storage::url($setting->logo_login ?? '') }}" alt=""
                        class="img-thumbnail preview-logo_login" width="200">
                </div>
                <div class="form-group mt-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="logo_login" name="logo_login"
                            onchange="preview('.preview-logo_login', this.files[0])">
                        <label class="custom-file-label" for="logo_login">Choose file</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <strong class="d-block text-center">Logo Aplikasi</strong>
                <div class="text-center">
                    <img src="{{ Storage::url($setting->logo_aplikasi ?? '') }}" alt=""
                        class="img-thumbnail preview-logo_aplikasi" width="200">
                </div>
                <div class="form-group mt-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="logo_aplikasi" name="logo_aplikasi"
                            onchange="preview('.preview-logo_aplikasi', this.files[0])">
                        <label class="custom-file-label" for="logo_aplikasi">Choose file</label>
                    </div>
                </div>
            </div>
        </div>
        <x-slot name="footer">
            <button type="reset" class="btn btn-dark">Reset</button>
            <button class="btn btn-primary">Simpan</button>
        </x-slot>
    </x-card>
</form>
