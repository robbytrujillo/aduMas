<template>
    <div class="flex justify-between items-center mt-4">
        <span class="text-sm leading-5 text-gray-700 dark:text-gray-300">
            Menampilkan
            <span class="font-medium">{{ start }}</span>
            sampai
            <span class="font-medium">{{ end }}</span>
            dari
            <span class="font-medium">{{ total }}</span>
            hasil
        </span>
    </div>

    <div class="flex-1 flex justify-end ml-20">
        <span v-if="currentPage > 1" @click="onPageChange(currentPage -1)" class="cursor-pointer lending-5 rounded-md border border-gray-300 dark:border-gray-500 px-3 py-2 mr-2 text-sm font-medium text-gray-500 dark:text-gray-300 hover:text-gray-700 dark:hover:text-gray-200 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
            Previous    
        </span>
        <span v-for="page in pages" :key="page" @click="onPageChange(page)" :class="{'font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:text-gray-500 hover:bg-gray-50 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150': page === currentPage, 'text-gray-500 dark:text-gray-300': page !== currentPage }" class="cursor-pointer lending-5 rounded-md border border-gray-500 px-3 py-2 mr-2 text-sm font-medium">
            {{ page }}
        </span>
        <span v-if="currentPage < totalPages" @click="onPageChange(currentPage + 1)" class="cursor-pointer lending-5 rounded-md border border-gray-300 dark:border-gray-500 px-3 py-2 mr-2 text-sm font-medium text-gray-500 dark:text-gray-300 hover:text-gray-700 dark:hover:text-gray-200 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
            Next
        </span>
    </div>
</template>

<script setup>
import { ref, computed, defineEmits } from 'vue';

const props = defineProps({
    currentPage: {
        type: Number,
        required: true,
    },
    perPage: {
        type: Number,
        required: true,
    },
    total: {
        type: Number,
        required: true,
    },
});

const start = computed(() => (props.currentPage - 1) * props.perPage + 1);

const end = computed(() => {
    const lastItem = props.currentPage * props.perPage;
    return lastItem < props.total ? lastItem : props.total;
});

const totalPages = computed(() => Math.ceil(props.total / props.perPage));

const pages = computed(() => {
    const range = [];
    for (let i = 1; i <= totalPages.value; i++) {
        range.push(i);
    }
    return range;
});

const onPageChange = (page) => {
    emit('perChange', page);
};

const emit = defineEmits(['pageChange']);
</script>