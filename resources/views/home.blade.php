@extends('layouts.layout')

@section('content')
<div class="containe">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">Currency market</h1>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
