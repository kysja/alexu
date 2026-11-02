<script setup>
defineProps({
    sections: { type: Array, required: true },
    active: { type: String, default: null },
    total: { type: Number, required: true },
});

defineEmits(['select']);
</script>

<template>
    <div class="work-nav" role="group" aria-label="Filter work by section">
        <button
            type="button"
            class="work-nav__link"
            :class="{ active: active === null }"
            :aria-pressed="active === null"
            @click="$emit('select', null)"
        >
            All<span class="work-nav__count">{{ total }}</span>
        </button>
        <button
            v-for="section in sections"
            :key="section.slug"
            type="button"
            class="work-nav__link"
            :class="{ active: active === section.slug }"
            :aria-pressed="active === section.slug"
            @click="$emit('select', section.slug)"
        >
            {{ section.title }}<span class="work-nav__count">{{ section.count }}</span>
        </button>
    </div>
</template>
