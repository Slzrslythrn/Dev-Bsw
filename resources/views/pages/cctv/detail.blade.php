<x-admin-layout>
    @push('after-styles')
        <link href="{{ asset('admin/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
        <!-- CSS  -->
        <link href="https://vjs.zencdn.net/7.2.3/video-js.css" rel="stylesheet">
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
                <li class="breadcrumb-item"><a href="{{ route('cctv') }}">CCTV</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Menu CCTV</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{ $cctv->nama_cctv }}
                </div>
                <div class="card-body">
                    <div class="row">
                        <video id='hls-example' class="video-js vjs-default-skin" width="900" height="600"
                            controls>
                            <source type="application/x-mpegURL" src="{{ $cctv->embed }}">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('after-scripts')
        <script src="https://vjs.zencdn.net/ie8/ie8-version/videojs-ie8.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-hls/5.14.1/videojs-contrib-hls.js"></script>
        <script src="https://vjs.zencdn.net/7.2.3/video.js"></script>
        <script>
            var player = videojs('hls-example');
            player.play();
        </script>
    @endpush
</x-admin-layout>
