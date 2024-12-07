@extends('layouts.app')

@section('template_title')
    {{ $club->name ?? __('Ver') . " " . __('Club') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Club</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('clubs.index') }}"> {{ __('Atras') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre:</strong>
                                    {{ $club->nombre }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripcion:</strong>
                                    {{ $club->descripcion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Presidente Id:</strong>
                                    {{ $club->presidente_id }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
