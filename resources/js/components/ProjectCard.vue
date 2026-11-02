<script setup>
import { onBeforeUnmount, onMounted, ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import ImageLightbox from './ImageLightbox.vue';
import TechChips from './TechChips.vue';

defineProps({
    project: { type: Object, required: true },
});

const host = (link) => new URL(link).hostname.replace(/^www\./, '');

const lightbox = ref(null);

// Long descriptions are clamped so cards stay even; the toggle only shows when text is actually cut off.
const text = ref(null);
const clamped = ref(false);
const expanded = ref(false);

const measure = () => {
    if (text.value && !expanded.value) {
        clamped.value = text.value.scrollHeight > text.value.clientHeight;
    }
};

let observer;

onMounted(() => {
    observer = new ResizeObserver(measure);
    observer.observe(text.value);
    document.fonts.ready.then(measure);
});

onBeforeUnmount(() => observer.disconnect());
</script>

<template>
    <article class="panel project">
        <!-- browser: site or web app, plain: desktop app with its own title bar, device: image is already a device -->
        <div class="project__stage" :class="`project__stage--${project.type}`">
            <img
                v-if="project.frame === 'device'"
                class="project__device"
                :src="`/images/portfolio/${project.image}`"
                :alt="project.title"
                loading="lazy"
            />
            <div v-else class="project__frame">
                <div v-if="project.frame !== 'plain'" class="browser__bar">
                    <span></span><span></span><span></span>
                    <div v-if="project.link" class="browser__url">{{ host(project.link) }}</div>
                </div>
                <img :src="`/images/portfolio/${project.image}`" :alt="project.title" loading="lazy" />
            </div>
            <button
                type="button"
                class="project__zoom"
                :aria-label="`View larger screenshot of ${project.title}`"
                @click="lightbox.open()"
            >
                <i class="fa-solid fa-expand"></i>
            </button>
        </div>
        <ImageLightbox
            ref="lightbox"
            :src="`/images/portfolio/${project.full ?? project.image}`"
            :title="project.title"
        />

        <div class="project__body">
            <h3 class="project__title">{{ project.title }}</h3>

            <div>
                <!-- description comes from our own portfolio.json and may contain links -->
                <p
                    ref="text"
                    class="project__text"
                    :class="{ 'is-clamped': !expanded }"
                    v-html="project.description"
                ></p>
                <button
                    v-if="clamped"
                    type="button"
                    class="project__more"
                    :aria-expanded="expanded"
                    @click="expanded = !expanded"
                >
                    {{ expanded ? 'Show less' : 'Show more' }}
                </button>
            </div>

            <div class="project__foot">
                <TechChips v-if="project.stack" class="chips--quiet" :items="project.stack" />

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
        </div>
    </article>
</template>
