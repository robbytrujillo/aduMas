<template>
    <aside
        id="blogs"
        aria-label="Related articles"
        class="py-8 bg-white lg:py-24 dark:bg-gray-900"
    >
        <div class="max-w-screen-xl px-4 mx-auto">
            <h2
                class="mb-2 text-3xl font-extrabold leading-tight tracking-tight text-gray-900 lg:text-center dark:text-white md:text-4xl"
            >
                Aduan Masyarakat
            </h2>
            <p
                class="mb-1 text-lg font-normal text-gray-500 dark:text-gray-400 lg:text-center lg:text-xl lg:px-64 lg:mb-16"
            >
                Berikut ini merupakan beberapa aduan terbaru dari masyarakat.
            </p>
            <div
                v-if="aduans.length > 0"
                class="grid gap-12 sm:grid-cols-2 lg:grid-cols-4"
            >
                <Link
                    v-for="aduan is aduans"
                    :key="aduan.id"
                    :href="route('aduan.detail', { slug: aduan.slug })"
                    class="overflow-hidden transition rounded-lg shadow hover:shadow-lg"
                >
                    <img
                        alt="Office"
                        :src="aduan.img"
                        class="object-contain w-full h-56"
                    />

                    <div class="p-4 bg-white sm:p-6">
                        <time
                            datetime="2022-10-10"
                            class="block text-sm text-gray-500"
                        >
                            {{ aduan.desa_kelurahan }}, {{ aduan.created_at }}
                        </time>

                        <Link
                            :href="route('aduan.detail', { slug: aduan.slug })"
                        >
                            <h3 class="mt-0.5 text-lg text-gray-900">
                                {{ aduan.title }}
                            </h3>
                        </Link>

                        <p
                            class="mt-2 text-sm text-gray-500 line-clamp-3/relaxed"
                        >
                            {{ aduan.isi_aduan }}
                        </p>
                    </div>
                </Link>
            </div>
            <div v-else>
                <p
                    class="text-lg text-gray-500 dark:text-gray-400 lg:text-center lg:text-xl"
                >
                    Maaf, Belum ada data aduan.
                </p>
            </div>
        </div>
    </aside>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    aduans: Object,
});
</script>
