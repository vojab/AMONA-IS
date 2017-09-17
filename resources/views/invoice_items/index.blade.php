@extends('layouts.app')

@section('content')
    <section class="content-header">

        <h1 class="data-table-header-title">Invoice Details</h1>

        @include('invoices.show_fields_datatable', ['invoice' => $invoice])

        <br>

        <h1 class="pull-left">Invoice Items</h1>

        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('createInvoiceItem', ['invoiceId' => $invoice->id]) !!}">Add New</a>
        </h1>

    </section>

    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('invoice_items.table')
            </div>
        </div>
    </div>
@endsection

