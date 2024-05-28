<div id="mySidenav" class="sidenav">
    <a href="http://simtaru.kotabogor.go.id/peta" id="peta">
        <span><i class="fa fa-map-o" aria-hidden="true"></i></span>
        <span class="text-side-nav hidden-xs" style="font-size: 15px !important;">Satu Peta Kota Bogor</span>
    </a>
    <a href="https://s.id/pemkotbogor" id="profil">
        <span><i class="fa fa-list" aria-hidden="true"></i></span>
        <span class="text-side-nav hidden-xs" style="font-size: 15px !important;">Profil Kota Bogor</span>
    </a>
    <a href="https://wa.me/6281122882233" id="wa">
        <span><i class="fa fa-whatsapp" aria-hidden="true"></i></span>
        <span class="text-side-nav hidden-xs" style="font-size: 15px !important;">WA BSW</span>
    </a>
</div>
<style>
    .text-side-nav {
        display: none;
        transition: 0.3s;
    }

    #mySidenav a {
        position: fixed;
        z-index: 9999999;
        left: 0;
        transition: 0.3s;
        padding: 8px 8px 8px 10px;
        width: 50px;
        text-decoration: none;
        font-size: 18px;
        color: white;
        border-radius: 0 5px 5px 0;
        overflow: hidden;
        background-color: #ff9769 !important;
    }

    #mySidenav a:hover {
        width: auto;
    }

    #mySidenav a:hover .text-side-nav {
        display: inline-block;
        margin-left: 8px;
        margin-right: 8px;
    }

    #peta {
        top: 188px;
    }

    #profil {
        top: 235px;
    }

    #wa {
        top: 282px;
    }

    #investasi {
        top: 329px;
    }

    #lowongan {
        top: 377px;
    }

    #telpon {
        top: 465px;
    }

    a#pencarianGlobal:hover #formPencarian {
        display: block;
    }

    #formPencarian {
        position: absolute;
        display: none;
        z-index: 10;
        max-width: 500px;
        border-radius: 0;
        border: 1px solid #555;
        transition: .3s;
        /* right: 10px; */
    }

    #keyPencarian {
        border-radius: 0;
        border: none;
    }

    .button-addon {
        border-radius: 0;
        border: none;
        background-color: #333;
        color: white;
        /* width: 100%; */
        height: 100%;
    }

    .button-addon button {
        border-radius: 0;
        border: none;
        background-color: #333;
        color: white;
    }

    @media (max-width: 425px) {
        #mySidenav a {
            position: fixed;
            z-index: 999999;
            transition: 0.3s;
            width: 50px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            border-radius: 5px 5px 5px 5px;
            overflow: hidden;
            background-color: #ff9769 !important;
        }

        #mySidenav a:hover {
            width: auto;
        }

        #mySidenav a:hover .text-side-nav {
            display: inline-block;
            margin-left: 8px;
            margin-right: 8px;
        }

        #peta {
            bottom: 10px !important;
            left: 15px !important;
            top: auto;
        }

        #profil {
            bottom: 10px !important;
            left: 75px !important;
            top: auto;
        }

        #wa {
            bottom: 10px !important;
            left: 135px !important;
            top: auto;
        }

        #investasi {
            bottom: 10px !important;
            left: 255px !important;
            top: auto;
        }

        #feedback {
            bottom: 10px !important;
            left: 195px !important;
            top: auto;
        }

        #lowongan {
            bottom: 10px !important;
            left: 195px !important;
            top: auto;
        }
    }
</style>
