<!-- Uuid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('uuid', 'Uuid:') !!}
    {!! Form::text('uuid', \App\Libraries\HelperLibrary::generateUUID(), ['class' => 'form-control', 'readonly']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Customer Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer_id', 'Customer Id:') !!}
{{--    {!! Form::number('customer_id', null, ['class' => 'form-control']) !!}--}}
    {!! Form::select('customer_id', \App\Repositories\CustomerRepository::getCustomersForDropDown(), null, ['class' => 'form-control customers-drop-down']) !!}
</div>

<!-- Tax Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tax_id', 'Tax Id:') !!}
{{--    {!! Form::number('tax_id', null, ['class' => 'form-control']) !!}--}}
    {!! Form::select('tax_id', \App\Repositories\TaxRepository::getTaxesForDropDown(), null, ['class' => 'form-control taxes-drop-down']) !!}
</div>

<!-- Discount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('discount', 'Discount:') !!}
    {!! Form::number('discount', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('invoices.index') !!}" class="btn btn-default">Cancel</a>
</div>
