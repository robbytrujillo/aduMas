<script setup>
defineProps({
  footerData: Object,
});
import Header from "@/Components/Frontend/Header.vue";
import Footer from "@/Components/Frontend/Footer.vue";
</script>
<template>
    <Header />
    <main>
        <slot />
    </main>
    <Footer :footerData="footerData" />
</template>