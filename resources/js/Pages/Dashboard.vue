<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <message :message="message" :status="status" />
                    <list-users :people = "users.data" :first="users.first_page_url" :last="users.last_page_url"
                                :next="users.next_page_url" :links="users.links" :total="users.total" 
                                :prev="users.prev_page_url" :to="users.to"/>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import ListUsers from '../Jetstream/ListUsers.vue'
    import Message from '../Jetstream/Message.vue'


    export default {
        components: {
            AppLayout,
            ListUsers,
            Message,
        },
        props: ['users','status','message']
    }
</script>
