<script setup>
import { defineProps } from "vue";
import { Link, Head } from "@inertiajs/vue3";

const props = defineProps({
    aduans: Object,
    tag: Object,
});

const formatStatusCreatedAt = (createdAt) => {
    const date = new Date(createdAt);
    const options = { year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric', timeZoneName: 'short' };
    return date.toLocaleDateString('id-ID', options);
}
</script>
<template>
    <Head title="Data Tags" />
</template>
