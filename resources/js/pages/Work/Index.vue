<script setup>
import { Head } from '@inertiajs/vue3';
import PageHeader from '../../components/PageHeader.vue';
import WorkSectionGrid from '../../components/WorkSectionGrid.vue';

defineProps({
    sections: { type: Array, required: true },
});
</script>

<template>
    <Head title="Work" />

    <PageHeader eyebrow="Portfolio" title="Work" lead="Web apps, websites, and tools I have built." />

    <WorkSectionGrid :sections="sections" heading-tag="h2" />
</template>
