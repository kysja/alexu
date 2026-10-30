<script setup>
import { computed } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import SkillGroups from '../components/SkillGroups.vue';
import WorkSectionGrid from '../components/WorkSectionGrid.vue';

const props = defineProps({
    profile: { type: Object, required: true },
    skills: { type: Array, required: true },
    sections: { type: Array, required: true },
});

// Split "Hello, I'm Alex" so the name can be coloured.
const greeting = computed(() => {
    const words = props.profile.greeting.split(' ');

    return { name: words.pop(), intro: words.join(' ') };
});

const email = computed(() => props.profile.contacts.find((contact) => contact.href.startsWith('mailto:')));
</script>

<template>
    <Head title="Home" />

    <section class="row g-5 align-items-center">
        <div class="col-lg-7">
            <div class="eyebrow"><i class="fa-solid fa-location-dot"></i>{{ profile.location }}</div>

            <h1 class="hero__title">
                {{ greeting.intro }} <span>{{ greeting.name }}</span>
            </h1>

            <div class="hero__roles">
                <span v-for="role in profile.roles" :key="role">{{ role }}</span>
            </div>

            <div class="hero__about">
                <p v-for="paragraph in profile.about" :key="paragraph">{{ paragraph }}</p>
            </div>

            <div class="d-flex flex-wrap gap-2 mt-4">
                <Link class="btn btn-primary" href="/work">
                    See my work<i class="fa-solid fa-arrow-right"></i>
                </Link>
                <Link class="btn btn-quiet" href="/resume">
                    <i class="fa-regular fa-file-lines"></i>Resume
                </Link>
                <Link class="btn btn-quiet" href="/contact">
                    <i class="fa-regular fa-envelope"></i>Contact
                </Link>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="hero__photo">
                <img :src="profile.photo" alt="Alex Ulogov" />
                <div class="hero__badge">
                    <i class="fa-solid fa-code"></i>{{ profile.roles[0] }}
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="panel stats">
            <div v-for="item in profile.highlights" :key="item.label" class="stat">
                <div class="stat__value">{{ item.value }}</div>
                <div class="stat__label">{{ item.label }}</div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="section__head">
            <div>
                <div class="eyebrow">Tech stack</div>
                <h2>Tools I work with</h2>
            </div>
        </div>
        <SkillGroups :skills="skills" />
    </section>

    <section class="section">
        <div class="section__head">
            <div>
                <div class="eyebrow">Portfolio</div>
                <h2>What I build</h2>
            </div>
            <Link class="arrow-link" href="/work">All work<i class="fa-solid fa-arrow-right"></i></Link>
        </div>
        <WorkSectionGrid :sections="sections" />
    </section>

    <section class="section">
        <div class="cta">
            <div>
                <h2>Have a project in mind?</h2>
                <p>The best way to reach me is by email.</p>
            </div>
            <a v-if="email" class="btn btn-on-dark" :href="email.href">
                <i class="fa-regular fa-envelope"></i>{{ email.label }}
            </a>
        </div>
    </section>
</template>
