@extends ("layouts.app")

@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="border-bottom">Products</h1>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route("update.product") }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$product->id}}">
                <div class="row">
                    <div class="form-group col">
                        <label for="title"></label>
                        <input type="text" value="{{$product->title}}" name="title" placeholder="Product Title"
                            class="form-control">
                    </div>
                    <div class="form-group col">
                        <label for="price"></label>
                        <input type="text" value="{{$product->price}}" name="price" placeholder="Price"
                            class="form-control">
                    </div>
                    <div class="form-group col">
                        <label for="stock"></label>
                        <input type="text" value="{{$product->stock}}" name="stock" placeholder="Stock"
                            class="form-control">
                    </div>
                    <div class="form-group col">
                        <label for="stock"></label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group col mt-2">
                        <label for="stock"></label>
                        <input class="btn btn-primary" type="submit" value="Update Product">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection