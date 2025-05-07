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
      <th>{{ __('Kecepatan') }}</th>
      <th>{{ __('Benefit') }}</th>
      <th>{{ __('Harga') }}</th>
      <th>{{ __('Kategori') }}</th>
      <th>{{ __('Spesial Offer') }}</th>
      <th>{{ __('Ditambahkan pada') }}</th>
      <th>{{ __('Diubah pada') }}</th>
      @if (($canUpdate || $canDelete || ($canForceLogin && $item->id != auth()->id())) && $isExport === false)
      <th>{{ __('Aksi') }}</th>
      @endif
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>