<?php

namespace App\Http\Controllers;

use App\Models\Messager;
use App\Repositories\MessagerRepository;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class MessagerController extends StislaController
{

    private MessagerRepository $messagerRepository;

    public function __construct()
    {
        parent::__construct();
        $this->messagerRepository = new MessagerRepository();
        $this->defaultMiddleware('Pengguna');

        $this->icon = 'fa fa-message';
        $this->viewFolder = 'messagers';
    }

    protected function getIndexData()
    {
        $defaultData = $this->getDefaultDataIndex(__('Messager'), 'Menu', 'messagers');
        return array_merge($defaultData, [
            'data' => collect([]),
            'isAjaxYajra' => true,
            'yajraColumns' => $this->messagerRepository->getYajraColumns(),
        ]);
    }

    public function index()
    {
        $data = $this->getIndexData();
        return view('stisla.messagers.index', $data);
    }

    public function ajax()
    {
        $defaultData = $this->getDefaultDataIndex(__('Messager'), 'Menu', 'messagers');
        return $this->messagerRepository->getYajraDataTables($defaultData);
    }

    public function create(Request $request)
    {
        $defaultData = $this->getDefaultDataCreate('Messager', 'messagers');
        $fullTitle = __('Tambah Messager');

        if ($request->ajax()) {
            return view('stisla.messagers.only-form', $defaultData);
        }

        return view('stisla.messagers.form', array_merge($defaultData, [
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
            'kebutuhan',
            'no_wa',
            'maps',
            'alamat'
        ]);

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
        $messager = $this->messagerRepository->create($this->getStoreData($request));
        logCreate('Messager', $messager);
        $successMessage = successMessageCreate('Messager');
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $successMessage,
            ]);
        }
    }

    public function edit(Request $request, Messager $messager)
    {
        $data = $this->getDetailData($messager, false);
        if ($request->ajax()) {
            return view('stisla.messagers.only-form', $data);
        }
    }

    private function getDetailData(Messager $messager, bool $isDetail = false)
    {
        $title = __('Messager');
        $defaultData = $this->getDefaultDataDetail($title, 'messagers', $messager, $isDetail);
        return array_merge($defaultData, [
            'selectOptions' => get_options(10),
            'radioOptions' => get_options(4),
            'checkboxOptions' => get_options(5),
            'fullTitle' => $isDetail ? __('Detail Messager') : __('Ubah Messager'),
        ]);
    }

    public function update(Request $request, Messager $messager)
    {
        $data = $this->getStoreData($request);

        $userNew = $this->messagerRepository->update($data, $messager->id);
        logUpdate('Pengguna', $messager, $userNew);
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
     * @param Messager $messager
     * @return Response
     */
    public function show(Messager $messager)
    {
        $data = $this->getDetailData($messager, true);
        if (request()->ajax()) {
            return view('stisla.messagers.only-form', $data);
        }
        return view('stisla.messagers.form', $data);
    }

    /**
     * delete user from db
     *
     * @param Messager $messager
     * @return Response
     */
    public function destroy(Messager $messager)
    {
        $this->messagerRepository->delete($messager->id);
        logDelete('Pengguna', $messager);
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
