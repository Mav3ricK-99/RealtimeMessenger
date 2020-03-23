<template>
    <b-container fluid style="height:calc(100vh - 56px)">

        <b-row class="h-100" no-gutters>

            <b-col cols="4" >
                <b-form class="my-3 mx-2">
                    <b-form-input class="text-center"
                    id="mensaje"
                    v-model="querySearch"
                    type="text"
                    placeholder="A quien buscas? . . ."
                    ></b-form-input>
                </b-form>

                <contact-group-component 
                @conversationSelected="changeConversation($event)"
                :conversations = "conversationsFiltered"
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
                querySearch: '',
            };
        },
        mounted() {
            this.getConversations();
            
            Echo.private(`usuario.${this.userId}`)
            .listen('MessageSent', (data) => {
                const message = data.message;
                message.written_by_me = false;
                this.addMessage(message);
                
            });

            Echo.join('globalRoom')
            .here(users => {
                users.forEach((user) => this.changeStatus(user, true));
            })
            .joining(
                user => this.changeStatus(user, true)
            )
            .leaving(
                user => this.changeStatus(user, false)
            )
            
        },
        
        methods: {

            changeConversation(conversation){
            
               /*   console.log(conversation)
                    Selecciona el id del contacto y lo refreshea en el ActiveConversation
               */
               this.selectedConversation = conversation;
               this.getMessages();
               
            },

            getMessages(){
            
                axios.get(`/api/messages?contact=${this.selectedConversation.contact_id}`).then(
                (response) => {
                    this.messages = response.data
                    });
            },
            addMessage(message){

                const conversation = this.conversations.find((conversation) => {
                    return conversation.contact_id == message.from || conversation.contact_id == message.to;
                });

                const author = this.userId === message.from ? 'Tu' : conversation.contact_name;
                conversation.last_message = `${author} : ${message.message}`;
                conversation.last_message_time = `${message.created_at}`;

                if(this.selectedConversation.contact_id == message.from ||  this.selectedConversation.contact_id == message.to){
                     this.messages.push(message);
                }
            },
            getConversations(){
            
                axios.get('api/conversations').then((response) => 
                {
                    this.conversations = response.data;
                });
            },

            changeStatus(user, status){
                const index = this.conversations.findIndex((conversation) => {
                    return conversation.contact_id == user.id;
                });
                //Lo de abajo agrega una propiedad a un objeto para que Vue pueda saber si esta cambia.
                if(index >= 0){
                    this.$set(this.conversations[index],'online',status);
                }
            },
        },

        computed: {
            conversationsFiltered(){
                return this.conversations.filter(
                    (conversation) => conversation.contact_name.toLowerCase().includes(this.querySearch));
            }
        }
    }
</script>