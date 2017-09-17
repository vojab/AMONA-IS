<!-- Uuid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('uuid', 'Uuid:') !!}
    {!! Form::text('uuid', \App\Libraries\HelperLibrary::generateUUID(), ['class' => 'form-control', 'readonly']) !!}
</div>

{{--<!-- Invoice Id Field -->--}}
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('invoice_id', 'Invoice Id:') !!}--}}
{{--    {!! Form::number('invoice_id', null, ['class' => 'form-control']) !!}--}}
    {{--{!! Form::select('invoice_id', \App\Repositories\InvoiceRepository::getInvoicesForDropDown(), null, ['class' => 'form-control invoices-drop-down']) !!}--}}
{{--</div>--}}

<!-- Product Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_id', 'Product Id:') !!}
    {{--    {!! Form::number('product_id', null, ['class' => 'form-control']) !!}--}}
    {!! Form::select('product_id', \App\Repositories\ProductRepository::getProductsForDropDown(), null, ['class' => 'form-control products-drop-down']) !!}
</div>

<!-- Quantity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantity', 'Quantity:') !!}
    {!! Form::number('quantity', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Invoice Id Field -->
<div class="form-group col-sm-6">
    {!! Form::hidden('invoice_id', $invoice->id) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
{{--    <a href="{!! route('invoiceItems.index') !!}" class="btn btn-default">Cancel</a>--}}
</div>
