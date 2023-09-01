<template>
  <Layout>
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
  </Layout>
</template>
<script setup>
import { Link } from '@inertiajs/vue3'
import Layout from './Layout.vue'
</script>

