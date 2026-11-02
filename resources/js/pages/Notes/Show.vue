<script setup>
import { Head, Link } from '@inertiajs/vue3';
import PipelineDiagram from '../../components/PipelineDiagram.vue';
import SkillGroups from '../../components/SkillGroups.vue';
import { noteDate } from '../../notes.js';

defineProps({
    note: { type: Object, required: true },
    details: { type: Object, required: true },
});
</script>

<template>
    <Head :title="note.title">
        <meta name="description" :content="note.summary" />
    </Head>

    <article class="note">
        <header class="page-header">
            <Link class="arrow-link mb-4" href="/notes"><i class="fa-solid fa-arrow-left"></i>Notes</Link>

            <h1>{{ note.title }}</h1>
            <p class="page-header__lead">{{ note.summary }}</p>
            <time class="note__date" :datetime="note.date">{{ noteDate(note.date) }}</time>
        </header>

        <div class="prose">
            <template v-for="(block, index) in details.blocks" :key="index">
                <h2 v-if="block.type === 'h2'">{{ block.text }}</h2>
                <!-- text comes from our own data files and may contain bold text and inline code -->
                <p v-else-if="block.type === 'p'" v-html="block.html"></p>
                <ul v-else-if="block.type === 'ul'">
                    <li v-for="item in block.items" :key="item">{{ item }}</li>
                </ul>
                <pre v-else-if="block.type === 'code'"><code>{{ block.code }}</code></pre>
                <PipelineDiagram v-else-if="block.type === 'pipeline'" />
                <SkillGroups v-else-if="block.type === 'skills'" :skills="block.groups" />
                <figure v-else-if="block.type === 'figure'" class="shot" :class="{ 'shot--small': block.small }">
                    <figcaption>{{ block.caption }}</figcaption>
                    <div v-if="block.image" class="browser">
                        <div class="browser__bar"><span></span><span></span><span></span></div>
                        <img :src="`/images/notes/${block.image}`" :alt="block.caption" loading="lazy" />
                    </div>
                    <div v-else class="empty">
                        <span class="icon-tile"><i class="fa-regular fa-image"></i></span>
                        <strong>Screenshot placeholder</strong>
                    </div>
                </figure>
            </template>
        </div>
    </article>
</template>
