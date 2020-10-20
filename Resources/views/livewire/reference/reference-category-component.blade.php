<div class="row">
    <div class="col-md-12 col-xl-6">
        <div class="card">
            <div class="card-header">
                @if($reference_category)
                <h4 class="m-0">Editar Categoria da Referência</h4>
                @else
                <h4 class="m-0">Nova Categoria da Referência</h4>
                @endif
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-12 col-xl-8">
                        @if($reference_category)
                        <div class="form-group">
                            {{ Form::label('Identificador') }}
                            {{ Form::text('reference_category_id', null, ['class' => 'form-control', 'disabled' => 'disabled', 'wire:model' => 'reference_category_id']) }}
                        </div>
                        @endif
                        <div class="form-group">
                            {{ Form::label('Nome') }}
                            @if($errors->get('name'))
                            {{ Form::text('name', null, ['class' => 'form-control is-invalid', 'wire:model' => 'name']) }}
                            @else
                            {{ Form::text('name', null, ['class' => 'form-control', 'wire:model' => 'name']) }}
                            @endif 
                            @error('name') 
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                             @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                @if($reference_category)
                {{ Form::button('Atualizar', ['class' => 'btn btn-primary', 'wire:click' => 'update('.$reference_category->id.')']) }}
                @else
                {{ Form::button('Salvar', ['class' => 'btn btn-primary', 'wire:click' => 'store']) }}
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-12 col-xl-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="m-0">Lista da Categoria das Referências</h4>
                <div>
                    <div class="input-group">
                        {{ Form::text('search', $search, ['class' => 'form-control', 'placeholder' => 'Pesquisar Categoria', 'wire:model' => 'search']) }}
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
                    <table class="table table-striped table-borderless table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col" class="text-right">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reference_categories as $reference_category)
                            <tr>
                                <td class="align-middle">{{ $reference_category->name }}</td>
                                <td class="text-right">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        {{ Form::button('<i class="cil-pencil"></i>', ['class' => 'btn btn-secondary', 'wire:click' => 'edit('.$reference_category->id.')']) }}
                                        {{ Form::button('<i class="cil-trash text-white white"></i>', ['class' => 'btn btn-danger', 'data-toggle' => 'modal', 'data-target' => '#referenceCategoriesDestroy'.$reference_category->id]) }}
                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade" id="referenceCategoriesDestroy{{ $reference_category->id }}" tabindex="-1" role="dialog" aria-labelledby="referenceCategoriesDestroy{{ $reference_category->id }}Label" aria-hidden="true">
                                <div class="modal-dialog modal-smd" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="referenceCategoriesDestroy{{ $reference_category->id }}Label">Confirmação</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Este registro sera deletado, caso confirme não tera como recupera-lo posteriormente. Deseja realmente prosseguir?</p>
                                        </div>
                                        <div class="card-footer text-muted d-flex justify-content-between ">
                                            {{ Form::button('Sim', ['class' => 'btn btn-danger', 'wire:click' => '$emit("hideModalAndDestroy", '.$reference_category->id.')']) }}
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
                {{ Form::button('Nova Cor', ['class' => 'btn btn-primary', 'wire:click' => 'create']) }}
                {{ $reference_categories->links() }}
            </div>
        </div>
    </div>
</div>



<script>
    document.addEventListener("DOMContentLoaded", function() {

        Livewire.on('hideModalAndDestroy', reference_category_id => {
            var element = document.getElementById('referenceCategoriesDestroy' + reference_category_id)
            var modal = coreui.Modal.getInstance(element)
            modal.hide();
            Livewire.emit('destroy', reference_category_id);
        })

    });
</script>