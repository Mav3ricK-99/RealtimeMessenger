<template>

<b-row class="h-100">

    <b-col cols="8" class="h-100">
         
         <b-card
         class="h-100"
         title="Conversacion activa"
         >
 
           <message-conversation-component v-for="messages in messages"
                                           :key = "messages.id"
                                           :written-by-me = "messages.written_by_me">
                                           {{messages.message}}
            </message-conversation-component>

           <div slot="footer" class="h-100">   
                <b-form class="mb-0" @submit.prevent='postMessage'>
                   
                <b-input-group class="mt-3">
                    <b-form-input class="text-center"
                    type="text"
                    v-model="messageData"
                    placeholder="Envia un mensaje . . ."
                    autocomplete="off"
                    ></b-form-input>

                    <b-input-group-append>
                      <b-button variant="primary" type="submit">Button</b-button>
                    </b-input-group-append>
                </b-input-group>

                </b-form>
            </div>

         </b-card>

    </b-col>

    <b-col cols="4">
            <b-img rounded='circle' blank width='65' height='65' blank-color='#777' class="m-1"></b-img>
            <p>{{contactName}}</p>
        <b-form-checkbox>
                Desactivar notificaciones
        </b-form-checkbox>
    </b-col>

</b-row>

</template>

<script>
    export default {
       props:{
           contactID: Number,
           contactName: String,
           messages: Array,
       },  
        data(){
            return {
                messageData: '',
              
            };
        },
        mounted() {},
        methods: {
            
            postMessage(){
                const params = {
                    'to': this.contactID,
                    'message': this.messageData,
                }

                axios.post('/api/messages', params).then(
                 (response) => {
                     if(response.data.success)
                     {
                        this.messageData = '';
                     }
                     
                    });
            },
        },
        /*

        El metodo de abajo mira constantemente si hay cambios en alguna variable en especifico.

        watch:{
            contactID(value)
            {
                //console.log(`contactID => ${this.contactID}`);
                this.getMessages();
            }
        }
        */
    }
</script>