<script setup>
import { computed } from 'vue';
import { Head, router, usePage } from '@inertiajs/vue3';
import PageHeader from '../../components/PageHeader.vue';
import ProjectCard from '../../components/ProjectCard.vue';
import WorkNav from '../../components/WorkNav.vue';

const props = defineProps({
    sections: { type: Array, required: true },
    projects: { type: Array, required: true },
});

const page = usePage();

// The filter lives in the URL, so it can be shared and survives going back from a case study.
const section = computed(() => {
    const slug = new URLSearchParams(page.url.split('?')[1]).get('section');

    return props.sections.find((item) => item.slug === slug) ?? null;
});

const visibleProjects = computed(() =>
    section.value ? props.projects.filter((project) => project.type === section.value.slug) : props.projects,
);

const select = (slug) => {
    router.replace({
        url: slug ? `/work?section=${slug}` : '/work',
        preserveScroll: true,
        preserveState: true,
    });
};
</script>

<template>
    <Head title="Work" />

    <PageHeader
        eyebrow="Portfolio"
        title="Work"
        :lead="section?.lead ?? 'Web apps, websites, and tools I have built.'"
    />

    <WorkNav :sections="sections" :active="section?.slug ?? null" :total="projects.length" @select="select" />

    <div v-if="visibleProjects.length" class="row g-4">
        <div v-for="project in visibleProjects" :key="project.title" class="col-md-6 col-lg-4">
            <ProjectCard :project="project" />
        </div>
    </div>

    <p v-else class="panel work-empty">Projects for this section are coming soon.</p>
</template>
