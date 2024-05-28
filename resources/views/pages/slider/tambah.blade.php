<x-admin-layout>
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Tambah Slider !</h4>
                <span>Form</span>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('slider') }}">Menu Slider</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Form</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Tambah Slider</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="slider">Pilih Slider <span class="text-danger">*</span></label>
                            <input type="file" name="slider" id="slider"
                                class="form-control @error('slider') is-invalid @enderror">
                            @error('slider')
                                <div class="invalid-feedback animated fadeInUp">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="judul">Judul <span class="text-danger">*</span></label>
                            <input type="text" name="judul" id="judul"
                                class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}">
                            @error('judul')
                                <div class="invalid-feedback animated fadeInUp">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="summernote @error('deskripsi') is-invalid @enderror">
                                {{ old('deskripsi') }}
                            </textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback animated fadeInUp">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="link">Link Banner <span class="text-danger">*</span></label>
                            <input type="url" name="link" id="link"
                                class="form-control @error('link') is-invalid @enderror" value="{{ old('link') }}">
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
                                <option value="0" {{ old('isactive') == 0 ? 'selected' : '' }}>Tidak</option>
                                <option value="1" {{ old('isactive') == 1 ? 'selected' : '' }}>Aktif</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('after-styles')
        <link href="{{ asset('admin/vendor/summernote/summernote.css') }}" rel="stylesheet">
    @endpush

    @push('after-scripts')
        <!-- Summernote -->
        <script src="{{ asset('admin/vendor/summernote/js/summernote.min.js') }}"></script>
        <!-- Summernote init -->
        <script>
            jQuery(document).ready(function() {
                $(".summernote").summernote({
                    height: 190,
                    minHeight: null,
                    maxHeight: null,
                    focus: !1
                }), $(".inline-editor").summernote({
                    airMode: !0
                })
            }), window.edit = function() {
                $(".click2edit").summernote()
            }, window.save = function() {
                $(".click2edit").summernote("destroy")
            };
        </script>
    @endpush
</x-admin-layout>
