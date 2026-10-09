<script setup>
import { Link, usePage } from '@inertiajs/vue3';

const page = usePage();

const sections = [
    { label: 'Home', href: '/', icon: 'fa-house' },
    { label: 'Work', href: '/work', icon: 'fa-briefcase' },
    { label: 'Notes', href: '/notes', icon: 'fa-pen' },
    { label: 'Lab', href: '/lab', icon: 'fa-flask' },
    { label: 'Resume', href: '/resume', icon: 'fa-file-lines' },
    { label: 'Contact', href: '/contact', icon: 'fa-envelope' },
];

const isActive = (href) => (href === '/' ? page.url === '/' : page.url.startsWith(href));
</script>

<template>
    <div class="d-flex flex-column min-vh-100">
        <nav class="navbar navbar-expand-md border-bottom">
            <div class="container">
                <Link class="navbar-brand" href="/">Alex Ulogov</Link>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#mainNav"
                    aria-controls="mainNav"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="mainNav" class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto">
                        <li v-for="section in sections" :key="section.href" class="nav-item">
                            <Link
                                class="nav-link"
                                :class="{ active: isActive(section.href) }"
                                :href="section.href"
                            >
                                <i class="fa-solid me-1" :class="section.icon"></i>
                                {{ section.label }}
                            </Link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="container py-5 flex-grow-1">
            <slot />
        </main>

        <footer class="border-top py-3 text-center text-body-secondary small">
            &copy; {{ new Date().getFullYear() }} Alex Ulogov
        </footer>
    </div>
</template>
