<template>
   <b-list-group-item :variant=variant>
                        <b-row class="p-2" align-h='center'>
                    
                            <b-col cols="12" md="3" class="text-center">
                                <b-img rounded='circle' blank width='65' height='65' blank-color='#777' class="m-1"></b-img>
                            </b-col>   
        
                            <b-col cols="6" align-self='center' class="d-none d-md-block">
                                <p class='mb-1'>{{ contact_name }}</p>
                                <p class="text-muted small mb-1">Tu: {{ lastmessage }}</p>
                            </b-col>
                            
                            <b-col cols="3" class="d-none d-md-block">
                                <p class="text-muted small"> {{ lastmessage_date }} </p>
                            </b-col>
                               
                                
                        </b-row>
                    </b-list-group-item>
</template>

<script>
    export default {
        props:[
            "variant",
        ],
        data(){
            return {
            'contact_name': 'Zukaritas',
            'lastmessage': 'ultimo mensje xd',
            'lastmessage_date': '4:20 AM'
            };
        },
        mounted() {}
    }
</script>
