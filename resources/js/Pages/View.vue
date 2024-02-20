<script setup>
import { useForm } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3'
const props = defineProps({
    errors: Object,
    customer: Object,
})

const form = useForm({
    name:props.customer.name,
    email:props.customer.email,
    phone:props.customer.phone,
});



</script>

<template>
    <div class="card">
  <div class="card-header">
    Featured
  </div>
  <div class="card-body">
        <form>
    <div class="mb-3">
       <label for="name">Name</label>
       <input type="text" class="form-control" placeholder="Enter name" id="name" v-model="form.name">
       <div class="text-danger" v-if="errors.name">{{ errors.name }}</div>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" v-model="form.email" placeholder="Enter Email">
        <div class="text-danger" v-if="errors.email">{{ errors.email }}</div>

    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="phone" v-model="form.phone" placeholder="Enter phone">
        <div class="text-danger" v-if="errors.phone">{{ errors.phone }}</div>

    </div>
    
    <div class="d-flex justify-content-between">
        
        <Link href="/customers/data" method="get" as="button" class="btn btn-primary">All Customer</Link>
    </div>
    </form>
  </div>
</div>
</template>