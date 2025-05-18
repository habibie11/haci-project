<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuGroup;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = config('stisla.home');
        $this->execute($data);
    }

    public function execute(array $item)
    {
        foreach ($item as $key => $value) {
            Setting::create([
                'key' => $key,
                'value' => $value,
                'type' => 'home',
            ]);
        }
    }
}
