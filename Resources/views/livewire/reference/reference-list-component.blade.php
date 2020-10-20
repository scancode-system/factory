<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="m-0">Lista de Referências</h4>
        <div>
            <div class="input-group">
                {{ Form::text('search', $search, ['class' => 'form-control', 'placeholder' => 'Pesquisar Referência', 'wire:model' => 'search']) }}
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
                        <th scope="col">Código</th>
                        <th scope="col" class="text-center">Categoria</th>
                        <th scope="col" class="text-center">Modelo</th>
                        <th scope="col" class="text-right">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($references as $reference)
                    <tr>
                        <td class="align-middle">{{ $reference->code }}</td>
                        <td class="align-middle text-center">{{ $reference->reference_category->name }}</td>
                        <td class="align-middle text-center">{{ $reference->model }}</td>
                        <td class="text-right">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('references.edit', $reference->id) }}" class="btn btn-secondary"><i class="cil-pencil"></i></a>
                                {{ Form::button('<i class="cil-trash text-white white"></i>', ['class' => 'btn btn-danger', 'data-toggle' => 'modal', 'data-target' => '#referencesDestroy'.$reference->id]) }}
                            </div>
                        </td>
                    </tr>
                    <div class="modal fade" id="referencesDestroy{{ $reference->id }}" tabindex="-1" role="dialog" aria-labelledby="referencesDestroy{{ $reference->id }}Label" aria-hidden="true">
                        <div class="modal-dialog modal-smd" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="referencesDestroy{{ $reference->id }}Label">Confirmação</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Este registro sera deletado, caso confirme não tera como recupera-lo posteriormente. Deseja realmente prosseguir?</p>
                                </div>
                                <div class="card-footer text-muted d-flex justify-content-between ">
                                    {{ Form::button('Sim', ['class' => 'btn btn-danger', 'wire:click' => '$emit("hideModalAndDestroy", '.$reference->id.')']) }}
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
        {{ Form::button('Nova Referência', ['class' => 'btn btn-primary', 'data-toggle' => 'modal', 'data-target' => '#createReference']) }}
        {{ $references->links() }}
    </div>

    <div wire:ignore.self class="modal fade" id="createReference" tabindex="-1" role="dialog" aria-labelledby="createReference" aria-hidden="true">
        <div class="modal-dialog" role="document" aria-modal="true">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createReference">Nova Referência</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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
        Livewire.on('hideModalAndDestroy', reference_id => {
            (coreui.Modal.getInstance(document.getElementById('referencesDestroy' + reference_id))).hide();
            Livewire.emit('destroy', reference_id);
        })
    });

    window.addEventListener('referenceModalClose', event => {
        (coreui.Modal.getInstance(document.getElementById('createReference'))).hide();
    });
</script>