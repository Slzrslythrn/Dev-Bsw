<x-admin-layout>
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Edit Menu !</h4>
                <span>Form</span>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('menu') }}">Menu Layanan</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Form</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Menu</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('menu.update', ['id' => $menu->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="layanan">Pilih Layanan</label>
                            <select name="layanan_id" id="layanan_id"
                                class="form-control @error('layanan_id') is-invalid @enderror">
                                @foreach ($layanan as $row)
                                    <option value="{{ $row->id }}"
                                        {{ old('layanan_id') == $row->id || $row->id == $menu->layanan_id ? 'selected' : '' }}>
                                        {{ $row->nama_layanan }}</option>
                                @endforeach
                            </select>
                            @error('layanan_id')
                                <div class="invalid-feedback animated fadeInUp">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Keterangan Menu</label>
                            <input type="text" name="nama" id="nama"
                                class="form-control @error('nama') is-invalid @enderror"
                                value="{{ old('nama') ?? $menu->nama }}">
                            @error('nama')
                                <div class="invalid-feedback animated fadeInUp">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="link_sso">Link SSO</label>
                            <input type="url" name="link_sso" id="link_sso"
                                class="form-control @error('link_sso') is-invalid @enderror"
                                value="{{ old('link_sso') ?? $menu->link_sso }}">
                            @error('link_sso')
                                <div class="invalid-feedback animated fadeInUp">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="link_website">Link Website
                                <span class="badge badge-warning">{{ $menu->link_website }}</span>
                            </label>
                            <input type="url" name="link_website" id="link_website"
                                class="form-control @error('link_website') is-invalid @enderror"
                                value="{{ old('link_website') ?? $menu->link_website }}">
                            @error('link_website')
                                <div class="invalid-feedback animated fadeInUp">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="icon">Icon Menu</label>
                            <br>
                            @if ($menu->icon)
                                <a href="{{ asset('uploads/icons' . $menu->icon) }}" target="_blank"
                                    class="btn btn-warning">Download Icon</a>
                            @else
                                <span class="text-danger">Data Icon Tidak Ada</span>
                            @endif

                            <div class="input-group">
                                <input type="file" name="icon" id="icon"
                                    class="form-control btn-file @error('icon') is-invalid @enderror"
                                    accept="image/png, image/jpeg" value="{{ old('icon') }}">
                            </div>
                            @error('icon')
                                <div class="invalid-feedback animated fadeInUp">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="status">Status Menu </label>
                            <select name="status" id="status"
                                class="form-control @error('status') is-invalid @enderror">
                                <option value="">- Pilih -</option>
                                <option value="aktif"
                                    {{ old('status') == 'aktif' || $menu->status == 'aktif' ? 'selected' : '' }}>Aktif
                                </option>
                                <option value="tidak-aktif"
                                    {{ old('status') == 'tidak-aktif' || $menu->status == 'tidak-aktif' ? 'selected' : '' }}>
                                    Tidak Aktif</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback animated fadeInUp">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="visit">Jumlah Visit</label>
                            <input type="number" name="visit" id="visit"
                                class="form-control @error('visit') is-invalid @enderror"
                                value="{{ old('visit') ?? $menu->visit }}">
                            @error('visit')
                                <div class="invalid-feedback animated fadeInUp">
                                    {{ $message }}
                                </div>
                            @enderror
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
