<script setup>
import { defineProps, ref, computed } from "vue";
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    posts: Object,
});

const formatTitle = (title) => {
    const maxLength = 20;
    const formattedTitle = title.toLowerCase().replace(/\b\w/g, c => c.toUpperCase());

    if (title.length > maxLength) {
        return `${formattedTitle.substring(0, maxLength)}...`;
    } else {
        return formattedTitle;
    }
};
const formattedTitle = (postTitle) => computed(() => formatTitle(postTitle));

</script>

<template>
    <aside id="blogs" aria-label="Related articles" class="py-8 lg:py-24 bg-white dark:bg-gray-900">
        <div class="px-4 mx-auto max-w-screen-xl">
            <h2 class="">
                
            </h2>
        </div>
    </aside>
</template>
