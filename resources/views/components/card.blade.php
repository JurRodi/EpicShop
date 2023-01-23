<a href="/products/{{ $id }}" class="text-decoration-none">
    <div class="col-md-4">
        <div class="card mb-4 shadow-sm" style="height:38rem">
            <img class="card-img-top" src="{{ $image }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title text-info">{{ $name }}</h5>
                <p class="card-text text-body">{{ $description }}</p>
                <div class="buttons d-flex justify-content-between mt-3">
                    <div class="container d-flex justify-content-between align-items-center bg-danger rounded py-1 px-3" style="width:3rem">
                        <small class="text-light">{{ $price }}</small>
                    </div>
                    @if(Auth::check())
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="/products/edit/{{ $id }}" class="btn btn-sm btn-outline-secondary rounded">Edit</a>
                                <form action="/products/delete/{{ $id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-secondary mx-1">Delete</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a></a>
                                <form action="/cart/add/{{ $id }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-secondary mx-1">Add to cart</button>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</a>