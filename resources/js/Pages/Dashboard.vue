<template>
    <div>
       <p>This is Dashboard</p> 
       <br>
         <br>
         <br>
         <Link href="/logout" method="post" as="button" type="button">Logout</Link>
         <br>
         <br>
         <br>
         <Link href="/">Go Home</Link>
    </div>
</template>
<script setup>
import { Link } from '@inertiajs/vue3'
</script>
