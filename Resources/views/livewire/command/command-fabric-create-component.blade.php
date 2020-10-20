<div wire:ignore.self class="modal fade" id="createCommandFabricModal" tabindex="-1" role="dialog" aria-labelledby="newFabricModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newFabricModalLabel">Novo Tecido no Comando</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        {{ Form::label('fabric_id', 'Tecido:', ['class' => 'col-form-label']) }}
                        @if($errors->get('fabric_id'))
                        {{ Form::select('fabric_id', $select_fabric, null, ['class' => 'form-control is-invalid', 'wire:model' => 'fabric_id']) }}
                        @else
                        {{ Form::select('fabric_id', $select_fabric, null, ['class' => 'form-control', 'wire:model' => 'fabric_id']) }}
                        @endif
                        @error('fabric_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{ Form::label('color_id', 'Cor:', ['class' => 'col-form-label']) }}
                        @if($errors->get('color_id'))
                        {{ Form::select('color_id', $select_color, null, ['class' => 'form-control is-invalid', 'wire:model' => 'color_id']) }}
                        @else
                        {{ Form::select('color_id', $select_color, null, ['class' => 'form-control', 'wire:model' => 'color_id']) }}
                        @endif
                        @error('color_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{ Form::label('sheets', 'Número de folhas:', ['class' => 'col-form-label']) }}
                        @if($errors->get('sheets'))
                        {{ Form::number('sheets', null, ['class' => 'form-control is-invalid', 'wire:model' => 'sheets']) }}
                        @else
                        {{ Form::number('sheets', null, ['class' => 'form-control', 'wire:model' => 'sheets']) }}
                        @endif
                        @error('sheets')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                {{ Form::button('Fechar', ['class' => 'btn btn-secondary', 'data-dismiss' => 'modal']) }}
                {{ Form::button('Confirmar', ['class' => 'btn btn-primary', 'wire:click' => 'store']) }}
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('commandFabricCreated', event => {
        (coreui.Modal.getInstance(document.getElementById('createCommandFabricModal'))).hide();
    });
</script>