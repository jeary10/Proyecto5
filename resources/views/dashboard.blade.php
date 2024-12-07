@extends('layouts.app')

@section('template_title')
Bienvenido
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                                <h1 class="text-2xl font-bold text-center mb-6">{{ __('Bienvenido') }}</h1>


                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                    <div class="bg-gray-100 text-black p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                                        <h3 class="font-semibold text-lg mb-2">{{ __('CLUBS') }}</h3>
                                        <p class="mb-4">{{ __('Ver todos los clubs disponibles.') }}</p>
                                        <a href="{{ route('clubs.index') }}" class="underline hover:text-gray-600">Ver Clubs</a>
                                    </div>

                                    <div class="bg-gray-100 text-black p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                                        <h3 class="font-semibold text-lg mb-2">{{ __('Eventos') }}</h3>
                                        <p class="mb-4">{{ __('Ver todos los eventos disponibles.') }}</p>
                                        <a href="{{ route('events.index') }}" class="underline hover:text-gray-600">Eventos</a>
                                    </div>


                                    @if (auth()->user()->rol=='estudiante')
                                    <div class="bg-gray-100 text-black p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                                        <h3 class="font-semibold text-lg mb-2">{{ __('MIS CLUBS') }}</h3>
                                        <p class="mb-4">{{ __('Ver los clubs a los que estás inscrito.') }}</p>
                                        <a href="{{ route('clubs.my') }}" class="underline hover:text-gray-600">Mis Clubs</a>
                                    </div>
                                    @endif

                                    @if (auth()->user()->rol=='admin' || auth()->user()->is_presidente)
                                    <div class="bg-gray-100 text-black p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                                        <h3 class="font-semibold text-lg mb-2">{{ __('Solicitudes') }}</h3>
                                        <p class="mb-4">{{ __('Ver las solicitudes pendientes.') }}</p>
                                        <a href="{{ route('solicitar.index') }}" class="underline hover:text-gray-600">Solicitudes</a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
