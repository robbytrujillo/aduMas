<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps(['href', 'active']);

const classes = computed(() => 
    props.active
        ? 'relative px-4 py-3 flex items-center space-x-4 rounded-xl text-white bg-gradient-to-l from-pink-400 to-pink-600'
        : 'px-4 py-3 flex items-center space-x-4 rounded-md text-gray-600 group'
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>