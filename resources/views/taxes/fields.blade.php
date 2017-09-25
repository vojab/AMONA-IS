<!-- Name Field -->
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

<!-- Percentage Field -->
<div class="form-group col-sm-6">
    {!! Form::label('percentage', 'Percentage:') !!}
    {!! Form::number('price', null, ['class' => 'form-control', 'step' => '0.1', 'min' => '0']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('taxes.index') !!}" class="btn btn-default">Cancel</a>
</div>
