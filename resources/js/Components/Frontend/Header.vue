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
