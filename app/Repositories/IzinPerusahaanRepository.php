<?php

namespace App\Repositories;

use App\Models\IzinPerusahaan;
use Illuminate\Http\Response;

class IzinPerusahaanRepository extends Repository
{

    /**
     * constructor method
     *
     * @return void
     */
    public function __construct()
    {
        $this->model = new IzinPerusahaan();
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
            'logo' => fn(IzinPerusahaan $item) => view('stisla.crud-examples.image', ['file' => $item->logo, 'item' => $item]),
            'created_at' => '{{\Carbon\Carbon::parse($created_at)->addHour(7)->format("Y-m-d H:i:s")}}',
            'updated_at' => '{{\Carbon\Carbon::parse($updated_at)->addHour(7)->format("Y-m-d H:i:s")}}',
            'action' => function (IzinPerusahaan $crudExample) use ($additionalParams) {
                $isAjaxYajra = request('isAjaxYajra') == 1;
                $data = array_merge($additionalParams ? $additionalParams : [], [
                    'item' => $crudExample,
                    'isAjaxYajra' => $isAjaxYajra,
                ]);
                return view('stisla.includes.forms.buttons.btn-action', $data);
            }
        ];
        $params = [
            'editColumns' => $editColumns,
            'rawColumns' => ['logo'],
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
            ['data' => 'nomor', 'name' => 'nomor'],
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
