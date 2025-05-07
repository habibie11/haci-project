<?php

namespace App\Http\Controllers;

use App\Models\Pricing;
use App\Repositories\PricingRepository;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class PricingController extends StislaController
{

    private PricingRepository $pricingRepository;

    public function __construct()
    {
        parent::__construct();
        $this->pricingRepository = new PricingRepository();
        $this->defaultMiddleware('Pengguna');

        $this->icon = 'fa fa-handshake-o';
        $this->viewFolder = 'pricings';
    }

    protected function getIndexData()
    {
        $defaultData = $this->getDefaultDataIndex(__('Pricing'), 'Menu', 'pricings');
        // $data        = array_merge(['data' => $data], $defaultData);
        return array_merge($defaultData, [
            // 'isYajra' => $isYajra,
            // 'isAjax' => $isAjax,
            'data' => collect([]),
            'isAjaxYajra' => true,
            'yajraColumns' => $this->pricingRepository->getYajraColumns(),
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

    public function index()
    {
        $data = $this->getIndexData();
        return view('stisla.pricings.index', $data);
    }

    public function ajax()
    {
        $defaultData = $this->getDefaultDataIndex(__('Pricing'), 'Menu', 'pricings');
        // dd($defaultData);
        return $this->pricingRepository->getYajraDataTables($defaultData);
    }

    public function create(Request $request)
    {
        $defaultData = $this->getDefaultDataCreate('Pricing', 'pricings', $this->getKategori());
        $fullTitle = __('Tambah Pricing');

        if ($request->ajax()) {
            return view('stisla.pricings.only-form', $defaultData);
        }

        return view('stisla.pricings.form', array_merge($defaultData, [
            'fullTitle' => $fullTitle,
        ]));
    }

    /**
     * get store data
     *
     * @param Request $request
     * @return array
     */
    private function getStoreData(Request $request): array
    {
        $data = $request->only([
            'nama',
            'logo',
            'kecepatan',
            'benefit',
            'harga',
            'kategori',
            'is_special_offer',
        ]);
        if ($request->hasFile('logo')) {
            $data['logo'] = $this->fileService->uploads($request->file('logo'), 'pricings');
        }
        return $data;
    }

    /**
     * save new user to db
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $pricing = $this->pricingRepository->create($this->getStoreData($request));
        logCreate('Pricing', $pricing);
        $successMessage = successMessageCreate('Pricing');
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $successMessage,
            ]);
        }
        return redirect()->back()->with('successMessage', $successMessage);
    }

    public function edit(Request $request, Pricing $pricing)
    {
        $data = $this->getDetailData($pricing, false);
        if ($request->ajax()) {
            return view('stisla.pricings.only-form', $data);
        }
        return view('stisla.pricings.form', $data);
    }

    private function getDetailData(Pricing $pricing, bool $isDetail = false)
    {
        $title = __('Pricing');
        $defaultData = $this->getDefaultDataDetail($title, 'pricings', $pricing, $isDetail, $this->getKategori());
        return array_merge($defaultData, [
            'selectOptions' => get_options(10),
            'radioOptions' => get_options(4),
            'checkboxOptions' => get_options(5),
            'fullTitle' => $isDetail ? __('Detail Pricing') : __('Ubah Pricing'),
        ]);
    }

    public function update(Request $request, Pricing $pricing)
    {
        $data = $this->getStoreData($request);

        $userNew = $this->pricingRepository->update($data, $pricing->id);
        logUpdate('Pengguna', $pricing, $userNew);
        $successMessage = successMessageUpdate('Pengguna');

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $successMessage,
            ]);
        }

        return redirect()->back()->with('successMessage', $successMessage);
    }

    /**
     * showing detail user page
     *
     * @param Pricing $pricing
     * @return Response
     */
    public function show(Pricing $pricing)
    {
        $data = $this->getDetailData($pricing, true);
        if (request()->ajax()) {
            return view('stisla.pricings.only-form', $data);
        }
        return view('stisla.pricings.form', $data);
    }

    /**
     * delete user from db
     *
     * @param Pricing $pricing
     * @return Response
     */
    public function destroy(Pricing $pricing)
    {
        $this->pricingRepository->delete($pricing->id);
        logDelete('Pengguna', $pricing);
        $successMessage = successMessageDelete('Pengguna');

        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $successMessage,
            ]);
        }

        return redirect()->back()->with('successMessage', $successMessage);
    }
}
