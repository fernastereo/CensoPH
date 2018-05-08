@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <form action="{{ route('habitants.store') }}" method="post">
        @csrf
        <div class="card">
          <div class="card-header">
          	Edificio Multifamiliar San Fernando Del Tabor
					</div>
          <div class="card-body">
          	@include('partials.errors')
            <div class="col-md-12">
              <h5>Crear Nuevo Habitante Para Propiedad: {{ $property->name }} - {{ $property->tower->name }}</h5>
              <input type="hidden" name="property_id" value="{{ $property->id }}">
              <div class="row">
                
                <div class="mt-2 ml-1 mb-3 col-md-12 row">
                  <div class="col-md-3">
                    <label for="idnumber" class="form-control-sm">No. Identificación:</label>
                    <input class="form-control form-control-sm" type="text" id="idnumber" name="idnumber" value="{{ old('idnumber') }}"></input>
                  </div>
                  <div class="col-md-9">
                    <label for="name" class="form-control-sm">Nombre Completo:</label>
                    <input class="form-control form-control-sm" type="text" id="name" name="name" value="{{ old('name') }}"></input>
                  </div>
                </div>

                <div class="ml-1 mb-3 col-md-12 row">
                  <div class="col-md-4">
                    <label for="email" class="form-control-sm">E-mail:</label>
                    <input class="form-control form-control-sm" type="email" id="email" name="email" value="{{ old('email') }}"></input>
                  </div>
                  <div class="col-md-4">
                    <label for="relationship_id" class="form-control-sm">Relación:</label>
										@if($relationships != null)
                      <select id="relationship_id" class="form-control form-control-sm{{ $errors->has('relationships') ? ' is-invalid' : '' }}" name="relationship_id">
                        <option value="0" selected disabled>-- Seleccione --</option>
                        @foreach($relationships as $relationship)
                          @if($relationship->id == old('relationship_id'))
                            <option value="{{ $relationship->id }}" selected>{{ $relationship->name }}</option>
                          @else
                            <option value="{{ $relationship->id }}">{{ $relationship->name }}</option>
                          @endif
                        @endforeach
                      </select>
                    @endif
                  </div>
                  <div class="col-md-4">
                    <label for="cellphone_number" class="form-control-sm">Celular:</label>
                    <input class="form-control form-control-sm" type="text" id="cellphone_number" name="cellphone_number" value="{{ old('cellphone_number') }}"></input>
                  </div>
                </div>
                
                <div class="ml-1 mb-3 col-md-12 row">
                  <div class="col-md-2">
                    <label for="birthdate" class="form-control-sm">Fecha Nacimiento:</label>
                    <input class="form-control form-control-sm" type="date" id="birthdate" name="birthdate" value="{{ old('birthdate') }}"></input>
                  </div>
                  <div class="col-md-6">
                    <label for="occupation" class="form-control-sm">Profesión / Ocupación:</label>
                    <input class="form-control form-control-sm" type="text" id="occupation" name="occupation" value="{{ old('occupation') }}"></input>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
          	<a href="{{ route('properties.edit', $property->id) }}" class="btn btn-success">Regresar</a>
            <button type="submit" class="btn btn-primary">Guardar Datos</button>
          </div>          
        </div>
      </form>
    </div>
  </div>
</div>
@endsection