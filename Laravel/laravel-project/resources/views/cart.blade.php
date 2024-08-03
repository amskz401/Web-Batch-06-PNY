@extends ("layouts.app")

@section("content")
<section class="h-100">
    <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-10">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-normal mb-0">Shopping Cart</h3>

                </div>
                @if($cart)
                @foreach ($cart as $ca)
                <div class="card rounded-3 mb-4">
                    <div class="card-body p-4">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="col-md-2 col-lg-2 col-xl-2">
                                <img src="{{ $ca['image'] }}" class="img-fluid rounded-3" alt="Cotton T-shirt">
                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-3">
                                <p class="lead fw-normal mb-2">{{ $ca['title'] }}</p>
                                <p><span class="text-muted">Price: <span class="text-muted">{{ $ca['price'] }}</span>
                                </p>
                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2"
                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                    <i class="fas fa-minus"></i>
                                </button>

                                <input id="form1" min="0" name="quantity" value="2" type="number"
                                    class="form-control form-control-sm" />

                                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2"
                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                <h5 class="mb-0"> {{ $ca['price'] * $ca['quantity'] }} </h5>
                            </div>
                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="alert alert-info text-center">
                    <strong>Your cart is empty</strong>
                </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <a class="btn btn-warning btn-block btn-lg" href="{{ route("checkout.page") }}">Proceed to
                            Pay</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection