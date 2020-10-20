<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="m-0">Rendimentos - ({{ $reference->code }})</h4>
        {{ Form::button('Adicionar', ['class' => 'btn btn-primary', 'wire:click' => 'create']) }}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-borderless table-hover ">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Tecido</th>
                        <th scope="col">Molde</th>
                        <th scope="col" class="text-center">Comprimento</th>
                        <th scope="col" class="text-center">Unidades</th>
                        <th scope="col" class="text-center">Peso/Pç</th>
                        <th scope="col" class="text-center">Preço/Pç</th>
                        <th scope="col" class="text-right">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produces as $produce)
                    <tr>
                        <td class="align-middle">{{ $produce->fabric->name }}</td>
                        <td class="align-middle">{{ $produce->shape->name }}</td>
                        <td class="align-middle text-center">@meter($produce->length)</td>
                        <td class="align-middle text-center">{{ $produce->units }}</td>
                        <td class="align-middle text-center">@kilo($produce->weight)</td>
                        <td class="align-middle text-center">@currency($produce->price)</td>
                        <td class="text-right">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                {{ Form::button('<i class="cil-pencil"></i>', ['class' => 'btn btn-secondary', 'wire:click' => 'edit('.$produce->id.')']) }}
                                {{ Form::button('<i class="cil-trash text-white white"></i>', ['class' => 'btn btn-danger', 'data-toggle' => 'modal', 'data-target' => '#produceDestroy'.$produce->id]) }}
                            </div>
                        </td>
                    </tr>
                    <div class="modal fade" id="produceDestroy{{ $produce->id }}" tabindex="-1" role="dialog" aria-labelledby="produceDestroy{{ $produce->id }}Label" aria-hidden="true">
                        <div class="modal-dialog modal-smd" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="produceDestroy{{ $produce->id }}Label">Confirmação</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Este registro sera deletado, caso confirme não tera como recupera-lo posteriormente. Deseja realmente prosseguir?</p>
                                </div>
                                <div class="card-footer text-muted d-flex justify-content-between ">
                                    {{ Form::button('Sim', ['class' => 'btn btn-danger', 'wire:click' => '$emit("produceCloseDestroyModal", '.$produce->id.')']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="produceModal" tabindex="-1" role="dialog" aria-labelledby="createProduceLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    @if($produce2)
                    <h5 class="modal-title" id="createProduceLabel">Editar Rendimento</h5>
                    @else
                    <h5 class="modal-title" id="createProduceLabel">Novo Rendimento</h5>
                    @endif
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                            {{ Form::label('fabric_id', 'Tecido:', ['class' => 'col-form-label']) }}
                            @if($errors->get('fabric_id'))
                            {{ Form::select('fabric_id', $fabrics, null, ['class' => 'form-control is-invalid', 'wire:model' => 'fabric_id']) }}
                            @else
                            {{ Form::select('fabric_id', $fabrics, null, ['class' => 'form-control', 'wire:model' => 'fabric_id']) }}
                            @endif
                            @error('fabric_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div> 
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::label('shape_id', 'Molde:', ['class' => 'col-form-label']) }}
                            @if($errors->get('shape_id'))
                            {{ Form::select('shape_id', $shapes, null, ['class' => 'form-control is-invalid', 'wire:model' => 'shape_id']) }}
                            @else
                            {{ Form::select('shape_id', $shapes, null, ['class' => 'form-control', 'wire:model' => 'shape_id']) }}
                            @endif
                            @error('shape_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::label('length', 'Comprimento:', ['class' => 'col-form-label']) }}
                            @if($errors->get('length'))
                            {{ Form::number('length', null, ['class' => 'form-control is-invalid', 'step' => '0.01', 'wire:model' => 'length']) }}
                            @else
                            {{ Form::number('length', null, ['class' => 'form-control', 'step' => '0.01', 'wire:model' => 'length']) }}
                            @endif
                            @error('length')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::label('units', 'Unidades:', ['class' => 'col-form-label']) }}
                            @if($errors->get('units'))
                            {{ Form::number('units', null, ['class' => 'form-control is-invalid', 'wire:model' => 'units']) }}
                            @else
                            {{ Form::number('units', null, ['class' => 'form-control', 'wire:model' => 'units']) }}
                            @endif
                            @error('units')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    {{ Form::button('Fechar', ['class' => 'btn btn-secondary', 'data-dismiss' => 'modal']) }}
                    @if($produce2)
                    {{ Form::button('Atualizar', ['class' => 'btn btn-primary', 'wire:click' => 'update('.$produce2->id.')']) }}
                    @else
                    {{ Form::button('Salvar', ['class' => 'btn btn-primary', 'wire:click' => 'store']) }}
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    window.addEventListener('produceModalOpen', event => {
        (new coreui.Modal(document.getElementById('produceModal'), {})).show();
    });

    window.addEventListener('produceModalClose', event => {
        (coreui.Modal.getInstance(document.getElementById('produceModal'))).hide();
    });

    document.addEventListener("DOMContentLoaded", function() {

        Livewire.on('produceCloseDestroyModal', produce_id => {
            (coreui.Modal.getInstance(document.getElementById('produceDestroy' + produce_id))).hide();
            Livewire.emit('destroy', produce_id);
        })

    });
</script>