<?php

namespace App\Repositories;

use App\Models\Pricing;
use Illuminate\Http\Response;

class PricingRepository extends Repository
{

    /**
     * constructor method
     *
     * @return void
     */
    public function __construct()
    {
        $this->model = new Pricing();
    }

    /**
     * get data for yajra datatables
     *
     * @param mixed $params
     * @return Response
     */
    public function getYajraDataTables($additionalParams = null)
    {
        $query = $this->query()->when(request('order')[0]['column'] == 0, function ($query) {
            $query->latest();
        });
        // dd($query);
        $editColumns = [
            'logo' => fn(Pricing $item) => view('stisla.crud-examples.image', ['file' => $item->logo, 'item' => $item]),
            'created_at' => '{{\Carbon\Carbon::parse($created_at)->addHour(7)->format("Y-m-d H:i:s")}}',
            'updated_at' => '{{\Carbon\Carbon::parse($updated_at)->addHour(7)->format("Y-m-d H:i:s")}}',
            'kategori' => fn(Pricing $item) => ucwords(str_replace('_', ' ', $item->kategori)),
            'is_special_offer' => fn(Pricing $item) => $item->is_special_offer ? '<span class="badge badge-success">Ya</span>' : '<span class="badge badge-danger">Tidak</span>',
            'action' => function (Pricing $crudExample) use ($additionalParams) {
                $isAjaxYajra = request('isAjaxYajra') == 1;
                $data = array_merge($additionalParams ? $additionalParams : [], [
                    'item' => $crudExample,
                    'isAjaxYajra' => $isAjaxYajra,
                ]);
                return view('stisla.includes.forms.buttons.btn-action', $data);
            }
        ];
        // $editColumns = [
        //     'logo' => fn(Pricing $item) => view('stisla.crud-examples.image', ['file' => $item->logo, 'item' => $item]),
        //     'nama' => fn(Pricing $item) => $item->nama,
        //     'kecepatan' => fn(Pricing $item) => $item->kecepatan,
        //     'benefit' => fn(Pricing $item) => $item->benefit,
        //     'harga' => fn(Pricing $item) => number_format($item->harga, 2),
        //     'created_at' => '{{\Carbon\Carbon::parse($created_at)->addHour(7)->format("Y-m-d H:i:s")}}',
        //     'updated_at' => '{{\Carbon\Carbon::parse($updated_at)->addHour(7)->format("Y-m-d H:i:s")}}',
        //     'action' => function (Pricing $crudExample) use ($additionalParams) {
        //         $isAjaxYajra = request('isAjaxYajra') == 1;
        //         $data = array_merge($additionalParams ? $additionalParams : [], [
        //             'item' => $crudExample,
        //             'isAjaxYajra' => $isAjaxYajra,
        //         ]);
        //         return view('stisla.includes.forms.buttons.btn-action', $data);
        //     }
        // ];
        $params = [
            'editColumns' => $editColumns,
            'rawColumns' => ['logo', 'is_special_offer'],
        ];
        return $this->generateDataTables($query, $params);
    }

    /**
     * get yajra columns
     *
     * @return string
     */
    public function getYajraColumns()
    {
        return json_encode([
            [
                'data' => 'DT_RowIndex',
                'name' => 'DT_RowIndex',
                'searchable' => false,
                'orderable' => false
            ],
            ['data' => 'logo', 'name' => 'logo'],
            ['data' => 'nama', 'name' => 'nama'],
            ['data' => 'kecepatan', 'name' => 'kecepatan'],
            ['data' => 'benefit', 'name' => 'benefit'],
            ['data' => 'harga', 'name' => 'harga'],
            ['data' => 'kategori', 'name' => 'kategori'],
            ['data' => 'is_special_offer', 'name' => 'is_special_offer'],
            ['data' => 'created_at', 'name' => 'created_at'],
            ['data' => 'updated_at', 'name' => 'updated_at'],
            [
                'data' => 'action',
                'name' => 'action',
                'orderable' => false,
                'searchable' => false
            ],
        ]);
    }
}
