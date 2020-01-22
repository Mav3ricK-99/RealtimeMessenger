<template>

<b-row class="h-100">

    <b-col cols="8" class="h-100">
         
         <b-card
         class="h-100"
         title="Conversacion activa"
         >

            <b-media class="mb-2">
            <template v-slot:aside>
                <b-img rounded='circle' blank width='48' height='48' blank-color='#777' class="m-1"></b-img>
            </template>

            <b-card>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
                Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc
                ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </b-card>
          
            </b-media>

           <b-media right-align vertical-align="center" class="mb-2">

            <template v-slot:aside>
            <b-img rounded='circle' blank width='48' height='48' blank-color='#777' class="m-1"></b-img>
            </template>

            <b-card>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
                Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac
                nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </b-card>
        </b-media>
            



           <div slot="footer" class="h-100">   
                <b-form class="mb-0">
                   
                <b-input-group class="mt-3">
                    <b-form-input class="text-center"
                    type="text"
                    placeholder="Envia un mensaje . . ."
                    ></b-form-input>

                    <b-input-group-append>
                    <b-button variant="primary">Button</b-button>
                    </b-input-group-append>
                </b-input-group>

                </b-form>
            </div>

         </b-card>

    </b-col>

    <b-col cols="4">
            <b-img rounded='circle' blank width='65' height='65' blank-color='#777' class="m-1"></b-img>
            <p>Usuario Maverick</p>
        <b-form-checkbox>
                Desactivar notificaciones
        </b-form-checkbox>
    </b-col>

</b-row>

</template>

<script>
    export default {
        data(){
            return {
            
            };
        },
        mounted() {}
    }