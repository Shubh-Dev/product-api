<template>
<div>
  <Link href="/login" method="post" as="button" type="button">Login</Link>
  <br>
  <br>
  <br>

  <Link href="/register">Register</Link>

  <br>
  <br>
  <br>
  <Link href="/dashboard">Go Dashboard</Link>
  
</div>

</template>

<script setup>
import { Link } from '@inertiajs/vue3'
</script>



