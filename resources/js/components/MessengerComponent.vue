<template>
    <b-container fluid style="height:calc(100vh - 56px)">

        <b-row class="h-100" no-gutters>

            <b-col cols="4" >
                    <contact-group-component 
                    @conversationSelected="changeConversation($event)"
                    :conversations = "conversations"
                    ></contact-group-component>
            </b-col>

            <b-col cols="8">
                <active-conversation-component
                    v-if="selectedConversation"
                    :contactID="selectedConversation.contact_id"
                    :contactName="selectedConversation.contact_name"
                    :messages="messages"
                    @messageCreated = "addMessage($event)"
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
                conversations: [],
            };
        },
        mounted() {
            this.getConversations();

            Echo.channel(`usuario.${this.userId}`)
            .listen('MessageSent', (data) => {
                const message = data.message;
                message.written_by_me = false;
                this.addMessage(message);
                
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
            addMessage(message){

                const conversation = this.conversations.find((conversation) => {
                    return conversation.contact_id == message.from || conversation.contact_id == message.to;
                });

                const author = this.userId === message.from ? 'Tu' : conversations.contact_name;
                conversation.last_message = `${author} : ${message.message}`;
                conversation.last_message_time = `${message.created_at}`;

               if(this.selectedConversation.contact_id == message.from ||  this.selectedConversation.contact_id == message.to){
                    this.messages.push(message);
                }
            },
            getConversations()
            {
                axios.get('api/conversations').then((response) => 
                {
                    this.conversations = response.data;
                });
            },
        }
    }
</script>