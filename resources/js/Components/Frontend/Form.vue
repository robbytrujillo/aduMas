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


</script>
