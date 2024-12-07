@extends('layouts.app')

@section('template_title')
    Events
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Solicitudes') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Regresar') }}
                                  </a>
                              </div>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
									<th >Usuario</th>
									<th >Club</th>
									<th >Estado</th>
									<th >Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($solicitudes as $solicitud)
                                        <tr>                                            
                                            <td >{{ $solicitud->user->nombre }}</td>
                                            <td >{{ $solicitud->club->nombre }}</td>
                                            <td >{{ $solicitud->estado }}</td>
                                            <td>
                                                <form action="{{ route('solicitar.efectuar', $solicitud->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    <input type="hidden" name="accion" value="aprobado">
                                                    <button type="submit" class="btn btn-success btn-sm">Aceptar</button>
                                                </form>
                                                
                                                <form action="{{ route('solicitar.efectuar', $solicitud->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    <input type="hidden" name="accion" value="rechazado">
                                                    <button type="submit" class="btn btn-danger btn-sm">Rechazar</button>
                                                </form>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
