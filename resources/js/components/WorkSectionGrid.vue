<script setup>
import { Link } from '@inertiajs/vue3';
import WorkArt from './WorkArt.vue';

defineProps({
    sections: { type: Array, required: true },
});
</script>

<template>
    <div class="row g-4">
        <div v-for="section in sections" :key="section.slug" class="col-sm-6 col-lg-3">
            <Link class="panel work-tile" :href="`/work?section=${section.slug}`">
                <WorkArt :type="section.slug" />
                <div class="work-tile__body">
                    <h3 class="work-tile__title">{{ section.title }}</h3>
                    <p class="work-tile__text">{{ section.lead }}</p>
                </div>
            </Link>
        </div>
    </div>
</template>
