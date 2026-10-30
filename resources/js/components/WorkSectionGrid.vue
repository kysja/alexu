<script setup>
import { Link } from '@inertiajs/vue3';
import WorkArt from './WorkArt.vue';

defineProps({
    sections: { type: Array, required: true },
    // h2 when the grid sits right under the page title, h3 when it sits under a section heading.
    headingTag: { type: String, default: 'h3' },
});
</script>

<template>
    <div class="row g-4">
        <div v-for="section in sections" :key="section.slug" class="col-sm-6 col-lg-3">
            <Link class="panel work-tile" :href="`/work/${section.slug}`">
                <WorkArt :type="section.slug" />
                <div class="work-tile__body">
                    <component :is="headingTag" class="work-tile__title">{{ section.title }}</component>
                    <p class="work-tile__text">{{ section.lead }}</p>
                </div>
            </Link>
        </div>
    </div>
</template>
