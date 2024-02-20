<script setup>

defineProps({
    customers : Object
});
import { router } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3'

function destroy(id){
    router.delete('/customers/'+id);
}
function edit(id){
    router.get('/customers/'+id+'/edit');    
}
function view(id){
    router.get('/customers/'+id+'/view');    
}

</script>


<template>
    <br>
    
    
    <div v-if="$page.props.flash.message" class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Holy guacamole!</strong> {{ $page.props.flash.message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <div>        
        <Link href="/customers/create" method="get" as="button" class="btn btn-primary">Add Customer</Link>
    </div>
    <br>
    <div class="card">
        
        
        <table class="table table-border">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="customer in customers">
                    <td>{{ customer.name }}</td>
                    <td>
                        <button @click.prevent="view(customer.id)" class="btn btn-info">view</button>
                        <button @click.prevent="edit(customer.id)" class="btn btn-primary">Edit</button>
                        <button @click.prevent="destroy(customer.id)"   class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>