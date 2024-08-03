@extends ("layouts.app")

@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="border-bottom">Orders</h1>
        </div>
    </div>
    <p class="mt-4"></p>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <tr>
                    <th>#</th>
                    <th>TrID</th>
                    <th>Sub Total</th>
                    <th>Grand Total</th>
                    <th>Created At</th>
                </tr>
                @if( count($orders) > 0 )
                @foreach ($orders as $or)
                <tr>
                    <td>{{ $or->id }}</td>
                    <td>{{ $or->tranaction_id }}</td>
                    <td>{{ $or->sub_total }}</td>
                    <td>{{ $or->grand_total }}</td>
                    <td>{{ $or->created_at }}</td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="5" class="text-center"><strong>No Data Found!</strong></td>
                </tr>
                @endif
            </table>
        </div>

    </div>
</div>
@endsection