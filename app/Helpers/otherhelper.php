<?php

use App\Models\ActivityLog;
use App\Models\Menu;
use App\Repositories\SettingRepository;
use Illuminate\Http\JsonResponse;

function insertMenu(array $data)
{
    // foreach ($data as $item) {
    executeMenu($data);
    // }

}

function executeMenu(array $item)
{
    // $group = MenuGroup::updateOrCreate([
    //     'group_name' => $item['group_name']
    // ]);
    foreach ($item as $menu) {
        // dd($menu);
        // if ($menu['menu_name'] === 'Notifikasi' || $menu['menu_name'] === 'Profil') {
        //     continue;
        // }
        $menuObj = Menu::create([
            'menu_name' => $menu['menu_name'],
            'icon' => $menu['icon'],
            'route_name' => $menu['route_name'] ?? null,
            'uri' => $menu['uri'] ?? null,
            'permission' => $menu['permission'],
            'is_blank' => $menu['is_blank'] ?? false,
            'menu_group_id' => $group->id ?? null,
            'is_active_if_url_includes' => $menu['is_active_if_url_includes'],
        ]);
        foreach ($menu['childs'] ?? [] as $child) {
            Menu::create([
                'menu_name' => $child['menu_name'],
                'icon' => $child['icon'],
                'route_name' => $child['route_name'] ?? null,
                'uri' => $child['uri'] ?? null,
                'permission' => $child['permission'],
                'is_blank' => $child['is_blank'] ?? false,
                'parent_menu_id' => $menuObj->id,
                'is_active_if_url_includes' => $child['is_active_if_url_includes'],
            ]);
        }
    }
}

function active_template()
{
    return config('app.template');
}

function is_stisla_template()
{
    return active_template() === 'stisla';
}

function since()
{
    return SettingRepository::since();
}

function year()
{
    return since();
}

function app_name()
{
    return SettingRepository::appName();
}

function developer_name()
{
    return SettingRepository::developerName();
}

function developer_whatsapp()
{
    return SettingRepository::developerWhatsapp();
}

include 'LogHelper.php';
include 'ResponseHelper.php';
include 'MessageHelper.php';
include 'FileHelper.php';
include 'DateTimeHelper.php';
include 'ArrayHelper.php';
include 'NumberHelper.php';

if (!function_exists('encode_id')) {
    /**
     * make secure id
     *
     * @param $val
     * @return string
     */
    function encode_id($val = '')
    {
        $params = ['val' => $val];
        $secure = preg_replace('/[=]+$/', '', base64_encode(serialize($params)));
        return $secure;
    }
}

if (!function_exists('decode_id')) {
    /**
     * decode encrypted id
     *
     * @param string
     * @return int
     */
    function decode_id($val = '')
    {
        $secure = unserialize(base64_decode($val));
        return $secure['val'];
    }
}
