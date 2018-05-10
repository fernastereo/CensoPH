@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <form action="{{ route('vehicles.store') }}" method="post">
        @csrf
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <div>Edificio Multifamiliar San Fernando Del Tabor</div>
            <a href="{{ route('properties.edit', $property->id) }}" class="btn btn-success">Regresar</a>
          </div>
          <div class="card-body">
          	@include('partials.errors')
            <div class="col-md-12">
              <h5>Crear Nuevo Vehículo Para Propiedad: {{ $property->name }} - {{ $property->tower->name }}</h5>
              <input type="hidden" name="property_id" value="{{ $property->id }}">
              <div class="row">
                
                <div class="mt-2 ml-1 mb-3 col-md-12 row">
                  <div class="col-md-2">
                    <label for="registration_tag" class="form-control-sm">Placa:</label>
                    <input class="form-control form-control-sm" type="text" id="registration_tag" name="registration_tag" value="{{ old('registration_tag') }}"></input>
                  </div>
                  <div class="col-md-3">
                    <label for="color" class="form-control-sm">Color:</label>
                    <input class="form-control form-control-sm" type="text" id="color" name="color" value="{{ old('color') }}"></input>
                  </div>
                  <div class="col-md-3">
                    <label for="mark" class="form-control-sm">Marca:</label>
                    <input class="form-control form-control-sm" type="text" id="mark" name="mark" value="{{ old('mark') }}"></input>
                  </div>
                </div>
                <div class="mt-2 ml-1 mb-3 col-md-12 row">
                  <div class="col-md-3">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="motorcycle" name="motorcycle" value="{{ old('motorcycle') }}">
                      <label class="form-check-label form-control-sm" for="motorcycle">
                        Motocicleta
                      </label>
                    </div>
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