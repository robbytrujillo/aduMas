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
                <template v-if="aduans.data && aduans.data.length > 0">
                    <div
                        v-for="(aduan, index) in aduans.data"
                        :key="index"
                        class="flex flex-wrap px-3 py-4 border-b aduan sm:flex-nowrap border-slate-200 for-inter"
                    >
                        <div class="w-full sm:flex-none sm:w-36 sm:h-fit">
                            <Link
                                :href="
                                    route('aduan.detail', { slug: aduan.slug })
                                "
                            >
                                <img
                                    :src="aduan.image"
                                    class="object-cover w-full sm:h-36 h-52"
                                    alt="image card"
                                />
                            </Link>
                        </div>
                        <div
                            class="grid sm:flex-initial sm:w-full content-between min-h [9em] pl-3 sm:mt-0 mt-3"
                        >
                            <Link
                                :href="
                                    route('aduan.detail', { slug: aduan.slug })
                                "
                                class="self-auto"
                            >
                                <p class="text-sm font-semibold text-red-600">
                                    LK{{ aduan.id }}
                                </p>
                                <p class="text-xl font-semibold text-red-900">
                                    {{ aduan.title }}
                                </p>
                                <p class="text-xl font-light text-slate-900">
                                    DESA {{ aduan.desa_kelurahan }},
                                    {{ formatStatusCreatedAt(aduan.createdAt) }}
                                </p>
                                <p class="py-3 text-sm">
                                    {{ aduan.isi_aduan }}
                                </p>
                            </Link>
                            <div class="grid grid-cols-3">
                                <div class="col-span-3 sm:col-span-1">
                                    <span class="px-2 py-1 text-sm text-red-600 border rounded-full sm:px-2 sm:py-1" style="background-color: #ddf2fe; color: #2d9cdb;"> 
                                        {{ aduan.status.status }}
                                    </span>
                                </div>
                                <div class="flex justify-end col-span-3 pt-4 sm:col-span-2 sm:justify-self-end">
                                    <span class="mr-2 text-xs font-light text-gray-400">
                                        <span id="count-mark-152887">Pelapor:</span> {{ aduan.user.name }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>
</template>
