<div class="data-table-header-info">

    <div class="row">
        <div class="col-md-3"><p><b>ID: </b>{!! $invoice->id !!}</p></div>
        <div class="col-md-3"><p><b>UUID: </b>{!! $invoice->uuid !!}</p></div>
        <div class="col-md-3"><p><b>DATE: </b>{!! date('d.m.Y', strtotime($invoice->date)) !!}</p></div>
    </div>

    <div class="row">
        <div class="col-md-3"><p><b>CUSTOMER: </b>{!! $invoice->customer->name !!}</p></div>
        <div class="col-md-3"><p><b>TAX: </b>{!! $invoice->tax->percentage !!}%</p></div>
        <div class="col-md-6"><p><b>DISCOUNT: </b>{!! $invoice->discount !!}%</p></div>
    </div>

    <div class="row">
        <div class="col-md-3"><p><b>NAME: </b>{!! $invoice->name !!}</p></div>
        <div class="col-md-9"><p><b>DESCRIPTION: </b>{!! $invoice->description !!}</p></div>
    </div>

</div>