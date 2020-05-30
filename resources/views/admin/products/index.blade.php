@extends('layouts.admin')
@section('content')
<div class="container" style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);">
    <div class="row">
        <div class="col-md-7">
            <h1 class="text-white">
            All Products
        </h1>
        </div>
        <div class="col-md-5">
        <a href="{{route('products.create')}}" class="btn btn-primary">Add new Product</a>
        </div>
    </div>
    {!!$products->links()!!}
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th> Product Image</th>
                <th> Product Name</th>
                <th> Product Description </th>
                <th> Product Price </th>
                <th> Action </th>
            </tr>
        </thead>

        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td> {{$product->id}} </td>
                    <td>
                        <div style="width:100px;height:100px;border-radius:50%">
                            <img src="/storage/uploads/products/{{$product->image}}" style="width:100%;height:100%;object-fit:cover;border-radius:50%">
                        </div>
                    </td>
                    <td>{{$product->name}}</td>
                    <td> {{$product->description}}</td>
                    <td> {{$product->price}}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{route('products.edit',$product->id)}}" class="btn btn-warning"> Edit Product</a>
                            {!! Form::open(['route'=>['products.destroy',$product->id],'method'=>'POST']) !!}
                                @method('DELETE')
                                <input type="submit" value="Delete Product" class="btn btn-danger">
                            {!! Form::close() !!}
                        </div>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
