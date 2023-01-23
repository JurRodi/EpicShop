@extends('layouts/app')

@section('content')
    @if ($orders->count() > 0)
        @foreach($orders as $order)
            @component('components/order')
                @slot('title')
                    {{ 'Order'. $order->id }}
                @endslot
            @endcomponent
        @endforeach
    @else
        <div class="container">
            <h2>No orders</h2>
        </div>
    @endif
@endsection