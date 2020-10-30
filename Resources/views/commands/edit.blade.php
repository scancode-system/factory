@extends('factory::layouts.master')

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="m-0">Comando #555</h4>
        <a href="{{ route('commands.print', request()->route('command')) }}" class="btn btn-secondary">
            <i class="cil-print"></i>
        </a>
    </div>
    <div class="card-body">
        <div class="d-flex mb-3">
            <button class="btn btn-primary btn-lg flex-fill mr-3" data-toggle="modal" data-target="#createCommandFabricModal">Adicionar Tecido</button>
            <button class="btn btn-primary btn-lg flex-fill ml-3" data-toggle="modal" data-target="#createCommandRiskModal">Adicionar Risco</button>
        </div>


        <h5>Tecidos</h5>
        @livewire('command-fabric-list-component', [request()->route('command')])
        <h5>Risco</h5>
        @livewire('command-risk-list-component', [request()->route('command')])
    </div>

</div>
@livewire('command-fabric-create-component', [request()->route('command')])
@livewire('command-risk-create-component', [request()->route('command')])

@endsection