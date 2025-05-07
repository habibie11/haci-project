@php
$isExport = $isExport ?? false;
$isAjax = $isAjax ?? false;
$isYajra = $isYajra ?? false;
$isAjaxYajra = $isAjaxYajra ?? false;
@endphp

<table class="table table-striped @if ($isYajra || $isAjaxYajra) yajra-datatable @endif" @if ($isYajra || $isAjaxYajra)
  data-ajax-url="{{ $routeYajra }}?isAjaxYajra={{ $isAjaxYajra }}" @else id="datatable" @endif @if ($isExport===false &&
  $canExport) data-export="true" data-title="{{ $title }}" @endif>
  <thead>
    <tr>
      <th class="text-center">#</th>
      <th>{{ __('Logo') }}</th>
      <th>{{ __('Nama') }}</th>
      <th>{{ __('No Izin') }}</th>
      <th>{{ __('Dibuat Pada') }}</th>
      @if (($canUpdate || $canDelete || ($canForceLogin && $item->id != auth()->id())) && $isExport === false)
      <th>{{ __('Aksi') }}</th>
      @endif
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $item)
    <tr>
      <td>{{ $loop->logo }}</td>
      <td>{{ $item->nama }}</td>
      <td>{{ $item->nomor }}</td>
      <td>{{ $item->created_at }}</td>
      @if (($canUpdate || $canDelete || ($canForceLogin && $item->id != auth()->id())) && $isExport === false)
      <td style="width: 150px;">
        @if ($canUpdate)
        @include('stisla.includes.forms.buttons.btn-edit', ['link' => route($routePrefix . '.edit', [$item->id])])
        @endif
        @if ($canDelete)
        @include('stisla.includes.forms.buttons.btn-delete', ['link' => route($routePrefix . '.destroy', [$item->id])])
        @endif
        @if ($canDetail)
        @include('stisla.includes.forms.buttons.btn-detail', ['link' => route($routePrefix . '.show', [$item->id])])
        @endif
      </td>
      @endif
    </tr>
    @endforeach
  </tbody>
</table>