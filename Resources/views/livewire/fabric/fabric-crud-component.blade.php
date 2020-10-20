<div class="row">
    <div class="col-md-12 col-xl-6">
        <div class="card">
            <div class="card-header">
                @if($fabric)
                <h4 class="m-0">Editar Molde</h4>
                @else
                <h4 class="m-0">Novo Molde</h4>
                @endif
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-12 col-xl-8">
                        @if($fabric)
                        <div class="form-group">
                            {{ Form::label('Identificador') }}
                            {{ Form::text('fabric_id', null, ['class' => 'form-control', 'disabled' => 'disabled', 'wire:model' => 'fabric_id']) }}
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
                        <div class="form-group">
                            {{ Form::label('Código') }}
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
                        <div class="form-group">
                            {{ Form::label('Metro/Kg') }}
                            @if($errors->get('meter'))
                            {{ Form::number('meter', null, ['class' => 'form-control is-invalid', 'step' => '0.01', 'wire:model' => 'meter']) }}
                            @else
                            {{ Form::number('meter', null, ['class' => 'form-control', 'step' => '0.01', 'wire:model' => 'meter']) }}
                            @endif
                            @error('meter')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::label('Preço') }}
                            @if($errors->get('price'))
                            {{ Form::number('price', null, ['class' => 'form-control is-invalid', 'step' => '0.01', 'wire:model' => 'price']) }}
                            @else
                            {{ Form::number('price', null, ['class' => 'form-control', 'step' => '0.01', 'wire:model' => 'price']) }}
                            @endif
                            @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                @if($fabric)
                {{ Form::button('Atualizar', ['class' => 'btn btn-primary', 'wire:click' => 'update('.$fabric->id.')']) }}
                @else
                {{ Form::button('Salvar', ['class' => 'btn btn-primary', 'wire:click' => 'store']) }}
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-12 col-xl-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="m-0">Lista de Moldes</h4>
                <div>
                    <div class="input-group">
                        <input class="form-control" type="text" wire:model="search" placeholder="Pesquisar Cor">
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
                                <th scope="col">Código</th>
                                <th scope="col">Metros/Kg</th>
                                <th scope="col">Preço</th>
                                <th scope="col" class="text-right">Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($fabrics as $fabric)
                            <tr>
                                <td class="align-middle">{{ $fabric->name }}</td>
                                <td class="align-middle">{{ $fabric->code }}</td>
                                <td class="align-middle">@meter_kg($fabric->meter)</td>
                                <td class="align-middle">@currency($fabric->price)</td>
                                <td class="text-right">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        {{ Form::button('<i class="cil-pencil"></i>', ['class' => 'btn btn-secondary', 'wire:click' => 'edit('.$fabric->id.')']) }}
                                        {{ Form::button('<i class="cil-trash text-white white"></i>', ['class' => 'btn btn-danger', 'data-toggle' => 'modal', 'data-target' => '#fabricsDestroy'.$fabric->id]) }}
                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade" id="fabricsDestroy{{ $fabric->id }}" tabindex="-1" role="dialog" aria-labelledby="fabricsDestroy{{ $fabric->id }}Label" aria-hidden="true">
                                <div class="modal-dialog modal-smd" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="fabricsDestroy{{ $fabric->id }}Label">Confirmação</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Este registro sera deletado, caso confirme não tera como recupera-lo posteriormente. Deseja realmente prosseguir?</p>
                                        </div>
                                        <div class="card-footer text-muted d-flex justify-content-between ">
                                            {{ Form::button('Sim', ['class' => 'btn btn-danger', 'wire:click' => '$emit("hideModalAndDestroy", '.$fabric->id.')']) }}
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
                {{ Form::button('Novo Tecido', ['class' => 'btn btn-primary', 'wire:click' => 'create']) }}
                {{ $fabrics->links() }}
            </div>
        </div>
    </div>
</div>



<script>
    document.addEventListener("DOMContentLoaded", function() {

        Livewire.on('hideModalAndDestroy', fabric_id => {
            var element = document.getElementById('fabricsDestroy' + fabric_id)
            var modal = coreui.Modal.getInstance(element)
            modal.hide();
            Livewire.emit('destroy', fabric_id);
        })

    });
</script>