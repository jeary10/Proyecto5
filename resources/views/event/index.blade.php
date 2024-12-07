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
                                {{ __('Events') }}
                            </span>

                             <div class="float-right">
                                @if (auth()->user()->rol=='admin' || auth()->user()->is_presidente)
                                <a href="{{ route('events.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo') }}
                                </a>
                                @endif
                                <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Regresar') }}
                                  </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >Nombre</th>
									<th >Descripcion</th>
									<th >Club</th>
									<th >Fecha Inicio</th>
									<th >Fecha Fin</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($events as $event)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $event->nombre }}</td>
										<td >{{ $event->descripcion }}</td>
										<td >{{ $event->club->nombre }}</td>
										<td >{{ $event->fecha_inicio }}</td>
										<td >{{ $event->fecha_fin }}</td>

                                            <td>
                                                <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('events.show', $event->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    @if (auth()->user()->rol=='admin')
                                                    <a class="btn btn-sm btn-success" href="{{ route('events.edit', $event->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Esta seguro de eliminar?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                    @endif  
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $events->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
