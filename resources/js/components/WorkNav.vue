<script setup>
import { Link, usePage } from '@inertiajs/vue3';

defineProps({
    sections: { type: Array, required: true },
});

const page = usePage();
</script>

<template>
    <nav class="work-nav" aria-label="Work sections">
        <Link
            v-for="section in sections"
            :key="section.slug"
            class="work-nav__link"
            :class="{ active: page.url === `/work/${section.slug}` }"
            :href="`/work/${section.slug}`"
        >
            {{ section.title }}<span class="work-nav__count">{{ section.count }}</span>
        </Link>
    </nav>
</template>
