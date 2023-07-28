<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import ActionSection from '@/Components/ActionSection.vue';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputLabel from '@/Components/InputLabel.vue'
import InputError from '@/Components/InputError.vue'
import TextInput from '@/Components/TextInput.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';

import { Head, useForm, usePage } from '@inertiajs/vue3';


const form = useForm({
    fname: '',
    lname: '',
    address: '',
    email: '',
    phone_no: '',
    type: '',
});

const submit = () => {
    form.post('/accounts')
}
</script>

<template>
    <AppLayout title="View">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Accounts / Create
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <FormSection @submitted="submit">
                    <template #title>
                        Create Consumer Account
                    </template>
            
                    <template #description>
                        Add new account for a consumer.
                    </template>
                    
                    <template #form>
                        <div class="col-span-6 sm:col-span-4">
                            <InputLabel for="fname" value="First Name" />
            
                            <TextInput
                                id="fname"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.fname"
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

            </div>
        </div>
    </AppLayout>
</template>
