<template>
    <div>
     <form @submit.prevent="submit">
        <input type="hidden" name="_token" :value="csrfToken">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" v-model="form.name">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" v-model="form.email">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" v-model="form.password">
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" v-model="form.password_confirmation">
        <button type="submit">Register</button> 
     </form>
     <div v-if="form.errors.name" class="error">{{ form.errors.name[0] }}</div>
        <div v-if="form.errors.email" class="error">{{ form.errors.email[0] }}</div>
        <div v-if="form.errors.password" class="error">{{ form.errors.password[0] }} </div>

    </div>
</template>
<script setup>
import { useForm, router } from '@inertiajs/vue3';
const csrfToken = '{{ csrf_token() }}';



const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    console.log("FORMDATA: ", form.data, "ROUTER:" , router)
    router.post('/register', form);
};
</script>
