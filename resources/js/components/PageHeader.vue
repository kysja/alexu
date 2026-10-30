<script setup>
defineProps({
    eyebrow: { type: String, default: null },
    title: { type: String, required: true },
    lead: { type: String, default: null },
});
</script>

<template>
    <header class="page-header">
        <div class="d-flex flex-wrap align-items-end justify-content-between gap-3">
            <div>
                <div v-if="eyebrow" class="eyebrow">{{ eyebrow }}</div>
                <h1>{{ title }}</h1>
                <p v-if="lead" class="page-header__lead">{{ lead }}</p>
            </div>
            <slot />
        </div>
    </header>
</template>
