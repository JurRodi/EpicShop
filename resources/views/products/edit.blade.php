@extends('layouts/app')

@section('content')
    @if($errors->any())
        @component('components/alert')
            @slot('type')
                danger
            @endslot
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        @endcomponent
    @endif

    @if($flash = session('message'))
        @component('components/alert')
            @slot('type')
                success
            @endslot
            {{ $flash }}
            <a href="/products/{{ $product->id }}" class="">Back to product</a>
        @endcomponent
    @endif
    <div class="card container-sm mb-3 p-0 w-25" >
        <div class="card-img-top w-100 h-50 bg-light">
            <img src="{{ $product->image }}" alt="Product image" class="rounded img-fluid h-100 w-100">
        </div>
        <div class="card-body">
            <form method="POST" action="/products/update/{{ $product->id }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ $product->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <input type="text" class="form-control" id="category" name="category" value="{{ $product->category }}">
                </div>
                <button type="submit" class="btn btn-info">Submit</button>
            </form>
        </div>
    </div>
@endsection
