<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Link, useForm, Head } from '@inertiajs/vue3'
import SecondaryButton from '@/Components/SecondaryButton.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'

const { animals } = defineProps({
    animals: {
        type: Array,
        required: true,
    },
})

const animalIcon = (animal) => {
    if (animal.species === 'chicken') {
        return 'fa-bird'
    }

    return `fa-${animal.species}`
}

const form = useForm({
    species: route().params?.species ?? '',
})

const submitFilter = () => {
    form.get(route('animals.index'), {
        preserveState: true,
        only: ['animals']
    })
}

const resetFilter = () => {
    form.species = ''
    submitFilter()
}
</script>

<template>
    <Head title="Animals"></Head>

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center">
                <h2 class="font-semibold text-xl flex-auto text-gray-800 leading-tight">Animals</h2>

                <Link :href="route('animals.create')" class="bg-purple-500 px-3 py-2 rounded shadow text-purple-50 font-semibold">Create</Link>
            </div>
        </template>

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <form class="flex items-center gap-4" @submit.prevent="submitFilter()">
                <b>Filter:</b>

                <select
                    name="species"
                    id="species"
                    v-model="form.species"
                    class="border-gray-300 focus:border-purple-200 focus:ring-purple-500 rounded-md shadow-sm"
                >
                    <option value="">Select Species</option>
                    <option value="cat">Cat</option>
                    <option value="dog">Dog</option>
                    <option value="cow">Cow</option>
                    <option value="chicken">Chicken</option>
                    <option value="duck">Duck</option>
                    <option value="pig">Pig</option>
                </select>

                <PrimaryButton type="submit">Apply</PrimaryButton>
                <SecondaryButton type="button" @click="resetFilter()">Reset</SecondaryButton>
            </form>

            <div class="bg-white shadow rounded divide-y mt-4">
                <div
                    v-for="animal in animals" :key="animal.id"
                    class="grid grid-cols-12 gap-4 group hover:bg-gray-50 transition-colors duration-150"
                >
                    <div class="col-span-9 p-3 flex space-x-4 items-center">
                        <i class="fa-sharp fa-light fa-2x fa-fw" :class="animalIcon(animal)"></i>

                        <div>
                            <b>{{ animal.name }}</b>

                            <span class="ml-2 text-gray-500">
                                <i v-if="animal.icon" class="fa-sharp" :class="animal.icon" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>

                    <div class="p-3 col-span-3 opacity-0 group-hover:opacity-100 flex justify-end items-center">
                        <Link :href="route('animals.edit', animal.id)" class="bg-white shadow py-2 px-3 text-sm inline-block rounded">Edit</Link>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
