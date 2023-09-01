<template>
    <Layout>
    <form @submit.prevent="submit">
        <label for="Email">Enter Email:</label>
        <br>
        <input id="email" v-model="form.email" />
        <div v-if="form.errors.email" v-text="form.errors.email" class="error"></div>
        <br>
        <br>
        <label for="password">Enter Password:</label>
        <br>
        <input id="passsword" type="password" v-model="form.password" />
        <div v-if="form.errors.password" v-text="form.errors.password" class="error"></div>
        <br>
        <br>
        <button type="submit" :disabled="form.processing">Submit</button>
    </form>
    </Layout>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import Layout from './Layout.vue'
const form = useForm({
    email: '',
    password: '',
})

function submit() {
    form.post('/login')
}
</script>
<style scoped>
    input {
       border: 1px solid #292727;
    }
    .error {
        color: red;
    }
    button {
        background-color: #292727;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
    }

    button:disabled {
         background-color: #ccc;
         color: #666;
    }

    form {
        margin-top: 20px;
        margin-left: 20px;
    }
</style>


