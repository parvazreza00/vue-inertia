<script setup>
import { useForm } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3'

const form = useForm({
    name:null,
    email:null,
    phone:null,
});

function submit(){
    router.post('/customers',form)
}

defineProps({
    errors: Object
});

</script>

<template>
    <div class="card">
  <div class="card-header">
    Customer
  </div>
  <div class="card-body">
        <form @submit.prevent="submit">
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
        <button type="submit" class="btn btn-primary">Submit</button>
        <Link href="/customers/data" method="get" as="button" class="btn btn-primary">All Customer</Link>
    </div>
    </form>
  </div>
</div>
</template>