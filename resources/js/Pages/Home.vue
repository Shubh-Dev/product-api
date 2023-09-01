<template>
  <Layout>
<div>
  <Link href="/login" as="button" type="button">Login</Link>
  <br>
  <br>
  <br>

  <Link href="/register">Register</Link>

  <br>
  <br>
  <br>
  <Link href="/dashboard">Go Dashboard</Link>
  
</div>
  </Layout>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import Layout from './Layout.vue'
</script>



