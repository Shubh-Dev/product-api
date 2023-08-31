<script setup>
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

const form = reactive({
    email: '',
    password: '',
})

function submit() {
    router.post('/login', form)
}
</script>

<template>
    <form @submit.prevent="submit">
        <label for="Email">Enter Email:</label>
        <input id="email" v-model="form.email" />
        <label for="password">Enter Password:</label>
        <input id="passsword" v-model="form.password" />
        <button type="submit">Submit</button>
    </form>
</template>