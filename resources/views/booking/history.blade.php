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
                    <li><a class="nav-link" href="#history">Riwayat Transaksi</a></li>
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
    <div id="history" class="why-choose-section">
        <div class="container">
            <h2 class="text-center mb-4">Riwayat Booking Anda</h2>
            <!-- Form Pencarian -->
            <form action="{{ route('booking.history') }}" method="GET" class="mb-3">
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" name="customer_name" class="form-control" placeholder="Cari berdasarkan nama" value="{{ request('customer_name') }}">
                    </div>
                    <div class="col-md-3">
                        <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                    </div>
                    <div class="col-md-3">
                        <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">Cari</button>
                        <a href="{{ route('booking.history') }}" class="btn btn-secondary">Reset</a>
                    </div>
                </div>
            </form>
    
            <table class="table table-bordered">
                <thead class="table-dark text-center">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Layanan</th>
                        <th>Jumlah Sesi</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bookings as $index => $booking)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $booking->customer_name }}</td>
                            <td>{{ $booking->booking_date }}</td>
                            <td>{{ $booking->service->name }}</td>
                            <td>{{ $booking->sessions }}</td>
                            <td>Rp {{ number_format($booking->total_price) }}</td>
                            <td>
                                <span class="badge {{ $booking->status == 'paid' ? 'bg-success' : 'bg-warning' }}">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data booking ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>                
            </table>
        </div>
    </div>
    

    <!-- End Why Choose Us Section -->


    
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
