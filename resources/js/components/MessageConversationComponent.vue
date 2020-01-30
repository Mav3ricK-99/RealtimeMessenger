<template>
    <b-media :right-align="writtenByMe" vertical-align="center" class="mb-2">

            <template v-slot:aside>
            <b-img rounded='circle' blank width='48' height='48' blank-color='#777' class="m-1"></b-img>
            </template>

            <b-card>
                <slot></slot>
            </b-card>
    </b-media>
</template>

<script>
    export default {
        props:{
            writtenByMe: Boolean,
        },
        data(){
            return {};
        },
        mounted() {}
    }
</script>
