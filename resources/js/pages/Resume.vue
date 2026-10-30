<script setup>
import { Head } from '@inertiajs/vue3';
import PageHeader from '../components/PageHeader.vue';
import SkillGroups from '../components/SkillGroups.vue';

defineProps({
    profile: { type: Object, required: true },
    skills: { type: Array, required: true },
    experience: { type: Array, required: true },
});

// Lines like "Technologies: PHP 8, Laravel" are a stack summary, not an achievement.
const stackLine = (item) => item.match(/^(Technologies):\s*(.+)$/);
</script>

<template>
    <Head title="Resume" />

    <PageHeader eyebrow="Curriculum vitae" title="Resume" :lead="profile.roles.join(' · ')">
        <div class="d-flex gap-2">
            <a v-for="file in profile.downloads" :key="file.href" class="btn btn-quiet" :href="file.href">
                <i class="fa-regular" :class="file.icon"></i>{{ file.label.toUpperCase() }}
            </a>
        </div>
    </PageHeader>

    <div class="row g-5">
        <div class="col-lg-8">
            <section class="mb-5">
                <h2 class="section-title">About me</h2>
                <p v-for="paragraph in profile.about" :key="paragraph">{{ paragraph }}</p>
            </section>

            <section class="mb-5">
                <h2 class="section-title">Experience</h2>
                <ol class="timeline">
                    <li v-for="job in experience" :key="job.company" class="timeline__item">
                        <div class="timeline__head">
                            <h3 class="timeline__company">{{ job.company }}</h3>
                            <span class="timeline__dates">{{ job.start }} &ndash; {{ job.end }}</span>
                        </div>
                        <div class="timeline__role">{{ job.title }}</div>
                        <ul class="timeline__list">
                            <li v-for="item in job.list" :key="item" :class="{ 'is-stack': stackLine(item) }">
                                <template v-if="stackLine(item)">
                                    <b>{{ stackLine(item)[1] }}</b> &nbsp;{{ stackLine(item)[2] }}
                                </template>
                                <template v-else>{{ item }}</template>
                            </li>
                        </ul>
                    </li>
                </ol>
            </section>

            <section>
                <h2 class="section-title">Education</h2>
                <div v-for="school in profile.education" :key="school.school" class="d-flex gap-3">
                    <span class="icon-tile"><i class="fa-solid fa-graduation-cap"></i></span>
                    <div class="flex-grow-1">
                        <div class="timeline__head">
                            <h3 class="timeline__company">{{ school.school }}</h3>
                            <span class="timeline__dates">{{ school.start }} &ndash; {{ school.end }}</span>
                        </div>
                        <div>{{ school.degree }}</div>
                        <div class="timeline__role mb-0">{{ school.location }}</div>
                    </div>
                </div>
            </section>
        </div>

        <aside class="col-lg-4">
            <h2 class="section-title">Skills</h2>
            <SkillGroups :skills="skills" stacked />

            <div class="panel side-card">
                <h2 class="side-title">Languages</h2>
                <div
                    v-for="language in profile.languages"
                    :key="language.name"
                    class="d-flex align-items-center justify-content-between py-1"
                >
                    <span class="fw-semibold">{{ language.name }}</span>
                    <span class="chip">{{ language.level }}</span>
                </div>
            </div>

            <div class="panel side-card">
                <h2 class="side-title">Interests</h2>
                <div
                    v-for="interest in profile.interests"
                    :key="interest.label"
                    class="d-flex align-items-center gap-3 py-1"
                >
                    <span class="icon-tile icon-tile--sm"><i class="fa-solid" :class="interest.icon"></i></span>
                    {{ interest.label }}
                </div>
            </div>
        </aside>
    </div>
</template>
