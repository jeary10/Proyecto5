@extends('layouts.app')

@section('template_title')
    Clubs
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Clubs') }}
                            </span>

                             <div class="float-right">
                                @if (auth()->user()->rol=='admin')
                                <a href="{{ route('clubs.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
									<th >Presidente</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clubs as $club)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $club->nombre }}</td>
										<td >{{ $club->descripcion }}</td>
										<td >{{ $club->president_name }}</td>

                                            <td>
                                                <form action="{{ route('clubs.destroy', $club->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('clubs.show', $club->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    @if (auth()->user()->rol=='admin')
                                                        <a class="btn btn-sm btn-success" href="{{ route('clubs.edit', $club->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Esta seguro de eliminar?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                    @endif  
                                                    <a class="btn btn-sm btn-success " href="{{ route('solicitar.miembro', $club->id) }}"><i class="fa fa-fw fa-user"></i> {{ __('Solicitar') }}</a>                                              
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $clubs->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
