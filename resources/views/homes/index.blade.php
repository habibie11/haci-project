@extends('homes.layouts.app', \App\Repositories\SettingRepository::settings())

@section('content')
<!-- Hero Section -->
<section id="hero" class="hero section">

  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-7 order-2 order-lg-1 d-flex flex-column justify-content-center">
        <h1>Selamat Datang di {{ $appName }}</h1>
        <p>{{ $dataSetting->welcome }}</p>
        <div class="d-flex">
          <a href="#about" class="btn-get-started">Get Started</a>
          {{-- <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8"
            class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch
              Video</span></a> --}}
        </div>
      </div>
      <div class="col-lg-5 order-1 order-lg-2 hero-img">
        <img src="{{ asset('home/img/hero-img.png') }}" class="img-fluid" alt="">
      </div>
    </div>
  </div>

</section><!-- /Hero Section -->

<!-- About Section -->
<section id="about" class="about section">

  <div class="container section-title" data-aos="fade-up">
    <h2>Visi & Misi</h2>
    <div class="row gx-0">
      <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
        <div class="content visi" style="background-color: unset;">
          <h3>
            <i class="bi bi-bookmark-check-fill"></i>
            VISI
          </h3>
          <p>
            {{ $dataSetting->visi }}
          </p>
        </div>
      </div>

      <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
        <div class="content">
          <h3><i class="bi bi-send"></i> MISI</h3>
          <p>
            {{ $dataSetting->misi }}
          </p>
        </div>
      </div>

    </div>
  </div>

</section><!-- /About Section -->

<!-- Services Section -->
<section id="izin-perusahaan" class="services section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Izin Perusahaan</h2>
    <p>{{ $dataSetting->desc_izin_perusahaan }}</p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="row gy-4">

      @forelse ($izinPerusahaan as $item)
      <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
        <div class="service-item position-relative">
          <div class="icon"><img src="{{ $item->logo }}" alt=""></div>
          {{-- <div class="icon"><i class="bi bi-activity icon"></i></div> --}}
          <h4>{{ $item->nama }}</h4>
          <p>{{ $item->nomor }}</p>
        </div>
      </div>
      @empty

      @endforelse

    </div>

  </div>

</section><!-- /Services Section -->

<!-- Portfolio Section -->
{{-- <section id="portfolio" class="portfolio section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Portfolio</h2>
    <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

      <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
        <li data-filter="*" class="filter-active">All</li>
        <li data-filter=".filter-app">App</li>
        <li data-filter=".filter-product">Product</li>
        <li data-filter=".filter-branding">Branding</li>
        <li data-filter=".filter-books">Books</li>
      </ul><!-- End Portfolio Filters -->

      <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
          <div class="portfolio-content h-100">
            <img src="assets/img/portfolio/app-1.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>App 1</h4>
              <p>Lorem ipsum, dolor sit amet consectetur</p>
              <a href="assets/img/portfolio/app-1.jpg" title="App 1" data-gallery="portfolio-gallery-app"
                class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              <a href="portfolio-details.html" title="More Details" class="details-link"><i
                  class="bi bi-link-45deg"></i></a>
            </div>
          </div>
        </div><!-- End Portfolio Item -->

        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
          <div class="portfolio-content h-100">
            <img src="assets/img/portfolio/product-1.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Product 1</h4>
              <p>Lorem ipsum, dolor sit amet consectetur</p>
              <a href="assets/img/portfolio/product-1.jpg" title="Product 1" data-gallery="portfolio-gallery-product"
                class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              <a href="portfolio-details.html" title="More Details" class="details-link"><i
                  class="bi bi-link-45deg"></i></a>
            </div>
          </div>
        </div><!-- End Portfolio Item -->

        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
          <div class="portfolio-content h-100">
            <img src="assets/img/portfolio/branding-1.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Branding 1</h4>
              <p>Lorem ipsum, dolor sit amet consectetur</p>
              <a href="assets/img/portfolio/branding-1.jpg" title="Branding 1" data-gallery="portfolio-gallery-branding"
                class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              <a href="portfolio-details.html" title="More Details" class="details-link"><i
                  class="bi bi-link-45deg"></i></a>
            </div>
          </div>
        </div><!-- End Portfolio Item -->

        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
          <div class="portfolio-content h-100">
            <img src="assets/img/portfolio/books-1.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Books 1</h4>
              <p>Lorem ipsum, dolor sit amet consectetur</p>
              <a href="assets/img/portfolio/books-1.jpg" title="Branding 1" data-gallery="portfolio-gallery-book"
                class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              <a href="portfolio-details.html" title="More Details" class="details-link"><i
                  class="bi bi-link-45deg"></i></a>
            </div>
          </div>
        </div><!-- End Portfolio Item -->

        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
          <div class="portfolio-content h-100">
            <img src="assets/img/portfolio/app-2.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>App 2</h4>
              <p>Lorem ipsum, dolor sit amet consectetur</p>
              <a href="assets/img/portfolio/app-2.jpg" title="App 2" data-gallery="portfolio-gallery-app"
                class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              <a href="portfolio-details.html" title="More Details" class="details-link"><i
                  class="bi bi-link-45deg"></i></a>
            </div>
          </div>
        </div><!-- End Portfolio Item -->

        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
          <div class="portfolio-content h-100">
            <img src="assets/img/portfolio/product-2.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Product 2</h4>
              <p>Lorem ipsum, dolor sit amet consectetur</p>
              <a href="assets/img/portfolio/product-2.jpg" title="Product 2" data-gallery="portfolio-gallery-product"
                class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              <a href="portfolio-details.html" title="More Details" class="details-link"><i
                  class="bi bi-link-45deg"></i></a>
            </div>
          </div>
        </div><!-- End Portfolio Item -->

        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
          <div class="portfolio-content h-100">
            <img src="assets/img/portfolio/branding-2.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Branding 2</h4>
              <p>Lorem ipsum, dolor sit amet consectetur</p>
              <a href="assets/img/portfolio/branding-2.jpg" title="Branding 2" data-gallery="portfolio-gallery-branding"
                class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              <a href="portfolio-details.html" title="More Details" class="details-link"><i
                  class="bi bi-link-45deg"></i></a>
            </div>
          </div>
        </div><!-- End Portfolio Item -->

        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
          <div class="portfolio-content h-100">
            <img src="assets/img/portfolio/books-2.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Books 2</h4>
              <p>Lorem ipsum, dolor sit amet consectetur</p>
              <a href="assets/img/portfolio/books-2.jpg" title="Branding 2" data-gallery="portfolio-gallery-book"
                class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              <a href="portfolio-details.html" title="More Details" class="details-link"><i
                  class="bi bi-link-45deg"></i></a>
            </div>
          </div>
        </div><!-- End Portfolio Item -->

        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
          <div class="portfolio-content h-100">
            <img src="assets/img/portfolio/app-3.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>App 3</h4>
              <p>Lorem ipsum, dolor sit amet consectetur</p>
              <a href="assets/img/portfolio/app-3.jpg" title="App 3" data-gallery="portfolio-gallery-app"
                class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              <a href="portfolio-details.html" title="More Details" class="details-link"><i
                  class="bi bi-link-45deg"></i></a>
            </div>
          </div>
        </div><!-- End Portfolio Item -->

        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
          <div class="portfolio-content h-100">
            <img src="assets/img/portfolio/product-3.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Product 3</h4>
              <p>Lorem ipsum, dolor sit amet consectetur</p>
              <a href="assets/img/portfolio/product-3.jpg" title="Product 3" data-gallery="portfolio-gallery-product"
                class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              <a href="portfolio-details.html" title="More Details" class="details-link"><i
                  class="bi bi-link-45deg"></i></a>
            </div>
          </div>
        </div><!-- End Portfolio Item -->

        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
          <div class="portfolio-content h-100">
            <img src="assets/img/portfolio/branding-3.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Branding 3</h4>
              <p>Lorem ipsum, dolor sit amet consectetur</p>
              <a href="assets/img/portfolio/branding-3.jpg" title="Branding 2" data-gallery="portfolio-gallery-branding"
                class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              <a href="portfolio-details.html" title="More Details" class="details-link"><i
                  class="bi bi-link-45deg"></i></a>
            </div>
          </div>
        </div><!-- End Portfolio Item -->

        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
          <div class="portfolio-content h-100">
            <img src="assets/img/portfolio/books-3.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Books 3</h4>
              <p>Lorem ipsum, dolor sit amet consectetur</p>
              <a href="assets/img/portfolio/books-3.jpg" title="Branding 3" data-gallery="portfolio-gallery-book"
                class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              <a href="portfolio-details.html" title="More Details" class="details-link"><i
                  class="bi bi-link-45deg"></i></a>
            </div>
          </div>
        </div><!-- End Portfolio Item -->

      </div><!-- End Portfolio Container -->

    </div>

  </div>

</section> --}}
<!-- /Portfolio Section -->

<!-- Call To Action Section -->
<section id="call-to-action" class="call-to-action section light-background">

  <img src="{{ asset('home/img/cta-bg.jpg')}}" alt="">

  <div class="container">

    <div class="row" data-aos="zoom-in" data-aos-delay="100">
      <div class="col-xl-9 text-center text-xl-start">
        <h3>Customer Service</h3>
        <h4>{{ $dataSetting->desc_customer_service }}</h4>
      </div>
      <div class="col-xl-3 cta-btn-container text-center">
        <a class="cta-btn align-middle"
          href="https://wa.me/{{ $dataSetting->company_phone }}?text=Halo%20saya%20tertarik%20dengan%20produk%20Anda"><i
            class="bi bi-whatsapp"></i> {{ $dataSetting->company_phone }}</a>
      </div>
    </div>

  </div>

</section>
<!-- /Call To Action Section -->

<!-- About Section -->
<section id="special-offer" class="about section">

  <div class="container" data-aos="fade-up">
    <div class="row gx-0">

      <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
        <img src="{{ asset('home/img/family.png') }}" class="img-fluid" alt="">
      </div>

      <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
        <div class="content">
          <h3>PENAWARAN SPESIAL !</h3>
          <h2>{{ $dataSetting->title_special_offer }}</h2>
          <p>
            {{ $dataSetting->desc_special_offer }}
          </p>
          <h4><sup>Rp</sup><strong>{{ $specialOffer->harga }}</strong><span> / bulan</span></h4>
          <div class="text-center text-lg-start">
            @php
            $pesanWa = "Halo, saya sedang melihat produk di website Anda dan tertarik dengan produk ini:\n\n
            $specialOffer->nama \n\n. Saya ingin menanyakan ketersediaan dan detail lebih lanjut. Terima kasih!";
            @endphp
            <a target="_blank" href="https://wa.me/{{ $dataSetting->company_phone }}?text={{ $pesanWa }}"
              class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
              <span>PESAN SEKARANG</span>
              <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>

    </div>
  </div>

</section><!-- /About Section -->


<!-- Testimonials Section -->
<section id="partners" class="testimonials section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Partner Kami</h2>
  </div>
  <!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="swiper init-swiper" data-speed="600" data-delay="5000"
      data-breakpoints="{ &quot;320&quot;: { &quot;slidesPerView&quot;: 1, &quot;spaceBetween&quot;: 40 }, &quot;1200&quot;: { &quot;slidesPerView&quot;: 3, &quot;spaceBetween&quot;: 40 } }">
      <script type="application/json" class="swiper-config">
        {
          "loop": true,
          "speed": 600,
          "autoplay": {
            "delay": 5000
          },
          "slidesPerView": "auto",
          "pagination": {
            "el": ".swiper-pagination",
            "type": "bullets",
            "clickable": true
          },
          "breakpoints": {
            "320": {
              "slidesPerView": 1,
              "spaceBetween": 40
            },
            "1200": {
              "slidesPerView": 3,
              "spaceBetween": 20
            }
          }
        }
      </script>

      <div class="swiper-wrapper">

        @forelse ($partners as $item)
        <div class="swiper-slide">
          <div class="slide-item">
            <img width="200" height="200" src="{{ $item->image }}" class="testimonial-img" alt="{{ $item->name }}">
          </div>
        </div>
        @empty

        @endforelse

      </div>
      <div class="swiper-pagination"></div>
    </div>

  </div>

</section>

<!-- /Testimonials Section -->

<!-- Team Section -->
{{-- <section id="team" class="team section light-background">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Team</h2>
    <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="row gy-5">

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="member">
          <div class="pic"><img src="assets/img/team/team-1.jpg" class="img-fluid" alt=""></div>
          <div class="member-info">
            <h4>Walter White</h4>
            <span>Chief Executive Officer</span>
            <div class="social">
              <a href=""><i class="bi bi-twitter-x"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div><!-- End Team Member -->

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="member">
          <div class="pic"><img src="assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
          <div class="member-info">
            <h4>Sarah Jhonson</h4>
            <span>Product Manager</span>
            <div class="social">
              <a href=""><i class="bi bi-twitter-x"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div><!-- End Team Member -->

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="member">
          <div class="pic"><img src="assets/img/team/team-3.jpg" class="img-fluid" alt=""></div>
          <div class="member-info">
            <h4>William Anderson</h4>
            <span>CTO</span>
            <div class="social">
              <a href=""><i class="bi bi-twitter-x"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div><!-- End Team Member -->

    </div>

  </div>

</section> --}}
<!-- /Team Section -->

<!-- Pricing Section -->
<section id="pricings" class="pricing section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Produk</h2>
    <p>{{ $dataSetting->desc_pricing }}</p>
  </div>
  <!-- End Section Title -->

  @foreach ($kategoriProduk['kategori'] as $key => $item)
  @if ($pricing->where('kategori', $key)->isNotEmpty())
  <div class="kategori-produk text-center" data-aos="fade-up">
    <h3>{{ $item }}</h3>
  </div>
  <div class="container mb-5">
    <div class="row g-4 g-lg-0">

      @foreach ($pricing->where('kategori', $key) as $produk)
      <div class="col-lg-4 d-flex justify-content-center" data-aos="zoom-in" data-aos-delay="100">
        <div class="pricing-item text-center">
          <img class="rounded mx-auto d-block" width="80" height="80"
            src="{{ $produk->logo ?? asset('assets/images/logo.png') }}" alt="">
          <h3 class="mt-3">{{ $produk->nama }}</h3>
          <h4><sup>Rp</sup>{{ $produk->harga }}<span> / bulan</span></h4>
          <p>Kecepatan Internet : {{ $produk->kecepatan }}</p>
          <ul class="list-unstyled">
            @foreach ($produk->benefits_formatted as $bf)
            <li><i class="bi bi-check"></i> <span>{{ $bf }}</span></li>
            @endforeach
          </ul>
          <div class="text-center"><a href="#" class="buy-btn">Pesan Sekarang</a></div>
        </div>
      </div>
      @endforeach

    </div>
  </div>
  @endif
  @endforeach
  <div class="text-center" data-aos="fade-up" style="font-size: small;">
    <strong>Free Registrasi S&amp;K Berlaku</strong>
    <p>
      <italic>Disclaimer: Dilarang keras memperjualbelikan kembali produk ini. Perangkat yang terdeteksi
        membagikan layanan ini akan diblokir.</italic>
    </p>
  </div>

</section>
<!-- /Pricing Section -->

<!-- Faq Section -->
{{-- <section id="faq" class="faq section light-background">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Frequently Asked Questions</h2>
    <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="row justify-content-center">

      <div class="col-lg-8">

        <div class="faq-container">

          <div class="faq-item faq-active" data-aos="fade-up" data-aos-delay="200">
            <i class="faq-icon bi bi-question-circle"></i>
            <h3>Non consectetur a erat nam at lectus urna duis?</h3>
            <div class="faq-content">
              <p>Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus
                laoreet non curabitur
                gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus
                non.</p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div><!-- End Faq item-->

          <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
            <i class="faq-icon bi bi-question-circle"></i>
            <h3>Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?</h3>
            <div class="faq-content">
              <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id
                interdum velit laoreet
                id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec
                pretium. Est pellentesque
                elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa
                tincidunt dui.</p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div><!-- End Faq item-->

          <div class="faq-item" data-aos="fade-up" data-aos-delay="400">
            <i class="faq-icon bi bi-question-circle"></i>
            <h3>Dolor sit amet consectetur adipiscing elit pellentesque?</h3>
            <div class="faq-content">
              <p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci.
                Faucibus pulvinar
                elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum
                tellus pellentesque
                eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at
                elementum eu facilisis
                sed odio morbi quis</p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div><!-- End Faq item-->

          <div class="faq-item" data-aos="fade-up" data-aos-delay="500">
            <i class="faq-icon bi bi-question-circle"></i>
            <h3>Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?</h3>
            <div class="faq-content">
              <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id
                interdum velit laoreet
                id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec
                pretium. Est pellentesque
                elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa
                tincidunt dui.</p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div><!-- End Faq item-->

          <div class="faq-item" data-aos="fade-up" data-aos-delay="600">
            <i class="faq-icon bi bi-question-circle"></i>
            <h3>Tempus quam pellentesque nec nam aliquam sem et tortor consequat?</h3>
            <div class="faq-content">
              <p>Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse
                in est ante in.
                Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit
                adipiscing bibendum est.
                Purus gravida quis blandit turpis cursus in</p>
            </div>
            <i class="faq-toggle bi bi-chevron-right"></i>
          </div><!-- End Faq item-->

        </div>

      </div>

    </div>

  </div>

</section> --}}
<!-- /Faq Section -->

<!-- Contact Section -->
<section id="contact" class="contact section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Contact</h2>
    <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4">

      <div class="col-lg-12">

        <div class="row gy-4">
          <div class="col-md-6">
            <div class="info-item" data-aos="fade" data-aos-delay="200">
              <i class="bi bi-geo-alt"></i>
              <h3>Address</h3>
              <p>A108 Adam Street</p>
              <p>New York, NY 535022</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item" data-aos="fade" data-aos-delay="300">
              <i class="bi bi-telephone"></i>
              <h3>Call Us</h3>
              <p>+1 5589 55488 55</p>
              <p>+1 6678 254445 41</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item" data-aos="fade" data-aos-delay="400">
              <i class="bi bi-envelope"></i>
              <h3>Email Us</h3>
              <p>info@example.com</p>
              <p>contact@example.com</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item" data-aos="fade" data-aos-delay="500">
              <i class="bi bi-clock"></i>
              <h3>Open Hours</h3>
              <p>Monday - Friday</p>
              <p>9:00AM - 05:00PM</p>
            </div>
          </div><!-- End Info Item -->

        </div>

      </div>

    </div>

  </div>

</section><!-- /Contact Section -->

@endsection