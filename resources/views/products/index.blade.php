<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Products</title>
</head>
<body>
    @include('_nav')

    <section class="m-5 d-flex flex-wrap">
        @foreach ($products as $product)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm" style="height:30rem">
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
    </section>
</body>
</html>
