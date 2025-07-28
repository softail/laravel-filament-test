<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { Pagination } from '@/types';

defineProps<{
    items: Pagination
}>();
</script>

<template>
    <div class="flex justify-center my-6" v-if="items.links.length > 1">
        <nav class="flex items-center space-x-1">
            <template v-for="link in items.links" :key="link.label">
                <Link
                    v-if="link.url"
                    :href="link.url"
                    :class="{
                        'dark:bg-primary-700 bg-primary-500 text-white': link.active,
                        'dark:bg-gray-900 dark:text-gray-100 dark:hover:bg-primary-800 bg-gray-200 text-black hover:bg-primary-400 hover:text-white': !link.active
                    }"
                    class="px-3 py-2 min-w-8 text-sm font-medium rounded-md transition-colors"
                    v-html="link.label"
                />
                <span
                    v-else
                    :class="{
                        'bg-primary-900 text-white': link.active,
                        'dark:bg-gray-600 text-gray-400': !link.active
                    }"
                    class="px-3 py-2 text-sm font-medium rounded-md cursor-not-allowed"
                    v-html="link.label"
                />
            </template>
        </nav>
    </div>
</template>
