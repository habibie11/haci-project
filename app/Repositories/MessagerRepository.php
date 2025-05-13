<?php

namespace App\Repositories;

use App\Models\Messager;
use Illuminate\Http\Response;

class MessagerRepository extends Repository
{

    /**
     * constructor method
     *
     * @return void
     */
    public function __construct()
    {
        $this->model = new Messager();
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

        $editColumns = [
            'maps' => function (Messager $crudExample) {
                return '<a href="' . $crudExample->maps . '" target="_blank">View Map</a>';
            },
            'created_at' => '{{\Carbon\Carbon::parse($created_at)->addHour(7)->format("Y-m-d H:i:s")}}',
            'updated_at' => '{{\Carbon\Carbon::parse($updated_at)->addHour(7)->format("Y-m-d H:i:s")}}',
            'action' => function (Messager $crudExample) use ($additionalParams) {
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
            'rawColumns' => ['maps'],
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
            ['data' => 'nama', 'name' => 'nama'],
            ['data' => 'kebutuhan', 'name' => 'kebutuhan'],
            ['data' => 'no_wa', 'name' => 'no_wa'],
            ['data' => 'maps', 'name' => 'maps'],
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
