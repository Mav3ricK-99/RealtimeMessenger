<template>
    
        <b-list-group>
            <contact-component 
             v-for= "conversation in conversations"
             :key="conversation.id"
             :conversation="conversation"
             :selected="selectedConversationID === conversation.contact_id"
             @click.native="selectConversation(conversation)"
            
            ></contact-component>
        </b-list-group>
  
</template>

<script>
    export default {
        props:{
            conversations: Array,
        },
        data(){
            return {
                selectedConversationID: null,
            };
        },
        mounted() {
        },
        methods: {

            selectConversation(conversation)
            {
                this.selectedConversationID = conversation.contact_id;
                this.$emit("conversationSelected", conversation);
            }
        }
    }
</script>
