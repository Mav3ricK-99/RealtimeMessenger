<template>
   <b-list-group-item :variant=variant>
                        
        <b-row class="p-2" align-h='center'>
                    
            <b-col cols="12" md="3" class="text-center">
                <b-img rounded='circle' blank width='65' height='65' blank-color='#777' class="m-1"></b-img>
            </b-col>   
        
            <b-col cols="5" align-self='center' class="d-none d-md-block">
                <p class='mb-1'>
                    <b-img rounded='circle' blank width='10' height='10' :blank-color="conversation.online ? 'green' : 'gray' " class="m-1"></b-img>
                    {{ conversation.contact_name }}</p>
                <p class="text-muted small mb-1"> {{ conversation.last_message }}</p>
            </b-col>
                            
            <b-col cols="4" class="d-none d-md-block">
                <p class="text-muted small"> {{ lastTime }} </p>
            </b-col>
                               
                                
        </b-row>
        
    </b-list-group-item>
</template>

<script>
    export default {
        props:{
            selected: Boolean,
            conversation: Object,
        },
        data(){
            return {
            };
        },
        mounted() {},
        
        computed: {
            lastTime(){
                return Moment(`${this.conversation.last_message_time}`, "YYYY-MM-DD hh:mm:ss")
                .locale('es')
                .fromNow();
            },
            variant(){
                return this.selected ? 'secondary' : '';
            }
        }
    }
</script>
