<script setup>
import { Head } from '@inertiajs/vue3';
import PageHeader from '../../components/PageHeader.vue';
import ProjectCard from '../../components/ProjectCard.vue';
import WorkNav from '../../components/WorkNav.vue';

defineProps({
    nav: { type: Array, required: true },
    section: { type: Object, required: true },
});
</script>

<template>
    <Head :title="section.title" />

    <PageHeader eyebrow="Work" :title="section.title" :lead="section.lead" />

    <WorkNav :sections="nav" />

    <div v-if="section.projects.length" class="row g-4">
        <div v-for="project in section.projects" :key="project.title" class="col-md-6 col-lg-4">
            <ProjectCard :project="project" />
        </div>
    </div>

    <p v-else class="panel work-empty">Projects for this section are coming soon.</p>
</template>
