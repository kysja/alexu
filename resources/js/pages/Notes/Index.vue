<script setup>
import { Head, Link } from '@inertiajs/vue3';
import PageHeader from '../../components/PageHeader.vue';
import TechChips from '../../components/TechChips.vue';
import { noteDate } from '../../notes.js';

defineProps({
    notes: { type: Array, required: true },
});
</script>

<template>
    <Head title="Notes" />

    <PageHeader eyebrow="Writing" title="Notes" lead="Write-ups of things I've built and what I learned." />

    <div class="note-list">
        <Link v-for="note in notes" :key="note.slug" class="panel note-card" :href="`/notes/${note.slug}`">
            <time class="note__date" :datetime="note.date">{{ noteDate(note.date) }}</time>
            <h2 class="note-card__title">{{ note.title }}</h2>
            <p class="note-card__text">{{ note.summary }}</p>
            <TechChips class="chips--quiet" :items="note.stack" />
        </Link>
    </div>
</template>
