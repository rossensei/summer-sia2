<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import TextInput from '@/Components/TextInput.vue';
import CustomerCard from '@/Components/CustomerCard.vue';
import { Link, router, usePage } from '@inertiajs/vue3';

defineProps({
    accounts: Array
});

function search(ev) {
    router.visit('/accounts/search/' + ev.target.value)
}
</script>

<template>
    <AppLayout title="Accounts">
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Accounts
                </h2>
                <TextInput class="w-1/4" placeholder="Search keyword" @keydown.enter="search($event)" />

                <Link v-if="$page.props.auth.user.permissions.includes('create')" href="/accounts/create" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Create</Link>
            </div>
        </template>
        
        <div class="py-6">
            <div v-if="accounts.length >= 1 " class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-wrap">
                <CustomerCard v-for="account in accounts" :key="account.id" :account="account" />
            </div>
            <div v-if="accounts.length <= 0" class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-wrap">
                <span class="text-xl font-normal">No accounts found.</span>
            </div>
        </div>
    </AppLayout>
</template>
