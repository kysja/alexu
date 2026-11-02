<script setup>
import { nextTick, ref } from 'vue';

defineProps({
    src: { type: String, required: true },
    title: { type: String, required: true },
});

const dialog = ref(null);
const isOpen = ref(false);
const size = ref({});

const open = async () => {
    // The image only renders once opened, so large files are not fetched with the page.
    isOpen.value = true;
    await nextTick();
    dialog.value.showModal();
};

// Small screenshots are scaled up to a readable size, large ones stay at their real size.
const fit = ({ target }) => {
    size.value = {
        '--image-width': `${Math.max(target.naturalWidth, 760)}px`,
        '--image-ratio': target.naturalWidth / target.naturalHeight,
    };
};

defineExpose({ open });
</script>

<template>
    <!-- A click on the dialog itself is a click on the backdrop; Esc closes it natively -->
    <dialog
        v-if="isOpen"
        ref="dialog"
        class="lightbox"
        :aria-label="title"
        @click.self="dialog.close()"
        @close="isOpen = false"
    >
        <button type="button" class="lightbox__close" aria-label="Close" @click="dialog.close()">
            <i class="fa-solid fa-xmark"></i>
        </button>
        <figure class="lightbox__figure" :style="size">
            <img :src="src" :alt="title" @load="fit" />
            <figcaption>{{ title }}</figcaption>
        </figure>
    </dialog>
</template>
