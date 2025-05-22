<?php

namespace App\Http\Controllers;

use App\Models\IzinPerusahaan;
use App\Repositories\IzinPerusahaanRepository;
use App\Services\FileService;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class IzinPerusahaanController extends StislaController
{

    private IzinPerusahaanRepository $izinPerusahaanRepository;

    public function __construct()
    {
        parent::__construct();
        $this->izinPerusahaanRepository = new IzinPerusahaanRepository;
        // $this->defaultMiddleware('Pengguna');
        $this->middleware('can:Halaman Depan');
        $this->icon = 'fa fa-handshake-o';
        $this->viewFolder = 'izin-perusahaan';
    }

    protected function getIndexData()
    {
        $defaultData = $this->getDefaultDataIndex(__('Izin Perusahaan'), 'Izin Perusahaan', 'izin-perusahaan');

        return array_merge($defaultData, [
            'data' => collect([]),
            'isAjaxYajra' => true,
            'yajraColumns' => $this->izinPerusahaanRepository->getYajraColumns(),
        ]);
    }

    public function index()
    {
        $data = $this->getIndexData();
        return view('stisla.izin-perusahaan.index', $data);
    }

    public function ajax()
    {
        $defaultData = $this->getDefaultDataIndex(__('Izin Perusahaan'), 'Menu', 'izin-perusahaan');
        // dd($defaultData);
        return $this->izinPerusahaanRepository->getYajraDataTables($defaultData);
    }

    public function create(Request $request)
    {
        $defaultData = $this->getDefaultDataCreate('Izin Perusahaan', 'izin-perusahaan');
        $fullTitle = __('Tambah Izin Perusahaan');

        if ($request->ajax()) {
            return view('stisla.izin-perusahaan.only-form', $defaultData);
        }

        return view('stisla.izin-perusahaan.form', array_merge($defaultData, [
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
            'nomor',
            'logo',
        ]);
        if ($request->hasFile('logo')) {
            $data['logo'] = $this->fileService->uploads($request->file('logo'), 'izin-perusahaan');
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
        $izinPerusahaan = $this->izinPerusahaanRepository->create($this->getStoreData($request));
        logCreate('Izin Perusahaan', $izinPerusahaan);
        $successMessage = successMessageCreate('Izin Perusahaan');
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $successMessage,
            ]);
        }
        return redirect()->back()->with('successMessage', $successMessage);
    }

    public function edit(Request $request, IzinPerusahaan $izinPerusahaan)
    {
        $data = $this->getDetailData($izinPerusahaan, false);
        if ($request->ajax()) {
            return view('stisla.izin-perusahaan.only-form', $data);
        }
        return view('stisla.izin-perusahaan.form', $data);
    }

    private function getDetailData(IzinPerusahaan $izinPerusahaan, bool $isDetail = false)
    {
        $title = __('Izin Perusahaan');
        $defaultData = $this->getDefaultDataDetail($title, 'izin-perusahaan', $izinPerusahaan, $isDetail);
        return array_merge($defaultData, [
            'selectOptions' => get_options(10),
            'radioOptions' => get_options(4),
            'checkboxOptions' => get_options(5),
            'fullTitle' => $isDetail ? __('Detail Izin Perusahaan') : __('Ubah Izin Perusahaan'),
        ]);
    }

    public function update(Request $request, izinPerusahaan $izinPerusahaan)
    {
        $data = $this->getStoreData($request);

        $userNew = $this->izinPerusahaanRepository->update($data, $izinPerusahaan->id);
        logUpdate('Pengguna', $izinPerusahaan, $userNew);
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
     * @param izinPerusahaan $izinPerusahaan
     * @return Response
     */
    public function show(izinPerusahaan $izinPerusahaan)
    {
        $data = $this->getDetailData($izinPerusahaan, true);
        return view('stisla.izin-perusahaan.form', $data);
    }

    /**
     * delete user from db
     *
     * @param izinPerusahaan $izinPerusahaan
     * @return Response
     */
    public function destroy(izinPerusahaan $izinPerusahaan)
    {
        $this->izinPerusahaanRepository->delete($izinPerusahaan->id);
        logDelete('Pengguna', $izinPerusahaan);
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
