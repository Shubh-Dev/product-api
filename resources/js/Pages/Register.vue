<template>
    <Layout>
    <div>
     <form @submit.prevent="submit">
        <label for="name">Name</label>
        <br>
        <input type="text" id="name" name="name" v-model="form.name">
        <div v-if="form.errors.name" v-text="form.errors.name" class="error"></div>
        <br>
        <br>
        <label for="email">Email</label>
        <br>
        <input type="email" id="email" name="email" v-model="form.email">
        <div v-if="form.errors.email" v-text="form.errors.email" class="error"></div>
        <br>
        <br>
        <label for="password">Password</label>
        <br>
        <input type="password" id="password" name="password" v-model="form.password">
        <div v-if="form.errors.password" v-text="form.errors.password" class="error"></div>
        <br>
        <br>
        <label for="password_confirmation">Confirm Password</label>
        <br>
        <input type="password" id="password_confirmation" name="password_confirmation" v-model="form.password_confirmation">
        <div v-if="form.errors.password" v-text="form.errors.password" class="error"></div>
        <br>
        <br>
        <button type="submit" :disabled="form.processing">Submit</button> 
     </form>

    </div>
    </Layout>
</template>
<script setup>
import { useForm } from '@inertiajs/vue3';
import Layout from './Layout.vue'


const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
  form.post('/register');

};
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
