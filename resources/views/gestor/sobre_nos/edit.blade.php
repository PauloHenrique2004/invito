@extends('layouts.gestor.gestor')

@section('title', 'Editar - Sobre Nós - ')
@section('header-title', 'Editar - Sobre Nós')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Configurações da Página Sobre Nós</h3>
                </div>
                @include('gestor.sobre_nos._form', [
                    'action' => route('gestor.sobre-nos.update'),
                    'method' => 'PUT'
                ])
            </div>

            <livewire:gestor.sobre-nos.imagens :sobreNosId="$sobreNos->id" />
            <livewire:gestor.sobre-nos.integrantes :sobreNosId="$sobreNos->id" />
        </div>
    </div>
@endsection
