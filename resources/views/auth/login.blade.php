@extends('layouts.app')

@section('content')

<b-container class="py-4">

    <b-row align-h="center">
        
        <b-col cols="8">
                <b-card
                title="Login"
                tag="article"
                class="my-3" >
                    
                    <b-card-body>

                        @if($errors->any())
                        
                            <b-alert show variant="danger">
                                
                                <ul class="mb-0">

                                    @foreach($errors->all() as $error)
                                    
                                        <li>{{$error}}</li>
                                    
                                    @endforeach
                                </ul>

                            </b-alert>
                        
                        @else
                            <b-alert show variant="info">Ingrese sus datos para el registro.</b-alert>
                        @endif

                        <b-form method="POST" action="{{ route('login') }}">
                            
                            {{csrf_field()}}
                            
                            <b-form-group
                            label="Ingrese su correo electronico"
                            label-for="email"
                            >
                                <b-form-input
                                id="email"
                                type="email"
                                name="email"
                                required focused
                                value= "{{old('email')}}"
                                placeholder="federico_99@live.com.ar"
                                ></b-form-input>
                            </b-form-group>

                            <b-form-group
                            label="Ingrese su contraseña"
                            label-for="pass"
                            
                            >
                                <b-form-input
                                id="pass"
                                type="password"
                                name="password"
                                required
                                ></b-form-input>
                            </b-form-group>

                            <b-form-group
                            label="Ingrese su contraseña"
                            label-for="pass"
                            
                            >
                            <b-form-checkbox
                            id="remember"
                            name="remember"
                            >
                            Recordar sesion
                            </b-form-checkbox>
                            </b-form-group>

                            <b-form-group>
                            <b-button type="submit" variant="primary">Login</b-button>
                           
                            @if (Route::has('password.request'))
                                  <b-button href="{{ route('password.request') }}" variant="link">¿Olvidaste tu contraseña?</b-button>
                            @endif
                            </b-form-group>   
                        <b-form>
                    </b-card-body>
                </b-card>
        </b-col>
       
    </b-row>

</b-container>

@endsection
