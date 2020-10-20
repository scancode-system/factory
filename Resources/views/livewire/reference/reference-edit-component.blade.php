<div class="card">
    <div class="card-header">
        <h4 class="m-0">Editar Referência</h4>
    </div>
    <div class="card-body">
    <div class="form-group">
            {{ Form::label('reference_id', 'Identificador') }}
            {{ Form::text('reference_id', null, ['class' => 'form-control', 'wire:model' => 'reference_id', 'disabled' => 'disabled']) }}
        </div>
        <div class="form-group">
            {{ Form::label('reference_category_id', 'Categoria') }}
            @if($errors->get('reference_category_id'))
            {{ Form::select('reference_category_id', $reference_categories_names, null, ['class' => 'form-control is-invalid', 'wire:model' => 'reference_category_id']) }}
            @else
            {{ Form::select('reference_category_id', $reference_categories_names, null, ['class' => 'form-control', 'wire:model' => 'reference_category_id']) }}
            @endif
            @error('reference_category_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-group">
            {{ Form::label('model', 'Modelo') }}
            @if($errors->get('model'))
            {{ Form::text('model', null, ['class' => 'form-control is-invalid', 'wire:model' => 'model']) }}
            @else
            {{ Form::text('model', null, ['class' => 'form-control', 'wire:model' => 'model']) }}
            @endif
            @error('model')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="card-footer text-muted">
    {{ Form::button('Atualizar', ['class' => 'btn btn-primary', 'wire:click' => 'update('.$reference_id.')']) }}
    </div>
</div>