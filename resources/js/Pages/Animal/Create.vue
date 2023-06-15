<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Link, useForm, Head } from '@inertiajs/vue3'
import InputLabel from '@/Components/InputLabel.vue'
import InputError from '@/Components/InputError.vue'
import TextInput from '@/Components/TextInput.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import AnimalForm from './Partials/AnimalForm.vue'

const form = useForm({
    name: '',
    species: '',
    icon: '',
    birthday: null,
    bought_at: null,
    sold_at: null,
    day_of_death: null,
})

const createAnimal = () => {
    form.post(route('animals.store'))
}
</script>

<template>
    <Head title="Create Animal"></Head>

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center">
                <h2 class="font-semibold text-xl flex-auto text-gray-800 leading-tight">Create Animal</h2>
            </div>
        </template>

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <form @submit.prevent="createAnimal">
                <AnimalForm v-model="form"></AnimalForm>

                <div class="mt-3">
                    <PrimaryButton :disabled="form.processing">Create</PrimaryButton>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
