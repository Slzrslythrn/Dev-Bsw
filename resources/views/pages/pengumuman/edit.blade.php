<x-admin-layout>
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Edit Pengumuman !</h4>
                <span>Form</span>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('pengumuman') }}">Menu Pengumuman</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Form</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Pengumuman</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('pengumuman.update', ['id' => $pengumuman->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <img src="{{ asset('uploads/banner/' . $pengumuman->banner) }}" alt=""
                                class="img-thumbnail my-3" width="50%"> <br>
                            <label for="banner">Pilih Banner <span class="text-danger">* Jika tidak ada gambar yang
                                    dirubah harap dikosongkan</span></label>
                            <input type="file" name="banner" id="banner"
                                class="form-control @error('banner') is-invalid @enderror">
                            @error('banner')
                                <div class="invalid-feedback animated fadeInUp">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="judul">Judul <span class="text-danger">*</span></label>
                            <input type="text" name="judul" id="judul"
                                class="form-control @error('judul') is-invalid @enderror"
                                value="{{ old('judul') ?? $pengumuman->judul }}">
                            @error('judul')
                                <div class="invalid-feedback animated fadeInUp">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="link">Link Banner <span class="text-danger">*</span></label>
                            <input type="url" name="link" id="link"
                                class="form-control @error('link') is-invalid @enderror"
                                value="{{ old('link') ?? $pengumuman->link }}">
                            @error('link')
                                <div class="invalid-feedback animated fadeInUp">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="isactive">Apakah Aktif ?</label>
                            <select name="isactive" id="isactive"
                                class="form-control @error('isactive') is-invalid @enderror">
                                <option value="0"
                                    {{ old('isactive') == 0 || $pengumuman->isactive == 0 ? 'selected' : '' }}>Tidak
                                </option>
                                <option value="1"
                                    {{ old('isactive') == 1 || $pengumuman->isactive == 1 ? 'selected' : '' }}>Aktif
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
