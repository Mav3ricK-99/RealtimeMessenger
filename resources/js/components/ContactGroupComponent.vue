<template>
    <div>
        <b-form class="my-3 mx-2">
           <b-form-input class="text-center"
           id="mensaje"
           type="text"
           placeholder="A quien buscas? . . ."
           ></b-form-input>
        </b-form>

        <b-list-group>
            <contact-component 
             v-for= "conversations in conversations"
             :key="conversations.id"
             :conversations="conversations"
             @click.native="selectConversation(conversations)"
            
            ></contact-component>
        </b-list-group>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                conversations: []
            };
        },
        mounted() {
            this.getConversations();
        },
        methods: {

            getConversations()
            {
                axios.get('api/conversations').then((response) => 
                {
                    this.conversations = response.data;
                });
            },

            selectConversation(conversations)
            {
                this.$emit("conversationSelected", conversations);
            }
        }
    }
</script>
