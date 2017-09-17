@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row warehouse-header">

        <div class="col-md-1">#</div>
        <div class="col-md-2">Product Code</div>
        <div class="col-md-7">Product Name</div>
        <div class="col-md-2">Quantity</div>

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

                <div class="col-md-7">

                    {{ $warehouseDataItem->productName }}

                </div>


                <div class="col-md-2">

                    {{ $warehouseDataItem->totalQuantity }}

                </div>

        </div>

    @endforeach

</div>

@endsection
