@extends('layouts.layout')

@section('title', $currency->title)

@section('content')
    <div class="currency">
        <h1>Currency info</h1>
        <div class="h2">
            <img src="{{ $currency->logo_url }}" alt="logo">
            <span>{{ $currency->title }}</span>
            <small>({{ $currency->short_name }}): </small>
            <span>{{ $currency->price }} USD</span>
        </div>
        @include('currency.pieces.edit-button', ['id' => $currency->id])
        @include('currency.pieces.delete-button', ['id' => $currency->id])
    </div>
@endsection
