<script setup lang="ts">
import { ref, onMounted } from 'vue';

const isDark = ref(false);

const toggleTheme = () => {
isDark.value = !isDark.value;
if (isDark.value) {
document.documentElement.classList.add('dark');
} else {
document.documentElement.classList.remove('dark');
}
};

onMounted(() => {
isDark.value = document.documentElement.classList.contains('dark');
});
</script>

<template>
    <button @click="toggleTheme" class="p-2 rounded-lg border cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
        {{ isDark ? '☀️ Light' : '🌙 Dark' }}
    </button>
</template>