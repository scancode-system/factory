@extends('factory::layouts.master')

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="m-0">Comando #555</h4>
        <button class="btn btn-secondary" type="button">
            <svg class="c-icon m-0">
                <use xlink:href="/modules/factory/coreui/dist/vendors/@coreui/icons/svg/free.svg#cil-print"></use>
            </svg>
        </button>
    </div>
    <div class="card-body">
        <div class="d-flex mb-3">
            <button class="btn btn-primary btn-lg flex-fill mr-3" data-toggle="modal" data-target="#createCommandFabricModal">Adicionar Tecido</button>
            <button class="btn btn-primary btn-lg flex-fill ml-3" data-toggle="modal" data-target="#createCommandRiskModal">Adicionar Referência</button>
        </div>


        <h5>Tecidos</h5>
        @livewire('command-fabric-list-component', [request()->route('command')])
        <hr>
        <h5>Risco</h5>
        <div class="table-responsive">
            <table class="table table-striped table-borderless table-hover ">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Referência</th>
                        <th scope="col">Tecido</th>
                        <th scope="col">Cor</th>
                        <th scope="col">Molde</th>
                        <th scope="col" class="text-center">Tamanho</th>
                        <th scope="col" class="text-center">Unidades</th>
                        <th scope="col" class="text-center">Real</th>
                        <th scope="col" class="text-center">Peso</th>
                        <th scope="col" class="text-right">Opções</th>
                    </tr>
                </thead>
                <tbody>
               
                    <tr>
                        <td class="align-middle">CAC050</td>
                        <td class="align-middle ">Fluit</td>
                        <td class="align-middle ">Preto</td>
                        <td class="align-middle ">Costas</td>
                        <td class="align-middle text-center">M</td>
                        <td class="align-middle text-center">5</td>
                        <td class="align-middle text-center">10</td>
                        <td class="align-middle text-center">0,454kg</td>
                        <td class="text-right">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('commands.edit', 1) }}" class="btn btn-secondary"><svg class="c-icon m-0">
                                        <use xlink:href="/modules/factory/coreui/dist/vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
                                    </svg>
                                </a>
                                <button type="button" class="btn btn-danger"><svg class="c-icon m-0">
                                        <use xlink:href="/modules/factory/coreui/dist/vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                                    </svg></button>
                            </div>
                        </td>
                    </tr>
                  
                </tbody>
            </table>
        </div>
    </div>

</div>
@livewire('command-fabric-create-component', [request()->route('command')])
@livewire('command-risk-create-component', [request()->route('command')])

@endsection