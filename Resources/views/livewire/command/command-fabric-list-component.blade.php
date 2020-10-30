<div class="table-responsive">
    <table class="table table-striped table-borderless table-hover ">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Tecido</th>
                <th scope="col" class="text-center">Cor</th>
                <th scope="col" class="text-center">Folhas</th>
                <th scope="col" class="text-center">Previsão</th>
                <th scope="col" class="text-right">Opções</th>
            </tr>
        </thead>
        <tbody>
            @foreach($command_fabrics as $command_fabric)
            <tr>
                <td class="align-middle">{{ $command_fabric->fabric->name }}</td>
                <td class="align-middle text-center">{{ $command_fabric->color->name }}</td>
                <td class="align-middle text-center">{{ $command_fabric->sheets }}</td>
                <td class="align-middle text-center">@kilo($command_fabric->prevision)</td>
                <td class="text-right">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        {{ Form::button('<i class="cil-pencil"></i>', ['class' => 'btn btn-secondary', 'wire:click' => 'editCommandFabric('.$command_fabric->id.')']) }}
                        {{ Form::button('<i class="cil-trash"></i>', ['class' => 'btn btn-danger', 'data-toggle' => 'modal', 'data-target' => '#commandFabricDestroy'.$command_fabric->id]) }}
                    </div>
                    <div class="modal fade" id="commandFabricDestroy{{ $command_fabric->id }}" tabindex="-1" role="dialog" aria-labelledby="commandFabricDestroy{{ $command_fabric->id }}Label" aria-hidden="true">
                        <div class="modal-dialog modal-smd" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="commandFabricDestroy{{ $command_fabric->id }}Label">Confirmação</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Este registro sera deletado, caso confirme não tera como recupera-lo posteriormente. Deseja realmente prosseguir?</p>
                                </div>
                                <div class="card-footer text-muted d-flex justify-content-between ">
                                    {{ Form::button('Sim', ['class' => 'btn btn-danger', 'wire:click' => '$emit("commandFabricDestroyHide", '.$command_fabric->id.')']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div wire:ignore.self class="modal fade" id="editCommandFabricModal" tabindex="-1" role="dialog" aria-labelledby="editFabricModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editFabricModalLabel">Editar Tecido no Comando</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            {{ Form::select('fabric_id', $select_fabric, null, ['class' => 'form-control', 'wire:model' => 'fabric_id', 'disabled']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::select('color_id', $select_color, null, ['class' => 'form-control', 'wire:model' => 'color_id', 'disabled' => 'disabled']) }}
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
                    {{ Form::button('Confirmar', ['class' => 'btn btn-primary', 'wire:click' => 'update']) }}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        Livewire.on('commandFabricDestroyHide', command_fabric_id => {
            (coreui.Modal.getInstance(document.getElementById('commandFabricDestroy' + command_fabric_id))).hide();
            Livewire.emit('destroyCommandFabric', command_fabric_id);
        });
    });

    window.addEventListener('openEditCommandFabricModal', event => {
        (new coreui.Modal(document.getElementById('editCommandFabricModal'), {})).show();
    });

    window.addEventListener('editCommandFabricModalClose', event => {
        (coreui.Modal.getInstance(document.getElementById('editCommandFabricModal'))).hide();
    });
</script>