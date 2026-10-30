<script setup>
import { Head, Link } from '@inertiajs/vue3';
import TechChips from '../../components/TechChips.vue';

defineProps({
    project: { type: Object, required: true },
    details: { type: Object, required: true },
    section: { type: Object, required: true },
});
</script>

<template>
    <Head :title="details.title" />

    <header class="page-header">
        <Link class="arrow-link mb-4" :href="`/work/${section.slug}`">
            <i class="fa-solid fa-arrow-left"></i>{{ section.title }}
        </Link>

        <h1>{{ details.title }}</h1>

        <TechChips class="mt-3" :items="project.stack" large />

        <div v-if="project.link || project.github" class="d-flex flex-wrap gap-2 mt-4">
            <a v-if="project.link" class="btn btn-primary" :href="project.link" target="_blank" rel="noopener">
                Visit site<i class="fa-solid fa-arrow-up-right-from-square"></i>
            </a>
            <a
                v-if="project.github"
                class="btn btn-quiet"
                :href="`https://github.com/kysja/${project.github}`"
                target="_blank"
                rel="noopener"
            >
                <i class="fa-brands fa-github"></i>GitHub
            </a>
        </div>
    </header>

    <div class="prose">
        <p v-for="paragraph in details.body" :key="paragraph">{{ paragraph }}</p>

        <ul v-if="details.list">
            <li v-for="item in details.list" :key="item">{{ item }}</li>
        </ul>

        <p v-if="details.shotsIntro">{{ details.shotsIntro }}</p>
    </div>

    <figure v-for="shot in details.shots" :key="shot.image" class="shot">
        <!-- captions come from our own data files and may contain bold text -->
        <figcaption v-if="shot.caption" v-html="shot.caption"></figcaption>
        <div class="browser">
            <div class="browser__bar"><span></span><span></span><span></span></div>
            <img :src="`/images/portfolio/${shot.image}`" alt="" loading="lazy" />
        </div>
    </figure>

    <div v-if="details.sites" class="row g-4 mt-2">
        <div v-for="site in details.sites" :key="site.link" class="col-md-6">
            <article class="panel project">
                <div class="project__shot">
                    <img :src="`/images/portfolio/${site.image}`" :alt="site.title" loading="lazy" />
                </div>
                <div class="project__body">
                    <h2 class="project__title">{{ site.title }}</h2>
                    <div class="project__links">
                        <a :href="site.link" target="_blank" rel="noopener">
                            <i class="fa-solid fa-arrow-up-right-from-square"></i>{{ site.linkDisplay }}
                        </a>
                    </div>
                </div>
            </article>
        </div>
    </div>
</template>
