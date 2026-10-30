<script setup>
import TechChips from './TechChips.vue';

defineProps({
    skills: { type: Array, required: true },
    // Stacked puts the label above the chips, for narrow columns.
    stacked: { type: Boolean, default: false },
});
</script>

<template>
    <div class="panel skill-rows" :class="{ 'skill-stack': stacked }">
        <div v-for="skill in skills" :key="skill.title" class="skill-row">
            <div class="skill-row__label">{{ skill.title }}</div>
            <TechChips :items="skill.list" :large="!stacked" />
        </div>
    </div>
</template>
