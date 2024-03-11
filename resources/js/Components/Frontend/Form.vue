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
                        <div class="sm:col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Aduan</label>
                            <Multiselect class="rounded-lg border-pink-300 focus:ring-pink-500 focus:boder-pink-500" id="tags" v-model="selected" :options="dataTags" :multiple="true" :close-on-select="true"
                            :group-select="true" placeholder="Type to search" label="name" track-by="id" />
                                <InputError class="mt-2" :message="form.errors.tags" />
                        </div>
                        <div class="sm:col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lampiran Aduan</label>
                            <label for="image" value="Image" class="flex flex-col items-center justify-center w-full h-64 border-2 border-pink-600 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:hover:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                        <span class="font-semibold">Click to upload</span> or drag and drop
                                    </p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                </div>
                                <input id="image" type="file" class="hidden mt-1 block w-full" />
                                <img :src="imageUrl" class="h-25 w-20 object-contain" v-if="imageUrl" />
                            </label>
                            <InputError class="mt-2" :message="form.errors.image" />
                        </div>
                    </div>
                </form>
        </div>
    </section>
</template>
