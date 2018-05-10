@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <form action="{{ route('pets.store') }}" method="post">
        @csrf
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <div>Edificio Multifamiliar San Fernando Del Tabor</div>
            <a href="{{ route('properties.edit', $property->id) }}" class="btn btn-success">Regresar</a>
          </div>
          <div class="card-body">
          	@include('partials.errors')
            <div class="col-md-12">
              <h5>Crear Nueva Mascota Para Propiedad: {{ $property->name }} - {{ $property->tower->name }}</h5>
              <input type="hidden" name="property_id" value="{{ $property->id }}">
              <div class="row">
                
                <div class="mt-2 ml-1 mb-3 col-md-12 row">
                  <div class="col-md-3">
                    <label for="name" class="form-control-sm">Nombre:</label>
                    <input class="form-control form-control-sm" type="text" id="name" name="name" value="{{ old('name') }}"></input>
                  </div>
                  <div class="col-md-3">
                    <label for="animal_id" class="form-control-sm">Tipo de Mascota:</label>
                    @if($animals!= null)
                      <select id="animal_id" class="form-control form-control-sm" name="animal_id">
                        <option value="0" selected disabled>-- Seleccione --</option>
                        @foreach($animals as $animal)
                          @if($animal->id == old('animal_id'))
                            <option value="{{ $animal->id }}" selected>{{ $animal->name }}</option>
                          @else
                            <option value="{{ $animal->id }}">{{ $animal->name }}</option>
                          @endif
                        @endforeach
                      </select>
                    @endif
                  </div>
                  <div class="col-md-3">
                    <label for="what_type" class="form-control-sm">Observaciones:</label>
                    <input class="form-control form-control-sm" type="text" id="what_type" name="what_type" value="{{ old('what_type') }}"></input>
                  </div>
                  <div class="col-md-3">
                    <label for="breed" class="form-control-sm">Raza:</label>
                    <input class="form-control form-control-sm" type="text" id="breed" name="breed" value="{{ old('breed') }}"></input>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Guardar Datos</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection