<template>
    <aside
        id="blogs"
        aria-label="Related articles"
        class="py-8 bg-white lg:py-24 dark:bg-gray-900"
    >
        <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-16">
            <h2
                class="mb-2 text-3xl font-extrabold leading-tight tracking-tight text-gray-900 lg:text-center dark:text-white md:text-4xl"
            >
                Posts Categories
            </h2>
            <p
                class="mb-1 text-lg font-normal text-gray-500 dark:text-gray-400 lg:text-center lg:text-xl lg:px-64 lg:mb-16"
            >
                Daftar categories Posts
            </p>
            <div
                v-if="categories.length > 0"
                class="space-y-4 sm:grid sm-grid-cols-2 lg:grid-cols-4 sm:gap-4 xl:gap-8 sm:space-y-0 md:mt-12"
            >
                <Link
                    :href="route('posts.category', { slug: category.slug })"
                    v-for="category in categories"
                    :key="category.id"
                    class="block px-8 py-12 text-center bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-700 dark:border-gray-600 hover:shadow-lg dark:hover:shadow-lg-light">
                    <img src="category.image" :alt="category.name" class="w-12 h-12 mx-auto"/>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mt-3.5">{{ category.name }}</h3>               
                </Link>
            </div>
            <div v-else>
                <p class="text-lg text-gray-500 dark:text-gray-400 lg:text-center lg:text-xl">
                    Maaf, belum ada data Categories.
                </p>
            </div>
        </div>
    </aside>
</template>

<script setup>
import { defineProps } from "vue";
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    categories: Object,
});
</script>