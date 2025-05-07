<?php

namespace App\Http\Controllers;

use App\Repositories\IzinPerusahaanRepository;
use App\Repositories\PartnerRepository;
use App\Repositories\PricingRepository;
use App\Repositories\SettingRepository;
use Illuminate\Http\Response;

class HomeController extends StislaController
{
    private IzinPerusahaanRepository $izinPerusahaanRepository;
    private PricingRepository $pricingRepository;
    private PartnerRepository $partnerRepository;

    /**
     * constructor method
     *
     * @return void
     */
    public function __construct()
    {
        $this->izinPerusahaanRepository = new IzinPerusahaanRepository();
        $this->pricingRepository = new PricingRepository();
        $this->partnerRepository = new PartnerRepository();
        parent::__construct();
    }

    public function index()
    {
        // dd($this->settingRepository->all());
        $dataSetting = $this->settingRepository->homepageSetting();
        $companyName = $this->settingRepository->companyName();
        $since = $this->settingRepository->since();
        $favicon = $this->settingRepository->favicon();
        $izinPerusahaan = $this->izinPerusahaanRepository->getLatest();
        $pricing = $this->pricingRepository->getOrderBy('harga');
        $specialOffer = $pricing->where('is_special_offer', true)->first();
        $appName = $this->settingRepository->appName();
        $kategoriProduk = $this->getKategori();
        $partners = $this->partnerRepository->getLatest();

        return view('homes.index', [
            'title' => __('Selamat datang di ') . SettingRepository::applicationName(),
            'dataSetting' => $dataSetting,
            'companyName' => $companyName,
            'since' => $since,
            'favicon' => $favicon,
            'izinPerusahaan' => $izinPerusahaan,
            'pricing' => $pricing,
            'appName' => $appName,
            'kategoriProduk' => $kategoriProduk,
            'specialOffer' => $specialOffer,
            'partners' => $partners,
        ]);
    }

    protected function getKategori()
    {
        return [
            'kategori' => [
                'dedicated_package' => 'Dedicated Package',
                'broadband_home_user_package' => 'Broadband Home User Package',
            ]
        ];
    }
}
