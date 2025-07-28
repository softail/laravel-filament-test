<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem, type Characteristic as CharacteristicItem, CharacteristicCategory } from '@/types';
import { Head } from '@inertiajs/vue3';
import Characteristic from '@/components/Characteristic.vue';
import Categories from '@/components/Categories.vue';
import { ref } from 'vue';
import Pagination from '@/components/Pagination.vue';

defineProps<{
    characteristics: CharacteristicItem[];
    categories: CharacteristicCategory;
}>();

const selectedCategory = ref<CharacteristicCategory | null>(null);
const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Characteristics',
        href: '/characteristics',
    },
];

const handleCategorySelection = (categoryId: string | number) => {
    selectedCategory.value = categoryId;
};
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="p-4">
            <Categories :categories="categories" @categorySelected="handleCategorySelection"/>
        </div>

        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4 overflow-x-auto relative z-10">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4 my-4">
                <template v-for="characteristic in characteristics.data" :key="characteristic.id">
                    <Characteristic
                        v-if="selectedCategory === null || characteristic.category_id === selectedCategory.id"
                        :characteristic="characteristic"
                    />
                </template>
            </div>
        </div>

        <Pagination :items="characteristics.meta" class="mt-4"/>
    </AppLayout>
</template>
