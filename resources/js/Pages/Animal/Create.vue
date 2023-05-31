<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Link, useForm } from '@inertiajs/vue3'
import InputLabel from '@/Components/InputLabel.vue'
import InputError from '@/Components/InputError.vue'
import TextInput from '@/Components/TextInput.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'

const form = useForm({
    name: '',
    species: '',
})

const createAnimal = () => {
    form.post(route('animals.store'))
}
</script>

<template>
    <AuthenticatedLayout>
        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex items-center my-6 lg:my-8">
                <h2 class="flex-auto text-3xl">Create Animal</h2>
            </div>

            <form @submit.prevent="createAnimal">
                <div>
                    <InputLabel for="name" value="Name" />

                    <TextInput
                        id="name"
                        v-model="form.name"
                        type="text"
                        class="mt-1 block w-full"
                    />

                    <InputError :message="form.errors.name" class="mt-2" />
                </div>

                <div>
                    <InputLabel for="species" value="Species" />

                    <select
                        name="species"
                        id="species"
                        v-model="form.species"
                    >
                        <option value="">Select Species</option>
                        <option value="cat">Cat</option>
                        <option value="dog">Dog</option>
                    </select>

                    <InputError :message="form.errors.species" class="mt-2" />
                </div>

                <PrimaryButton>Create</PrimaryButton>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
