<x-admin-layout>
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Tambah Layanan !</h4>
                <span>Form</span>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('cctv') }}">CCTV</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Form</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Tambah CCTV</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('cctv.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama_cctv">Nama CCTV <span class="text-danger">*</span></label>
                            <input type="text" name="nama_cctv" id="nama_cctv"
                                class="form-control @error('nama_cctv') is-invalid @enderror"
                                value="{{ old('nama_cctv') }}">
                            @error('nama_cctv')
                                <div class="invalid-feedback animated fadeInUp">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="lokasi">Lokasi CCTV <span class="text-danger">*</span></label>
                            <input type="text" name="lokasi" id="lokasi"
                                class="form-control @error('lokasi') is-invalid @enderror" value="{{ old('lokasi') }}">
                            @error('lokasi')
                                <div class="invalid-feedback animated fadeInUp">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="embed">Embed LINK CCTV <span class="text-danger">*</span></label>
                            <input type="url" name="embed" id="embed"
                                class="form-control @error('embed') is-invalid @enderror" value="{{ old('embed') }}">
                            @error('embed')
                                <div class="invalid-feedback animated fadeInUp">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="url_gambar">URL Gambar CCTV </label>
                            <input type="url" name="url_gambar" id="url_gambar"
                                class="form-control @error('url_gambar') is-invalid @enderror"
                                value="{{ old('url_gambar') }}">
                            @error('url_gambar')
                                <div class="invalid-feedback animated fadeInUp">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lat">Latitude </label>
                                    <input type="text" name="lat" id="lat"
                                        class="form-control @error('lat') is-invalid @enderror"
                                        value="{{ old('lat') }}">
                                    @error('lat')
                                        <div class="invalid-feedback animated fadeInUp">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lng">Longtitude </label>
                                    <input type="text" name="lng" id="lng"
                                        class="form-control @error('lng') is-invalid @enderror"
                                        value="{{ old('lng') }}">
                                    @error('lng')
                                        <div class="invalid-feedback animated fadeInUp">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="pemilik_cctv">Pemilik CCTV </label>
                            <input type="text" name="pemilik_cctv" id="pemilik_cctv"
                                class="form-control @error('pemilik_cctv') is-invalid @enderror"
                                value="{{ old('pemilik_cctv') }}">
                            @error('pemilik_cctv')
                                <div class="invalid-feedback animated fadeInUp">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="pemilik_cctv">Pemilik CCTV </label>
                            <input type="text" name="pemilik_cctv" id="pemilik_cctv"
                                class="form-control @error('pemilik_cctv') is-invalid @enderror"
                                value="{{ old('pemilik_cctv') }}">
                            @error('pemilik_cctv')
                                <div class="invalid-feedback animated fadeInUp">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tahun_cctv">Tahun CCTV </label>
                            <input type="text" name="tahun_cctv" id="tahun_cctv"
                                class="form-control @error('tahun_cctv') is-invalid @enderror"
                                value="{{ old('tahun_cctv') }}">
                            @error('tahun_cctv')
                                <div class="invalid-feedback animated fadeInUp">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kategori">Kategori CCTV</label>
                            <select name="kategori" id="kategori"
                                class="form-control @error('kategori') is-invalid @enderror">
                                <option value="">- Pilih -</option>
                                <option value="Publik" {{ old('kategori') == 'Publik' ? 'selected' : '' }}>Publik
                                </option>
                                <option value="Privat" {{ old('kategori') == 'Privat' ? 'selected' : '' }}>Privasi /
                                    Tidak Untuk Umum</option>
                            </select>
                            @error('kategori')
                                <div class="invalid-feedback animated fadeInUp">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="status">Status Publish</label>
                            <select name="status" id="status"
                                class="form-control @error('status') is-invalid @enderror">
                                <option value="">- Pilih -</option>
                                <option value="Publish" {{ old('status') == 'Publish' ? 'selected' : '' }}>Publish
                                </option>
                                <option value="Nonpublish" {{ old('status') == 'Nonpublish' ? 'selected' : '' }}>Tidak
                                    Dipublish</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback animated fadeInUp">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
