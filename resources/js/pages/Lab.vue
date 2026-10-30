<script setup>
import { Head } from '@inertiajs/vue3';
import PageHeader from '../components/PageHeader.vue';
</script>

<template>
    <Head title="Lab" />

    <PageHeader eyebrow="Experiments" title="Lab" lead="Experiments and side projects will be listed here." />

    <div class="empty">
        <span class="icon-tile"><i class="fa-solid fa-flask"></i></span>
        <strong>Nothing published yet</strong>
    </div>
</template>
