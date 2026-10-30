<script setup>
import TechIcon from './TechIcon.vue';

defineProps({
    items: { type: Array, required: true },
    large: { type: Boolean, default: false },
});
</script>

<template>
    <div class="chips">
        <span v-for="tech in items" :key="tech" class="chip" :class="{ 'chip--lg': large }">
            <TechIcon :name="tech" />{{ tech }}
        </span>
    </div>
</template>
