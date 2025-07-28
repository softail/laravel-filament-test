<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem, type Characteristic as CharacteristicItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import CategoryItem from '@/components/CategoryItem.vue';

defineProps<{
    characteristic: CharacteristicItem;
}>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Characteristics',
        href: '/characteristics'
    },
    {
        title: 'Characteristic',
        href: ''
    }
];
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="text-center mt-6">

            <h1 class="text-3xl text-black dark:text-white/85 font-semibold mb-3">{{ characteristic.data.name }}</h1>
            <p>Category: <span> <CategoryItem :categoryName="characteristic.data.category_name" /></span></p>

            <div class="flex flex-col gap-2 text-xl">
                <div class="font-extrabold">Type</div>
                <div>{{ characteristic.data.type }}</div>
                <div class="font-extrabold">Value</div>
                <div>{{ characteristic.data.description }}</div>
                <div class="font-extrabold">Created At</div>
                <div>{{ characteristic.data.created_at }}</div>
            </div>
        </div>
    </AppLayout>
</template>
