@foreach ($products as $product)
    <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
            <img class="card-img-top" src="{{ $product->image }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ $product->description }}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">{{ $product->price }}</small>
                </div>
            </div>
        </div>
    </div>
@endforeach