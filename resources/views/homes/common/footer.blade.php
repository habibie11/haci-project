<footer id="footer" class="footer light-background">

    <div class="footer-top">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span class="sitename">{{ $appName }}</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p><span>{{ $dataSetting->full_address ?? 'Jl. Raya No. 123, Jakarta' }}</span></p>
                        <p class="mt-3"><strong>Nomor Handphone:</strong> <span>{{ $dataSetting->company_phone }}</span>
                            <span> {{ $dataSetting->company_phone2 ? '| ' . $dataSetting->company_phone2 : '' }} </span>
                        </p>
                        <p><strong>Email:</strong> <span>{{ $dataSetting->email_company }}</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright text-center">
        <div
            class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

            <div class="d-flex flex-column align-items-center align-items-lg-start">
                <div>
                    {{ $since }} © Copyright <strong><span>{{ $companyName }}</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    Designed by <a href="https://habani.com/">Habani Tech</a>
                </div>
            </div>

            <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
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
    </div>

</footer>