<div class="card">
    <div class="card-header">
        <h4><i class="fa fa-cogs"></i> {{ $title }} Umum</h4>

    </div>
    <div class="card-body">
        <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="type" value="home">
            @method('put')
            @csrf
            <div class="row clearfix">
                <div class="col-sm-6">
                    @include('stisla.includes.forms.inputs.input', [
                    'id' => 'welcome',
                    'label' => __('Welcome'),
                    'value' => $dataSetting->welcome ?? '',
                    'required' => true,
                    ])
                </div>
                <div class="col-sm-6">
                    @include('stisla.includes.forms.inputs.input', [
                    'id' => 'visi',
                    'label' => __('Visi'),
                    'value' => $dataSetting->visi ?? '',
                    'required' => true,
                    ])
                </div>
                <div class="col-sm-6">
                    @include('stisla.includes.forms.inputs.input', [
                    'id' => 'misi',
                    'label' => __('Misi'),
                    'value' => $dataSetting->misi ?? '',
                    'required' => true,
                    ])
                </div>
                <div class="col-sm-6">
                    @include('stisla.includes.forms.inputs.input', [
                    'id' => 'desc_izin_perusahaan',
                    'label' => __('Deskripsi Izin Perusahaan'),
                    'value' => $dataSetting->desc_izin_perusahaan ?? '',
                    'required' => true,
                    ])
                </div>
                {{-- TODO : upload logo izin perusahaan, nama, nomor --}}

                <div class="col-sm-6">
                    @include('stisla.includes.forms.inputs.input', [
                    'id' => 'desc_pricing',
                    'label' => __('Pricing'),
                    'value' => $dataSetting->desc_pricing ?? '',
                    'required' => true,
                    ])
                </div>
                <div class="col-sm-6">
                    @include('stisla.includes.forms.inputs.input', [
                    'id' => 'desc_customer_service',
                    'label' => __('Customer Service'),
                    'value' => $dataSetting->desc_customer_service ?? '',
                    'required' => true,
                    ])
                </div>
                <div class="col-sm-6">
                    @include('stisla.includes.forms.inputs.input', [
                    'id' => 'title_special_offer',
                    'label' => __('Judul Penawaran Spesial'),
                    'value' => $dataSetting->title_special_offer ?? '',
                    'required' => true,
                    ])
                </div>
                <div class="col-sm-6">
                    @include('stisla.includes.forms.inputs.input', [
                    'id' => 'desc_special_offer',
                    'label' => __('Deskripsi Penawaran Spesial'),
                    'value' => $dataSetting->desc_special_offer ?? '',
                    'required' => true,
                    ])
                </div>
                <div class="col-sm-6">
                    @include('stisla.includes.forms.inputs.input', [
                    'id' => 'desc_contact',
                    'label' => __('Deskripsi Kontak'),
                    'value' => $dataSetting->desc_contact ?? '',
                    'required' => true,
                    ])
                </div>
                <div class="col-sm-6">
                    @include('stisla.includes.forms.inputs.input-email', [
                    'id' => 'email_company',
                    'label' => __('Email Perusahaan'),
                    'value' => $dataSetting->email_company ?? '',
                    'required' => true,
                    ])
                </div>
                <div class="col-sm-6">
                    @include('stisla.includes.forms.inputs.input', [
                    'id' => 'full_address',
                    'label' => __('Alamat Lengkap'),
                    'value' => $dataSetting->full_address ?? '',
                    'required' => true,
                    ])
                </div>
                <div class="col-sm-6">
                    @include('stisla.includes.forms.inputs.input', [
                    'id' => 'company_phone',
                    'label' => __('Nomor Telepon Perusahaan'),
                    'value' => $dataSetting->company_phone ?? '',
                    'required' => true,
                    ])
                </div>
                <div class="col-sm-6">
                    @include('stisla.includes.forms.inputs.input', [
                    'id' => 'company_phone2',
                    'label' => __('Nomor Telepon Perusahaan 2'),
                    'value' => $dataSetting->company_phone2 ?? '',
                    'required' => true,
                    ])
                </div>
                <div class="col-sm-6">
                    @include('stisla.includes.forms.inputs.input', [
                    'id' => 'wa_message',
                    'label' => __('Pesan WhatsApp'),
                    'value' => $dataSetting->wa_message ?? '',
                    'required' => true,
                    ])
                </div>
                <div class="col-sm-6">
                    @include('stisla.includes.forms.inputs.input', [
                    'id' => 'facebook',
                    'label' => __('Facebook'),
                    'value' => $dataSetting->facebook ?? '',
                    'required' => true,
                    ])
                </div>
                <div class="col-sm-6">
                    @include('stisla.includes.forms.inputs.input', [
                    'id' => 'instagram',
                    'label' => __('Instagram'),
                    'value' => $dataSetting->instagram ?? '',
                    'required' => true,
                    ])
                </div>
                <div class="col-sm-6">
                    @include('stisla.includes.forms.inputs.input', [
                    'id' => 'twitter',
                    'label' => __('Twitter'),
                    'value' => $dataSetting->twitter ?? '',
                    'required' => true,
                    ])
                </div>
                <div class="col-sm-6">
                    @include('stisla.includes.forms.inputs.input', [
                    'id' => 'youtube',
                    'label' => __('YouTube'),
                    'value' => $dataSetting->youtube ?? '',
                    'required' => true,
                    ])
                </div>
                <div class="col-sm-6">
                    @include('stisla.includes.forms.inputs.input', [
                    'id' => 'linkedin',
                    'label' => __('LinkedIn'),
                    'value' => $dataSetting->linkedin ?? '',
                    'required' => true,
                    ])
                </div>
                <div class="col-sm-6">
                    @include('stisla.includes.forms.inputs.input', [
                    'id' => 'weekday',
                    'label' => __('Hari Kerja'),
                    'value' => $dataSetting->weekday ?? '',
                    'required' => true,
                    ])
                </div>
                <div class="col-sm-6">
                    @include('stisla.includes.forms.inputs.input', [
                    'id' => 'weekend',
                    'label' => __('Akhir Pekan'),
                    'value' => $dataSetting->weekend ?? '',
                    'required' => true,
                    ])
                </div>
                <div class="col-sm-6">
                    @include('stisla.includes.forms.inputs.input', [
                    'id' => 'open_hour',
                    'label' => __('Jam Operasional'),
                    'value' => $dataSetting->open_hour ?? '',
                    'required' => true,
                    ])
                </div>
                <div class="col-sm-6">
                    @include('stisla.includes.forms.inputs.input', [
                    'id' => 'open_hour_weekend',
                    'label' => __('Jam Operasional Akhir Pekan'),
                    'value' => $dataSetting->open_hour_weekend ?? '',
                    'required' => true,
                    ])
                </div>
                <div class="col-sm-6">
                    @include('stisla.includes.forms.inputs.input', [
                    'id' => 'logo_website',
                    'label' => __('Logo Website'),
                    'required' => false,
                    'accept' => 'image/png,image/jpg',
                    'type' => 'file',
                    ])
                </div>
                <div class="col-sm-6">
                    @include('stisla.includes.forms.inputs.input', [
                    'id' => 'special_offer_image',
                    'label' => __('Special Offer Image'),
                    'required' => false,
                    'accept' => 'image/png,image/jpg',
                    'type' => 'file',
                    ])
                </div>
                <div class="col-sm-6">
                    @include('stisla.includes.forms.inputs.input', [
                    'id' => 'popup_image',
                    'label' => __('Gambar Popup'),
                    'required' => false,
                    'accept' => 'image/png,image/jpg',
                    'type' => 'file',
                    ])
                </div>
                <div class="col-md-12">
                    @include('stisla.includes.forms.buttons.btn-save')
                    @include('stisla.includes.forms.buttons.btn-reset')
                </div>
            </div>
        </form>
        <br />
        <br />
        {{-- @if (!empty($dataSetting->special_offer_image)) --}}
        <div class="row">
            <div class="col-md-4 col-lg-3">
                <a href="{{ $dataSetting->logo_website }}" target="_blank">
                    <img class="img-thumbnail" src="{{ $dataSetting->logo_website }}" alt="Logo Website">
                </a>
                <div class="text-center font-bold"><strong>Logo Website</strong></div>
            </div>
            <div class="col-md-4 col-lg-3">
                <a href="{{ $dataSetting->special_offer_image }}" target="_blank">
                    <img class="img-thumbnail" src="{{ $dataSetting->special_offer_image }}" alt="Special Offer Image">
                </a>
                <div class="text-center font-bold"><strong>Special Offer Image</strong></div>
            </div>
            <div class="col-md-4 col-lg-3">
                <a href="{{ $dataSetting->popup_image }}" target="_blank">
                    <img class="img-thumbnail" src="{{ $dataSetting->popup_image }}" alt="Gambar Popup">
                </a>
                <div class="text-center font-bold"><strong>Gambar Popup</strong></div>
            </div>
        </div>
        {{-- @endif --}}
    </div>
</div>