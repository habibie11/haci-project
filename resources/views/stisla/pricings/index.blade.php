@php
$isAjax = $isAjax ?? false;
$isAjaxYajra = $isAjaxYajra ?? false;
@endphp

@extends('stisla.layouts.app-datatable')

@section('table')
@include('stisla.pricings.table')
@endsection