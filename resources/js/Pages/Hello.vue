<script setup>
defineProps({
    name: String,
})
</script>

<template>
    <div class="bg-gray-100 p-8 h-screen flex">
        <div class="bg-white shadow-lg flex p-8 rounded-xl m-auto">
            <h1 class="text-xl font-bold">Hello {{name}}!</h1>
        </div>
    </div>
</template>
