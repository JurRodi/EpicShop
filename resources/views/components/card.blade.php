<a href="/products/{{ $id }}" class="text-decoration-none">
    <div class="col-md-4">
        <div class="card mb-4 shadow-sm" style="height:30rem">
            <img class="card-img-top" src="{{ $image }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title text-info">{{ $name }}</h5>
                <p class="card-text text-body">{{ $description }}</p>
                <div class="container d-flex justify-content-between align-items-center bg-danger rounded py-1 px-3">
                    <small class="text-light">{{ $price }}</small>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="/products/edit/{{ $id }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                        <form action="/products/delete/{{ $id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-secondary">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</a>