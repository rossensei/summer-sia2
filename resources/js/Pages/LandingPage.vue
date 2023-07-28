<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    }
});
</script>

<template>
    <Head title="Welcome" />

    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900">
            <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">

                <div>
                    <Link
                    v-if="$page.props.auth.user"
                    :href="route('dashboard')"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Dashboard</Link>

                    <template v-else>
                        <Link
                            :href="route('login')"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                            >Log in</Link
                        >

                        <Link
                            v-if="canRegister"
                            :href="route('register')"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                            >Register</Link
                        >
                    </template>
                </div>
            </div>
        <div class="max-w-7xl mx-auto">
            <img src="../Components/icons/electrician1.png" alt="" class="w-[350px] mx-auto">
            <div class="text-center w-full">
                <h1 class="text-4xl font-semibold text-gray-600">An electricity company that puts you first!</h1>
                <p class="text-lg font-normal">Sign-up today and get a great rate that fits your energy needs</p>
            </div>
            <div class="flex justify-end mt-5">
                <Link
                    :href="route('register')"
                    class="px-4 py-1.5 bg-blue-600 hover:bg-blue-500 text-white rounded-lg"
                    >Get Started</Link
                >
            </div>
        </div>
    </div>
</template>