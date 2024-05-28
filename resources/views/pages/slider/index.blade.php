<x-admin-layout>
    @push('after-styles')
        <link href="{{ asset('admin/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">

        <link href="{{ asset('admin/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    @endpush
    @push('after-scripts')
        <script src="{{ asset('admin/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
        <script>
            var table = $('#tabel-slider').DataTable();
        </script>
    @endpush

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Menu Slider !</h4>
                <span>Tabel</span>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Menu Slider</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('slider.add') }}" class="btn btn-primary">Tambah Slider</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tabel-slider" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto Slider</th>
                                    <th>Deskripsi</th>
                                    <th>Link</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($slider as $row)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>
                                            <img src="{{ asset('uploads/slider/' . $row->slider) }}" alt=""
                                                class="img-thumbnail" width="50%" height="50%">
                                        </td>
                                        <td>
                                            {!! $row->deskripsi !!}
                                        </td>
                                        <td>
                                            <a target="_blank" href="{{ $row->link }}" class="btn btn-primary">Link
                                                Banner</a>
                                        </td>
                                        <td>
                                            @if ($row->isactive == 0)
                                                <span class="badge bg-danger text-white">Tidak Aktif</span>
                                            @else
                                                <span class="badge bg-success text-white"> Aktif Menu </span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('slider.edit', ['id' => $row->id]) }}"
                                                    class="btn btn-primary mx-2">Edit</a>
                                                {{-- hapus --}}
                                                <form id="hapus-form{{ $row->id }}"
                                                    action="{{ route('slider.destroy', ['id' => $row->id]) }}"
                                                    id="hapus-layanan" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                <a href="#" onclick="confirmDelete(event, {{ $row->id }})"
                                                    class="btn btn-danger">Hapus</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Foto Slider</th>
                                    <th>Deskripsi</th>
                                    <th>Link</th>
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
