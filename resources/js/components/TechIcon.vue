<script setup>
import { computed } from 'vue';
import { techLogo } from '../tech';

const props = defineProps({
    name: { type: String, required: true },
});

const logo = computed(() => techLogo(props.name));
</script>

<template>
    <img v-if="logo.img" class="tech-icon" :src="`/images/tech/${logo.img}.svg`" alt="" />
    <i v-else class="tech-icon" :class="logo.icon" :style="{ color: logo.color ?? '#7b8a91' }"></i>
</template>
