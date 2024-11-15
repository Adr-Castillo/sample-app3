<!-- resources/js/views/Home.vue -->

<template>
    <div class="grid w-full h-[500px] bg-purple-500 items-center justify-center">
        <div>WELCOME TO MIC.COM</div>

        <div>
            <label><input v-model="user.email" type="text" placeholder="email"></label>
        </div>

        <div>
            <label><input v-model="user.password" type="text" placeholder="password"></label>
        </div>
        <button @click="authUser()">LOG IN</button>

        <div>Not a user yet? <button class="text-red-500">SIGN UP</button></div>
    </div>









</template>

<script>

import axios from 'axios';

export default {
    name: "Login",
    data() {
        return {
            user: {
                email: null,
                password: null
            }
        }
    },
    methods: {

        authUser() {
            if (this.user.email && this.user.password) {
                axios.post('/login', { email: this.user.email, password: this.user.password })
                    .then(data => {       
                        console.log(data.user);    // This will log the user object
                        console.log(data.token);  
                        console.log("Hello World");  
                        
                    })
            }
        }
    }
}

</script>