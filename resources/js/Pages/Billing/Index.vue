<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';

const prop = defineProps({
    account: Object
})

function getFormattedDate(date) {

const d = new Date(date)

const formatter = new Intl.DateTimeFormat('en', { month: 'long', year: 'numeric' });
const formattedDate = formatter.format(d);

return formattedDate;
}
</script>

<template>
    <AppLayout :title="prop.account.lname + ', ' + prop.account.fname">
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ prop.account.lname }}, {{ prop.account.fname }}'s billing history
                </h2>
                <Link :href="'/accounts/view/' + prop.account.id + '/billings/send-notice-of-disconnection'" as="button"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                >SEND NOTICE OF DISCONNECTION</Link>
            </div>
        </template>

        <div class="py-6">
            <div v-if="prop.account.billings.length >= 1 " class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="flex items-start space-x-4">
                        <div class="border border-1 border-green-500 p-4 w-2/5">
                            <p class="text-base font-normal text-gray-900">
                                Account no.: <strong>0000{{ prop.account.id }}</strong> <br>
                                Account name: <strong>{{ prop.account.lname }}, {{ prop.account.fname }}</strong> <br>
                                Address: <strong>{{ prop.account.address }}</strong> <br>
                                Type: <strong>{{ prop.account.type }}</strong> <br>
                            </p>
                        </div>

                        <table class="w-full border border-1">
                            <thead class="bg-green-500">
                                <th class="px-8 py-1.5">Billing Month</th>
                                <th class="px-8 py-1.5">KWh Used</th>
                                <th class="px-8 py-1.5">Amount Due</th>
                                <th class="px-8 py-1.5">Status</th>
                            </thead>

                            <tbody>
                                <tr v-for="bill in prop.account.billings" :key="bill.id">
                                    <td class="border-b text-center border-1 py-1.5">{{ getFormattedDate(bill.billing_date) }}</td>
                                    <td class="border-b text-center border-1 py-1.5">P {{ (bill.kwh_used * 14) + 140 }}</td>
                                    <td class="border-b text-center border-1 py-1.5">{{ bill.due_date }}</td>
                                    <td class="border-b text-center border-1 py-1.5">
                                        <span class="text-white px-2 text-sm rounded-lg" :class="{ 'bg-green-600 font-semibold' : bill.status === 'Paid', 'bg-yellow-400 font-semibold' : bill.status === 'Pending'}">{{ bill.status }}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div v-if="prop.account.billings.length <= 0" class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-wrap">
                <span class="text-xl font-normal">There's no existing billing records for this account.</span>
            </div>
        </div>
    </AppLayout>
</template>