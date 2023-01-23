@extends('layouts/app')

@section('content')
    @if (session()->has('cart'))
        @component('components/order')
            @slot('title')
                {{ 'Shopping Cart' }}
            @endslot
        @endcomponent
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="/cart/order" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success mt-3">Buy</button>
                    </form>
                </div>
            </div>
        </div>
    @else
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3>Shopping Cart</h3>
                        </div>
                        <div class="card-body">
                            <p>Your cart is empty</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection