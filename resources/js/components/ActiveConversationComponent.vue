<template>

<b-row class="h-100">

    <b-col cols="8" class="h-100">
         
         <b-card
         no-body
         class="h-100"
         title="Conversacion activa"
         >
 
         <b-card-body class="b-card-body">
            <message-conversation-component 
                v-for="messages in messages"
                :key = "messages.id"
                :written-by-me = "messages.written_by_me">

                {{messages.message}}

            </message-conversation-component>
         </b-card-body>

          <div slot="footer" class="h-100">   
                <b-form class="mb-0" @submit.prevent='postMessage'>
                   
                <b-input-group>
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

<style>
    .b-card-body{
        max-height: calc(100vh - 122px);
        overflow-y: auto;
    }

</style>

<script>
    export default {
       props:{
           contactID: Number,
           contactName: String,
       },  
        data(){
            return {
                messageData: '',
              
            };
        },
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
                        const message = response.data.message;
                        message.written_by_me = true;
                        this.$emit('messageCreated',message);
                        this.messageData = '';
                     }
                     
                    });
            },
            scrollToBottom(){
                const element = document.querySelector('.b-card-body');
                element.scrollTop = element.scrollHeight;
            }
        },
        computed:{
            messages(){
                return this.$store.state.messages;
            }

        },
            //Cuando cambia una variable de la vista al renderizar.
        updated()
        {
            this.scrollToBottom();
        }
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