@php
$isExport = $isExport ?? false;
// dd($isExport);
@endphp

<table class="table table-striped yajra-datatable" @if ($isYajra===false) id="datatable" @endif @if ($isExport===false
  && $canExport) data-export="true" data-title="{{ __('Contoh CRUD') }}" @endif>
  <thead>
    <tr>
      @if ($isExport)
      <th class="text-center">#</th>
      @else
      <th>{{ __('No') }}</th>
      @endif
      <th>{{ __('Grup Menu') }}</th>
      <th>{{ __('Nama Menu') }}</th>
      <th>{{ __('Route Name') }}</th>
      <th>{{ __('Uri') }}</th>
      <th>{{ __('Icon') }}</th>
      <th>{{ __('Is Blank') }}</th>
      <th>{{ __('Permission') }}</th>
      <th>{{ __('Is Active If Url Includes') }}</th>
      <th>{{ __('Parent Menu') }}</th>
      <th>{{ __('Aktif') }}</th>
      <th>{{ __('Created At') }}</th>
      <th>{{ __('Updated At') }}</th>
      @if ($isExport === false && ($canUpdate || $canDelete || $canDetail))
      <th>{{ __('Aksi') }}</th>
      @endif
    </tr>
  </thead>
  <tbody>
    @if ($isYajra === false)
    @foreach ($data as $item)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $item->group->group_name ?? '-' }}</td>
      <td>{{ $item->menu_name }}</td>
      <td>{{ $item->route_name }}</td>
      <td>{{ $item->uri }}</td>
      <td>
        {{ $item->icon }}
        <br>
        <i class="{{ $item->icon }}"></i>
      </td>
      <td>
        @if ($item->is_blank == 1)
        <span class="badge badge-success">Ya</span>
        @else
        <span class="badge badge-danger">Tidak</span>
        @endif
      </td>
      <td>{{ $item->permission }}</td>
      <td>{{ $item->is_active_if_url_includes }}</td>
      <td>{{ $item->parentMenu->menu_name ?? '-' }}</td>
      <td>
        @if ($item->active == 1)
        <span class="badge badge-success">Ya</span>
        @else
        <span class="badge badge-danger">Tidak</span>
        @endif
      </td>
      <td>{{ $item->created_at }}</td>
      <td>{{ $item->updated_at }}</td>

      @if ($isExport === false)
      @include('stisla.menu-managements.action')
      @endif
    </tr>
    @endforeach
    @endif
  </tbody>
</table>