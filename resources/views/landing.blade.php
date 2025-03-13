<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="{{ asset('hero2.webp') }}">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <!-- Bootstrap CSS -->
    <link href="{{ asset('awal/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('awal/css/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('awal/css/style.css') }}" rel="stylesheet">

    <title>Play Arena</title>
    <style>
        .game-card {
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            height: 100%;
            /* Semua card memiliki tinggi yang sama */
            display: flex;
            flex-direction: column;
        }

        .game-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>

    <!-- Start Header/Navigation -->
    <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

        <div class="container">
            <a class="navbar-brand" href="index.html">Play Arena<span>.</span></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
                aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsFurni">
                <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li><a class="nav-link" href="#about">About us</a></li>
                    <li><a class="nav-link" href="#service">Services</a></li>
                    <li><a class="nav-link" href="/histori">Riwayat Transaksi</a></li>
                    <li><a class="nav-link" href="#contact">Contact us</a></li>
                </ul>

                <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                    <li><a class="nav-link" href="/login"><img src="{{ asset('awal/images/user.svg') }}"
                                alt="User"></a></li>
                    <li><a class="nav-link" href="cart.html"><img src="{{ asset('awal/images/cart.svg') }}"
                                alt="Cart"></a></li>
                </ul>

            </div>
        </div>

    </nav>
    <!-- End Header/Navigation -->

    <!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="text-wrap">
                        <h1>Mau Main PS Tanpa Ribet? <span clsas="d-block">Play Arena Solusinya!</span></h1>
                        <p class="mb-4">Nikmati pengalaman gaming terbaik dengan layanan rental PlayStation
                            berkualitas. Sewa sekarang dan rasakan keseruannya!.</p>
                        <p><a href="" class="btn btn-secondary me-2">Rent Now</a><a href="#"
                                class="btn btn-white-outline">Explore</a></p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="hero-img-wrap" style="margin-left: 250px;">
                        <img src="{{ asset('hero2.webp') }}" class="img-fluid" alt="Couch">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->

    <!-- Start Why Choose Us Section -->
    <div id="about" class="why-choose-section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <h2 class="section-title">About Us</h2>
                    <p>Selamat datang di Play Arena Rental PS Pati, tempat terbaik untuk menikmati pengalaman bermain
                        game yang seru dan menyenangkan! Kami hadir untuk memberikan hiburan berkualitas bagi para
                        pecinta game di Pati dan sekitarnya.</p>

                    <p>Di Play Arena, kami menyediakan berbagai pilihan game PlayStation terbaru dan terpopuler, mulai
                        dari game petualangan, aksi, balapan, hingga olahraga. Dengan konsol PlayStation yang selalu
                        up-to-date, kami memastikan pengalaman bermain yang lancar dan mengasyikkan.</p>

                    <div class="row my-5">
                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{ asset('awal/images/truck.svg') }}" alt="Fast & Free Shipping"
                                        class="img-fluid">
                                </div>
                                <h3>Game Terlengkap & Update </h3>
                                <p>Kami selalu menghadirkan game terbaru agar Anda tidak ketinggalan keseruan.</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{ asset('awal/images/bag.svg') }}" alt="Easy to Shop" class="img-fluid">
                                </div>
                                <h3>Harga Terjangkau </h3>
                                <p>Nikmati bermain dengan tarif yang ramah di kantong.</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{ asset('awal/images/support.svg') }}" alt="24/7 Support"
                                        class="img-fluid">
                                </div>
                                <h3>Kenyamanan & Kualitas </h3>
                                <p>Tempat yang nyaman dengan fasilitas terbaik untuk pengalaman bermain yang maksimal.
                                </p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{ asset('awal/images/return.svg') }}" alt="Hassle Free Returns"
                                        class="img-fluid">
                                </div>
                                <h3>Layanan Booking Mudah</h3>
                                <p>Bisa pesan langsung secara online melalui website kami.</p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="img-wrap">
                        <img src="{{ asset('awal/about.jpg') }}" alt="Why Choose Us" class="img-fluid"
                            style="height: 400px; width: 1000px;">
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- End Why Choose Us Section -->

    <!-- Start Product Section -->
    <div id="service" class="product-section">
        <div class="container">
            <div class="row">

                <!-- Start Column 1 -->
                {{-- <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                    <h2 class="mb-4 section-title">Crafted with excellent material.</h2>
                    <p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
                        vulputate velit imperdiet dolor tempor tristique.</p>
                    <p><a href="shop.html" class="btn">Explore</a></p>
                </div> --}}
                <div class="intro-excerpt">
                    <h1>Service</h1>
                </div>
                <!-- End Column 1 -->
                <div class="row">
                    @foreach (\App\Models\Service::all() as $service)
                        <div class="col-md-4 mb-4">
                            <div class="card shadow-lg rounded border-0 overflow-hidden">
                                <img src="{{ asset('storage/' . $service->image) }}" class="card-img-top"
                                    alt="{{ $service->name }}" style="height: 350px; object-fit: cover;">
                                <div class="card-body text-center">
                                    <h5 class="card-title fw-bold">{{ $service->name }}</h5>
                                    <p class="card-text text-muted">Harga: <span class="text-danger fw-bold">Rp
                                            {{ number_format($service->price) }}</span> per sesi</p>
                                    <button class="btn btn-danger w-100 fw-bold" data-bs-toggle="modal"
                                        data-bs-target="#bookingModal"
                                        onclick="setService({{ $service->id }}, '{{ $service->name }}', {{ $service->price }})">
                                        <i class="fas fa-shopping-cart"></i> Pesan Sekarang
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr>
                <div class="container">
                    <h2 class="text-center mb-4">Kalender Booking</h2>
                    <div class="card shadow p-4">
                        <div id="calendar"></div>
                    </div>
                </div>

                <!-- Ambil Data Booking -->
                @php
                    use App\Models\Booking;

                    $bookings = Booking::with('service')->get();

                    $events = $bookings->map(function ($booking) {
                        return [
                            'title' => $booking->service->name . ' - ' . $booking->customer_name,
                            'start' => $booking->booking_date,
                            'backgroundColor' => $booking->status == 'paid' ? '#28a745' : '#ffc107', // Warna hijau untuk 'paid', kuning untuk 'pending'
                            'borderColor' => '#000',
                        ];
                    });
                @endphp

                <!-- FullCalendar -->
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css">
                <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var calendarEl = document.getElementById('calendar');

                        var calendar = new FullCalendar.Calendar(calendarEl, {
                            initialView: 'dayGridMonth',
                            selectable: true,
                            events: {!! json_encode($events) !!},
                            dateClick: function(info) {
                                alert('Tanggal dipilih: ' + info.dateStr);
                            }
                        });

                        calendar.render();
                    });
                </script>
                <hr>
                <div class="container mt-5">
                    <h2 class="text-center mb-4 text-uppercase fw-bold text-black">Daftar Game PS</h2>

                    <div class="row">
                        @foreach ($games as $game)
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                <div class="card game-card shadow-sm border-0">
                                    <div class="card-img-wrapper">
                                        <img src="{{ asset('storage/' . $game->image) }}" class="card-img-top"
                                            alt="{{ $game->name }}">
                                    </div>
                                    <div class="card-body text-center">
                                        <h5 class="card-title fw-bold">{{ $game->name }}</h5>
                                        <p class="card-text text-muted">{{ Str::limit($game->description, 60) }}</p>
                                        {{-- <p><strong>Konsol:</strong> {{ $game->console }}</p>
                                    <p><strong>Harga Sewa:</strong> <span class="text-success fw-bold">Rp {{ number_format($game->rental_price) }}</span></p> --}}
                                    </div>
                                    <div class="card-footer text-center bg-light border-0">
                                        <a href="#" class="btn btn-primary w-100 fw-bold">Sewa Sekarang</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Start Column 2 -->
                {{-- <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                    <a class="product-item" href="cart.html">
                        <img src="{{ asset('awal/images/product-1.png') }}" class="img-fluid product-thumbnail"
                            alt="Nordic Chair">
                        <h3 class="product-title">Nordic Chair</h3>
                        <strong class="product-price">$50.00</strong>

                        <span class="icon-cross">
                            <img src="{{ asset('awal/images/cross.svg') }}" class="img-fluid" alt="Remove">
                        </span>
                    </a>
                </div>
                <!-- End Column 2 -->

                <!-- Start Column 3 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                    <a class="product-item" href="cart.html">
                        <img src="{{ asset('awal/images/product-2.png') }}" class="img-fluid product-thumbnail"
                            alt="Kruzo Aero Chair">
                        <h3 class="product-title">Kruzo Aero Chair</h3>
                        <strong class="product-price">$78.00</strong>

                        <span class="icon-cross">
                            <img src="{{ asset('awal/images/cross.svg') }}" class="img-fluid" alt="Remove">
                        </span>
                    </a>
                </div>
                <!-- End Column 3 -->

                <!-- Start Column 4 -->
                <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                    <a class="product-item" href="cart.html">
                        <img src="{{ asset('awal/images/product-3.png') }}" class="img-fluid product-thumbnail"
                            alt="Ergonomic Chair">
                        <h3 class="product-title">Ergonomic Chair</h3>
                        <strong class="product-price">$43.00</strong>

                        <span class="icon-cross">
                            <img src="{{ asset('awal/images/cross.svg') }}" class="img-fluid" alt="Remove">
                        </span>
                    </a>
                </div> --}}
                <!-- End Column 4 -->

            </div>
        </div>
    </div>
    <!-- End Product Section -->


    <!-- Start We Help Section -->
    <div class="we-help-section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <div class="imgs-grid">
                        <div class="grid grid-1"><img src="{{ asset('awal/galeri1.jpg') }}" alt="Untree.co"></div>
                        <div class="grid grid-2"><img src="{{ asset('awal/galeri2.webp') }}" alt="Untree.co"></div>
                        <div class="grid grid-3"><img src="{{ asset('awal/ps5.jpg') }}" alt="Untree.co"></div>
                    </div>
                </div>
                <div class="col-lg-5 ps-lg-5">
                    <h2 class="section-title mb-4">We Bring You the Ultimate Gaming Experience</h2>
                    <p>At our PS rental service in Pati, we provide the best PlayStation gaming experience with a wide
                        selection of exciting games and top-quality consoles. Whether you're a casual player or a
                        hardcore gamer, we ensure endless fun and entertainment.</p>

                    <ul class="list-unstyled custom-list my-4">
                        <li>Donec vitae odio quis nisl dapibus malesuada</li>
                        <li>Donec vitae odio quis nisl dapibus malesuada</li>
                        <li>Donec vitae odio quis nisl dapibus malesuada</li>
                        <li>Donec vitae odio quis nisl dapibus malesuada</li>
                    </ul>
                    <p><a href="#" class="btn">Explore</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- End We Help Section -->

    <!-- Start Popular Product -->
    {{-- <div class="popular-product">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="product-item-sm d-flex">
                        <div class="thumbnail">
                            <img src="{{ asset('awal/images/product-1.png') }}" alt="Image" class="img-fluid">
                        </div>
                        <div class="pt-3">
                            <h3>Nordic Chair</h3>
                            <p>Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio </p>
                            <p><a href="#">Read More</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="product-item-sm d-flex">
                        <div class="thumbnail">
                            <img src="{{ asset('awal/images/product-2.png') }}" alt="Image" class="img-fluid">
                        </div>
                        <div class="pt-3">
                            <h3>Kruzo Aero Chair</h3>
                            <p>Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio </p>
                            <p><a href="#">Read More</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="product-item-sm d-flex">
                        <div class="thumbnail">
                            <img src="{{ asset('awal/images/product-3.png') }}" alt="Image" class="img-fluid">
                        </div>
                        <div class="pt-3">
                            <h3>Ergonomic Chair</h3>
                            <p>Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio </p>
                            <p><a href="#">Read More</a></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> --}}
    <!-- End Popular Product -->

    <!-- Start Testimonial Slider -->
    <div class="testimonial-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto text-center">
                    <h2 class="section-title">Testimonials</h2>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="testimonial-slider-wrap text-center">

                        <div id="testimonial-nav">
                            <span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
                            <span class="next" data-controls="next"><span
                                    class="fa fa-chevron-right"></span></span>
                        </div>

                        <div class="testimonial-slider">

                            <div class="item">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 mx-auto">

                                        <div class="testimonial-block text-center">
                                            <blockquote class="mb-5">
                                                <p>&ldquo;Rental PS ini benar-benar tempat yang asyik untuk melepas
                                                    penat! Pilihan gamenya lengkap, dari game klasik hingga yang
                                                    terbaru, dan suasananya sangat nyaman buat main lama-lama.
                                                    Pelayanannya juga ramah, jadi makin betah untuk sering
                                                    mampir!&rdquo;</p>
                                            </blockquote>

                                            <div class="author-info">
                                                <div class="author-pic">
                                                    <img src="{{ asset('awal/images/person_3.jpg') }}"
                                                        alt="Maria Jones" class="img-fluid">
                                                </div>
                                                <h3 class="font-weight-bold">Budi, Kayen</h3>
                                                {{-- <span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span> --}}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- END item -->

                            <div class="item">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 mx-auto">

                                        <div class="testimonial-block text-center">
                                            <blockquote class="mb-5">
                                                <p>&ldquo;Sangat puas dengan layanan di sini! Proses bookingnya mudah
                                                    dan cepat, jadi nggak perlu antre lama. Konsol dan stiknya selalu
                                                    dalam kondisi prima, bikin pengalaman bermain makin seru tanpa
                                                    kendala. Harga sewanya juga sangat terjangkau!&rdquo;</p>
                                            </blockquote>

                                            <div class="author-info">
                                                <div class="author-pic">
                                                    <img src="{{ asset('awal/images/person_1.jpg') }}"
                                                        alt="Maria Jones" class="img-fluid">
                                                </div>
                                                <h3 class="font-weight-bold">Andi, Pati</h3>
                                                {{-- <span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span> --}}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- END item -->

                            <div class="item">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 mx-auto">

                                        <div class="testimonial-block text-center">
                                            <blockquote class="mb-5">
                                                <p>&ldquo;Tempat rental PS terbaik di Pati! Gamenya selalu update,
                                                    tempatnya bersih dan nyaman, plus ada minuman dan snack buat nemenin
                                                    main. Cocok banget buat nongkrong bareng teman-teman sambil
                                                    seru-seruan main game favorit!&rdquo;</p>
                                            </blockquote>

                                            <div class="author-info">
                                                <div class="author-pic">
                                                    <img src="{{ asset('awal/images/person_2.jpg') }}"
                                                        alt="Maria Jones" class="img-fluid">
                                                </div>
                                                <h3 class="font-weight-bold">Febri, Tayu</h3>
                                                {{-- <span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span> --}}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- END item -->

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Testimonial Slider -->

    <!-- Start Blog Section -->
    {{-- <div class="blog-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-6">
                    <h2 class="section-title">Recent Blog</h2>
                </div>
                <div class="col-md-6 text-start text-md-end">
                    <a href="#" class="more">View All Posts</a>
                </div>
            </div>

            <div class="row">

                <div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
                    <div class="post-entry">
                        <a href="#" class="post-thumbnail"><img src="{{ asset('awal/post-1.jpg') }}"
                                alt="First Time Home Owner Ideas" class="img-fluid">
                        </a>
                        <div class="post-content-entry">
                            <h3><a href="#">First Time Home Owner Ideas</a></h3>
                            <div class="meta">
                                <span>by <a href="#">Kristin Watson</a></span> <span>on <a href="#">Dec
                                        19, 2021</a></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
                    <div class="post-entry">
                        <a href="#" class="post-thumbnail"><img src="{{ asset('awal/post-2.jpg') }}"
                                alt="First Time Home Owner Ideas" class="img-fluid">
                        </a>
                        <div class="post-content-entry">
                            <h3><a href="#">How To Keep Your Furniture Clean</a></h3>
                            <div class="meta">
                                <span>by <a href="#">Robert Fox</a></span> <span>on <a href="#">Dec 15,
                                        2021</a></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
                    <div class="post-entry">
                        <a href="#" class="post-thumbnail"><img src="{{ asset('awal/post-3.jpg') }}"
                                alt="First Time Home Owner Ideas" class="img-fluid">
                        </a>
                        <div class="post-content-entry">
                            <h3><a href="#">Small Space Furniture Apartment Ideas</a></h3>
                            <div class="meta">
                                <span>by <a href="#">Kristin Watson</a></span> <span>on <a href="#">Dec
                                        12, 2021</a></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> --}}
    <!-- End Blog Section -->

    <!-- Start Footer Section -->
    <footer class="footer-section">
        <div id="contact" class="container relative">

            <div class="sofa-img">
                <img src="{{ asset('awal/sofa.png') }}" alt="Image" class="img-fluid">
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="subscription-form">
                        <h3 class="d-flex align-items-center">
                            <span class="me-1">
                                <img src="{{ asset('awal/envelope-outline.svg') }}" alt="Image"
                                    class="img-fluid">
                            </span>
                            <span>Subscribe to Newsletter</span>
                        </h3>

                        <form action="#" class="row g-3">
                            <div class="col-auto">
                                <input type="text" class="form-control" placeholder="Enter your name">
                            </div>
                            <div class="col-auto">
                                <input type="email" class="form-control" placeholder="Enter your email">
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-primary">
                                    <span class="fa fa-paper-plane"></span>
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="container mt-5">
                <h2 class="text-center mb-4 text-uppercase fw-bold">Lokasi Rental PS</h2>
            
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="card shadow-sm border-0">
                            <div class="card-body p-0">
                                <iframe 
                                    width="100%" 
                                    height="300" 
                                    style="border:0;" 
                                    loading="lazy" 
                                    allowfullscreen 
                                    referrerpolicy="no-referrer-when-downgrade"
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.1561085731226!2d111.0403698!3d-6.7484365!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70d2524dfd83cf%3A0xbdd44d6bac78d609!2sJl.%20Diponegoro%20No.229%2C%20Kaborongan%2C%20Pati%20Lor%2C%20Kec.%20Pati%2C%20Kabupaten%20Pati%2C%20Jawa%20Tengah%2059111!5e0!3m2!1sid!2sid!4v1710300000000">
                                </iframe>
                            </div>
                            <div class="card-footer text-center bg-light border-0">
                                <p class="mb-0 fw-bold">Alamat: Jl. Diponegoro No.229, Kaborongan, Pati Lor, Kec. Pati, Kabupaten Pati, Jawa Tengah 59111</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row g-5 mb-5">
                <div class="col-lg-4">
                    <div class="mb-4 footer-logo-wrap">
                        <a href="#" class="footer-logo">Play Arena<span>.</span></a>
                    </div>
                    <p class="mb-4">
                        Nikmati pengalaman gaming terbaik dengan layanan rental PlayStation berkualitas. Sewa sekarang dan rasakan keseruannya!.
                    </p>

                    <ul class="list-unstyled custom-social">
                        <li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
                    </ul>
                </div>

                <div class="col-lg-8">
                    <div class="row links-wrap">
                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Contact us</a></li>
                            </ul>
                        </div>

                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="#">Support</a></li>
                                <li><a href="#">Knowledge base</a></li>
                                <li><a href="#">Live chat</a></li>
                            </ul>
                        </div>

                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="#">Jobs</a></li>
                                <li><a href="#">Our team</a></li>
                                <li><a href="#">Leadership</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>

                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="#">Nordic Chair</a></li>
                                <li><a href="#">Kruzo Aero</a></li>
                                <li><a href="#">Ergonomic Chair</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            <div class="border-top copyright">
                <div class="row pt-4">
                    <div class="col-lg-6">
                        <p class="mb-2 text-center text-lg-start">
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script>.
                            All Rights Reserved. &mdash; Designed with love by
                            <a href="https://untree.co">Untree.co</a> Distributed By
                            <a href="https://themewagon.com">ThemeWagon</a>
                        </p>
                    </div>

                    <div class="col-lg-6 text-center text-lg-end">
                        <ul class="list-unstyled d-inline-flex ms-auto">
                            <li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </footer>

    <!-- End Footer Section -->
    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookingModalLabel">Form Booking</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('book') }}" method="POST">
                        @csrf
                        <input type="hidden" name="service_id" id="service_id">
                        <input type="hidden" id="base_price">

                        <div class="mb-3">
                            <label for="service_name" class="form-label">Layanan</label>
                            <input type="text" id="service_name" class="form-control" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="customer_name" class="form-label">Nama</label>
                            <input type="text" name="customer_name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="customer_phone" class="form-label">Nomor HP</label>
                            <input type="text" name="customer_phone" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="booking_date" class="form-label">Tanggal Booking</label>
                            <input type="date" name="booking_date" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="sessions" class="form-label">Jumlah Sesi</label>
                            <input type="number" name="sessions" id="sessions" class="form-control"
                                min="1" value="1" required onkeyup="updateTotalPrice()"
                                onchange="updateTotalPrice()">
                        </div>

                        <div class="mb-3">
                            <label for="total_price" class="form-label">Total Harga</label>
                            <input type="text" id="total_price" class="form-control" readonly>
                        </div>

                        <button type="submit" class="btn btn-success w-100">Konfirmasi Booking</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function setService(id, name, price) {
            document.getElementById('service_id').value = id;
            document.getElementById('service_name').value = name;
            document.getElementById('base_price').value = price;
            document.getElementById('sessions').value = 1;
            updateTotalPrice();
        }

        function updateTotalPrice() {
            let basePrice = parseFloat(document.getElementById('base_price').value);
            let sessions = parseInt(document.getElementById('sessions').value) || 1;
            let totalPrice = basePrice * sessions;
            document.getElementById('total_price').value = 'Rp ' + totalPrice.toLocaleString();
        }
    </script>

    <script src="{{ asset('awal/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('awal/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('awal/js/custom.js') }}"></script>

</body>

</html>
