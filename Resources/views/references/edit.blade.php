@extends('factory::layouts.master')

@section('content')

@livewire('reference-edit-component', [request()->route('reference')])
@livewire('produce-component', [request()->route('reference')])

@endsection