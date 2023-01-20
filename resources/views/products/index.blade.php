@extends('layouts/app')

@section('content')
    @foreach ($products as $product)
        @component('components/card')
            @slot('id')
                {{ $product->id }}
            @endslot
            @slot('name')
                {{ $product->name }}
            @endslot
            @slot('description')
                {{ $product->description }}
            @endslot
            @slot('price')
                {{ $product->price }}
            @endslot
            @slot('image')
                {{ $product->image }}
            @endslot
        @endcomponent
    @endforeach
@endsection