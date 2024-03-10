<script setup>
import { ref, defineProps, computed, watchEffect, watch } from "vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import Multiselect from "vue-multiselect";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputError from "@/Components/InputError.vue";
const props = defineProps({
    dataTags: Array,
});

const from = useForm({
    Image: null,
    title: "",
    selectedDistrict: "",
    selectedVillage: "",
    selectedDistrictName: "",
    selectedVillageName: "",
    isi_aduan: "",
    tags: [],
});

const districts = ref([]);
const villages = ref([]);

const fetchDistricts = async () => {
    try {
        const response = await fetch(
            "https://kurniaandi.github.io/api-wilayah-indonesia/api/districts/3321.json"
        );
        const data = await response.json();
        districts.value = data;
    } catch (error) {
        console.error("Error fetching districts:", error);
    }
};

const fetchVillage = async () => {
    if (from.selectedDistrict) {
        try {
            const response = await fetch(
                `https://kurniaandi.github.io/api-wilayah-indonesia/api/villages/${form.selectedDistrict}.json`
            );
            const data = await response.json();
            villages.value = data;
        } catch (error) {
            console.error("Error fetching villages:", error);
        }
    } else {
        villages.value = [];
    }
};

watchEffect(() => {
    const selectedDistrictObj = districts.value.find(district => district.id === form.selectedDistrict);
    if (selectedDistrictObj) {
        form.selectedDistrictName = selectedDistrictObj.name;
    }
});

watchEffect(() => {
    const selectedVillageObj = villages.value.find(village => village.id === form.selectedVillage)
    if (selectedVillageObj) {
        form.selectedVillageName = selectedVillageObj.name;
    }
});

const selected = ref([]);

// Fungsi untuk mengubah selected menjadi form.tags
const updateTags = (newValues => {
    form.tags = newValues.map(tag => tag.id);
});

// Gunakan watch untuk memantau perubahan pada selected 
watch(selected, (newValues) => {
    updateTags(newValues);
});

watchEffect(() => {
    fetchDistricts();
});

watchEffect(() => {
    fetchVillages();
});

const imageUrl = computed(() => {
    if (form.image) {
        return URL.createObjectURL(form.image);
    }
});
</script>

<template>
    <section class="bg-gray-100 dark:bg-gray-900">
        <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-center text-pink-600 dark:text-white">Form Aduan</h2>
                <form @submit.prevent="form.post(route('aduan.store'))">
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul Aduan</label>
                            <input v-model="form.title" class="w-full p-3 text-sm border-pink-600 rounded-lg focus:ring-pink-500 focus:border-pink-500" type="text" placeholder="Jalan Rusak, Layanan kurang bagus" id="name" />
                                <InputError class="mt-2" :message="form.errors.title" />
                        </div>
                    </div>
                </form>
        </div>
    </section>
</template>
