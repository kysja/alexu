<script setup>
import { Head } from '@inertiajs/vue3';
import PageHeader from '../components/PageHeader.vue';

defineProps({
    profile: { type: Object, required: true },
});

const isEmail = (contact) => contact.href.startsWith('mailto:');

// "https://github.com/kysja" -> "github.com/kysja"
const display = (contact) => (isEmail(contact) ? contact.label : contact.href.replace(/^https?:\/\/(www\.)?/, ''));
</script>

<template>
    <Head title="Contact" />

    <PageHeader eyebrow="Get in touch" title="Contact" lead="The best way to reach me is by email." />

    <div class="row g-4">
        <div v-for="contact in profile.contacts" :key="contact.href" class="col-md-6">
            <a
                class="panel contact-card"
                :href="contact.href"
                :target="isEmail(contact) ? null : '_blank'"
                rel="noopener"
            >
                <span class="icon-tile"><i :class="contact.icon"></i></span>
                <span>
                    <span class="contact-card__label d-block">{{ isEmail(contact) ? 'Email' : contact.label }}</span>
                    <span class="contact-card__value">{{ display(contact) }}</span>
                </span>
                <i class="contact-card__arrow fa-solid fa-arrow-right"></i>
            </a>
        </div>
        <div class="col-md-6">
            <div class="panel contact-card">
                <span class="icon-tile"><i class="fa-solid fa-location-dot"></i></span>
                <span>
                    <span class="contact-card__label d-block">Location</span>
                    <span class="contact-card__value">{{ profile.location }}</span>
                </span>
            </div>
        </div>
    </div>
</template>
