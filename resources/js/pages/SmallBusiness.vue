<script setup>
import { computed } from 'vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    profile: { type: Object, required: true },
    content: { type: Object, required: true },
});

const email = computed(() => props.profile.contacts.find((contact) => contact.href.startsWith('mailto:')));

// Until there's a booking link, the call button opens an email with the subject filled in.
const callHref = computed(
    () => props.content.booking ?? `${email.value.href}?subject=${encodeURIComponent('Free 30-min call')}`,
);
</script>

<template>
    <Head title="Small Business">
        <meta
            name="description"
            content="Simple custom software for small businesses in Jacksonville. Job tracking, CRM, scheduling, and invoicing tools for teams of 1–50."
        />
    </Head>

    <section class="row g-5 align-items-center">
        <div class="col-lg-7">
            <div class="eyebrow"><i class="fa-solid fa-store"></i>{{ content.hero.eyebrow }}</div>
            <h1 class="hero__title sb-title">
                {{ content.hero.title }} <span>{{ content.hero.accent }}</span>
            </h1>
            <p class="page-header__lead">{{ content.hero.lead }}</p>
            <div class="d-flex flex-wrap gap-2 mt-4">
                <a class="btn btn-primary" :href="callHref">
                    <i class="fa-regular fa-calendar"></i>Book a free 30-min call
                </a>
                <a class="btn btn-quiet" href="#pricing">See pricing</a>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="panel sb-pains">
                <div class="side-title">Sound familiar?</div>
                <ul>
                    <li v-for="pain in content.pains" :key="pain">
                        <i class="fa-solid fa-xmark"></i>{{ pain }}
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="section__head">
            <div>
                <div class="eyebrow">What I build</div>
                <h2>Tools made for how your business works</h2>
            </div>
        </div>
        <div class="row g-4">
            <div v-for="build in content.builds" :key="build.title" class="col-sm-6 col-lg-3">
                <div class="panel sb-card">
                    <span class="icon-tile"><i :class="build.icon"></i></span>
                    <h3>{{ build.title }}</h3>
                    <p>{{ build.text }}</p>
                    <div class="sb-card__for">{{ build.for }}</div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="section__head">
            <div>
                <div class="eyebrow">How it works</div>
                <h2>From first call to working tool</h2>
            </div>
        </div>
        <div class="row g-4">
            <div v-for="(step, index) in content.steps" :key="step.title" class="col-md-4">
                <div class="panel sb-card">
                    <span class="sb-step">{{ index + 1 }}</span>
                    <h3>{{ step.title }}</h3>
                    <p>{{ step.text }}</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="row g-5 align-items-center">
            <div class="col-md-4 col-lg-3">
                <div class="hero__photo">
                    <img :src="profile.photo" alt="Alex Ulogov" />
                </div>
            </div>
            <div class="col-md-8 col-lg-9">
                <div class="eyebrow"><i class="fa-solid fa-location-dot"></i>{{ profile.location }}</div>
                <h2>A local developer, not an agency</h2>
                <p v-for="paragraph in content.about" :key="paragraph" class="sb-about">{{ paragraph }}</p>
            </div>
        </div>
    </section>

    <section id="pricing" class="section">
        <div class="section__head">
            <div>
                <div class="eyebrow">Pricing</div>
                <h2>Clear prices, agreed up front</h2>
                <p class="section__lead">{{ content.pricing.lead }}</p>
            </div>
        </div>
        <div class="panel stats sb-prices">
            <div v-for="item in content.pricing.items" :key="item.label" class="stat">
                <div class="contact-card__label">{{ item.label }}</div>
                <div class="stat__value">{{ item.value }}</div>
                <div class="stat__label">{{ item.note }}</div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="section__head">
            <div>
                <div class="eyebrow">FAQ</div>
                <h2>Common questions</h2>
            </div>
        </div>
        <div class="row g-4">
            <div v-for="item in content.faq" :key="item.q" class="col-md-6">
                <div class="panel sb-card">
                    <h3>{{ item.q }}</h3>
                    <p>{{ item.a }}</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="cta">
            <div>
                <h2>Let's see what's slowing you down</h2>
                <p>A free 30-minute call. No pressure, no sales pitch.</p>
            </div>
            <div class="d-flex flex-wrap gap-2">
                <a class="btn btn-on-dark" :href="callHref">
                    <i class="fa-regular fa-calendar"></i>Book a free call
                </a>
                <a v-if="content.phone" class="btn btn-on-dark" :href="`tel:${content.phone.replace(/[^\d+]/g, '')}`">
                    <i class="fa-solid fa-phone"></i>{{ content.phone }}
                </a>
                <a v-if="email" class="btn btn-on-dark" :href="email.href">
                    <i class="fa-regular fa-envelope"></i>{{ email.label }}
                </a>
            </div>
        </div>
    </section>
</template>
