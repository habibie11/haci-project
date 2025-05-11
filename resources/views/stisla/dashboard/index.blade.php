@extends('stisla.layouts.app-table')

@section('title')
Dashboard
@endsection

@section('content')
<div class="section-header">
  <h1>{{ __('Dashboard') }}</h1>
</div>
<div class="row">
  <div class="col-12 mb-4">
    <div class="hero text-white hero-bg-image" data-background="{{ $_stisla_bg_home }}">
      <div class="hero-inner">
        <h2>{{ __('Selamat Datang') }}, {{ Auth::user()->name ?? 'Your Name' }}</h2>
        <p class="lead">{{ $_app_description }}</p>

        @if (auth()->user()->can('Profil'))
        <div class="mt-4">
          <a href="{{ route('profile.index') }}" class="btn btn-outline-white btn-lg btn-icon icon-left">
            <i class="far fa-user"></i> {{ __('Lihat Profil') }}
          </a>
        </div>
        @endif

      </div>
    </div>
  </div>

  @foreach ($widgets ?? range(1, 8) as $item)
  <div class="col-lg-3 col-md-3 col-sm-6 col-12">
    <div class="card card-statistic-1" @if ($item->route ?? false) onclick="openTo('{{ $item->route }}')" style="cursor:
      pointer;" @endif>
      @if (isset($item->bg_color))
      <div class="card-icon" style="background-color: {{ $item->bg_color }};">
        <i class="fas fa-{{ $item->icon ?? 'fire' }}"></i>
      </div>
      @else
      <div class="card-icon bg-{{ $item->bg }}">
        <i class="fas fa-{{ $item->icon ?? 'fire' }}"></i>
      </div>
      @endif
      <div class="card-wrap">
        <div class="card-header">
          <h4>{{ $item->title ?? 'Nama Modul' }}</h4>
        </div>
        <div class="card-body">
          {{ $item->count ?? $loop->iteration . '00' }}
        </div>
      </div>
    </div>
  </div>
  @endforeach

  <div class="col-lg-3 col-md-3 col-sm-6 col-12">
    <div class="card card-statistic-1" onclick="openTo('http://127.0.0.1:8000/crud-examples')" style="cursor: pointer;">
      <div class="card-icon bg-primary">
        <i class="fas fa-user-friends"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Pelanggan</h4>
        </div>
        <div class="card-body">
          26
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-6 col-12">
    <div class="card card-statistic-1" onclick="openTo('http://127.0.0.1:8000/user-management/users')"
      style="cursor: pointer;">
      <div class="card-icon bg-danger">
        <i class="fas fa-users"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Pengguna</h4>
        </div>
        <div class="card-body">
          4
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-6 col-12">
    <div class="card card-statistic-1" onclick="openTo('http://127.0.0.1:8000/user-management/roles')"
      style="cursor: pointer;">
      <div class="card-icon bg-success">
        <i class="fas fa-lock"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Role</h4>
        </div>
        <div class="card-body">
          3
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-6 col-12">
    <div class="card card-statistic-1" onclick="openTo('http://127.0.0.1:8000/notifications')" style="cursor: pointer;">
      <div class="card-icon" style="background-color: navy;">
        <i class="fas fa-bell"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Notifikasi</h4>
        </div>
        <div class="card-body">
          20
        </div>
      </div>
    </div>
  </div>

  <div class="col-12 col-md-6 col-lg-6">
    <div class="card">
      <div class="card-header">
        <h4>Line Chart</h4>
      </div>
      <div class="card-body">
        <canvas id="myChart"></canvas>
      </div>
    </div>
  </div>

  <div class="col-12 col-md-6 col-lg-6">
    <div class="card">
      <div class="card-header">
        <h4>Pie Chart</h4>
      </div>
      <div class="card-body">
        <canvas id="myChart4"></canvas>
      </div>
    </div>
  </div>

  {{-- sementara --}}
  {{-- @if ($user->can('Log Aktivitas'))
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4><i class="fa fa-clock-rotate-left"></i> {{ __('Log Aktivitas Terbaru') }}</h4>

      </div>
      <div class="card-body">
        <div class="table-responsive">

          <table class="table table-striped table-hovered" id="datatable">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th class="text-center">{{ __('Judul') }}</th>
                <th class="text-center">{{ __('Jenis') }}</th>
                <th class="text-center">{{ __('Request Data') }}</th>
                <th class="text-center">{{ __('Before') }}</th>
                <th class="text-center">{{ __('After') }}</th>
                <th class="text-center">{{ __('IP') }}</th>
                <th class="text-center">{{ __('User Agent') }}</th>
                <th class="text-center">{{ __('Pengguna') }}</th>
                <th class="text-center">{{ __('Role') }}</th>
                <th class="text-center">{{ __('Created At') }}</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($logs as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->activity_type }}</td>
                <td>
                  <textarea>{{ $item->request_data }}</textarea>
                </td>
                <td>
                  <textarea>{{ $item->before }}</textarea>
                </td>
                <td>
                  <textarea>{{ $item->after }}</textarea>
                </td>
                <td>{{ $item->ip }}</td>
                <td>{{ $item->user_agent }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ implode(', ', $item->roles) }}</td>
                <td>{{ $item->created_at }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @endif --}}


</div>
@endsection
@push('js')
<script src="{{ asset('stisla/node_modules/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ asset('stisla/assets/js/page/modules-chartjs.js') }}"></script>
<script>
  function openTo(link) {
      window.location.href = link;
    }
</script>
@endpush