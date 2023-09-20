<template>
    <div>
        <div v-if="$page.props.flash.success" class="text-blue-600 mb-4">
            {{ $page.props.flash.success  }}

        </div>
        <p></p>
        <h1>This is vue Layout</h1>
        <slot />
    </div>
</template>
<script setup>


</script>
<style scoped>

    h1 {
        color: red;
        font-size: 30px;
    }
</style>

