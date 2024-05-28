<!DOCTYPE html>
<html> <!-- setcookie("title",$title); -->

<head>
    <!-- ==== Favicons ==== -->
    <link rel="shortcut icon" href="{{ asset('assets-view/LogoBsw2.PNG') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets-view/LogoBsw2.PNG') }}" type="image/x-icon">


    

    <div id="preloader">
        <div class="loading">
            <br><br><br> <br><br><br><object type="image/gif" data="assets-view/img/preloader/bsw4.gif"
                style="width: 100%;
            margin-right: auto;
            margin-left: -20%;
            margin-top: -40%;
        } "></object>
            </svg>
        </div>
    </div>

    <style type="text/css">
        #preloader {
            background-color: #fcfcf5;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            position: fixed;
            z-index: 999999999;
        }

        .loading svg {
            width: 100%;
            height: 100%;
        }

        .loading #pulsar {
            stroke-dasharray: 281;
            -webkit-animation: dash 2.5s infinite linear forwards;
        }

        @-webkit-keyframes dash {
            from {
                stroke-dashoffset: 814;
            }

            to {
                stroke-dashoffset: -814;
            }
        }

        @media (min-width: 768px) {
            .loading {
                width: 100%;
                max-width: 550px;
                position: absolute;
                left: 20%;
                top: 20%;
                right: 0;
                margin: 0px auto;
            }
        }

        @media (max-width: 767px) {
            .loading {
                width: 80%;
                max-width: 550px;
                position: absolute;
                top: 30%;
                left: 25%;
                right: 10%;
                margin: 0px auto;
            }
        }
    </style>

    <title>Bogor Single Window | Dashboar</title>
    @include('layouts.includes.style')
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="90">

    @include('layouts.includes.sidenav')

    @include('layouts.includes.menu')

    content

    @include('layouts.includes.footer')

    @include('layouts.includes.main')

</body>

</html>
