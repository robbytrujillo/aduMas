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
                
            </div>
        </div>
    </div>
</template>
