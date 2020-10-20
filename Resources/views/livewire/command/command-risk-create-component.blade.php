<div wire:ignore.self class="modal fade" id="createCommandRiskModal" tabindex="-1" role="dialog" aria-labelledby="createCommandRiskModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createCommandRiskModalLabel">Novo Risco no Comando</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        {{ Form::label('reference_id', 'Referência:', ['class' => 'col-form-label']) }}
                        @if($errors->get('reference_id'))
                        {{ Form::select('reference_id', $select_references, null, ['class' => 'form-control  is-invalid', 'wire:model' => 'reference_id', 'wire:change' => 'referenceChanged']) }}
                        @else
                        {{ Form::select('reference_id', $select_references, null, ['class' => 'form-control', 'wire:model' => 'reference_id', 'wire:change' => 'referenceChanged']) }}
                        @endif
                        @error('reference_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        {{ Form::label('shape_id', 'Molde:', ['class' => 'col-form-label']) }}
                        @if($errors->get('shape_id'))
                        {{ Form::select('shape_id', $select_shapes, null, ['class' => 'form-control is-invalid', 'wire:model' => 'shape_id']) }}
                        @else
                        {{ Form::select('shape_id', $select_shapes, null, ['class' => 'form-control', 'wire:model' => 'shape_id']) }}
                        @endif
                        @error('shape_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="row">
                        @foreach($sizes as $size)
                        <div class="col">
                            {{ Form::label($size->name, $size->name, ['class' => 'col-form-label']) }}
                            {{ Form::selectRange($size->name, 0, 30, null, ['class' => 'form-control', 'wire:model' => 'units.'.$size->id]) }}
                        </div>
                        @endforeach
                    </div>
            </div>
            <div class="modal-footer">
                {{ Form::button('Fechar', ['class' => 'btn btn-secondary', 'data-dismiss' => 'modal']) }}
                {{ Form::button('Confirmar', ['class' => 'btn btn-primary', 'wire:click' => 'store']) }}
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('closeCreateCommandRiskModal', event => {
        (coreui.Modal.getInstance(document.getElementById('createCommandRiskModal'))).hide();
    });



</script>