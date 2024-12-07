@extends('layouts.app')

@section('template_title')
    {{ $event->name ?? __('Ver') . " " . __('Event') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Event</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('events.index') }}"> {{ __('Atras') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $event->nombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripcion:</strong>
                                    {{ $event->descripcion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Club Id:</strong>
                                    {{ $event->club_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Inicio:</strong>
                                    {{ $event->fecha_inicio }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Fin:</strong>
                                    {{ $event->fecha_fin }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
