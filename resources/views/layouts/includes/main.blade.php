<!-- ==== jQuery UI ==== -->
<script src="{{ asset('assets-view/js/jquery-ui.min.js') }}"></script>


<!-- ==== jQuery UI Touch Punch Plugin ==== -->
<script src="{{ asset('assets-view/js/jquery.ui.touch-punch.min.js') }}"></script>

<!-- ==== Bootstrap ==== -->
<script src="{{ asset('assets-view/js/bootstrap.min.js') }}"></script>

<!-- ==== FakeLoader Plugin ==== -->
<script src="{{ asset('assets-view/js/fakeLoader.min.js') }}"></script>

<!-- ==== StickyJS Plugin ==== -->
<script src="{{ asset('assets-view/js/jquery.sticky.js') }}"></script>

<!-- ==== Owl Carousel Plugin ==== -->
<script src="{{ asset('assets-view/js/owl.carousel.min.js') }}"></script>

<!-- ==== jQuery Tubuler Plugin ==== -->
<script src="{{ asset('assets-view/js/jquery.tubular.1.0.js') }}"></script>

<!-- ==== Magnific Popup Plugin ==== -->
<script src="{{ asset('assets-view/js/jquery.magnific-popup.min.js') }}"></script>

<!-- ==== jQuery Validation Plugin ==== -->
<script src="{{ asset('assets-view/js/jquery.validate.min.js') }}"></script>

<!-- ==== Animate Scroll Plugin ==== -->
<script src="{{ asset('assets-view/js/animatescroll.min.js') }}"></script>

<!-- ==== jQuery Waypoints Plugin ==== -->
<script src="{{ asset('assets-view/js/jquery.waypoints.min.js') }}"></script>

<!-- ==== jQuery CounterUp Plugin ==== -->
<script src="{{ asset('assets-view/js/jquery.counterup.min.js') }}"></script>

<!-- ==== jQuery CountDown Plugin ==== -->
<script src="{{ asset('assets-view/js/jquery.countdown.min.js') }}"></script>

<!-- ==== RetinaJS ==== -->
<script src="{{ asset('assets-view/js/retina.min.js') }}"></script>

<!-- ==== Main JavaScript ==== -->
<script src="{{ asset('assets-view/js/main.js') }}"></script>

<!-- ==== Data Tables ==== -->
<script src="{{ asset('assets/datatable/jquery.dataTables.min.js') }}"></script>

<script src="{{ asset('assets/datatable/dataTables.bootstrap4.min.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/datatable/dataTables.bootstrap4.min.css') }}">

<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/fixedheader/3.1.5/css/fixedHeader.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">

<script>
    $(document).ready(function() {
        $("#preloader").delay(1000).fadeOut();
    })
</script>

<!-- Global site tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-N8MTPK80KX"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-N8MTPK80KX');
</script>


<script type="text/javascript">
    $(document).ready(function() {
        //pbb
        $('#btnowlpbb').click(function() {
            $('#framepbb1').attr('src', 'http://disdukcapil.kotabogor.go.id/e-menanduk/');
        });
        //bphtb
        $('#btnowlbphtb').click(function() {

            $('#framebphtb1').attr('src', 'http://layanan-bapenda.kotabogor.go.id/arcloc/tracking.php');

        });
        //perizinan
        $('#btnolwperizinan').click(function() {
            $('#frameperizinan1').attr('src',
                'https://perizinan.kotabogor.go.id/izin2/index.php/account/login');
        });

    });
</script>
