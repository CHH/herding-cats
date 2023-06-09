<script setup>
import { defineModel, watch } from 'vue'
import InputLabel from '@/Components/InputLabel.vue'
import InputError from '@/Components/InputError.vue'
import TextInput from '@/Components/TextInput.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'

const form = defineModel()
</script>

<template>
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

    <div class="mt-4">
        <InputLabel for="species" value="Species" />

        <select
            name="species"
            id="species"
            v-model="form.species"
            class="mt-1 border-gray-300 focus:border-purple-200 focus:ring-purple-500 rounded-md shadow-sm"
        >
            <option value="">Select Species</option>
            <option value="cat">Cat</option>
            <option value="dog">Dog</option>
            <option value="cow">Cow</option>
            <option value="chicken">Chicken</option>
            <option value="duck">Duck</option>
            <option value="pig">Pig</option>
        </select>

        <InputError :message="form.errors.species" class="mt-2" />
    </div>

    <div class="mt-4">
        <InputLabel for="icon" value="Icon" />

        <TextInput
            id="icon"
            name="icon"
            type="text"
            v-model="form.icon"
            class="mt-1"
        />

        <InputError :message="form.errors.icon" class="mt-2" />
    </div>

    <div class="grid lg:grid-cols-4 gap-4">
        <div class="mt-4">
            <InputLabel for="birthday_at" value="Day of birth" />
            <input
                type="date"
                name="birthday_at"
                id="birthday_at"
                v-model="form.birthday_at"
                class="mt-1 border-gray-300 focus:border-purple-200 focus:ring-purple-500 rounded-md shadow-sm w-full"
            >
            <InputError :message="form.errors.birthday_at" class="mt-2" />
        </div>

        <div class="mt-4">
            <InputLabel for="bought_at" value="Bought at" />
            <input
                type="date"
                name="bought_at"
                id="bought_at"
                v-model="form.bought_at"
                class="mt-1 border-gray-300 focus:border-purple-200 focus:ring-purple-500 rounded-md shadow-sm w-full"
            >
            <InputError :message="form.errors.bought_at" class="mt-2" />
        </div>

        <div class="mt-4">
            <InputLabel for="sold_at" value="Sold at" />
            <input
                type="date"
                name="sold_at"
                id="sold_at"
                v-model="form.sold_at"
                class="mt-1 border-gray-300 focus:border-purple-200 focus:ring-purple-500 rounded-md shadow-sm w-full"
            >
            <InputError :message="form.errors.sold_at" class="mt-2" />
        </div>

        <div class="mt-4">
            <InputLabel for="death_at" value="Day of death" />
            <input
                type="date"
                name="death_at"
                id="death_at"
                v-model="form.death_at"
                class="mt-1 border-gray-300 focus:border-purple-200 focus:ring-purple-500 rounded-md shadow-sm w-full"
            >
            <InputError :message="form.errors.death_at" class="mt-2" />
        </div>
    </div>

    <div class="mt-4">
        <InputLabel for="notes" value="Notes" />

        <textarea
            name="notes"
            id="notes"
            v-model="form.notes"
            class="mt-1 border-gray-300 focus:border-purple-200 focus:ring-purple-500 rounded-md shadow-sm w-full"
        ></textarea>

        <InputError :message="form.errors.notes" class="mt-2" />
    </div>
</template>
