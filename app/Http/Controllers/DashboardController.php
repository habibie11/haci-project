<?php

namespace App\Http\Controllers;

use App\Models\Messager;
use App\Models\User;
use App\Repositories\SettingRepository;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Role;

class DashboardController extends StislaController
{

    /**
     * constructor method
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        // $this->middleware('can:Log Aktivitas');
    }

    /**
     * Menampilkan halaman dashboard
     *
     */
    public function index()
    {
        $widgets = [];
        $user = auth()->user();

        // setting data widget disini
        if ($user->can('Pengguna'))
            $widgets[] = (object) [
                'title' => 'Pengguna',
                'count' => User::count(),
                'bg' => 'danger',
                'icon' => 'users',
                'route' => route('user-management.users.index'),
            ];
        if ($user->can('Role'))
            $widgets[] = (object) [
                'title' => 'Role',
                'count' => Role::count(),
                'bg' => 'success',
                'icon' => 'lock',
                'route' => route('user-management.roles.index')
            ];
        if ($user->can('Pengaturan'))
            $widgets[] = (object) [
                'title' => 'Pengaturan',
                'count' => '6',
                'bg' => 'success',
                'icon' => 'cogs',
                'route' => route('settings.all'),
                'bg_color' => '#E9D66B',
            ];
        if ($user->can('Pesan Layanan'))
            $widgets[] = (object) [
                'title' => 'Pesan Layanan',
                'count' => Messager::count(),
                'bg' => 'info',
                'icon' => 'message',
                'route' => route('messagers.index'),
                'bg_color' => '#007bff',
            ];
        $data = DB::table('visitors')
            ->selectRaw('DATE(visited_at) as tanggal, COUNT(*) as total')
            ->groupByRaw('DATE(visited_at)')
            ->orderBy('tanggal')
            ->get();

        $labels = $data->pluck('tanggal')->toArray();
        $values = $data->pluck('total')->toArray();

        return view('stisla.dashboard.index', [
            'widgets' => $widgets,
            'user' => $user,
            'labels' => $labels,
            'values' => $values,
        ]);
    }

    public function post(Request $request)
    {
        $request->validate([
            'file_upload' => 'required|file|max:102048',
        ]);
        $link = $this->fileService->uploadFile($request->file('file_upload'), 'file_upload');
        auth()->user()->update(['file_upload' => $link]);
        return redirect()->back()->with('successMessage', 'File berhasil diupload');
    }

    /**
     * home page / halaman depan
     *
     * @return Response
     */
    public function home()
    {
        return view('stisla.homes.index', [
            'title' => __('Selamat datang di ') . SettingRepository::applicationName(),
        ]);
    }
}
