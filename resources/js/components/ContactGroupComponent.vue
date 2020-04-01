<template>
    
        <b-list-group>
            <contact-component 
             v-for= "conversation in conversations"
             :key="conversation.id"
             :conversation="conversation"
             :selected="isSelected(conversation)"
             @click.native="selectConversation(conversation)"
            
            ></contact-component>
        </b-list-group>
  
</template>

<script>
    export default {
        props:{
            conversations: Array,
        },
        mounted() {
        },
        methods: {
            selectConversation(conversation)
            {
                this.$store.dispatch('getMessages',conversation);
                // Event Bus - eventBus.$emit("conversacionSeleccionada", conversation);
            },
            isSelected(conversation){
                if(this.selectedConversation)
                    return this.selectedConversation.contact_id === conversation.contact_id;
                
                return false;
            },
        },
        computed:{
            selectedConversation(){
                return this.$store.state.selectedConversation;
            },
        },
    }
</script>
