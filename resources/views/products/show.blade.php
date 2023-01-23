@extends('layouts/app')

@section('content')
    <div class="card container-sm mb-3 p-0 w-50 d-flex" style="width: 70%" >
        <div class="card-img-right w-100 h-100 bg-light" >
            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="rounded h-100 w-100" style="object-fit: cover">
        </div>
        <div class="card-body">
        <h5 class="card-title text-info">{{ $product->name }}</h5>
        <p class="card-text text-body">{{ $product->description }}</p>
        <h5>Category:</h5>
        <p class="card-text text-body">{{ $product->category }}</p>
        <div class="buttons d-flex justify-content-between mt-3 ">
            <div class="bg-danger rounded py-1 px-3" style="width:3rem">
                <small class="text-light">{{ $product->price }}</small>
            </div>
            @if(Auth::check())
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="/products/edit/{{ $product->id }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                        <form action="/products/delete/{{ $product->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-secondary">Delete</button>
                        </form>
                    </div>
                </div>
            @else
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="/products/add-to-cart/{{ $product->id }}" class="btn btn-sm btn-outline-secondary">add to cart</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
