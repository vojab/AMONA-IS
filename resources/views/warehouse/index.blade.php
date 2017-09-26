@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row warehouse-header">

        <div class="col-md-1">#</div>
        <div class="col-md-2">Code</div>
        <div class="col-md-5">Name</div>
        <div class="col-md-2">Price</div>
        <div class="col-md-1">Qty</div>
        <div class="col-md-1">St</div>

    </div>

    <br>

    @foreach($warehouseDataArray as $key => $warehouseDataItem)

        <div class="row warehouse-item">

            <div class="col-md-1">

                {{ ++$key }}

            </div>

            <div class="col-md-2">

                {{ $warehouseDataItem->productCode }}

            </div>

            <div class="col-md-5">

                {{ $warehouseDataItem->productName }}

            </div>

            <div class="col-md-2">

                {{ $warehouseDataItem->productPrice }}

            </div>


            <div class="col-md-1">

                {{ $warehouseDataItem->totalQuantity }}

            </div>

            <div class="col-md-1">

                @if($warehouseDataItem->totalQuantity > \Config::get('app.quantity_warning_offset'))
                    <span class="glyphicon glyphicon-record green" aria-hidden="true"></span>
                @elseif($warehouseDataItem->totalQuantity >= 0 && $warehouseDataItem->totalQuantity <= \Config::get('app.quantity_warning_offset'))
                    <span class="glyphicon glyphicon-record orange" aria-hidden="true"></span>
                @elseif($warehouseDataItem->totalQuantity < 0)
                    <span class="glyphicon glyphicon-exclamation-sign red" aria-hidden="true"></span>
                @endif

            </div>

        </div>

    @endforeach

</div>

@endsection
