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
                    :contactName="selectedConversation.contact_name">

                </active-conversation-component>
            </b-col>

        </b-row>

    </b-container>
</template>
<script>
export default 
    {
        data(){
            return{
                selectedConversation: null
            };
        },
        mounted() {},
        
        methods: {

            changeConversation(conversation)
            {
               //console.log(conversation)
               this.selectedConversation = conversation;
            },

        },
    }
</script>