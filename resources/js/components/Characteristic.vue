<script setup lang="ts">
import { Characteristic } from '@/types';
import { router } from '@inertiajs/vue3';
import CategoryItem from '@/components/CategoryItem.vue';

const props = defineProps<{
    characteristic: Characteristic;
}>();

const navigateToCharacteristic = () => {
    router.visit(route('characteristics.show', props.characteristic.id));
};
</script>

<template>
    <div
        @click="navigateToCharacteristic"
        class="rounded-lg border dark:bg-gray-950/50 dark:hover:bg-gray-800 p-4 shadow-sm transition-all hover:shadow-lg hover:scale-102 hover:bg-gray-100 cursor-pointer ">
        <h2 class="text-xl text-black dark:text-white/85 font-semibold mb-2">{{ characteristic.name }}</h2>

        <CategoryItem :categoryName="characteristic.category_name"/>

        <div class="flex flex-col gap-2">
            <p class="text-black dark:text-white/75">
                <span class="font-extrabold">Type:</span> {{ characteristic.type }}
            </p>

            <p class="text-black dark:text-white/75">
                <span class="font-extrabold">Value:</span> {{ characteristic.description }}
            </p>
        </div>
    </div>
</template>
