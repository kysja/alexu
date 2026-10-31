<script setup>
import { computed, ref } from 'vue';
import { Head, useForm } from '@inertiajs/vue3';
import ProblemSlider from '../components/ProblemSlider.vue';

const props = defineProps({
    profile: { type: Object, required: true },
    content: { type: Object, required: true },
});

const email = computed(() => props.profile.contacts.find((contact) => contact.href.startsWith('mailto:')));

const form = useForm({
    name: '',
    business: '',
    email: '',
    phone: '',
    team_size: '',
    needs: '',
    // Honeypot, hidden from people.
    website: '',
});

const sent = ref(false);

const submit = () => {
    form.post('/small-business', {
        preserveScroll: true,
        onSuccess: () => {
            sent.value = true;
            form.reset();
        },
    });
};
</script>

<template>
    <Head title="Small Business">
        <meta
            name="description"
            content="Custom software for small businesses in Jacksonville. Free workflow review and quote. Job tracking, CRM, scheduling, websites, kiosks, and more for teams of 1–50."
        />
    </Head>

    <section class="row g-5 align-items-center">
        <div class="col-lg-6">
            <div class="sb-hero">
                <div class="eyebrow"><i class="fa-solid fa-store"></i>{{ content.hero.eyebrow }}</div>
                <h1 class="sb-title">
                    {{ content.hero.title }}
                    <s>{{ content.hero.crossed }}</s>
                    <span>{{ content.hero.accent }}</span>
                </h1>
                <p class="sb-hero__lead">{{ content.hero.lead }}</p>
                <div class="sb-hero__actions">
                    <a class="btn sb-cta" href="#start">
                        {{ content.hero.cta }}<i class="fa-solid fa-arrow-right"></i>
                    </a>
                    <a class="btn btn-quiet" href="#pricing">{{ content.hero.cta_pricing }}</a>
                </div>
                <p class="sb-free">
                    <i class="fa-solid fa-circle-check"></i>
                    <span><strong>Free to start.</strong> {{ content.hero.free }}</span>
                </p>
            </div>
        </div>

        <div class="col-lg-6">
            <img
                class="sb-hero-image"
                :src="content.hero.image"
                alt="From piles of spreadsheets and sticky notes to one simple app"
                width="1200"
                height="716"
            />
        </div>
    </section>

    <section class="section">
        <ProblemSlider :problems="content.problems" />
    </section>

    <section id="how" class="section">
        <div class="section__head">
            <div>
                <div class="eyebrow">How I work</div>
                <h2>From a short form to a working tool</h2>
                <p class="section__lead">You don't pay anything until you've seen a quote and said yes.</p>
            </div>
        </div>
        <ol class="sb-steps">
            <li v-for="(step, index) in content.steps" :key="step.title" class="sb-step" :class="{ 'is-free': step.free }">
                <div class="sb-step__marker">
                    <span class="sb-step__number">{{ index + 1 }}</span>
                    <span v-if="step.free" class="sb-step__free">Free</span>
                </div>
                <div class="panel sb-card">
                    <span class="icon-tile icon-tile--sm"><i :class="step.icon"></i></span>
                    <h3>{{ step.title }}</h3>
                    <p>{{ step.text }}</p>
                </div>
            </li>
        </ol>
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
                <h2>{{ content.pricing.title }}</h2>
                <p class="section__lead">{{ content.pricing.lead }}</p>
            </div>
        </div>
        <div class="panel sb-prices">
            <div v-for="item in content.pricing.items" :key="item.label" class="sb-price">
                <div class="contact-card__label">{{ item.label }}</div>
                <div v-if="item.prefix" class="sb-price__prefix">{{ item.prefix }}</div>
                <div class="stat__value">{{ item.value }}</div>
                <div class="stat__label">{{ item.note }}</div>
                <div v-if="item.small" class="sb-price__small">{{ item.small }}</div>
            </div>
        </div>
        <ul class="sb-promises">
            <li v-for="promise in content.pricing.promises" :key="promise.title">
                <i class="fa-solid fa-check"></i>
                <span><strong>{{ promise.title }}</strong> {{ promise.text }}</span>
            </li>
        </ul>
    </section>

    <section class="section">
        <div class="sb-closing">
            <h2>{{ content.closing.title }}</h2>
            <p>{{ content.closing.text }}</p>
            <a class="btn sb-cta" href="#start">
                {{ content.closing.cta }}<i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </section>

    <section id="start" class="section">
        <div class="row g-5">
            <div class="col-lg-5">
                <div class="eyebrow">Get started</div>
                <h2>Tell me about your business</h2>
                <p class="sb-about">
                    A few details about your business will help me understand what you need. No technical knowledge
                    required.
                </p>
                <ol class="sb-next">
                    <li>I reply within one business day.</li>
                    <li>We set up a meeting in Jacksonville, or a phone call.</li>
                    <li>You get a written quote. All free, no obligation.</li>
                </ol>
                <p class="sb-next__note">
                    You'll work directly with me. No sales team, no account managers. Just a conversation about your
                    business and how I can help.
                </p>
                <p v-if="email" class="sb-next__note">
                    Prefer email? <a :href="email.href">{{ email.label }}</a>
                </p>
            </div>

            <div class="col-lg-7">
                <div v-if="sent" class="panel sb-form sb-sent" role="status">
                    <span class="icon-tile"><i class="fa-solid fa-check"></i></span>
                    <h3>Thanks, I got it.</h3>
                    <p>I'll read it and get back to you within one business day.</p>
                </div>

                <form v-else class="panel sb-form" novalidate @submit.prevent="submit">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label class="form-label" for="sb-name">Your name</label>
                            <input
                                id="sb-name"
                                v-model="form.name"
                                class="form-control"
                                :class="{ 'is-invalid': form.errors.name }"
                                autocomplete="name"
                                required
                            />
                            <div class="invalid-feedback">{{ form.errors.name }}</div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label" for="sb-business">Business name</label>
                            <input
                                id="sb-business"
                                v-model="form.business"
                                class="form-control"
                                :class="{ 'is-invalid': form.errors.business }"
                                autocomplete="organization"
                                required
                            />
                            <div class="invalid-feedback">{{ form.errors.business }}</div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label" for="sb-email">Email</label>
                            <input
                                id="sb-email"
                                v-model="form.email"
                                type="email"
                                class="form-control"
                                :class="{ 'is-invalid': form.errors.email }"
                                autocomplete="email"
                                required
                            />
                            <div class="invalid-feedback">{{ form.errors.email }}</div>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label" for="sb-phone">Phone <span class="text-muted-ink">(optional)</span></label>
                            <input
                                id="sb-phone"
                                v-model="form.phone"
                                type="tel"
                                class="form-control"
                                :class="{ 'is-invalid': form.errors.phone }"
                                autocomplete="tel"
                            />
                            <div class="invalid-feedback">{{ form.errors.phone }}</div>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="sb-team">How many people work in your business?</label>
                            <select
                                id="sb-team"
                                v-model="form.team_size"
                                class="form-select"
                                :class="{ 'is-invalid': form.errors.team_size }"
                                required
                            >
                                <option value="" disabled>Choose one</option>
                                <option v-for="size in content.form.team_sizes" :key="size" :value="size">{{ size }}</option>
                            </select>
                            <div class="invalid-feedback">{{ form.errors.team_size }}</div>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="sb-needs">What would you like to improve?</label>
                            <textarea
                                id="sb-needs"
                                v-model="form.needs"
                                class="form-control"
                                :class="{ 'is-invalid': form.errors.needs }"
                                rows="4"
                                placeholder="e.g. We're a cleaning company with 8 people. Scheduling lives in a spreadsheet and invoices take my whole Friday."
                                required
                            ></textarea>
                            <div class="invalid-feedback">{{ form.errors.needs }}</div>
                        </div>
                        <div class="sb-honeypot" aria-hidden="true">
                            <label for="sb-website">Website</label>
                            <input id="sb-website" v-model="form.website" tabindex="-1" autocomplete="off" />
                        </div>
                        <div class="col-12 d-flex flex-wrap align-items-center gap-3">
                            <button class="btn sb-cta" type="submit" :disabled="form.processing">
                                Let's Talk About My Business<i class="fa-solid fa-arrow-right"></i>
                            </button>
                            <span class="text-muted-ink small">Free, no obligation.</span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</template>
