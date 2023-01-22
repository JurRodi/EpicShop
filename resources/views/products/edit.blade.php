@extends('layouts/app')

@section('content')
    <div class="card container-sm mb-3 p-0 w-25" >
        <div class="card-img-top w-100 h-50 bg-light"><img src="{{ $product->image }}" alt="Product image" class="rounded img-fluid h-100 w-100"></div>
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text" style="height: 72px">{{ $product->description }}</p>
        </div>
    </div>
@endsection