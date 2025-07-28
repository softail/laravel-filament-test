<script setup lang="ts">

defineProps<{
    categoryName: string;
}>();
</script>

<template v-if="categoryName || false">
    <div class="mb-2 rounded-lg text-sm border inline-block text-white px-4 bg-primary-500 dark:bg-primary-800">{{ categoryName }}</div>
</template>