<!DOCTYPE html>
<html lang="en">

@include('homes.common.header')

@stack('styles')

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container position-relative d-flex align-items-center">

            <a href="index.html" class="logo d-flex align-items-center me-auto">
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="sitename">{{ $appName }}</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Home</a></li>
                    {{-- <li><a href="#about">About</a></li>
                    <li><a href="#izin-perusahaan">Services</a></li> --}}
                    <li class="dropdown"><a href="#"><span>Tentang</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="#about">Visi & Misi</a></li>
                            {{-- <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i
                                        class="bi bi-chevron-down toggle-dropdown"></i></a>
                                <ul>
                                    <li><a href="#">Deep Dropdown 1</a></li>
                                    <li><a href="#">Deep Dropdown 2</a></li>
                                    <li><a href="#">Deep Dropdown 3</a></li>
                                </ul>
                            </li> --}}
                            <li><a href="#izin-perusahaan">Izin Perusahaan</a></li>
                            <li><a href="#call-to-action">Customer Service</a></li>
                            <li><a href="#partners">Partner</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span>Layanan</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            @foreach ($kategoriProduk['kategori'] as $key => $item)
                            <li><a href="#{{$key}}">{{$item}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="#contact">Contact</a></li>
                    {{-- TODO : redirect ke website billing --}}
                    @if (auth()->check())
                    <li><a href="{{ route('dashboard.index') }}"
                            class="btn btn-primary text-white rounded-pill px-4 py-2">{{ __('Dashboard') }}</a></li>
                    @else
                    <li><a href="{{ route('login') }}"
                            class="btn btn-primary text-white rounded-pill px-4 py-2">Login</a></li>
                    @endif
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <div class="header-social-links">
                @if(!empty($dataSetting->twitter))
                <a href="https://www.twitter.com/{{ $dataSetting->twitter }}" target="_blank"
                    rel="noopener noreferrer"><i class="bi bi-twitter-x"></i></a>
                @endif
                @if(!empty($dataSetting->facebook))
                <a href="https://www.facebook.com/{{ $dataSetting->facebook }}" target="_blank"
                    rel="noopener noreferrer"><i class="bi bi-facebook"></i></a>
                @endif
                @if(!empty($dataSetting->instagram))
                <a href="https://www.instagram.com/{{ $dataSetting->instagram }}" target="_blank"
                    rel="noopener noreferrer"><i class="bi bi-instagram"></i></a>
                @endif
                @if(!empty($dataSetting->linkedin))
                <a href="https://www.linkedin.com/in/{{ $dataSetting->linkedin }}" target="_blank"
                    rel="noopener noreferrer"><i class="bi bi-linkedin"></i></a>
                @endif
            </div>

        </div>
    </header>

    <main class="main">
        @yield('content')
    </main>

    @include('homes.common.footer')

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('home/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('home/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('home/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('home/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('home/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('home/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('home/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('home/js/main.js') }}"></script>
    @stack('scripts')

</body>

</html>