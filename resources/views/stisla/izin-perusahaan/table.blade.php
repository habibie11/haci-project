@php
$isExport = $isExport ?? false;
$isAjax = $isAjax ?? false;
$isYajra = $isYajra ?? false;
$isAjaxYajra = $isAjaxYajra ?? false;
// dd([
// '$canUpdate' => $canUpdate,
// '$canDelete' => $canDelete,
// '$canForceLogin' => $canForceLogin,
// '$item' => isset($item) ? $item : null,
// 'auth_id' => auth()->id(),
// ]);
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
      <th>{{ __('Created At') }}</th>
      <th>{{ __('Updated At') }}</th>
      @if (($canUpdate || $canDelete || ($canForceLogin && $item->id != auth()->id())) && $isExport === false)
      <th>{{ __('Aksi') }}</th>
      @endif
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>