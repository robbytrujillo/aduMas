<template>
    <section
        id="categories"
        class="border border-t border-b border-gray-100 bg-gray-50 dark:bg-gray-800 dark:border-gray-700"
    >
        <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-16">
            <h2
                class="mb-2 text-3xl font-extrabold leading-tight tracking-tight text-gray-900 lg:text-center dark:text-white md:text-4xl"
            >
                Posts Categories
            </h2>
        </div>
    </section>
</template>

<script setup>
import { defineProps } from "vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    categories: Object,
});
</script>
