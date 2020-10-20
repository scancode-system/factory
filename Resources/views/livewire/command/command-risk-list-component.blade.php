<div class="table-responsive">
    <table class="table table-striped table-borderless table-hover ">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Referência</th>
                <th scope="col">Molde</th>
                <th scope="col" class="text-center">Tamanho</th>
                <th scope="col" class="text-center">Unidades</th>
                <!--<th scope="col" class="text-center">Real</th>
                        <th scope="col" class="text-center">Peso</th>-->
                <th scope="col" class="text-right">Opções</th>
            </tr>
        </thead>
        <tbody>
            @foreach($command_risks as $command_risk)
            <tr>
                <td class="align-middle">{{ $command_risk->reference->code }}</td>
                <td class="align-middle ">{{ $command_risk->shape->name }}</td>
                <td class="align-middle text-center">{{ $command_risk->size->name }}</td>
                <td class="align-middle text-center">{{ $command_risk->units }}</td>
                <td class="text-right">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        {{ Form::button('<i class="cil-pencil"></i>', ['class' => 'btn btn-secondary', 'wire:click' => 'edit('.$command_risk->id.')']) }}
                        {{ Form::button('<i class="cil-trash"></i>', ['class' => 'btn btn-danger', 'data-toggle' => 'modal', 'data-target' => '#commandFabricDestroy'.$command_risk->id]) }}


                    </div>

                    <div class="modal fade" id="commandRiskDestroy{{ $command_risk->id }}" tabindex="-1" role="dialog" aria-labelledby="commandRiskDestroy{{ $command_risk->id }}Label" aria-hidden="true">
                        <div class="modal-dialog modal-smd" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="commandRiskDestroy{{ $command_risk->id }}Label">Confirmação</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Este registro sera deletado, caso confirme não tera como recupera-lo posteriormente. Deseja realmente prosseguir?</p>
                                </div>
                                <div class="card-footer text-muted d-flex justify-content-between ">
                                    {{ Form::button('Sim', ['class' => 'btn btn-danger', 'wire:click' => '$emit("commandFabricDestroyHide", '.$command_risk->id.')']) }}
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
                    <div class="form-group">
                        {{ Form::label('reference_name', 'Referência:', ['class' => 'col-form-label']) }}
                        {{ Form::text('reference_name', null, ['class' => 'form-control', 'wire:model' => 'reference_name', 'disabled']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('shape_name', 'Molde:', ['class' => 'col-form-label']) }}
                        {{ Form::text('shape_name', null, ['class' => 'form-control', 'wire:model' => 'shape_name', 'disabled']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('size_name', 'Tamanho:', ['class' => 'col-form-label']) }}
                        {{ Form::text('size_name', null, ['class' => 'form-control', 'wire:model' => 'size_name', 'disabled']) }}
                    </div>
                    <div class="row">
                        <div class="col">
                            {{ Form::label('units', 'Unidades:', ['class' => 'col-form-label']) }}
                            {{ Form::selectRange('units', 0, 30, null, ['class' => 'form-control', 'wire:model' => 'units']) }}
                        </div>
                    </div>
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
            Livewire.emit('destroy', command_fabric_id);
        });
    });

    window.addEventListener('openEditCommandFabricModal', event => {
        (new coreui.Modal(document.getElementById('editCommandFabricModal'), {})).show();
    });

    window.addEventListener('editCommandFabricModalClose', event => {
        (coreui.Modal.getInstance(document.getElementById('editCommandFabricModal'))).hide();
    });
</script>