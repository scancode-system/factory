<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="m-0">Lista de Comandos</h4>
        <div>
            <div class="input-group">
                {{ Form::text('search', $search, ['class' => 'form-control', 'placeholder' => 'Pesquisar Comando', 'wire:model' => 'search']) }}
                <span class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <svg class="c-icon m-0">
                            <use xlink:href="modules/factory/coreui/dist/vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                        </svg>
                    </button>
                </span>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-borderless table-hover ">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Coleção</th>
                        <th scope="col">Código</th>
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col" class="text-center">Aberto</th>
                        <th scope="col" class="text-center">Fechado</th>
                        <th scope="col" class="text-right">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($commands as $command)
                    <tr>
                        <td class="align-middle">{{ $command->collection->name }}</td>
                        <td class="align-middle">{{ $command->code }}</td>
                        <td class="align-middle text-center"><span class="badge bg-{{ $command->status->color }}">{{ $command->status->name }}</span></td>
                        <td class="align-middle text-center">{{ $command->created_at }}</td>
                        <td class="align-middle text-center">{{ $command->closed_at }}</td>
                        <td class="text-right">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('commands.edit', $command->id) }}" class="btn btn-secondary"><i class="cil-pencil"></i></a>
                                {{ Form::button('<i class="cil-trash text-white white"></i>', ['class' => 'btn btn-danger', 'data-toggle' => 'modal', 'data-target' => '#commandsDestroy'.$command->id]) }}
                            </div>
                        </td>
                    </tr>
                    <div class="modal fade" id="commandsDestroy{{ $command->id }}" tabindex="-1" role="dialog" aria-labelledby="commandsDestroy{{ $command->id }}Label" aria-hidden="true">
                        <div class="modal-dialog modal-smd" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="commandsDestroy{{ $command->id }}Label">Confirmação</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Este registro sera deletado, caso confirme não tera como recupera-lo posteriormente. Deseja realmente prosseguir?</p>
                                </div>
                                <div class="card-footer text-muted d-flex justify-content-between ">
                                    {{ Form::button('Sim', ['class' => 'btn btn-danger', 'wire:click' => '$emit("hideModalAndDestroy", '.$command->id.')']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer text-muted d-flex justify-content-between ">
        {{ Form::button('Novo Comando', ['class' => 'btn btn-primary', 'data-toggle' => 'modal', 'data-target' => '#createCommand']) }}
        {{ $commands->links() }}
    </div>

    <div wire:ignore.self class="modal fade" id="createCommand" tabindex="-1" role="dialog" aria-labelledby="createReference" aria-hidden="true">
        <div class="modal-dialog" role="document" aria-modal="true">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createReference">Novo Comando</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {{ Form::label('collection_id', 'Coleção') }}
                        @if($errors->get('collection_id'))
                        {{ Form::select('collection_id', $select_collections, null, ['class' => 'form-control is-invalid', 'wire:model' => 'collection_id']) }}
                        @else
                        {{ Form::select('collection_id', $select_collections, null, ['class' => 'form-control', 'wire:model' => 'collection_id']) }}
                        @endif
                        @error('collection_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{ Form::label('code', 'Código') }}
                        @if($errors->get('code'))
                        {{ Form::text('code', null, ['class' => 'form-control is-invalid', 'wire:model' => 'code']) }}
                        @else
                        {{ Form::text('code', null, ['class' => 'form-control', 'wire:model' => 'code']) }}
                        @endif
                        @error('code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    {{ Form::button('Fechar', ['class' => 'btn btn-secondary', 'data-dismiss' => 'modal']) }}
                    {{ Form::button('Salvar', ['class' => 'btn btn-primary', 'wire:click' => 'store']) }}
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        Livewire.on('hideModalAndDestroy', command_id => {
            (coreui.Modal.getInstance(document.getElementById('commandsDestroy' + command_id))).hide();
            Livewire.emit('destroy', command_id);
        })
    });

    window.addEventListener('commandModalClose', event => {
        (coreui.Modal.getInstance(document.getElementById('createCommand'))).hide();
    });
</script>