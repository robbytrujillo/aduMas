<script setup>
import { Link } from "@inertiajs/vue3";
import SidebarLink from "@/Components/SidebarLink.vue";
import { usePermission } from "@/Composable/Permission";

const { hasRole } = usePermission();
</script>

<template>
    <div class="w-full h-full">
        <aside class="">
            <div>
                <div class="-mx-6 px-6 py-4">
                    <Link href="/" title="home">
                        <h1 class=""><span class="text-pink-600"> {{ $page.props.auth.UserActivation.name }}</span>
                        </h1>
                    </Link>
                </div>
                <ul class="space-y-2 tracking-wide mt-8">
                    <template v-if="hasRole('admin')">
                        <li>
                            <SidebarLink :href="route('admin.index')" :active="route().current('admin.index')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                </svg>
                                <span class="-mr-1 font-medium">Home</span>
                            </SidebarLink>
                        </li>
                        <li>
                            <SidebarLink :href="route('tags.index')" aria-label="dashboard" :active="route().current('tags.index')">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                                </svg>
                                <span class="-mr-1 font-medium">Tags</span>
                            </SidebarLink>
                        </li>
                    </template>
                </ul>
            </div>
        </aside>
    </div>
</template>


