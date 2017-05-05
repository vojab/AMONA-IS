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

<!-- Oib Field -->
<div class="form-group col-sm-6">
    {!! Form::label('oib', 'Oib:') !!}
    {!! Form::text('oib', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city', 'City:') !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
</div>

<!-- Post Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('post_code', 'Post Code:') !!}
    {!! Form::text('post_code', null, ['class' => 'form-control']) !!}
</div>

<!-- State Field -->
<div class="form-group col-sm-6">
    {!! Form::label('state', 'State:') !!}
    {!! Form::text('state', null, ['class' => 'form-control']) !!}
</div>

<!-- Country Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country', 'Country:') !!}
    {!! Form::text('country', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Number 1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone_number_1', 'Phone Number 1:') !!}
    {!! Form::text('phone_number_1', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Number 2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone_number_2', 'Phone Number 2:') !!}
    {!! Form::text('phone_number_2', null, ['class' => 'form-control']) !!}
</div>

<!-- Fax Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fax', 'Fax:') !!}
    {!! Form::text('fax', null, ['class' => 'form-control']) !!}
</div>

<!-- Email 1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email_1', 'Email 1:') !!}
    {!! Form::text('email_1', null, ['class' => 'form-control']) !!}
</div>

<!-- Email 2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email_2', 'Email 2:') !!}
    {!! Form::text('email_2', null, ['class' => 'form-control']) !!}
</div>

<!-- Web Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('web_address', 'Web Address:') !!}
    {!! Form::text('web_address', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('customers.index') !!}" class="btn btn-default">Cancel</a>
</div>
