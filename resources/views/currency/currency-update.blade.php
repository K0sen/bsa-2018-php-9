@extends('layouts.layout')

@section('title', $currency->title . ' update')

@section('content')
    @include('currency.pieces.currency-form', ['currency' => $currency])
@endsection
