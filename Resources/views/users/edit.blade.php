@extends('factory::layouts.master')

@section('content')

{{ Form::Model(auth()->user(), ['route' => 'dashboard']) }}
<div class="card">
    <div class="card-header">
        <h4 class="m-0">Informações da Conta</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-8">
                <div class="form-group">
                    <img src="https://ui-avatars.com/api/?name=RAS&color=7F9CF5&background=EBF4FF" class="rounded mb-2">
                    {{ Form::button('SELECIONE UMA FOTO', ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('Nome') }}
                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('Email') }}
                    {{ Form::text('email', null, ['class' => 'form-control']) }}
                </div>
            </div>
        </div>

    </div>
    <div class="card-footer text-muted">
    <a href="#" class="btn btn-primary">Salvar</a>
  </div>
</div>
{{ Form::close() }}

@endsection