<script setup>
import { ref } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';
import TechIcon from '../components/TechIcon.vue';

const page = usePage();

const sections = [
    { label: 'Home', href: '/' },
    { label: 'Work', href: '/work' },
    { label: 'Notes', href: '/notes' },
    { label: 'Lab', href: '/lab' },
    { label: 'Resume', href: '/resume' },
    { label: 'Contact', href: '/contact' },
];

// The layout stays mounted between pages, so the mobile menu is closed by hand on each visit.
const menuOpen = ref(false);

const isActive = (href) => (href === '/' ? page.url === '/' : page.url.startsWith(href));
</script>

<template>
    <div class="site-shell d-flex flex-column min-vh-100">
        <nav class="site-nav navbar navbar-expand-md">
            <div class="container">
                <Link class="site-brand" href="/" @click="menuOpen = false">
                    <span class="site-brand__mark">AU</span>
                    Alex Ulogov
                </Link>
                <button
                    class="navbar-toggler"
                    type="button"
                    aria-controls="mainNav"
                    :aria-expanded="menuOpen"
                    aria-label="Toggle navigation"
                    @click="menuOpen = !menuOpen"
                >
                    <i class="fa-solid" :class="menuOpen ? 'fa-xmark' : 'fa-bars'"></i>
                </button>
                <div id="mainNav" class="collapse navbar-collapse" :class="{ show: menuOpen }">
                    <ul class="navbar-nav ms-auto gap-1 pt-3 pt-md-0">
                        <li v-for="section in sections" :key="section.href" class="nav-item">
                            <Link
                                class="nav-link"
                                :class="{ active: isActive(section.href) }"
                                :href="section.href"
                                @click="menuOpen = false"
                            >
                                {{ section.label }}
                            </Link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="site-main container flex-grow-1">
            <slot />
        </main>

        <footer class="site-footer">
            <div class="container d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                    <div>&copy; {{ new Date().getFullYear() }} Alex Ulogov &middot; {{ page.props.site.location }}</div>
                    <div class="built-with mt-1">
                        Built with
                        <TechIcon name="Laravel" title="Laravel" />
                        <TechIcon name="Vue" title="Vue" />
                        <TechIcon name="Bootstrap" title="Bootstrap" />
                    </div>
                </div>
                <div class="site-footer__social d-flex gap-2">
                    <a
                        v-for="contact in page.props.site.contacts"
                        :key="contact.href"
                        :href="contact.href"
                        :target="contact.href.startsWith('mailto:') ? null : '_blank'"
                        :aria-label="contact.label"
                        rel="noopener"
                    >
                        <i :class="contact.icon"></i>
                    </a>
                </div>
            </div>
        </footer>
    </div>
</template>
