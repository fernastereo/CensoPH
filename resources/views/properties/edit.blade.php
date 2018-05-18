@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <form action="{{ route('properties.update', $property->id) }}" method="post">
        @csrf
        @method('put')
        <div class="card">
          <div class="card-header">Edificio Multifamiliar San Fernando Del Tabor</div>

          <div class="card-body">
            @include('partials.success')
            @include('partials.errors')
            @include('partials.acceso')
            <div class="col-md-12">
              <h5>Actualizar Propiedad: {{ $property->name }}</h5>
              <div class="row">
                <div class="col-md-1">
                  <label for="tower_id" class="form-control-sm">Torre:</label>
                  <input class="form-control form-control-sm " type="text" id="tower_id" name="tower_id" value="{{ old('tower_id', $property->tower_id) }}" readonly></input>
                </div>
                <div class="col-md-3">
                  <label for="idnumber" class="form-control-sm">Matrícula:</label>
                  <input class="form-control form-control-sm" type="text" id="idnumber" name="idnumber" value="{{ old('idnumber', $property->idnumber) }}" placeholder="Matrícula Inmobiliaria"></input>
                </div>
                <div class="col-md-2">
                  <label for="area" class="form-control-sm">Area:</label>
                  <input class="form-control form-control-sm" type="text" id="area" name="area" value="{{ old('area', number_format($property->area, 2, '.', ',')) }}" readonly></input>
                </div>
                <div class="col-md-2">
                  <label for="coefficient" class="form-control-sm">Coeficiente:</label>
                  <input class="form-control form-control-sm" type="text" id="coefficient" name="coefficient" value="{{ old('coefficient', number_format($property->coefficient, 5, '.', ',')) }}" readonly></input>
                </div>
                <div class="col-md-2">
                  <label for="phone_number" class="form-control-sm">Teléfono Fijo:</label>
                  <input class="form-control form-control-sm" type="text" id="phone_number" name="phone_number" value="{{ old('phone_number', $property->phone_number) }}"></input>
                </div>
                <div class="col-md-2">
                  <label for="move_date" class="form-control-sm">Fecha Entrega:</label>
                  <input class="form-control form-control-sm date" type="date" id="datepicker" name="move_date" value="{{ old('move_date', $property->move_date) }}"></input>
                </div>              
              </div>
              <div class="row align-items-center mt-2">
                <div class="form-group col-md-4">
                  <div class="form-check">
                    @if(old('state', $property->live_householder) == false)
                      <input class="form-check-input" type="checkbox" id="live_householder" name="live_householder">
                    @else
                      <input class="form-check-input" type="checkbox" id="live_householder" name="live_householder" checked>
                    @endif
                    <label class="form-check-label form-control-sm" for="live_householder">
                      Arrendado Actualmente
                    </label>
                  </div>
                </div>

                <div class="col-md-4">
                  <label for="rent_agency" class="form-control-sm">Agencia de Arriendos:</label>
                  <input class="form-control form-control-sm" type="text" id="rent_agency" name="rent_agency" value="{{ old('rent_agency', $property->rent_agency) }}" placeholder="Agencia de Arriendos"></input>
                </div>
              </div>

              <div class="row mt-2">
                <div class="col-md-12">
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="user-tab" data-toggle="tab" href="#user" role="tab" aria-controls="user" aria-selected="true">
                      Datos Propietario</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="habitant-tab" data-toggle="tab" href="#habitant" role="tab" aria-controls="habitant" aria-selected="false">
                      Habitantes</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="vehicle-tab" data-toggle="tab" href="#vehicle" role="tab" aria-controls="vehicle" aria-selected="false">
                      Vehículos</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="pet-tab" data-toggle="tab" href="#pet" role="tab" aria-controls="pet" aria-selected="false">
                      Mascotas</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="feedback-tab" data-toggle="tab" href="#feedback" role="tab" aria-controls="feedback" aria-selected="false">
                      Feedback</a>
                    </li>
                  </ul>

                  <div class="tab-content border-right border-left border-bottom" id="myTabContent">
                    <div class="tab-pane fade show active" id="user" role="tabpanel" aria-labelledby="user-tab">
                      <div class="row">
                        
                        <div class="mt-2 ml-1 mb-3 col-md-12 row">
                          <div class="col-md-3">
                            <label for="user_idnumber" class="form-control-sm">No. Identificación:</label>
                            <input class="form-control form-control-sm" type="text" id="user_idnumber" name="user_idnumber" value="{{ old('user_idnumber', $property->user->idnumber ?? '') }}"></input>
                          </div>
                          <div class="col-md-9">
                            <label for="user_name" class="form-control-sm">Nombre Completo:</label>
                            <input class="form-control form-control-sm" type="text" id="user_name" name="user_name" value="{{ old('user_name', $property->user->name ?? '') }}"></input>
                          </div>
                        </div>

                        <div class="ml-1 mb-3 col-md-12 row">
                          <div class="col-md-4">
                            <label for="user_email" class="form-control-sm">E-mail:</label>
                            <input class="form-control form-control-sm" type="email" id="user_email" name="user_email" value="{{ old('user_email', $property->user->email ?? '') }}"></input>
                          </div>
                          <div class="col-md-4">
                            <label for="user_address" class="form-control-sm">Dirección Para Notificaciones:</label>
                            <input class="form-control form-control-sm" type="text" id="user_address" name="user_address" value="{{ old('user_address', $property->user->notification_address ?? '') }}"></input>
                          </div>
                          <div class="col-md-4">
                            <label for="user_cellphone" class="form-control-sm">Celular:</label>
                            <input class="form-control form-control-sm" type="text" id="user_cellphone" name="user_cellphone" value="{{ old('user_cellphone', $property->user->cellphone_number ?? '') }}"></input>
                          </div>
                        </div>
                        
                        <div class="ml-1 mb-3 col-md-12 row">
                          <div class="col-md-2">
                            <label for="user_birthdate" class="form-control-sm">Fecha Nacimiento:</label>
                            <input class="form-control form-control-sm" type="date" id="user_birthdate" name="user_birthdate" value="{{ old('user_birthdate', $property->user->birthdate ?? '') }}"></input>
                          </div>
                          <div class="col-md-6">
                            <label for="user_occupation" class="form-control-sm">Profesión / Ocupación:</label>
                            <input class="form-control form-control-sm" type="text" id="user_occupation" name="user_occupation" value="{{ old('user_occupation', $property->user->occupation ?? '') }}"></input>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="tab-pane fade" id="habitant" role="tabpanel" aria-labelledby="habitant-tab">
                      <div class="row">  
                        <div class="mt-3 ml-1 mb-3 col-md-12 row">
                          <div class="col-md-12">
                            <div class="mb-4 d-flex justify-content-end">
                              {{-- <div class="form-check">
                                <input class="form-check-input activos" type="checkbox" id="show-active" name="show-active" value="{{ $property->id }}">
                                <label class="form-check-label form-control-sm" for="show-active">
                                  Mostrar Habitantes Eliminados
                                </label>
                              </div> --}}
                              <a href="{{ route('habitants.createh', $property->id) }}" class="btn btn-primary btn-sm">Nuevo Habitante</a>
                            </div>
                            <table class="table table-sm table-hover mb-5"><h6><strong>Habitantes Activos</strong></h6>
                              <thead>
                                <tr>
                                  <th scope="col">Nombre</th>
                                  <th scope="col">Identificación</th>
                                  <th scope="col">Teléfono</th>
                                  <th scope="col">Relación</th>
                                  <th scope="col">Acciones</th>
                                </tr>
                              </thead>
                              <tbody class="habitantes">
                                @foreach($property->habitants as $habitant)
                                  @if($habitant->active == true)
                                    <tr>
                                      <td>{{ $habitant->name }}</td>
                                      <td>{{ $habitant->idnumber }}</td>
                                      <td>{{ $habitant->cellphone_number }}</td>
                                      <td>{{ $habitant->relationship->name }}</td>
                                      <td>
                                        <a href="{{ route('habitants.edit', $habitant->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                      
                                        <a href="{{ route('habitants.active', $habitant->id) }}" 
                                            onclick="return confirm('¿Está seguro que desea @if($habitant->active == false) habilitar @else eliminar @endif este registro?')" 
                                            class="ml-2 btn @if($habitant->active == false) btn-success @else btn-danger @endif btn-sm">@if($habitant->active == false) Habilitar @else Eliminar @endif</a>
                                      </td>
                                    </tr>
                                  @endif
                                @endforeach
                              </tbody>
                            </table>
                            <table class="table table-sm table-hover"><h6>Habitantes Eliminados</h6>
                              <thead>
                                <tr>
                                  <th scope="col">Nombre</th>
                                  <th scope="col">Identificación</th>
                                  <th scope="col">Teléfono</th>
                                  <th scope="col">Relación</th>
                                  <th scope="col">Acciones</th>
                                </tr>
                              </thead>
                              <tbody class="habitantes">
                                @foreach($property->habitants as $habitant)
                                  @if($habitant->active == false)
                                    <tr>
                                      <td>{{ $habitant->name }}</td>
                                      <td>{{ $habitant->idnumber }}</td>
                                      <td>{{ $habitant->cellphone_number }}</td>
                                      <td>{{ $habitant->relationship->name }}</td>
                                      <td>
                                        <a href="{{ route('habitants.edit', $habitant->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                      
                                        <a href="{{ route('habitants.active', $habitant->id) }}" 
                                            onclick="return confirm('¿Está seguro que desea @if($habitant->active == false) habilitar @else eliminar @endif este registro?')" 
                                            class="ml-2 btn @if($habitant->active == false) btn-success @else btn-danger @endif btn-sm">@if($habitant->active == false) Habilitar @else Eliminar @endif</a>
                                      </td>
                                    </tr>
                                  @endif
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>        
                    </div>

                    <div class="tab-pane fade" id="vehicle" role="tabpanel" aria-labelledby="vehicle-tab">
                      <div class="row">  
                        <div class="mt-3 ml-1 mb-3 col-md-12 row">
                          <div class="col-md-12">
                            <div class="text-right mb-4">
                              <a href="{{ route('vehicles.createh', $property->id) }}" class="btn btn-primary btn-sm">Nuevo Vehículo</a>
                            </div>
                            <table class="table table-sm table-hover"><h6><strong>Vehículos Activos</strong></h6>
                              <thead>
                                <tr>
                                  <th scope="col">Placa</th>
                                  <th scope="col">Color</th>
                                  <th scope="col">Marca</th>
                                  <th scope="col">Motocicleta</th>
                                  <th scope="col">Acciones</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($property->vehicles as $vehicle)
                                  @if($vehicle->active == true)
                                    <tr>
                                      <td class="text-uppercase">{{ $vehicle->registration_tag }}</td>
                                      <td class="text-uppercase">{{ $vehicle->color }}</td>
                                      <td class="text-uppercase">{{ $vehicle->mark }}</td>
                                      @if($vehicle->motorcycle == true)
                                        <td class="text-uppercase">SI</td>
                                      @else
                                        <td class="text-uppercase"></td>
                                      @endif                                    
                                      <td>
                                        {{-- <a href="{{ route('properties.show', $property->id) }}" class="btn btn-primary btn-sm">Consultar</a>  --}}
                                        <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="btn btn-success btn-sm">Actualizar</a>
                                        <a href="{{ route('vehicles.active', $vehicle->id) }}" 
                                                onclick="return confirm('¿Está seguro que desea @if($vehicle->active == false) habilitar @else eliminar @endif este registro?')" 
                                                class="ml-2 btn @if($vehicle->active == false) btn-success @else btn-danger @endif btn-sm">@if($vehicle->active == false) Habilitar @else Eliminar @endif
                                        </a>
                                      </td>
                                    </tr>
                                  @endif
                                @endforeach
                              </tbody>
                            </table>
                            <table class="table table-sm table-hover"><h6><strong>Vehículos Eliminados</strong></h6>
                              <thead>
                                <tr>
                                  <th scope="col">Placa</th>
                                  <th scope="col">Color</th>
                                  <th scope="col">Marca</th>
                                  <th scope="col">Motocicleta</th>
                                  <th scope="col">Acciones</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($property->vehicles as $vehicle)
                                  @if($vehicle->active == false)
                                    <tr>
                                      <td class="text-uppercase">{{ $vehicle->registration_tag }}</td>
                                      <td class="text-uppercase">{{ $vehicle->color }}</td>
                                      <td class="text-uppercase">{{ $vehicle->mark }}</td>
                                      @if($vehicle->motorcycle == true)
                                        <td class="text-uppercase">SI</td>
                                      @else
                                        <td class="text-uppercase"></td>
                                      @endif                                    
                                      <td>
                                        {{-- <a href="{{ route('properties.show', $property->id) }}" class="btn btn-primary btn-sm">Consultar</a>  --}}
                                        <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="btn btn-success btn-sm">Actualizar</a>
                                        <a href="{{ route('vehicles.active', $vehicle->id) }}" 
                                                onclick="return confirm('¿Está seguro que desea @if($vehicle->active == false) habilitar @else eliminar @endif este registro?')" 
                                                class="ml-2 btn @if($vehicle->active == false) btn-success @else btn-danger @endif btn-sm">@if($vehicle->active == false) Habilitar @else Eliminar @endif
                                        </a>
                                      </td>
                                    </tr>
                                  @endif
                                @endforeach
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>        
                    </div>

                    <div class="tab-pane fade" id="pet" role="tabpanel" aria-labelledby="pet-tab">
                      <div class="row">  
                        <div class="mt-3 ml-1 mb-3 col-md-12 row">
                          <div class="col-md-12">
                            <div class="text-right mb-4">
                              <a href="{{ route('pets.createh', $property->id) }}" class="btn btn-primary btn-sm">Nueva Mascota</a>
                            </div>
                            <table class="table table-sm table-hover"><h6><strong>Mascotas Activas</strong></h6>
                              <thead>
                                <tr>
                                  <th scope="col">Nombre</th>
                                  <th scope="col">Tipo</th>
                                  <th scope="col"></th>
                                  <th scope="col">Raza</th>
                                  <th scope="col">Acciones</th>
                                </tr>
                              </thead>
                              <tbody>
                                @forelse($property->pets as $pet)
                                  @if($pet->active == true)
                                    <tr>
                                      <td>{{ $pet->name }}</td>
                                      <td>{{ $pet->animal->name }}</td>
                                      <td>{{ $pet->what_type }}</td>
                                      <td>{{ $pet->breed }}</td>
                                      <td>
                                        {{-- <a href="{{ route('properties.show', $property->id) }}" class="btn btn-primary btn-sm">Consultar</a>  --}}
                                        <a href="{{ route('pets.edit', $pet->id) }}" class="btn btn-success btn-sm">Actualizar</a>
                                        <a href="{{ route('pets.active', $pet->id) }}" 
                                            onclick="return confirm('¿Está seguro que desea @if($pet->active == false) habilitar @else eliminar @endif este registro?')" 
                                            class="ml-2 btn @if($pet->active == false) btn-success @else btn-danger @endif btn-sm">@if($pet->active == false) Habilitar @else Eliminar @endif
                                        </a>
                                      </td>
                                    </tr>
                                  @endif
                                @empty
                                  <tr><td>No hay mascotas registradas</td></tr>
                                @endforelse
                              </tbody>
                            </table>
                            <table class="table table-sm table-hover"><h6><strong>Mascotas Eliminados</strong></h6>
                              <thead>
                                <tr>
                                  <th scope="col">Nombre</th>
                                  <th scope="col">Tipo</th>
                                  <th scope="col"></th>
                                  <th scope="col">Raza</th>
                                  <th scope="col">Acciones</th>
                                </tr>
                              </thead>
                              <tbody>
                                @forelse($property->pets as $pet)
                                  @if($pet->active == false)
                                    <tr>
                                      <td>{{ $pet->name }}</td>
                                      <td>{{ $pet->animal->name }}</td>
                                      <td>{{ $pet->what_type }}</td>
                                      <td>{{ $pet->breed }}</td>
                                      <td>
                                        {{-- <a href="{{ route('properties.show', $property->id) }}" class="btn btn-primary btn-sm">Consultar</a>  --}}
                                        <a href="{{ route('pets.edit', $pet->id) }}" class="btn btn-success btn-sm">Actualizar</a>
                                        <a href="{{ route('pets.active', $pet->id) }}" 
                                            onclick="return confirm('¿Está seguro que desea @if($pet->active == false) habilitar @else eliminar @endif este registro?')" 
                                            class="ml-2 btn @if($pet->active == false) btn-success @else btn-danger @endif btn-sm">@if($pet->active == false) Habilitar @else Eliminar @endif
                                        </a>
                                      </td>
                                    </tr>
                                  @endif
                                @empty
                                  <tr><td>No hay mascotas registradas</td></tr>
                                @endforelse
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>        
                    </div>

                    <div class="tab-pane fade" id="feedback" role="tabpanel" aria-labelledby="feedback-tab">
                      <div class="row">  
                        <div class="mt-3 ml-3 mb-3 col-md-12 row">
                          
                          {{-- <form class="form-horizontal" action="{{ route('properties.sendFeedback') }}" method="post">
                            @csrf --}}
                            <fieldset class="col-md-10">
                              <p>Cómo te ha parecido esta aplicación? Cuentanos tu experiencia al usarla y dinos qué podemos hacer para mejorarla.</p>
                              <!-- Message body -->
                              <div class="form-group">
                                <label class="col-md-12 control-label" for="message">Su opinión:</label>
                                <div class="col-md-12">
                                  <textarea class="form-control" id="message" name="message" placeholder="Por favor ingrese su mensaje aqui..." rows="5"></textarea>
                                </div>
                              </div>
                      
                              <!-- Form actions -->
                              <div class="form-group">
                                <div class="col-md-12 text-right">
                                  <button type="submit" class="btn btn-primary btn-sm">Enviar</button>
                                </div>
                              </div>
                            </fieldset>
                          {{-- </form> --}}
                        </div>
                      </div>        
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary">Actualizar</button>
          </div>          
        </div>
      </form>
    </div>
  </div>
</div>
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script type="text/javascript">

$(document).ready(function() {
    //set initial state.
    
    $('#show-active').change(habitantes);
    function habitantes() {
      var property_id=$(this).val();
      // console.log(property_id);
      var div = $(this).parent().parent().parent(); //The parents() method returns all ancestor elements of the selected item
      // console.log(div);

      var op = " ";
      var surl = " ";
      var a = "";
      if(this.checked) {
        surl = '{{ URL::to('findinactivehabitants')}}';
      }else{
        surl = '{{ URL::to('findallhabitants')}}';
      }

      //Mostrar todos los registros
      $.ajax({
        type: 'get',
        url: surl,
        data: {'property_id':property_id},
        dataType: 'json', //returned data will be json
        success:function(data){
          console.log(data);
          for(var i = 0; i < data.length; i++){
            a = "confirm('¿Está seguro que desea habilitar este registro?')";
            
            op += '<tr><td>' + data[i].name + '</td><td>' + data[i].idnumber + '</td><td>' + data[i].cellphone_number + '</td><td>' + data[i].rel_name + '</td><td><a href="/habitants/' + data[i].id + '/edit"' + a + ' class="btn btn-warning btn-sm">Editar</a><a href="/habitants/' + data[i].id + '/active" class="ml-2 btn btn-sm ';
              if(data[i].active == false){
                op += 'btn-success">Habilitar</a>';
              }else{
                op += 'btn-danger">Eliminar</a>';
              }
              op += '</td><tr>';
          }
          
          div.find('.habitantes').html(" ");
          div.find('.habitantes').html(op);
        },
        error:function(){

        }
      });
    }
});


{{-- @foreach($property->habitants as $habitant)
  @if($habitant->active != null)
    <tr>
      <td>{{ $habitant->name }}</td>
      <td>{{ $habitant->idnumber }}</td>
      <td>{{ $habitant->cellphone_number }}</td>
      <td>{{ $habitant->relationship->name }}</td>
      <td>
        <a href="{{ route('habitants.edit', $habitant->id) }}" class="btn btn-warning btn-sm">Editar</a>
      
        <a href="{{ route('habitants.active', $habitant->id) }}" 
            onclick="return confirm('¿Está seguro que desea @if($habitant->active == false) habilitar @else eliminar @endif este registro?')" 
            class="ml-2 btn @if($habitant->active == false) btn-success @else btn-danger @endif btn-sm">@if($habitant->active == false) Habilitar @else Eliminar @endif</a>
      </td>
    </tr>
  @endif
@endforeach
 --}}
</script>
@endsection
