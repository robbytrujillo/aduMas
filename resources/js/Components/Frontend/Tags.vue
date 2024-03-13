<script setup>
import { Link } from "@inertiajs/vue3";
defineProps({
    tags: Object,
});
</script>

<template>
    <section class="py-2 lg:py-10 bg-pink-50">
        <div class="px-4 mb-4 mx-auto max-w-screen-xl">
            <h2
                class="mb-2 text-3xl font-extrabold leading-tight tracking-tight text-gray-900 lg:text-center dark:text-white md:text-4xl"
            >
                Recent Tags
            </h2>
            <p
                class="mb-1 text-lg font-normal text-gray-500 dark:text-gray-400 lg:text-center lg:text-xl lg:px-64 lg:mb-16"
            >
                Data terbaru tags aduan masyarakat.
            </p>
            <div class="overflow-hidden">
                <div v-if="tags.length > 0" class="flex space-x-4">
                    <!-- Looping untuk menampilkan setiap tag -->
                    <div
                        class="tags pt-1 mb-3 flex flex-wrap text-gray-500 text-sm font-semibold"
                    >
                        <span
                            v-for="(tag, index) in tags"
                            :key="index"
                            class="rounded-3xl border border-slate-400 px-2 py-1"
                            style="margin: 0.2rem"
                        >
                            <Link :href="route('tags.show', { slug: tag.slug })"
                                >#{{ tag.name }}
                            </Link>
                        </span>
                    </div>
                </div>
                <div v-else>
                    <p
                        class="text-lg text-gray-500 dark:text-gray-400 lg:text-center lg:text-xl"
                    >
                        Maaf, Belum ada tags.
                    </p>
                </div>
            </div>
        </div>
    </section>
</template>
