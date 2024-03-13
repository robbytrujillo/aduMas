<script setup>
import { defineProps } from "vue";
import { Link, Head } from "@inertiajs/vue3";

const props = defineProps({
    posts: Object,
    tag: Object,
    postCount: Object,
});

const formatStatusCreatedAt = (createdAt) => {
    const date = new Date(createdAt);
    const options = {
        year: "numeric",
        month: "long",
        day: "numeric",
        hour: "numeric",
        minute: "numeric",
        second: "numeric",
        timeZoneName: "short",
    };
    return date.toLocaleDateString("id-ID", options);
};

const truncateText = (text) => {
    const maxCharacters = 100;
    return text.length > maxCharacters
        ? text.substring(0, maxCharacters) + "..."
        : text;
};
</script>
<template>
    <Head title="Tag.name" />
    <div class="col-span-3 sm:px-16 sm:py-6 py-4 grid">
        <div class="bg-white shado mt-10">
            <!-- form header card -->
            <div class="flex flex-wrap p-4 border-b border-slate-200">
                <div class="sm:w-full mb-3 sm:mb-3">
                    <p class="font-semibold text-base">
                        Post berdasarkan tag
                        <span
                            class="rounded-3xl border border-slate-400 px-2 py-1"
                            style="margin: 0.2rem"
                            >#{{ tag.name }}</span
                        >
                    </p>
                    <p class="text-slate-500 text-sm font-light">
                        Terdapat {{ postCount }} total post
                    </p>
                </div>
            </div>

            <!-- List of all post -->
            <div class="card-body px-3">
                <template v-if="posts.data && posts.data.length > 0">
                    <div v-for="(post, index) in posts.data " :key="index" class="post flex sm:flex-nowrap flex-wrap border-b border-slate-200 px-3 py-4 font-inter">
                        <div class="sm:flex-none sm:w-36 sm:h-fit w-full">
                            <Link :href="route('posts.detail', { slug: post.slug })">
                                <img :src="post.image" class="object-cover sm:h-36 h-52 w-full" alt="image card">
                            </Link>
                        </div>
                        <div class="sm:flex-initial sm:w-full grid content-between min-h-[9em] pl-3 sm:mt-0 mt-3">
                            <Link :href="route('posts.detail', {slug:post.slug})" class="self-auto">
                                <p class="text-red-900 text-xl font-semibold">
                                    {{ post.title }}
                                </p>
                                <p class="text-slate-500 text-sm text-sm font-light">DESA {{ post.desa_kelurahan }}, {{ formatStatusCreatedAt(postMessage.created_at) }}</p>
                                <p class="py-3 text-sm" v-html="truncateText(postMessage.content)"></p>
                            </Link>
                            <div class="grid grid-cols-3">
                                <div class="col-span-3 sm:col-span-1">
                                    <span class="rounded-full border text-red-600 px-2 py-1 sm:px-2 sm:py-1 text-sm" style="background-color: #ddf2fe; color: #2d9cdb;">
                                        Dilihat ({ post.views_count }) kali
                                    </span>
                                </div>
                                <div class="col-span-3 sm:col-span-2 sm:justify-self-end flex justify-end pt-4">
                                    <span class="text-gray-400 text-xs font-light mr-2">
                                        <span id="count-mark-152887">Author:</span> {{ post.user.name }}
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                </template>
                <template v-else>
                    <p class="text-center text-gray-500 text-lg font-semibold">Maaf, data post berdasarkan tag yang dipilih masih kosong.</p>
                </template> 
            </div>
        </div>
    </div>
</template>
