<script setup>
import { Head } from '@inertiajs/vue3';
import PageHeader from '../components/PageHeader.vue';
</script>

<template>
    <Head title="Notes" />

    <PageHeader eyebrow="Writing" title="Notes" lead="Short write-ups will be listed here." />

    <div class="empty">
        <span class="icon-tile"><i class="fa-solid fa-pen"></i></span>
        <strong>Nothing published yet</strong>
    </div>
</template>
