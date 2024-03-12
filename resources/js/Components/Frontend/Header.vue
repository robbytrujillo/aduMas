<script setup>
import { Link } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";
const scrollBg = ref(false);
const setScrollBg = (value) => {
    scrollBg.value = value;
};
onMounted(() => {
    window.addEventListener("scroll", () => {
        return window.scrollY > 50 ? setScrollBg(true) : setScrollBg(false);
    });
});

defineProps({
    canLogin: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>
<template>
    <header class="fixed w-full">
        <nav
            :class="{
                'bg-white border-2 border-b-pink-600 rounded-b-lg py-2.5 dark:bg-gray-900':
                    scrollBg,
                '': !scrollBg,
            }"
            class="py-2.5 border-gray-200 dark:bg-gray-900"
        >
            <div class="flex flex-wrap item-center justify-between max-w-screen-xl px-4 mx-auto">
                <Link :href="route('home')" class="flex items-center">
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white text-pink-600">Lapor</span>
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white text-black">Kab!</span>
                </Link>
                <div class="flex items-center lg:order-2">
                    <div>
                        <template v-if="$page.props.auth.user">
                            <template v-if="$page.props.auth.user.roles.includes('user')">
                                <Link :href="route('user.index')" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:outline-red-500">
                                    Dashboard (User)
                                </Link>
                            </template>
                            <template v-else>
                                <Link :href="route('admin.index')" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:outline-red-500">
                                    Dashboard (Admin/Moderator)
                                </Link>
                            </template>
                        </template>
                        <template v-else>
                            <Link :href="route('login')" class="inline-block rounded bg-pink-600 px-12 py-3 text-sm font-medium text-white transition hover:bg-pink-700 focus:outline-none focus:ring focus:ring-yellow-400">
                                Log In
                            </Link>
                        </template>
                    </div>
                    <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
                            
                    </button>
                </div>
            </div>
        </nav>
    </header>
</template>
