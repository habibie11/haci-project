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
        // $data = json_decode(file_get_contents(database_path('seeders/data/menus.json')), true);
        $data = config('stisla.settings.home');
        foreach ($data as $item) {
            $this->execute($item);
        }
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
