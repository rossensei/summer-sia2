<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import ActionSection from '@/Components/ActionSection.vue';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import SectionBorder from '@/Components/SectionBorder.vue';
import InputLabel from '@/Components/InputLabel.vue'
import InputError from '@/Components/InputError.vue'
import TextInput from '@/Components/TextInput.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import DialogModal from '@/Components/DialogModal.vue';

import { Link, useForm, usePage } from '@inertiajs/vue3';
import { ref } from 'vue'

const confirmingAccountDeletion = ref(false);

const props = defineProps({
    account: Object
})


const form = useForm({
    fname: props.account.fname,
    lname: props.account.lname,
    address: props.account.address,
    email: props.account.email,
    phone_no: props.account.phone_no,
    type: props.account.type,
});

const confirmAccountDeletion = () => {
    confirmingAccountDeletion.value = true;
};

const closeModal = () => {
    confirmingAccountDeletion.value = false;
};

const deleteAccount = () => {
    form.delete(route('accounts.delete', { account: props.account.id}), {
        onSuccess: () => closeModal(),
    });
};
</script>

<template>
    <AppLayout title="View">
        <template #header>
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Accounts / View / {{ props.account.lname }}, {{ props.account.fname }}
                </h2>
                <Link v-if="$page.props.auth.user.permissions.includes('view')" :href="'/accounts/view/' + props.account.id + '/billings'"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                >View Billings</Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <FormSection @submitted="form.patch(route('accounts.update', { account: account.id}))">
                    <template #title>
                        Update Account Details
                    </template>
            
                    <template #description>
                        Update this account's details.
                    </template>
                    
                    <template #form>
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="fname" value="First Name" />
            
                            <TextInput
                                id="fname"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.fname"
                                required
                                autocomplete="fname"
                            />
            
                            <InputError class="mt-2" :message="form.errors.fname" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="lname" value="Last Name" />
            
                            <TextInput
                                id="lname"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.lname"
                                required
                                autocomplete="lname"
                            />
            
                            <InputError class="mt-2" :message="form.errors.lname" />
                        </div>
            
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="address" value="Address" />
            
                            <TextInput
                                id="address"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.address"
                                required
                                autocomplete="address"
                            />
            
                            <InputError class="mt-2" :message="form.errors.address" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="email" value="Email" />
            
                            <TextInput
                                id="email"
                                type="email"
                                class="mt-1 block w-full"
                                v-model="form.email"
                                required
                                autocomplete="username"
                            />
            
                            <InputError class="mt-2" :message="form.errors.email" />
                        </div>
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="phone" value="Phone" />
            
                            <TextInput
                                id="phone"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.phone_no"
                                required
                                autocomplete="username"
                            />
            
                            <InputError class="mt-2" :message="form.errors.phone_no" />
                        </div>

                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="type" value="Customer Type" />
            
                            <TextInput
                                id="type"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.type"
                                required
                                autocomplete="username"
                            />
            
                            <InputError class="mt-2" :message="form.errors.type" />
                        </div>
                    </template>

                    <template #actions>
                        <ActionMessage :on="form.recentlySuccessful" class="mr-3">
                            Saved.
                        </ActionMessage>
            
                        <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Save
                        </PrimaryButton>
                    </template>
                </FormSection>

                <SectionBorder />

                <ActionSection>
                    <template #title>
                        Delete Account
                    </template>
            
                    <template #description>
                        Permanently delete this account from the database.
                    </template>

                    <template #content>
                        <div class="max-w-xl text-sm text-gray-600">
                            Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.
                        </div>

                        <div class="mt-5">
                            <DangerButton @click="confirmAccountDeletion">
                                Delete Account
                            </DangerButton>
                        </div>

                        <DialogModal :show="confirmingAccountDeletion" @close="closeModal">
                            <template #title>
                                Delete Account
                            </template>
                            <template #content>
                                Are you sure you want to delete this account? Once this account is deleted, all of its resources and data will be permanently deleted. Please click "Confirm" to confirm you would like to permanently delete this account.
                            </template>

                            <template #footer>
                                <SecondaryButton @click="closeModal">
                                    Cancel
                                </SecondaryButton>
            
                                <DangerButton
                                    class="ml-3"
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                    @click="deleteAccount"
                                >
                                    Confirm
                                </DangerButton>
                            </template>
                        </DialogModal>
                    </template>
                </ActionSection>
                
            </div>
        </div>
    </AppLayout>
</template>
