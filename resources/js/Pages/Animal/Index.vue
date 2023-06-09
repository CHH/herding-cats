<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Link } from '@inertiajs/vue3'

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
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center">
                <h2 class="font-semibold text-xl flex-auto text-gray-800 leading-tight">Animals</h2>

                <Link :href="route('animals.create')" class="bg-purple-500 px-3 py-2 rounded shadow text-purple-50">Create</Link>
            </div>
        </template>

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="bg-white shadow rounded divide-y">
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
