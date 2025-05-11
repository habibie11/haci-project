<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Repositories\PartnerRepository;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class PartnerController extends StislaController
{

    private PartnerRepository $partnerRepository;

    public function __construct()
    {
        parent::__construct();
        $this->partnerRepository = new PartnerRepository();
        $this->defaultMiddleware('Pengguna');

        $this->icon = 'fa fa-handshake-o';
        $this->viewFolder = 'partners';
    }

    protected function getIndexData()
    {
        $defaultData = $this->getDefaultDataIndex(__('Partner'), 'Menu', 'partners');
        return array_merge($defaultData, [
            'data' => collect([]),
            'isAjaxYajra' => true,
            'yajraColumns' => $this->partnerRepository->getYajraColumns(),
        ]);
    }

    public function index()
    {
        $data = $this->getIndexData();
        return view('stisla.partners.index', $data);
    }

    public function ajax()
    {
        $defaultData = $this->getDefaultDataIndex(__('Partner'), 'Menu', 'partners');
        // dd($defaultData);
        return $this->partnerRepository->getYajraDataTables($defaultData);
    }

    public function create(Request $request)
    {
        $defaultData = $this->getDefaultDataCreate('Partner', 'partners');
        $fullTitle = __('Tambah Partner');

        if ($request->ajax()) {
            return view('stisla.partners.only-form', $defaultData);
        }

        return view('stisla.partners.form', array_merge($defaultData, [
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
            'image',
        ]);
        if ($request->hasFile('image')) {
            $data['image'] = $this->fileService->uploads($request->file('image'), 'partners');
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
        if ($this->overMaximum()) {
            $errorMessage = 'Sudah mencapai batas maksimal 10';
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => $errorMessage,
                ], 400);
            }
        }
        $partner = $this->partnerRepository->create($this->getStoreData($request));
        logCreate('Partner', $partner);
        $successMessage = successMessageCreate('Partner');
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $successMessage,
            ]);
        }
    }

    /**
     * Check if total data is over 10
     *
     * @return bool
     */
    public function overMaximum(): bool
    {
        return $this->partnerRepository->getLatest()->count() >= 10;
    }

    public function edit(Request $request, Partner $partner)
    {
        $data = $this->getDetailData($partner, false);
        if ($request->ajax()) {
            return view('stisla.partners.only-form', $data);
        }
        return view('stisla.partners.form', $data);
    }

    private function getDetailData(Partner $partner, bool $isDetail = false)
    {
        $title = __('Partner');
        $defaultData = $this->getDefaultDataDetail($title, 'partners', $partner, $isDetail);
        return array_merge($defaultData, [
            'selectOptions' => get_options(10),
            'radioOptions' => get_options(4),
            'checkboxOptions' => get_options(5),
            'fullTitle' => $isDetail ? __('Detail Partner') : __('Ubah Partner'),
        ]);
    }

    public function update(Request $request, Partner $partner)
    {
        $data = $this->getStoreData($request);

        $userNew = $this->partnerRepository->update($data, $partner->id);
        logUpdate('Pengguna', $partner, $userNew);
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
     * @param Partner $partner
     * @return Response
     */
    public function show(Partner $partner)
    {
        $data = $this->getDetailData($partner, true);
        if (request()->ajax()) {
            return view('stisla.partners.only-form', $data);
        }
        return view('stisla.partners.form', $data);
    }

    /**
     * delete user from db
     *
     * @param Partner $partner
     * @return Response
     */
    public function destroy(Partner $partner)
    {
        $this->partnerRepository->delete($partner->id);
        logDelete('Pengguna', $partner);
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
