<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $tax->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $tax->name !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $tax->description !!}</p>
</div>

<!-- Percentage Field -->
<div class="form-group">
    {!! Form::label('percentage', 'Percentage:') !!}
    <p>{!! $tax->percentage !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $tax->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $tax->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $tax->deleted_at !!}</p>
</div>

