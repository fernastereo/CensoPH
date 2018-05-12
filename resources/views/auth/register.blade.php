@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} phone" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

{{--                         <div class="form-group row">
                            <label for="towers" class="col-md-4 col-form-label text-md-right">{{ __('Torre') }}</label>

                            <div class="col-md-4">
                              @if($towers != null)

                                <select id="towers" class="form-control{{ $errors->has('towers') ? ' is-invalid' : '' }} tower" name="towers">
                                  <option value="0" selected disabled>-- Seleccione --</option>
                                  @foreach($towers as $tower)
                                    @if($tower->id == old('towers', $tower->id))
                                      <option value="{{ $tower->id }}">{{ $tower->name }}</option>
                                    @else
                                      <option value="{{ $tower->id }}">{{ $tower->name }}</option>
                                    @endif
                                  @endforeach
                                </select>

                                @if ($errors->has('towers'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('towers') }}</strong>
                                    </span>
                                @endif
                              @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="properties" class="col-md-4 col-form-label text-md-right">{{ __('Apartamento') }}</label>

                            <div class="col-md-4">
                                <select id="properties" class="form-control{{ $errors->has('properties') ? ' is-invalid' : '' }} property" name="properties">
                                </select>

                                @if ($errors->has('properties'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('properties') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
 --}}
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> --}}
<script type="text/javascript">
  $(document).ready(function(){
    //this means if your document is ready. if your current page with all files is ready then run a function
    $(document).on('change', '.tower', function(){
      // Here 'change' is an event
      // the Dot (.) means its class attribute
      // tower is an class attribute name since it class so there is dot(.) that is .tower
      // console.log('changing');

      var tower_id=$(this).val();
      // console.log(tower_id);

      var div = $(this).parent().parent().parent(); //The parents() method returns all ancestor elements of the selected item
      // console.log(div);

      var op = " ";
      $.ajax({
        // type: The type of request to make, which can be either POST or GET
        // Here in our project we will use GET because we will send tower id, then get the this specific id's properties name
        // data: The data to send to the server when performing the Ajax request.
        // dataType: The type of data expected back from the server.
        // success: a function to be called if the request succeeds
        // error: a function to be called if the request fails.
        type: 'get',
        url: '{{ URL::to('fetch')}}', //refers to route /fetch
        data: {'id':tower_id},
        success:function(data){
          // console.log('success');

          // console.log(data);

          // console.log(data.length);

          op += '<option value="0" selected disabled>-- Seleccione --</option>';
          for(var i = 0; i < data.length; i++){
            op += '<option value="' + data[i].id + '">' + data[i].name + '</option>';
          }

          div.find('.property').html(" ");
          div.find('.property').html(op);
        },
        error:function(){

        }
      });
    });

    // $(document).on('change', '.property', function(){
    //   var property_id = $(this).val();

    //   var a = $(this).parent().parent().parent();
    //   var op = " ";

    //   $.ajax({
    //     type: 'get',
    //     url: '{{ URL::to('findsomething')}}', //refers to route /findsomething
    //     data: {'id':property_id},
    //     dataType: 'json', //returned data will be json
    //     success:function(data){
    //       console.log(data);
    //       a.find('.phone').val(data[0].phone_number);
    //     },
    //     error:function(){

    //     }
    //   });      
    // });
  });
</script>
@endsection
