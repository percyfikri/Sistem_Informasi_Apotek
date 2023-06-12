<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Apotek Arema - Website Apotek</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('style/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('style/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('style/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('style/lib/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('style/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('style/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-light p-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-map-marker-alt text-primary me-2"></small>
                    <small>Kepanjen, Malang</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center py-3">
                    <small class="far fa-clock text-primary me-2"></small>
                    <small>Senin - Jumat : 10.00 AM - 08.00 PM</small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center py-3 me-4">
                    <small class="fa fa-phone-alt text-primary me-2"></small>
                    <small>+6289-387-654-883</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-1" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-1" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-1" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-sm-square rounded-circle bg-white text-primary me-0" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 wow fadeIn" data-wow-delay="0.1s">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h1 class="m-0 text-primary"><i class="far fa-hospital me-3"></i>Apotek Arema</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ url('home') }}" class="nav-item nav-link active">Home</a>
                <a href="{{ url('about') }}" class="nav-item nav-link">About Us</a>
            </div>
        </div>
        <a href="{{ url('login') }}" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">LOGIN<i class="fa fa-arrow-right ms-3"></i></a>
    </nav>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid header bg-primary p-0 mb-5">
        <div class="row g-0 align-items-center flex-column-reverse flex-lg-row">
            <div class="col-lg-6 p-5 wow fadeIn" data-wow-delay="0.1s">
                <h1 class="display-4 text-white mb-5">Selamat datang di Apotek Arema!</h1>
                <div class="row g-4">
                    <div class="col-sm-12">
                        <div class="border-start border-light ps-4">
                            {{-- <h2 class="text-white mb-1" data-toggle="counter-up">12</h2> --}}
                            <p class="text-light mb-0">Kami berkomitmen untuk memberikan layanan kesehatan terbaik bagi Anda
                                dan keluarga. Dengan pengalaman lebih dari 10 tahun dalam industri farmasi, kami menyediakan
                                obat-obatan berkualitas dan produk kesehatan terpercaya untuk memenuhi kebutuhan Anda.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <div class="owl-carousel header-carousel">
                    <div class="owl-carousel-item position-relative">
                        <img class="img-fluid" src="{{ asset('style/img/carousel-1.jpg') }}" alt="">
                        <div class="owl-carousel-text">
                            <h1 class="display-1 text-white mb-0">Penjualan Obat</h1>
                        </div>
                    </div>
                    <div class="owl-carousel-item position-relative">
                        <img class="img-fluid" src="{{ asset('style/img/carousel-2.jpg') }}" alt="">
                        <div class="owl-carousel-text">
                            <h1 class="display-1 text-white mb-0">Resep Obat</h1>
                        </div>
                    </div>
                    <div class="owl-carousel-item position-relative">
                        <img class="img-fluid" src="{{ asset('style/img/carousel-3.jpg') }}" alt="">
                        <div class="owl-carousel-text">
                            <h1 class="display-1 text-white mb-0">Racikan Obat</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                {{-- <p class="d-inline-block border rounded-pill py-1 px-4">Services</p> --}}
                <h1>Solusi Perawatan Kesehatan</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-light rounded h-100 p-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4" style="width: 65px; height: 65px;">
                            <i class="fa fa-heartbeat text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Kardiologi</h4>
                        <p class="mb-4">Kardiologi adalah cabang ilmu kedokteran yang berfokus pada penyakit dan gangguan yang terkait dengan jantung dan sistem peredaran darah.</p>
                        {{-- <a class="btn" href=""><i class="fa fa-plus text-primary me-3"></i>Read More</a> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item bg-light rounded h-100 p-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4" style="width: 65px; height: 65px;">
                            <i class="fa fa-x-ray text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Paru-paru</h4>
                        <p class="mb-4">Paru-paru adalah organ vital untuk mengambil oksigen dari udara yang kita hirup dan membuang karbon dioksida dari tubuh melalui proses bernapas.</p>
                        {{-- <a class="btn" href=""><i class="fa fa-plus text-primary me-3"></i>Read More</a> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item bg-light rounded h-100 p-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4" style="width: 65px; height: 65px;">
                            <i class="fa fa-brain text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Neurologi</h4>
                        <p class="mb-4">Neurologi adalah cabang ilmu kedokteran yang mempelajari sistem saraf dan gangguan yang terkait dengannya.</p>
                        {{-- <a class="btn" href=""><i class="fa fa-plus text-primary me-3"></i>Read More</a> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item bg-light rounded h-100 p-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4" style="width: 65px; height: 65px;">
                            <i class="fa fa-wheelchair text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Ortopedi</h4>
                        <p class="mb-4">Ortopedi adalah cabang ilmu kedokteran yang berfokus pada pencegahan, perawatan, dan rehabilitasi gangguan dan cedera sistem muskuloskeletal.</p>
                        {{-- <a class="btn" href=""><i class="fa fa-plus text-primary me-3"></i>Read More</a> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item bg-light rounded h-100 p-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4" style="width: 65px; height: 65px;">
                            <i class="fa fa-tooth text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Operasi gigi</h4>
                        <p class="mb-4">Operasi gigi adalah prosedur medis yang melibatkan tindakan bedah pada jaringan mulut, rahang, atau gigi.</p>
                        {{-- <a class="btn" href=""><i class="fa fa-plus text-primary me-3"></i>Read More</a> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item bg-light rounded h-100 p-5">
                        <div class="d-inline-flex align-items-center justify-content-center bg-white rounded-circle mb-4" style="width: 65px; height: 65px;">
                            <i class="fa fa-vials text-primary fs-4"></i>
                        </div>
                        <h4 class="mb-3">Laboratorium</h4>
                        <p class="mb-4">Laboratorium adalah tempat di mana berbagai jenis penelitian dilakukan untuk mengumpulkan data dan informasi dalam bidang ilmiah atau medis. </p>
                        {{-- <a class="btn" href=""><i class="fa fa-plus text-primary me-3"></i>Read More</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Feature Start -->
    <div class="container-fluid bg-primary overflow-hidden my-5 px-lg-0">
        <div class="container feature px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 feature-text py-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="p-lg-5 ps-lg-0">
                        {{-- <p class="d-inline-block border rounded-pill text-light py-1 px-4">Features</p> --}}
                        <h1 class="text-white mb-4">Kenapa Harus Kami</h1>
                        <p class="text-white mb-4 pb-2">Kami menyediakan berbagai macam produk kesehatan termasuk obat resep,
                            obat bebas, vitamin dan suplemen, alat kesehatan, serta produk perawatan pribadi. Dengan kerjasama
                            yang erat dengan produsen dan distributor terkemuka, kami memastikan bahwa setiap produk yang kami
                            sediakan berkualitas tinggi dan aman digunakan.</p>
                        <div class="row g-4">
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light" style="width: 55px; height: 55px;">
                                        <i class="fa fa-user-md text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <p class="text-white mb-2">Dokter</p>
                                        <h5 class="text-white mb-0">Berpengalaman</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light" style="width: 55px; height: 55px;">
                                        <i class="fa fa-check text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <p class="text-white mb-2">Jasa</p>
                                        <h5 class="text-white mb-0">Berkualitas</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light" style="width: 55px; height: 55px;">
                                        <i class="fa fa-comment-medical text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <p class="text-white mb-2">Tanggapan</p>
                                        <h5 class="text-white mb-0">Positif</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center rounded-circle bg-light" style="width: 55px; height: 55px;">
                                        <i class="fa fa-headphones text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <p class="text-white mb-2">Pelayanan</p>
                                        <h5 class="text-white mb-0">24 Jam</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pe-lg-0 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('style/img/feature.jpg') }}" style="object-fit: cover;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1>Testimoni Dari Pelanggan Kami!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item text-center">
                    <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="{{ asset('style/img/testimonial-1.jpg') }}" style="width: 100px; height: 100px;">
                    <div class="testimonial-text rounded text-center p-4">
                        <p>"Apotek ini adalah tempat yang luar biasa untuk mendapatkan semua kebutuhan kesehatan saya. Staf di sini sangat
                            ramah dan selalu siap membantu saya dengan pertanyaan dan permintaan saya."</p>
                        <h5 class="mb-1">Sarah Wijaya</h5>
                        <span class="fst-italic">Penulis</span>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="{{ asset('style/img/testimonial-2.jpg') }}" style="width: 100px; height: 100px;">
                    <div class="testimonial-text rounded text-center p-4">
                        <p>"Saya sangat terkesan dengan pelayanan yang diberikan oleh apotek ini. Saya seringkali mendapatkan resep yang
                            harus dibuat dengan cepat, dan apotek ini selalu membantu saya dengan efisiensi."</p>
                        <h5 class="mb-1">Ahmad Rahman</h5>
                        <span class="fst-italic">Dosen</span>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="{{ asset('style/img/testimonial-3.jpg') }}" style="width: 100px; height: 100px;">
                    <div class="testimonial-text rounded text-center p-4">
                        <p>"Apotek ini adalah tempat untuk semua kebutuhan farmasi saya. Mereka selalu memberikan saran yang berharga dan
                            memberi tahu saya tentang promosi atau penawaran khusus yang mungkin berguna bagi saya."</p>
                        <h5 class="mb-1">Budi Setiawan</h5>
                        <span class="fst-italic">Mahasiswa</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <h5 class="text-light mb-4">Address</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Kepanjen, Malang</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+6289-387-654-883</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>apotek@arema.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social rounded-circle" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social rounded-circle" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h5 class="text-light mb-4">Quick Links</h5>
                    <a class="btn btn-link" href="{{ url('home') }}">Home</a>
                    <a class="btn btn-link" href="{{ url('about') }}">About Us</a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h5 class="text-light mb-4">Newsletter</h5>
                    <p>Terima kasih atas minat Anda terhadap Newsletter Kami. Dapatkan berita terbaru, penawaran eksklusif, dan pembaruan terkait melalui Newsletter Kami.</p>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Apotek Arema</a>, All Right Reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('style/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('style/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('style/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('style/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('style/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('style/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('style/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('style/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('style/js/main.js') }}"></script>
</body>

</html>
