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
                    
          <div class="col-md-12">
            <h5>Consultar Propiedad: {{ $property->name }}</h5>
          </div>

        </div>
        <div class="card-footer text-right">
          <a class="btn btn-primary" href="{{ route('home') }}">Regresar</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
