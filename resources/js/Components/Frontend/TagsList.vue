<script setup>
import { defineProps } from "vue";
import { Link, Head } from "@inertiajs/vue3";

const props = defineProps({
    aduans: Object,
    tag: Object,
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
</script>
<template>
    <Head title="Data Tags" />
    <div class="col-span-3 sm:px-16 sm:py-6 py-4 grid">
        <div class="bg-white shadow mt-10">
            <!-- Form header card -->
            <div class="flex flex-wrap p-4 border-b border-slate-200">
                <div class="font-semibold text-base">
                    Aduan berdasarkan tag
                    <span
                        class="rounded-3xl border border-slate-400 px-2 py-1"
                        style="margin: 0.2rem"
                    >
                        #{{ Tags.name }}
                    </span>
                </div>
            </div>
            <!-- List of all aduan -->
        </div>
    </div>
</template>
