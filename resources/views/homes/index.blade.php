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

</section>
<!-- /About Section -->

<!-- Services Section -->
<section id="izin-perusahaan" class="services section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Izin Perusahaan</h2>
    <p>{{ $dataSetting->desc_izin_perusahaan }}</p>
  </div>
  <!-- End Section Title -->

  <div class="container">

    <div class="row gy-4" style="display: flex; flex-direction: start; justify-content: center; align-items: center;">

      @forelse ($izinPerusahaan as $item)
      <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
        <div class="service-item position-relative text-center rounded shadow-lg"
          style="min-height: 300px; display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 30px;">
          <div class="icon" style="margin-bottom: 20px;">
            <img src="{{ $item->logo ?? DEFAULT_LOGO }}" alt=""
              style="width: 120px; height: 120px; object-fit: contain;">
          </div>
          <h4 style="margin-bottom: 15px;">{{ $item->nama }}</h4>
          <p>{{ $item->nomor }}</p>
        </div>
      </div>
      @empty
      @endforelse

    </div>

  </div>

</section>
<!-- /Services Section -->

<!-- About Section -->
<section id="special-offer" class="about section">

  <div class="container" data-aos="fade-up">
    <div class="row gx-0">

      <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
        <img src="{{ $dataSetting->special_offer_image }}" class="img-fluid" alt="">
      </div>

      <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
        <div class="content">
          @if ($specialOffer)
          <h3>PENAWARAN SPESIAL !</h3>
          <h2>{{ $dataSetting->title_special_offer }}</h2>
          <p>
            {{ $dataSetting->desc_special_offer }}
          </p>
          <h4><sup>Rp</sup><strong>{{ $specialOffer->harga }}</strong><span> / bulan</span></h4>
          <div class="text-center text-lg-start">
            <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-produk="{{ $specialOffer->nama }}"
              href="https://wa.me/{{ $dataSetting->company_phone }}?text={{ sendWaMessage($dataSetting->wa_message, $specialOffer->nama) }}"
              class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
              <span>PESAN SEKARANG</span>
              <i class="bi bi-arrow-right"></i>
            </a>
          </div>
          @else
          <h4>Belum ada penawaran special</h4>
          @endif
        </div>
      </div>

    </div>
  </div>

</section>
<!-- /About Section -->


<!-- Testimonials Section -->
<section id="partners" class="testimonials section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Our Partners & Clients</h2>
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
        "delay": 3500
        },
        "slidesPerView": "auto",
        "pagination": {
        "el": ".swiper-pagination",
        "type": "bullets",
        "clickable": true,
        "dynamicBullets": true
        },
        "breakpoints": {
        "320": {
          "slidesPerView": 2,
          "spaceBetween": 30
        },
        "1200": {
          "slidesPerView": 4,
          "spaceBetween": 10
        }
        }
      }
      </script>

      <div class="swiper-wrapper mb-3">

        @forelse ($partners as $item)
        <div class="swiper-slide text-center">
          <div class="slide-item">
            <img style="width: auto; height: 100px; object-fit: contain;" src="{{ $item->image }}"
              class="testimonial-img" alt="{{ $item->name }}">
          </div>
        </div>
        @empty

        @endforelse

      </div>
    </div>
    <div class="swiper-pagination mt-3"></div>

  </div>

</section>

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
  <section id="{{ $key }}">
    <div class="kategori-produk text-center" data-aos="fade-up">
      <h3>{{ $item }}</h3>
    </div>
    <div class="container mb-5">
      <div class="row g-4 g-lg-0">

        @foreach ($pricing->where('kategori', $key) as $produk)
        <div class="col-lg-4 d-flex justify-content-center" data-aos="zoom-in" data-aos-delay="100">
          <div class="pricing-item text-center">
            <img class="rounded mx-auto d-block" width="80" height="80"
              src="{{ $produk->logo ?? DEFAULT_LOGO }}" alt="">
            <h3 class="mt-3">{{ $produk->nama }}</h3>
            <h4><sup>Rp</sup>{{ $produk->harga }}<span> / bulan</span></h4>
            <p>Kecepatan Internet : {{ $produk->kecepatan }}</p>
            <ul class="list-unstyled">
              @foreach ($produk->benefits_formatted as $bf)
              <li><i class="bi bi-check"></i> <span>{{ $bf }}</span></li>
              @endforeach
            </ul>
            <div class="text-center">
              <button type="button" class="buy-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                data-produk="{{ $produk->nama }}">
                Pesan Sekarang
              </button>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </section>
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

<!-- Call To Action Section -->
<section id="call-to-action" class="call-to-action section light-background">

  <img src="{{ asset('home/img/person-using-laptop.avif')}}" alt="">

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

<!-- Branch Section -->
<section id="branch" class="contact section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up" style="padding-bottom: 40px;">
    <h2>Branch</h2>
  </div>
  <!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4">

      <div class="col-12 text-center">
        <a href="{{ $dataSetting->branch_image }}" class="glightbox-branch">
          <img class="branch-img" src="{{ $dataSetting->branch_image }}" alt="" style="cursor: zoom-in;">
        </a>
      </div>
      <script>
        document.addEventListener('DOMContentLoaded', function () {
          if (typeof GLightbox !== 'undefined') {
            GLightbox({ selector: '.glightbox-branch' });
          }
        });
      </script>

    </div>

  </div>

</section>
<!-- /Contact Section -->

<!-- Contact Section -->
<section id="contact" class="contact section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Kontak</h2>
    <p>{{ $dataSetting->desc_contact }}</p>
  </div>
  <!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4">

      <div class="col-lg-12">

        <div class="row gy-4">
          <div class="col-md-6 d-flex align-items-stretch">
            <div class="info-item w-100" data-aos="fade" data-aos-delay="200">
              <i class="bi bi-geo-alt"></i>
              <h3>Alamat</h3>
              <p>{{ $dataSetting->full_adress }}</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6 d-flex align-items-stretch">
            <div class="info-item w-100" data-aos="fade" data-aos-delay="300">
              <i class="bi bi-telephone"></i>
              <h3>Hubungi kami</h3>
              <p>{{ $dataSetting->company_phone }}</p>
              <p>{{ $dataSetting->company_phone2 }}</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6 d-flex align-items-stretch">
            <div class="info-item w-100" data-aos="fade" data-aos-delay="400">
              <i class="bi bi-envelope"></i>
              <h3>Email</h3>
              <p>{{ $dataSetting->email_company }}</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6 d-flex align-items-stretch">
            <div class="info-item w-100" data-aos="fade" data-aos-delay="500">
              <i class="bi bi-clock"></i>
              <h3>Jam Kerja</h3>
              <p>{{ $dataSetting->weekday }} <strong>{{ $dataSetting->open_hour }}</strong></p>
              <p>{{ $dataSetting->weekend }} <strong>{{ $dataSetting->open_hour_weekend }}</strong></p>
            </div>
          </div><!-- End Info Item -->

        </div>

      </div>

    </div>

  </div>

</section>
<!-- /Contact Section -->

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Isi Formulir</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Silakan isi formulir di bawah ini untuk menghubungi kami melalui WhatsApp.</p>
        <form id="customerForm">
          <div class="mb-3">
            <label for="customerName" class="form-label">Nama</label>
            <input type="text" class="form-control" id="customerName" placeholder="Masukkan nama Anda" required>
          </div>
          <div class="mb-3">
            <label for="customerNeeds" class="form-label">Kebutuhan</label>
            <textarea class="form-control" id="customerNeeds" rows="3" placeholder="Masukkan kebutuhan Anda (opsional)"
              required></textarea>
          </div>
          <div class="mb-3">
            <label for="customerPhone" class="form-label">Nomor WhatsApp</label>
            <input type="number" class="form-control" id="customerPhone" placeholder="Masukkan nomor WhatsApp Anda"
              required>
          </div>
          <div class="mb-3">
            <label for="customerLocation" class="form-label">Lokasi Map</label>
            <input type="text" class="form-control" id="customerLocation" placeholder="Klik untuk mendapatkan lokasi"
              readonly required>
            <button type="button" id="getLocation" class="btn btn-secondary mt-2">Dapatkan Lokasi</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="closeModal">Tutup</button>
        <button type="button" id="sendCustomerData" class="btn btn-primary">Kirim</button>
      </div>
    </div>
  </div>
</div>

<!-- Welcome Modal -->
<div class="modal fade" id="welcomeModal" tabindex="-1" aria-labelledby="welcomeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center m-3">
        <button type="button" class="btn-close" style="position: absolute; right: -10px; top: -10px;"
          data-bs-dismiss="modal" aria-label="Close" id="closeWelcomeModal"></button>
        <img src="{{ $dataSetting->popup_image }}" class="img-fluid rounded" alt="Welcome Image">
      </div>
    </div>
  </div>
</div>

<script>
  document.getElementById('getLocation').addEventListener('click', function () {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function (position) {
        const latitude = position.coords.latitude;
        const longitude = position.coords.longitude;
        const mapsLink = `https://www.google.com/maps?q=${latitude},${longitude}`;
        document.getElementById('customerLocation').value = mapsLink;
      }, function (error) {
        alert('Gagal mendapatkan lokasi. Pastikan izin lokasi diaktifkan.');
      });
    } else {
      alert('Geolokasi tidak didukung oleh browser Anda.');
    }
  });

  document.getElementById('closeWelcomeModal').addEventListener('click', function () {
    localStorage.setItem('welcomeModalClosed', 'true');
  });

  document.addEventListener('DOMContentLoaded', function () {

    const welcomeModal = new bootstrap.Modal(document.getElementById('welcomeModal'));
    if (!localStorage.getItem('welcomeModalClosed')) {
      setTimeout(() => {
        welcomeModal.show();
      }, 500);
    }
    
    const modal = document.getElementById('staticBackdrop');
    modal.addEventListener('show.bs.modal', function (event) {
      const button = event.relatedTarget; // Button that triggered the modal
      const product = button.getAttribute('data-produk'); // Extract info from data-produk attribute
      
      const hiddenInput = document.createElement('input');
      hiddenInput.type = 'hidden';
      hiddenInput.id = 'productInput';
      hiddenInput.name = 'product';
      hiddenInput.value = product;

      // Remove existing hidden input if it exists
      const existingInput = document.getElementById('productInput');
      if (existingInput) {
        existingInput.remove();
      }

      // Append the hidden input to the form
      document.getElementById('customerForm').appendChild(hiddenInput);
    });
  });

  document.getElementById('sendCustomerData').addEventListener('click', function () {
    const name = document.getElementById('customerName').value;
    const needs = document.getElementById('customerNeeds').value;
    const phone = document.getElementById('customerPhone').value;
    const location = document.getElementById('customerLocation').value;
    const product = document.getElementById('productInput') ? document.getElementById('productInput').value : '';

    if (name && needs && phone && location) {
      const data = {
        nama: name,
        kebutuhan: needs,
        no_wa: phone,
        maps: location,
        _token: '{{ csrf_token() }}'
      };

      fetch('{{ route("home.insert-messager") }}', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': data._token
        },
        body: JSON.stringify(data)
      })
      .then(result => {
          const waMessage = `{{ sendWaMessage($dataSetting->wa_message, '${product}') }}`;
          const waLink = `https://wa.me/{{ $dataSetting->company_phone }}?text=${waMessage} %0A %0A lokasi saya di ${encodeURIComponent(location)}`;

            // Reset all form inputs
            document.getElementById('customerForm').reset();

            // Close the modal
            const modal = document.getElementById('staticBackdrop');

            // close modal click id closeModal
            const closeModal = document.getElementById('closeModal');
            closeModal.click();

          window.open(waLink, '_blank');
      })
    } else {
      alert('Harap isi semua data!');
    }
  });
</script>

@endsection