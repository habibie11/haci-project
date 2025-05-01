<?php

namespace App\Repositories;

use App\Models\Layanan;

class LayananRepository extends Repository
{

    /**
     * constructor method
     *
     * @return void
     */
    public function __construct()
    {
        $this->model = new Layanan();
    }
}
