<script setup lang="ts">
import { CharacteristicCategory } from '@/types';
import { ref } from 'vue';

const emit = defineEmits<{
    categorySelected: [categoryId: CharacteristicCategory]
}>();

defineProps<{
    categories: CharacteristicCategory[];
}>();

const selectedCategory = ref<CharacteristicCategory | null>(null);

const selectCategory = (category: CharacteristicCategory | null = null) => {
    selectedCategory.value = category;
    emit('categorySelected', category);
};

const removeCategory = () => {
    selectedCategory.value = null;
    emit('categorySelected', null);
}
</script>

<template>
    <ul class="flex flex-nowrap overflow-x-scroll md:overflow-x-auto md:flex-wrap md:justify-center text-sm font-medium text-center text-gray-500 dark:text-gray-400">
        <li class="me-2">
            <a href="#"
               @click="removeCategory"
               :class="{'inline-block px-4 py-3 text-white bg-blue-600 rounded-lg bg-primary-700': selectedCategory == null,
               'inline-block px-4 py-3 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white': selectedCategory?.id !== null}"
               aria-current="page">All categories</a>
        </li>

        <li
            v-for="category in categories"
            :key="category.id"
            @click="selectCategory(category)"
            class="me-2">
            <a href="#"
               :class="{'inline-block px-4 py-3 text-white bg-blue-600 rounded-lg bg-primary-700': selectedCategory?.id === category.id,
               'inline-block px-4 py-3 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white': selectedCategory?.id !== category.id}"
               aria-current="page">{{ category.name }}</a>
        </li>
    </ul>
</template>


