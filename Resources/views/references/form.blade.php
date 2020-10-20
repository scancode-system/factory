<div class="form-group">
    {{ Form::label('Descrição') }}
    {{ Form::text('description', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('Categoria') }}
    {{ Form::select('reference_category_id', [], null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('Modelo') }}
    {{ Form::text('model', null, ['class' => 'form-control']) }}
</div>