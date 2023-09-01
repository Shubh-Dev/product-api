<template>
    <div>
        <h1>This is vue Layout</h1>
        <div>
             <x-notify::notify />
        </div>
        <slot />
    </div>
</template>
<script setup>
import { defineProps, ref } from 'vue'
const props = defineProps({
    notify: Function,
})

const notification = ref(props.notify)
console.log(props.notify)
</script>

<style scoped>
    h1 {
        color: red;
        font-size: 30px;
    }
</style>
