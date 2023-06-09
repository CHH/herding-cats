<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Link, useForm } from '@inertiajs/vue3'
import InputLabel from '@/Components/InputLabel.vue'
import InputError from '@/Components/InputError.vue'
import TextInput from '@/Components/TextInput.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import AnimalForm from './Partials/AnimalForm.vue'

const { animal } = defineProps({
    animal: {
        type: Object, required: true
    }
})

const form = useForm(animal)

const createAnimal = () => {
    form.put(route('animals.update', animal.id))
}
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center">
                <h2 class="font-semibold text-xl flex-auto text-gray-800 leading-tight">Edit Animal: {{ animal.name }} (ID: {{ animal.id }})</h2>
            </div>
        </template>

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <form @submit.prevent="createAnimal">
                <AnimalForm v-model="form"></AnimalForm>

                <div class="mt-3 flex gap-4 items-center">
                    <PrimaryButton>Save</PrimaryButton>

                    <Link :href="route('animals.index')">Cancel</Link>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
