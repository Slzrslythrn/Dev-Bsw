<x-admin-layout>
    @push('after-styles')
        <link href="{{ asset('admin/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">

        <link href="{{ asset('admin/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    @endpush
    @push('after-scripts')
        <script src="{{ asset('admin/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
        <script>
            var table = $('#tabel-layanan').DataTable();
        </script>
    @endpush

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Menu Layanan !</h4>
                <span>Tabel</span>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Menu Layanan</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('layanan.add') }}" class="btn btn-primary">Tambah Layanan</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tabel-layanan" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Layanan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($layanan as $row)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $row->nama_layanan }}</td>
                                        <td>
                                            <div class="d-flex">

                                                <a href="{{ route('layanan.edit', ['id' => $row->id]) }}"
                                                    class="btn btn-primary mx-2">Edit</a>
                                                {{-- hapus --}}
                                                <form id="hapus-form"
                                                    action="{{ route('layanan.destroy', ['id' => $row->id]) }}"
                                                    id="hapus-layanan" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <a href="#" onclick="confirmDelete(event)"
                                                    class="btn btn-danger">Hapus</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Layanan</th>
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
        <script>
            function confirmDelete(event) {
                event.preventDefault(); // Prevent the default behavior of the link
                if (confirm('Ingin menghapus data layanan ?')) {
                    $('#hapus-form').submit(); // Submit the form
                }
            }
        </script>
    @endpush
</x-admin-layout>
