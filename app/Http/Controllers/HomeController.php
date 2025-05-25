<?php

namespace App\Http\Controllers;

use App\Repositories\IzinPerusahaanRepository;
use App\Repositories\PartnerRepository;
use App\Repositories\PricingRepository;
use App\Repositories\SettingRepository;
use App\Repositories\MessagerRepository;
use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\NotificationRepository;

class HomeController extends StislaController
{
    private IzinPerusahaanRepository $izinPerusahaanRepository;
    private PricingRepository $pricingRepository;
    private PartnerRepository $partnerRepository;
    private MessagerRepository $messagerRepository;
    private NotificationRepository $NotificationRepository;

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
        $this->messagerRepository = new MessagerRepository();
        $this->NotificationRepository = new NotificationRepository;
        parent::__construct();
    }

    public function index()
    {
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

    public function InsertMessager(Request $request)
    {
        $messager = $this->messagerRepository->create($this->getStoreData($request));
        $successMessage = successMessageCreate('Messager');

        $title = 'Pesan Layanan Baru';
        $content = 'Ada pesan layanan baru dari ' . $messager->nama . ' - ' . $messager->no_wa;
        $notificationType = 'pesan-layanan';
        $icon = 'bell'; // font awesome
        $bgColor = 'primary'; // primary, danger, success, warning

        // Ambil semua user dengan role superadmin dan admin
        $users = User::whereHas('roles', function ($q) {
            $q->whereIn('name', ['superadmin', 'admin']);
        })->get();

        foreach ($users as $user) {
            $this->NotificationRepository->createNotif(
                $title,
                $content,
                $user->id,
                $notificationType,
                $icon,
                $bgColor
            );
        }

        return response()->json([
            'success' => true,
            'message' => $successMessage,
        ]);
    }

    private function getStoreData(Request $request): array
    {
        $data = $request->only([
            'nama',
            'kebutuhan',
            'no_wa',
            'maps'
        ]);

        return $data;
    }
}
