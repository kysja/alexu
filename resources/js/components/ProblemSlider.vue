<script setup>
import { ref } from 'vue';
import { Swiper, SwiperSlide } from 'swiper/vue';
import { A11y, Keyboard, Pagination } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/pagination';

defineProps({
    problems: { type: Object, required: true },
});

const modules = [A11y, Keyboard, Pagination];

const swiper = ref(null);
</script>

<template>
    <div class="section__head">
        <div>
            <div class="eyebrow">Sound familiar?</div>
            <h2>Common problems, simple fixes</h2>
            <p class="section__lead">{{ problems.lead }}</p>
        </div>
        <div class="sb-slider__nav">
            <button type="button" aria-label="Previous example" @click="swiper?.slidePrev()">
                <i class="fa-solid fa-arrow-left"></i>
            </button>
            <button type="button" aria-label="Next example" @click="swiper?.slideNext()">
                <i class="fa-solid fa-arrow-right"></i>
            </button>
        </div>
    </div>

    <Swiper
        class="sb-slider"
        :modules="modules"
        :loop="true"
        :space-between="24"
        :keyboard="{ enabled: true, onlyInViewport: true }"
        :pagination="{ clickable: true }"
        @swiper="(instance) => (swiper = instance)"
    >
        <SwiperSlide v-for="item in problems.items" :key="item.tool">
            <div class="panel sb-slide">
                <div class="sb-slide__side sb-slide__side--problem">
                    <div class="sb-slide__label"><i class="fa-solid fa-xmark"></i>The problem</div>
                    <img class="fix-art" :src="item.images.before" alt="" />
                    <h3>{{ item.problem }}</h3>
                    <p>{{ item.problem_text }}</p>
                </div>
                <div class="sb-slide__side sb-slide__side--fix">
                    <span class="sb-slide__magic" aria-hidden="true">
                        <i class="fa-solid fa-wand-magic-sparkles"></i>
                        <span v-for="n in 3" :key="n" class="sb-slide__spark">✦</span>
                    </span>
                    <div class="sb-slide__label"><i class="fa-solid fa-check"></i>The fix</div>
                    <img class="fix-art" :src="item.images.after" alt="" />
                    <h3>{{ item.title }}</h3>
                    <p>{{ item.text }}</p>
                    <div class="sb-slide__tool"><i :class="item.icon"></i>{{ item.tool }}</div>
                </div>
            </div>
        </SwiperSlide>

        <SwiperSlide>
            <div class="panel sb-slide sb-slide--more">
                <span class="icon-tile"><i class="fa-solid fa-plus"></i></span>
                <h3>{{ problems.more.title }}</h3>
                <p>{{ problems.more.text }}</p>
                <a class="arrow-link" href="#start">Tell me about it<i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </SwiperSlide>
    </Swiper>
</template>
