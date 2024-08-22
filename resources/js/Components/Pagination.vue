<script setup>
import { router } from "@inertiajs/vue3";
defineProps({
    data: { type: Object, required: true },
});

const updatePageNumber = (link) => {
    let pageNumber = link.url.split("=")[1];

    router.visit("/students?page=" + pageNumber);
    preserveScroll: true;
};
</script>

<template>
    <div
        class="w-full bg-white h-14 rounded-md flex justify-between items-center px-4 py-4"
    >
        <div class="flex items-center px-auto mr-2">
            <span class="text-medium mr-2">Showing</span>
            <span class="font-medium mr-2">{{ data.meta.from }} </span>
            <span class="mr-2">of</span>
            <span class="text-medium mr-2">{{ data.meta.total }}</span> results
        </div>
        <div class="flex gap-0 justify-end">
            <button
                @click="updatePageNumber(link)"
                v-for="(link, index) in data.meta.links"
                :key="index"
                :disabled="link.active || !link.url"
                :class="{
                    'bg-indigo-50 border-indigo-300 text-indigo-600  border':
                        link.active,
                    'bg-white border-gray-300 text-gray-500 hover:bg-gray-50':
                        !link.active,
                }"
            >
                <span
                    v-html="link.label"
                    class="text-md justify-center items-center px-2 py-2"
                ></span>
            </button>
        </div>
    </div>
</template>

<style scoped>
button:disabled {
    opacity: 0.6;
}
button:disabled:hover {
    background-color: none;
}
</style>
