<template>
    <section class="bg-white to-slate-900 text-white">
        <div
            class="mx-auto max-w-screen-xl px-4 py-32 lg:flex lg:h-screen lg:items-center"
        >
            <div class="mx-auto max-w-3xl text-center">
                <h1
                    class="bg-pink-600 bg-clip-text text-3xl font-extrabold text-transparent sm:text-4xl"
                >
                    Layanan Aspirasi
                    <span class="sm:block">dan Pengaduan Online Rakyat. </span>
                </h1>
                <p
                    class="mx-auto text-gray-600 mt-4 max-w-xl sm:text-xl/relaxed"
                >
                    Sampaikan laporan Anda langsung kepada instansi pemerintah
                    berwenang!
                </p>

                <div
                    v-if="!$page.props.auth.user"
                    class="mt-8 flex flex-wrap justify-center gap-4"
                >
                    <Link
                        class="block w-full rounded border border-gray-600 bg-pink-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-pink-600 focus:outline-none focus:ring active:text-opacity-75 sm:w-auto"
                        href="/login"
                    >
                        Login
                    </Link>
                    <Link
                        class="block w-full rounded border border-gray-600 px-12 py-3 text-sm font-medium text-pink-600 hover:bg-pink-600 hover:text-white focus:outline-none focus:ring active:bg-blue-500 sm:w-auto"
                        href="/register"
                    >
                        Daftar
                    </Link>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
</script>
