<script setup>
defineProps({
    // Section slug from work_sections.json.
    type: { type: String, required: true },
});

// Scatter plot for the AI card: loose grey points, plus a tight cluster around the query.
const points = [
    [12, 14],
    [24, 24],
    [14, 32],
    [20, 66],
    [32, 72],
];
const matches = [
    [58, 24],
    [74, 36],
    [58, 50],
];
</script>

<template>
    <!-- Decorative drawings built from UI fragments, one per Work section -->
    <div class="work-art" aria-hidden="true">
        <div v-if="type === 'web-apps'" class="art-app">
            <div class="art-app__side">
                <div></div>
                <div class="is-accent"></div>
                <div></div>
            </div>
            <div class="art-app__main">
                <div class="art-heading"></div>
                <div class="art-row"><div class="art-check"></div><div class="art-line"></div></div>
                <div class="art-row"><div class="art-check"></div><div class="art-line"></div></div>
                <div class="art-row">
                    <div class="art-check is-open"></div>
                    <div class="art-line" style="width: 55%"></div>
                </div>
            </div>
        </div>

        <template v-else-if="type === 'ai'">
            <div class="art-doc">
                <div class="art-line"></div>
                <div class="art-line"></div>
                <div class="art-line"></div>
                <div class="art-line" style="width: 60%"></div>
            </div>
            <div class="art-link"></div>
            <div class="art-tokens"><div></div><div></div><div></div><div></div></div>
            <div class="art-link"></div>
            <div class="art-model"><div></div></div>
            <div class="art-link"></div>
            <div class="art-vectors">
                <div v-for="[x, y] in points" :key="`p${x}-${y}`" class="art-dot" :style="{ left: `${x}px`, top: `${y}px` }"></div>
                <div
                    v-for="[x, y] in matches"
                    :key="`m${x}-${y}`"
                    class="art-dot is-match"
                    :style="{ left: `${x}px`, top: `${y}px` }"
                ></div>
                <div class="art-vectors__ring"></div>
                <div class="art-vectors__query"></div>
            </div>
        </template>

        <template v-else-if="type === 'websites'">
            <div class="art-page art-page--left">
                <div class="art-page__block"></div>
                <div class="art-line" style="width: 70%"></div>
                <div class="art-line" style="width: 50%"></div>
            </div>
            <div class="art-page art-page--right">
                <div></div>
                <div></div>
                <div></div>
                <div class="is-accent"></div>
            </div>
            <div class="art-page art-page--front">
                <div class="art-page__nav"><div></div><div></div></div>
                <div class="art-page__hero"></div>
                <div class="art-line" style="width: 75%"></div>
            </div>
        </template>

        <template v-else-if="type === 'tools'">
            <div class="art-clipboard">
                <div class="art-clipboard__clip"></div>
                <div class="art-clipboard__paper">
                    <div class="art-row art-row--sm"><div class="art-check"></div><div class="art-line"></div></div>
                    <div class="art-row art-row--sm"><div class="art-check"></div><div class="art-line"></div></div>
                    <div class="art-row art-row--sm">
                        <div class="art-check"></div>
                        <div class="art-line" style="width: 60%"></div>
                    </div>
                    <div class="art-row art-row--sm">
                        <div class="art-check is-open"></div>
                        <div class="art-line" style="width: 70%"></div>
                    </div>
                </div>
            </div>
            <div class="art-calc">
                <div class="art-calc__screen"><div></div></div>
                <div class="art-calc__keys">
                    <div></div><div></div><div></div><div class="is-op"></div>
                    <div></div><div></div><div></div><div class="is-op"></div>
                    <div></div><div></div><div></div><div class="is-equals"></div>
                    <div class="is-wide"></div><div></div>
                </div>
            </div>
        </template>
    </div>
</template>
