@extends('layouts.admin')
@section('content')
<div class="container flex-column" style="width:100%;height:100vh;display:flex; justify-content:center;align-items:center">
    @if(count($orders)<=0)
    <h3> There are No Orders Pending. </h3>
    @else
    <div class="table-container">

        <table class="table">
            <thead>
                <th> #</th>
                <th> User Name </th>
                <th> User Adress </th>
                <th> Phone Number</th>
                <th> Service Name </th>
                <th> Action </th>
            </thead>
            <tbody>

                @foreach($orders as $order)
                <tr>
                    <td> {{$order->id}} </td>
                    <td> {{$order->user->name}}</td>
                    <td> {{$order->user->profile->address}} </td>
                    <td> {{$order->user->profile->phone}} </td>
                    <td> {{$order->service->name}} </td>
                    <td> {!! Form::open(['route'=>['orders.delete',$order->id],'method'=>'post']) !!}
                        @method('DELETE')
                        <input type="submit" value="Completed" class="btn btn-success">
                    {!! Form::close() !!}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection



