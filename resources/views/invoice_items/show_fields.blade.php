<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $invoiceItem->id !!}</p>
</div>

<!-- Uuid Field -->
<div class="form-group">
    {!! Form::label('uuid', 'Uuid:') !!}
    <p>{!! $invoiceItem->uuid !!}</p>
</div>

<!-- Invoice Id Field -->
<div class="form-group">
    {!! Form::label('invoice_id', 'Invoice Id:') !!}
    <p>{!! $invoiceItem->invoice_id !!}</p>
</div>

<!-- Product Id Field -->
<div class="form-group">
    {!! Form::label('product_id', 'Product Id:') !!}
    <p>{!! $invoiceItem->product_id !!}</p>
</div>

<!-- Quantity Field -->
<div class="form-group">
    {!! Form::label('quantity', 'Quantity:') !!}
    <p>{!! $invoiceItem->quantity !!}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', 'Price:') !!}
    <p>{!! $invoiceItem->price !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $invoiceItem->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $invoiceItem->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $invoiceItem->deleted_at !!}</p>
</div>

