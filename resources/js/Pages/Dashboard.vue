<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';

const { date } = defineProps({
    date: {
        type: String,
    },
})

const page = usePage();

// const start = ref(Date.now() + (24 * 60 * 60 * 1000));
const start = ref(new Date(date).getTime());
const seconds = ref(0);
const minutes = ref(0);
const hours = ref(0);

onMounted(() => {
    setInterval(() => {
        const now = start.value - Date.now();

        hours.value = Math.floor(now / 1000 / 60 / 60);
        minutes.value = Math.floor(now / 1000 / 60 - hours.value * 60);
        seconds.value = Math.floor(now / 1000 - hours.value * 60 * 60 - minutes.value * 60);
    }, 500);
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h3 class="text-xl font-bold mb-6 lg:mb-8">Hello {{ page.props.auth.user.name }}!</h3>

                <div class="grid grid-cols-3 gap-6">
                    <div class="bg-purple-600 shadow p-6 rounded text-white transition-all duration-500 hover:ring-8">
                        <div class="text-purple-50 text-5xl font-bold">{{ hours }}</div>
                        <div class="text-purple-200">Stunden</div>
                    </div>

                    <div class="bg-purple-500 shadow p-6 rounded text-white transition-all duration-500 hover:ring-8">
                        <div class="text-purple-50 text-5xl font-bold">{{ minutes }}</div>
                        <div class="text-purple-200">Minuten</div>
                    </div>

                    <div class="bg-purple-400 shadow p-6 rounded text-white transition-all duration-500 hover:ring-8">
                        <div class="text-purple-50 text-5xl font-bold">{{ seconds }}</div>
                        <div class="text-purple-200">Sekunden</div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
