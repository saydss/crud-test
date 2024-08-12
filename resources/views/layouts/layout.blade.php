<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css"
        rel="stylesheet">



    <!-- Customized Bootstrap Stylesheet -->

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Template Stylesheet -->

    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
</head>

<body style="background-color: #FFF8F0">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #81c408 ;">
        <div class="container container-fluid" style="padding-left: 4.5rem">
            <a class="navbar-brand fs-3 fw-bold" href="#">CRUD Test E-Commerce</a>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #EEDAC1;">
        <div class="container">
            <div class="collapse navbar-collapse justify-content-center align-items-center" id="navbarNav">
                <ul class="navbar-nav fw-bold">
                    <li class="nav-item">
                        <a class="nav-link active text-dark px-5" aria-current="page"
                            href="{{ route('barangs.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-dark px-5" aria-current="page"
                            href="{{ route('barangs.tambah') }}">Tambah Barang</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    @yield('content')

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
