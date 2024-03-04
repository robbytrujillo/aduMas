<template>
    <Head :title="aduan.title" />
    <div class="container flex mx-auto lg:pt-28">
        <div class="grid grid-cols-3 sm:min-h-fit lg:space-y-0 sm:space-x-4">
            <!-- Section Detail Aduan -->
            <div class="col-span-3 mb-6 lg:col-span-2 sm:col-span-3 lg:pr-2">
                <div class="bg-white shadow">
                    <!-- header card -->
                    <div class="grid grid-cols-2 p-4 border-b border-slate-200">
                        <div class="col-span-1">
                            <p class="text-base font-semibold">
                                Rincian Aduan :
                                <span class="text-red-600">
                                    LK {{ aduan.id }}
                                </span>
                            </p>
                            <p class="text-base font-semibold">
                                Rincian Aduan :
                                <span class="text-red-600">
                                    LK {{ aduan.title }}
                                </span>
                            </p>
                        </div>
                        <div class="col-span-1 justify-self-end">
                            <span
                                class="px-2 py-1 text-red-600 border rounded-full"
                                style="
                                    background-color: #eaffed;
                                    color: #27ae60;
                                "
                            >
                                {{ lastStatus }}
                            </span>
                            <span
                                class="px-2 py-1 text-red-600 border rounded-full"
                                style="
                                    background-color: #eaffed;
                                    color: #27ae60;
                                "
                            >
                                Public
                            </span>
                        </div>
                    </div>

                    <!-- content card -->
                    <div
                        class="p-4 border-b border-slate-200"
                        style="min-height: 22rem"
                    >
                        <div class="grid-cols-3 gap-4 images">
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
                        <div class="grid-cols-2 p-4 border-b border-slate-200">
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
                                    {{ Aduans.user.name }}
                                </p>
                            </div>
                        </div>
                        <!-- Content Card -->
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
                                >
                                    PROSES
                                </a>
                            </li>
                        </ul>
                        <div class="pt-8">
                            <div class="h-56 overflow-y-auto">
                                
                                <!-- Looping untuk menampilkan setiap status -->
                                <div v-for="(status, index) in aduan.status" :key="index" class="flex flex-row my-2">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
