@extends('layouts.app')

@section('content')

<b-container>

    <b-row align-h="center">
        
        <b-col cols="8">
                <b-card
                title="Register"
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

                           

                        <b-form method="POST" action="{{ route('register') }}">
                            
                            {{csrf_field()}}

                            <b-form-group
                            label="Ingrese su nombre"
                            label-for="name"
                            >
                                <b-form-input
                                id="name"
                                type="name"
                                name="name"
                                required focused
                                value= "{{old('name')}}"
                                placeholder="Pedro"
                                ></b-form-input>
                            </b-form-group>
                            
                            <b-form-group
                            label="Ingrese su correo electronico"
                            label-for="email"
                            description="sos bute xd"
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
                                id="password"
                                type="password"
                                name="password"
                                required
                                ></b-form-input>
                            </b-form-group>

                            <b-form-group
                            label="Confirme su contraseña"
                            label-for="pass"
                            
                            >
                                <b-form-input
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                required
                                ></b-form-input>
                            </b-form-group>
                            
                            <b-form-group>
                            <b-button type="submit" variant="primary">Confirmar Registro</b-button>
                           
                            <b-button href="{{ route('login') }}" variant="link">¿Ya estas registrado?</b-button>
                           
                            </b-form-group>   
                        <b-form>
                    </b-card-body>
                </b-card>
        </b-col>
       
    </b-row>

</b-container>
 
@endsection
