<template>
    <div>
        {{ notify("Success") }}
    </div>
</template>
<script setup>

const props = defineProps({
    notify: Function,
})

</script>

