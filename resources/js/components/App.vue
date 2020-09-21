<template>
    <div>
        <div>
            <div>input</div>
            <div><input v-model="message" /></div>
        </div>
        <div>
            <div>message: </div>
            <div>{{ message }}</div>
        </div>
        <div><button @click="ClickRemoveMessage()">Remove Mesage</button></div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            message: "Hello Tutorail laravel and vue"
        }
    },
    methods: {
        ClickRemoveMessage(){
            this.message = null;
        }
    }
}
</script>