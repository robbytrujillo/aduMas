<template>
    <Head :title="aduan.title" />
    <div class="container flex mx-auto lg:pt-28">
        <div class="grid grid-cols-3 sm:min-h-fit lg:space-y-0 sm:space-y-4">
            <!-- Section Detail Aduan -->
            <div class="col-span-3 mb-6 lg:col-span-2 sm:col-span-3 lg:pr-2">
                <div class="bg-white shadow">
                    <!-- header card -->
                    <div class="grid grid-cols-2 p-4 border-b border-slate-200">
                        <div class="col-span-1">
                            <p class="text-base font-semibold">
                                Rincian Aduan :
                                <span class="text-red-600"
                                    >LK{{ aduan.id }}</span
                                >
                            </p>
                            <p class="text-base font-semibold">
                                <span class="text-red-600">{{
                                    aduan.title
                                }}</span>
                            </p>
                        </div>
                        <div class="col-span-1 justify-self-end">
                            <span
                                class="px-2 py-1 text-red-600 border rounded-full"
                                style="
                                    background-color: #eaffed;
                                    color: #27ae60;
                                "
                                >{{ lastStatus }}</span
                            >
                            <span
                                class="px-2 py-1 text-red-600 border rounded-full"
                                style="
                                    background-color: #eaffed;
                                    color: #27ae60;
                                "
                                >Public</span
                            >
                        </div>
                    </div>
                    <!-- content card -->
                    <div
                        class="p-4 border-b border-slate-200"
                        style="min-height: 22rem"
                    >
                        <div class="grid grid-cols-3 gap-4 images">
                            <div
                                class="flex items-center justify-center col-span-1"
                            >
                                <img
                                    :src="aduan.image"
                                    class="object-cover w-full mx-auto h-70"
                                    alt="image card"
                                    style="cursor: pointer"
                                />
                            </div>
                        </div>
                        <div class="py-3 content-text">
                            <p class="text-sm font-light text-gray-500">
                                DESA {{ aduan.desa_kelurahan }},
                                {{ aduan.created_at }}
                            </p>
                            <p
                                class="pt-2 overflow-hidden text-sm text-ellipsis"
                            >
                                {{ aduan.isi_aduan }}
                            </p>
                        </div>
                        <!-- Informasi Tags -->
                        <div
                            class="flex flex-wrap pt-4 text-sm font-semibold text-gray-500 tags"
                        >
                            <span
                                v-for="(tag, index) in aduan.tags"
                                :key="index"
                                class="px-2 py-1 border rounded-3xl border-slate-400"
                                style="margin: 0.2rem"
                            >
                                <Link
                                    :href="
                                        route('tags.show', { slug: tag.slug })
                                    "
                                    >#{{ tag.name }}</Link
                                >
                            </span>
                        </div>
                        <!-- Informasi Tags -->
                    </div>
                    <div class="grid grid-cols-2 p-4 border-b border-slate-200">
                        <div
                            class="flex justify-between col-span-2 sm:col-span-1 lg:justify-start"
                        ></div>
                        <div
                            class="flex justify-between col-span-2 mt-4 ml-1 sm:col-span-1 sm:justify-self-end sm:items-center sm:gap-5 sm:mt-0"
                        >
                            <p
                                class="mr-2 text-xs font-light bg-red-50 text-slate-400"
                            >
                                <span id="count-mark-152887">Pelapor:</span>
                                {{ aduan.user.name }}
                            </p>
                        </div>
                    </div>
                    <!-- content card -->
                </div>
            </div>
            <div
                class="col-span-3 mb-6 lg:col-span-1 sm:col-span-3 lg:pl-2 font-inter"
            >
                <div class="p-2 bg-white shadow sm:mb-6">
                    <ul
                        class="flex py-2 text-sm font-medium text-center text-gray-500 border-b dark:text-gray-400 border-slate-200"
                        role="tablist"
                    >
                        <li class="w-full pr-1" role="presentation">
                            <a
                                href="#"
                                class="inline-block w-full px-4 py-3 rounded-lg bg-red-50 hover:bg-red-50 hover:text-red-700 active"
                                id="progress-tab"
                                data-tabs-target="#progress"
                                type="button"
                                role="tab"
                                aria-controls="progress"
                                aria-selected="false"
                                aria-current="page"
                                >PROSES</a
                            >
                        </li>
                    </ul>
                    <div class="pt-8">
                        <div class="h-56 overflow-y-auto">
                            <!-- Looping untuk menampilkan setiap status -->
                            <div
                                v-for="(status, index) in aduan.status"
                                :key="index"
                                class="flex flex-row my-2"
                            >
                                <div
                                    class="pt-1 basis-1/6 md:flex md:justify-center"
                                >
                                    <i
                                        v-if="
                                            status.status === 'Belum Ditangani'
                                        "
                                        class="text-red-600 fas fa-dot-circle"
                                    ></i>
                                    <i
                                        v-if="status.status === 'Verifikasi'"
                                        class="text-blue-600 fas fa-check-circle"
                                    ></i>
                                    <i
                                        v-if="status.status === 'Diproses'"
                                        class="text-gray-600 fas fa-check-circle"
                                    ></i>
                                    <i
                                        v-if="status.status === 'Selesai'"
                                        class="text-green-600 fas fa-check-circle"
                                    ></i>
                                </div>
                                <div class="basis-5/6">
                                    <p class="font-medium text-pink-600">
                                        {{ status.status }}
                                    </p>
                                    <p class="pb-1 text-xs font-semibold">
                                        {{
                                            formatStatusCreatedAt(
                                                status.created_at
                                            )
                                        }}
                                    </p>
                                    <p
                                        class="pb-1 text-xs font-semibold"
                                        v-if="status.user?.name"
                                    >
                                        <span
                                            v-if="
                                                status.status ===
                                                'Belum Ditangani'
                                            "
                                            >Pelapor</span
                                        >
                                        {{ status.user.name }}
                                    </p>
                                    <div class="pb-1 text-xs">
                                        <p>
                                            <span class="pb-1 text-xs">{{
                                                status.keterangan
                                            }}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <aside
        id="blogs"
        aria-label="Related articles"
        class="py-8 bg-white lg:py-24 dark:bg-gray-900"
    >
        <div class="max-w-screen-xl px-4 mx-auto">
            <h2 class="text-2xl font-bold text-gray-900 mb-9 dark:text-white">
                Aduan Terbaru
            </h2>
            <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-4">
                <Link
                    v-for="data in popularAduans"
                    :key="data.id"
                    :href="route('aduan.detail', { slug: data.slug })"
                    class="overflow-hidden transition rounded-lg shadow hover:shadow-lg"
                >
                    <img
                        alt="Office"
                        :src="data.image"
                        class="object-cover w-full h-56"
                    />

                    <div class="p-4 bg-white sm:p-6">
                        <time
                            datetime="2022-10-10"
                            class="block text-sm text-gray-500"
                        >
                            {{ data.desa_kelurahan }}, {{ data.created_at }}
                        </time>

                        <Link
                            :href="route('aduan.detail', { slug: data.slug })"
                        >
                            <h3 class="mt-0.5 text-lg text-gray-900">
                                {{ data.title }}
                            </h3>
                        </Link>
                        <p
                            class="mt-2 text-gray-500 line-clamp-3 text-sm/relaxed"
                        >
                            {{ data.isi_aduan }}
                        </p>
                    </div>
                </Link>
            </div>
        </div>
        <div class="text-center mt-9">
            <a
                href="#"
                class="inline-block px-12 py-3 text-sm font-medium text-white transition bg-pink-600 rounded hover:bg-pink-700 focus:outline-none focus:ring focus:ring-yellow-400"
            >
                Lihat semua aduan
            </a>
        </div>
    </aside>
</template>
<script setup>
import { defineProps, ref, computed } from "vue";
import { Link, Head } from "@inertiajs/vue3";
const props = defineProps({
    aduan: Object,
    popularAduans: Object,
});

const lastStatus = computed(() => {
    const statuses = props.aduan.status;
    return statuses.length > 0 ? statuses[statuses.length - 1].status : "";
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
