<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aduin | <?= $judul; ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">


    <style>
        #body {
            background-color: #f3f3f3;
        }

        #wrapper {
            margin-bottom: em;
        }

        #home {
            background-color: rgb(243, 247, 247);

        }

        #home-content {
            position: relative;
            z-index: 2;
        }

        #wave {
            margin-top: -350px;

        }

        @media screen and (max-width: 1440px) {
            #wave {
                /* display: none; */
                margin-top: -120px;
            }



        }

        @media screen and (min-width: 1440px) {}
    </style>
</head>

<body id="page-top" style="background-color: BDC3C7;">
    <!--navbar  -->
    <div id="wrapper" class="sticky-top">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg border-bottom" style="background-color: rgb(243, 247, 247);">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="<?= base_url('assets/img/dashbroad/LOGO.png') ?>" alt="Logo" width="80">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                    aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-primary" href="#">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-primary" href="#">Tentang Kami</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-primary" href="#">Langkah-Langkah</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Auth') ?>" class="btn btn-outline-primary rounded-5 ms-2">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- Home -->
    <section id="home" class="py-5">
        <div class="container">
            <div id="home-content" class="row align-items-center">

                <!-- Kolom Kiri -->
                <div id="home-left" class="col-lg-7 mb-4 mb-lg-0">
                    <img src="<?= base_url('assets/img/undraw_posting_photo.svg') ?>" alt="IMG" class="img-fluid">
                </div>

                <!-- Kolom Kanan -->
                <div id="home-right" class="col-lg-5">
                    <h3 class="fw-bold mb-3">Sistem Pengaduan Karyawan</h3>

                    <div class="mb-3">
                        <p class="fs-5"><i class="bi bi-check-lg text-primary"></i> Ceklis</p>
                        <p class="fs-5"><i class="bi bi-check-lg text-primary"></i> Ceklis</p>
                        <p class="fs-5"><i class="bi bi-check-lg text-primary"></i> Ceklis</p>
                    </div>

                    <div>
                        <a href="#" class="btn btn-primary me-2">Login</a>
                        <a href="#" class="btn btn-outline-primary">Daftar</a>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <svg id="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#fff" fill-opacity="1" d="M0,160L60,176C120,192,240,224,360,213.3C480,203,600,149,720,149.3C840,149,960,203,1080,213.3C1200,224,1320,192,1380,176L1440,160L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
    </svg>

    <!-- <section id="about">
        <div class="container">
            <div class="row">

            </div>
        </div>
    </section> -->
    <section id="steps" class="py-5">
        <div class="container text-center">
            <h3 class="fw-bold mb-5">Langkah-Langkah Pengaduan</h3>
            <div class="row d-flex justify-content-center">
                <div class="col-md-3 p-4 p-lg-0">
                    <i class="bi bi-pencil-square display-4 text-primary"></i>
                    <h5 class="mt-3">Buat Pengaduan</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem temporibus pariatur totam labore dignissimos, ipsam eos,</p>
                </div>
                <div class="col-md-3 p-4 p-lg-0">
                    <i class="bi bi-headset display-4 text-primary"></i>
                    <h5 class="mt-3">Verifikasi</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem temporibus pariatur totam labore dignissimos, ipsam eos,</p>

                </div>
                <div class="col-md-3 p-4 p-lg-0">
                    <i class="bi bi-gear display-4 text-primary"></i>
                    <h5 class="mt-3">Diproses</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem temporibus pariatur totam labore dignissimos, ipsam eos,</p>

                </div>
                <div class="col-md-3 p-4 p-lg-0">
                    <i class="bi bi-check-circle display-4 text-primary"></i>
                    <h5 class="mt-3">Selesai</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem temporibus pariatur totam labore dignissimos, ipsam eos,</p>

                </div>
            </div>
        </div>
    </section>
    <!-- footer -->
    <!-- Footer -->
    <footer class="text-center text-lg-start bg-body-tertiary text-muted">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
                <span>Get connected with us on social networks:</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
                <a href="" class="me-4 text-reset">
                    <i class="bi bi-facebook"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="bi bi-twitter"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="bi bi-google"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="bi bi-instagram"></i>
                </a>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>Company name
                        </h6>
                        <p>
                            Here you can use rows and columns to organize your footer content. Lorem ipsum
                            dolor sit amet, consectetur adipisicing elit.
                        </p>
                    </div>
                    <!-- Grid column -->



                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Useful links
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Pricing</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Settings</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Orders</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Help</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                        <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            info@example.com
                        </p>
                        <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                        <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2021 Copyright:
            <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK" crossorigin="anonymous"></script>
</body>

</html>