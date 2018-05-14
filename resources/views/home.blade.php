@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Edificio Multifamiliar San Fernando Del Tabor</div>

        <div class="card-body">
          @if (session('status'))
            <div class="alert alert-success">
              {{ session('status') }}
            </div>
          @endif
          @include('partials.errors')      
          <div class="col-md-12">
            <p>Bienvenido {{ auth()->user()->name }}.</p>
            <p>El estado de su cuenta es: 
              @if(auth()->user()->verified())
                <strong>Verificado</strong>
              @else
                <strong>No Verificado</strong>
                <br>
                Se ha enviado un mensaje de verificación a la dirección de correo electrónico que registró, por favor dirijase a su correo.
                <br>
                <br>
                Si aun no ha recibido el mensaje de verificación en su correo electrónico por favor haga <a href="{{ route('resend', auth()->user()) }}">clik aqui </a>
              @endif
            </p>
            @include('partials.msg')
          </div>

          <div class="col-md-12">
            <table class="table table-hover">
              <thead>
                <tr class="text-center">
                  <th scope="col">Torre</th>
                  <th scope="col">Número</th>
                  <th scope="col">Area</th>
                  <th scope="col">Coeficiente</th>
                  <th scope="col">Matrícula</th>
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
                    <td>
                      {{-- <a href="{{ route('properties.show', $property->id) }}" class="btn btn-primary btn-sm">Consultar</a> --}} 
                      @if(auth()->user()->verified())
                        <a href="{{ route('properties.edit', $property->id) }}" class="btn btn-success btn-sm">Actualizar</a> 
                      @endif
                    </td>
                  </tr>
                @empty
                  <p>No tiene Propiedades Registradas</p>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
