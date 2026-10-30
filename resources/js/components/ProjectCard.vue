<script setup>
import { Link } from '@inertiajs/vue3';
import TechChips from './TechChips.vue';

defineProps({
    project: { type: Object, required: true },
});

const host = (link) => new URL(link).hostname.replace(/^www\./, '');
</script>

<template>
    <article class="panel project">
        <div class="project__shot">
            <img :src="`/images/portfolio/${project.image}`" :alt="project.title" loading="lazy" />
        </div>

        <div class="project__body">
            <h3 class="project__title">{{ project.title }}</h3>

            <TechChips v-if="project.stack" :items="project.stack" />

            <!-- description comes from our own portfolio.json and may contain links -->
            <p class="project__text" v-html="project.description"></p>

            <div v-if="project.page || project.link || project.github" class="project__links">
                <Link v-if="project.page" :href="`/work/${project.page}`">
                    Case study<i class="fa-solid fa-arrow-right"></i>
                </Link>
                <a v-if="project.link" class="is-quiet" :href="project.link" target="_blank" rel="noopener">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>{{ host(project.link) }}
                </a>
                <a
                    v-if="project.github"
                    class="is-quiet"
                    :href="`https://github.com/kysja/${project.github}`"
                    target="_blank"
                    rel="noopener"
                >
                    <i class="fa-brands fa-github"></i>GitHub
                </a>
            </div>
        </div>
    </article>
</template>
