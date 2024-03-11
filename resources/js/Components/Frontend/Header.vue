<script setup>
import { Link } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";
const scrollBg = ref(false);
const setScrollBg = (value) => {
    scrollBg.value = value;
};
onMounted(() => {
    window.addEventListener("scroll", () => {
        return window.scrollY > 50 ? setScrollBg(true) : setScrollBg(false);
    });
});

defineProps({
    canLogin: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>
<template>
    <header class="fixed w-full">
        <nav
            :class="{
                'bg-white border-2 border-b-pink-600 rounded-b-lg py-2.5 dark:bg-gray-900':
                    scrollBg,
                '': !scrollBg,
            }"
            class="py-2.5 border-gray-200 dark:bg-gray-900"
        >
            <div class="flex flex-wrap"></div>
        </nav>
    </header>
</template>
