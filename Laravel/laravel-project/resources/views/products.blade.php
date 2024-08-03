@extends ("layouts.app")

@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="border-bottom">Products</h1>
            @if(Session::has("message"))
            <div class="alert alert-success">{{ Session::get("message") }}</div>
            @endif
        </div>
    </div>
    <p class="mt-4"></p>
    <div class="row">
        @foreach ($products as $prod)
        <div class="col-md-4">
            <div class="card">
                <img src="{{ $prod->image }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $prod->title }}</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="{{ route("add.to-cart", ["id" => $prod->id]) }}" class="btn btn-primary">Add To Cart</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection