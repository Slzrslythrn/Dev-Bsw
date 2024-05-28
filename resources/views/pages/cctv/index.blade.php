<x-admin-layout>
    @push('after-styles')
        <link href="{{ asset('admin/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    @endpush
    @push('after-scripts')
        <script src="{{ asset('admin/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
        <script>
            var table = $('#tabel-cctv').DataTable();
        </script>
    @endpush

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Menu CCTV !</h4>
                <span>Tabel</span>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Menu CCTV</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('cctv.add') }}" class="btn btn-primary">Tambah data CCTV</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tabel-cctv" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama CCTV</th>
                                    <th>Lokasi</th>
                                    <th>Embed</th>
                                    <th>Gambar</th>
                                    <th>PemiliK CCTV</th>
                                    <th>Tahun</th>
                                    <th>Kategori</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($cctv as $row)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $row->nama_cctv }}</td>
                                        <td>
                                            {{ $row->lokasi }}
                                            <div>
                                                <ul>
                                                    <li>Lat : {{ $row->lat }}</li>
                                                    <li>Lat : {{ $row->lng }}</li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('cctv.detail', ['id' => $row->id]) }}"
                                                class="btn btn-primary">Lihat CCTV</a>
                                        </td>
                                        <td>
                                            <img src="{{ $row->url_gambar }}" alt="" class="img-fluid">
                                        </td>
                                        <td>
                                            {{ $row->pemilik_cctv }}
                                        </td>
                                        <td>
                                            {{ $row->tahun }}
                                        </td>
                                        <td>
                                            {{ $row->kategori }}
                                        </td>
                                        <td>
                                            {{ $row->status }}
                                        </td>
                                        <td>
                                            {{-- hapus --}}
                                            <form id="hapus-form{{ $row->id }}"
                                                action="{{ route('cctv.destroy', ['id' => $row->id]) }}"
                                                id="hapus-layanan" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <a href="#" onclick="confirmDelete(event, {{ $row->id }})"
                                                class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama CCTV</th>
                                    <th>Lokasi</th>
                                    <th>Embed</th>
                                    <th>Gambar</th>
                                    <th>PemiliK CCTV</th>
                                    <th>Tahun</th>
                                    <th>Kategori</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('after-scripts')
        <!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->

        <script>
            function confirmDelete(event, id) {
                event.preventDefault(); // Prevent the default behavior of the link
                if (confirm('Ingin menghapus data layanan ?')) {
                    $('#hapus-form' + id).submit(); // Submit the form
                }
            }
        </script>
    @endpush
</x-admin-layout>
