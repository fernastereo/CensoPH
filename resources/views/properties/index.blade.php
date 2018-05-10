@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between">
          <div>Edificio Multifamiliar San Fernando Del Tabor</div>
          {{-- <a href="" class="btn btn-primary">Crear Propiedad</a> --}}{{-- {{ route('properties.edit') }} --}}
        </div>

        <div class="card-body">
          @if (session('status'))
            <div class="alert alert-success">
              {{ session('status') }}
            </div>
          @endif
          @include('partials.errors')

          <div class="col-md-12">
            <table class="table table-sm table-hover">
              <thead>
                <tr class="text-center">
                  <th scope="col">Torre</th>
                  <th scope="col">Número</th>
                  <th scope="col">Area</th>
                  <th scope="col">Coeficiente</th>
                  <th scope="col">Matrícula</th>
                  <th scope="col">Registrado</th>
                  <th scope="col">Censado</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>
                @forelse($properties as $property)
                  <tr class="text-center">
                    <td>{{ $property->tower_id }}</td>
                    <td>{{ $property->name }}</td>
                    <td>{{ number_format($property->area, 2, ',', '.') }}</td>
                    <td>{{ number_format($property->coefficient, 5, ',', '.') }}</td>
                    <td>{{ $property->idnumber }}</td>
                    <td>@if($property->registered == true)<span class="badge badge-success">Registrado</span>@else <span class="badge badge-danger">No Registrado</span>@endif</td>
                    <td>@if($property->updated == true)<span class="badge badge-success">Censado</span>@else <span class="badge badge-danger">No Censado</span>@endif</td>
                    <td>
                      <a href="{{ route('properties.show', $property->id) }}" title="Ver Detalle de la Propiedad"><i class="fas fa-eye"></i></a> 
                      {{-- <a href="{{ route('properties.edit', $property->id) }}" title="Editar Propiedad"><i class="fas fa-edit"></i></a>  --}}
                      <a href="#" title="Enviar Comunicación"><i class="far fa-envelope"></i></i></a> 
                      <a href="#" title="Enviar Contraseña por Correo"><i class="fas fa-unlock-alt"></i></a> 
                    </td>
                  </tr>
                @empty
                  <p>No tiene Propiedades Registradas</p>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer">
          {{ $properties->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
