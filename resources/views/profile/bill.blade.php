<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.18.0/css/mdb.min.css" rel="stylesheet">

<title>Bill for {{auth()->user()->name}}</title>
<style>

</style>
</head>
<body>


<div class="jumbotron">
    <div class="d-flex justify-content-center align-items-center">
        <img src="{{asset('assets/images/logo/logo-transparent-long.png')}}" alt="" class="mr-5"style="width:150px;filter:drop-shadow(0 0 6px #2a2a2a80);">
        <h1 class="text-center" style="font-weight:bold">Assistante</h1>
    </div>
    <div class="row pl-5 mt-5 d-flex justify-content-center">
        <div class="col-md-8">
            <p>
                <strong>Name:</strong> {{auth()->user()->name}}
            </p>
            <p>
                <strong>Address</strong>: {{auth()->user()->profile->address}}
            </p>
            <p>
                <strong>Phone</strong>: {{auth()->user()->profile->phone}}
            </p>
        </div>
        <div class="col-md-2 col-md-offset-2">
            <p>
                <strong>Date</strong>: {{date("Y M j")}}

            </p>
            <p>
                <strong>Bill No</strong>: {{auth()->user()->id}}{{time()}}
            </p>
        </div>
    </div>
</div>
<div class="container">
    <table class="table" >
        <thead class="thead">
            <tr class="tr">
                <th>SN</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Rate</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody class="tbody">
            <?php $count = 1;$itemTotal = 0;$grandTotal=0?>
            @foreach (session('cart') as $id=>$item)
                <tr class="tr">
                    <td style="vertical-align: middle;">
                        <h6>{{$count}}</h6>
                    </td>
                    <td style="vertical-align: middle;">
                        <h6>{{$item['name']}}</h6>
                    </td>
                    <td style="vertical-align: middle;">
                        <h6>{{$item['quantity']}}</h6>
                    </td>
                    <td style="vertical-align: middle;">
                        <h6>{{$item['price']}}</h6>
                    </td>
                    <td style="vertical-align: middle;">
                        <?php $itemTotal = $item['price']*$item['quantity'];?>
                        {{$itemTotal}}
                    </td>
                </tr>
                <?php
                $count++;
                $grandTotal = $grandTotal + $item['price']*$item['quantity'];
                ?>
            @endforeach
        </tbody>
    </table>
    <div class="row" style="text-align:right">
        <div class="d-flex align-items-center" style="width:100%;justify-content:space-around">
            <p class="text-align-right" style="text-align:right">
                Grand Total: {{$grandTotal}}
            </p>
            <div class="signature">
                <div class="d-flex">
                    <img src="{{asset('assets/images/logo/sign-transparent.png')}}"  style="width:70px"alt="">

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
