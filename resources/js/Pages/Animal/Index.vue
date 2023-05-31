<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Link } from '@inertiajs/vue3'

const { animals } = defineProps({
    animals: {
        type: Array,
        required: true,
    },
})
</script>

<template>
    <AuthenticatedLayout>
        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex items-center my-6 lg:my-8">
                <h2 class="flex-auto text-3xl">Animals</h2>

                <Link :href="route('animals.create')">Create</Link>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>

                        <th>Name</th>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="animal in animals" :key="animal.id">
                        <td>
                            {{ animal.id }}
                        </td>

                        <td>
                            {{ animal.name }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AuthenticatedLayout>
</template>
