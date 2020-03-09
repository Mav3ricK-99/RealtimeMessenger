<template>
    <b-container fluid style="height:calc(100vh - 56px)">

        <b-row class="h-100" no-gutters>

            <b-col cols="4" >
                    <contact-group-component @conversationSelected="changeConversation($event)"></contact-group-component>
            </b-col>

            <b-col cols="8">
                <active-conversation-component
                    v-if="selectedConversation"
                    :contactID="selectedConversation.contact_id"
                    :contactName="selectedConversation.contact_name"
                    :messages="messages"
                    >

                </active-conversation-component>
            </b-col>

        </b-row>

    </b-container>
</template>
<script>
export default 
    {
        props:{
            userId: Number,
        },

        data(){
            return{
                selectedConversation: null,
                messages: [],
            };
        },
        mounted() {
            Echo.channel(`ejemplo`)
            .listen('MessageSent', (data) => {
                const message = data.message;
                message.written_by_me = (this.userId == message.from);
                this.messages.push(message);
                
            });
            
        },
        
        methods: {

            changeConversation(conversation)
            {
               /*   console.log(conversation)
                    Selecciona el id del contacto y lo refreshea en el ActiveConversation
               */
               this.selectedConversation = conversation;
               this.getMessages();
               
            },

            getMessages()
            {
                axios.get(`/api/messages?contact=${this.selectedConversation.contact_id}`).then(
                (response) => {
                    this.messages = response.data
                    });
            },
        }
    }
</script>