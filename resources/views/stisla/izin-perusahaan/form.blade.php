@extends('stisla.layouts.app-form')

@section('rowForm')
@isset($d)
@method('PUT')
@endisset

@csrf
<div class="row">
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input-name', ['name' => 'nama', 'required' => true])
  </div>
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input', [
    'id' => 'nomor',
    'name' => 'nomor',
    'label' => __('Nomor Izin'),
    'type' => 'text',
    'required' => false,
    'icon' => 'fas fa-phone',
    ])
  </div>
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input', [
    'id' => 'logo',
    'name' => 'logo',
    'label' => __('Logo'),
    'type' => 'file',
    'required' => false,
    'icon' => 'fas fa-image',
    ])
  </div>
</div>
@endsection