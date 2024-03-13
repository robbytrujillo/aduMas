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
            <h2 class="mb-2 text-3xl font-extrabold leading-tight tracking-tight text-gray-900 lg:text-center dark:text-white md:text-4xl">
                Recent Post
            </h2>
            <p class="mb-1 text-lg font-normal text-gray-500 dark:text-gray-400 lg:text-center lg:text-xl lg:px-64 lg:mb-16">
                Data post terbaru.
            </p>
            <div v-if="posts.length > 0" class="grid gap-12 sm:grid-cols-2 lg:grid-cols-4">
                <Link v-for="post in posts" :key="post.id" :href="route(`posts.detail`, { slug: post.slug })" class="overflow-hidden rounded-lg shadow transition hover:shadow-lg">
                    <img alt="Office" :src="post-image" class="h-56 w-full object-contain" />

                    <div class="bg-white p-4 sm:p-6">
                        <time datetime="2022-10-10" class="block text-sm text-gray-500">
                            {{ post.created_at }}
                        </time>

                        <Link :href="route('posts.detail', { slug: post.slug })">
                            <h3 class="mt-0.5 text-lg text-gray-900">
                                {{ formatedTitle(post.title) }}
                            </h3>
                        </Link>
                        <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
                            {{ post.description }}
                        </p>
                    </div>
                </Link>
            </div>
            <div v-else>
                <p class="">
                    Maaf, belum ada data Post.
                </p>
            </div>
        </div>
    </aside>
</template>
