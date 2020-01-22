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
            <contact-component variant="dark"></contact-component>
        </b-list-group>
    </div>
</template>

<script>
    export default {
        data(){
            return {
            
            };
        },
        mounted() {}
    }
</script>
