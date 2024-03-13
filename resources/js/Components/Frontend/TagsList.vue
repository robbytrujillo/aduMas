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
    <div class="grid col-span-3 py-4 sm:px-16 sm:py-6">
        <div class="mt-10 bg-white shadow">
            <!-- Form header card -->
            <div class="flex flex-wrap p-4 border-b border-slate-200">
                <div class="text-base font-semibold">
                    Aduan berdasarkan tag
                    <span
                        class="px-2 py-1 border rounded-3xl border-slate-400"
                        style="margin: 0.2rem"
                    >
                        #{{ Tags.name }}
                    </span>
                </div>
            </div>
            <!-- List of all aduan -->
            <div class="px-3 card-body">
                <template v-if="">
                    
                </template>
            </div>
        </div>
    </div>
</template>
