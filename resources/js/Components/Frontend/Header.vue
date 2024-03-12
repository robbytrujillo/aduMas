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
            <div class="flex flex-wrap item-center justify-between max-w-screen-xl px-4 mx-auto">
                <Link :href="route('home')" class="flex items-center">
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white text-pink-600">Lapor</span>
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white text-black">Kab!</span>
                </Link>
            </div>
        </nav>
    </header>
</template>
