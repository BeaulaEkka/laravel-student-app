<script setup>
import { useForm } from "@inertiajs/vue3";
import { watch } from "vue";

defineProps({
    group: { type: Object, required: true },
});

const form = useForm({
    first_name: "",
    last_name: "",
    email: "",
    group_id: "",
    section_id: "",
});

watch(
    () => form.group_id,
    (newValue) => {
        getSections(newValue);
    }
);

const getSections = (groupId) => {
    axios.get("/api/sections?group_id=" + groupId).then((response) => {
        console.log(response.data);
    });
};
</script>

<template>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-12">
            <form action="">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="bg-white py-6 px-4 space-y-6 sm:p-6">
                        <div>
                            <h3
                                class="text-lg leading-6 font-medium text-gray-900"
                            >
                                Student Information
                            </h3>
                            <p class="mt-1 text-sm text-gray-500">
                                Use this form to register a new Student.
                            </p>
                        </div>
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label
                                    for="first_name"
                                    class="block text-sm font-medium text-gray-700"
                                    >First Name</label
                                >
                                <input
                                    v-model="form.first_name"
                                    type="text"
                                    id="first_name"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ouline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm <!-- @error before:('name) text-red-900 focus:ring-red-500 focus:border-red-500 border-red-300 @enderror -->"
                                />
                                <p class="mt-1 text-sm text-red-500">
                                    Error Message
                                </p>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label
                                    for="last_name"
                                    class="block text-sm font-medium text-gray-700"
                                    >Last Name</label
                                >
                                <input
                                    v-model="form.last_name"
                                    type="text"
                                    id="last_name"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ouline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm <!-- @error before:('name) text-red-900 focus:ring-red-500 focus:border-red-500 border-red-300 @enderror -->"
                                />
                                <p class="mt-1 text-sm text-red-500">
                                    Error Message
                                </p>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label
                                    for="email"
                                    class="block text-sm font-medium text-gray-700"
                                    >Email Address</label
                                >
                                <input
                                    v-model="form.email"
                                    type="email"
                                    id="email"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ouline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm <!-- @error before:('name) text-red-900 focus:ring-red-500 focus:border-red-500 border-red-300 @enderror -->"
                                />
                                <p class="mt-1 text-sm text-red-500">
                                    Error Message
                                </p>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label
                                    for="group_id"
                                    class="block text-sm font-medium text-gray-700"
                                    >Group</label
                                >
                                <select
                                    v-model="form.group_id"
                                    id="group_id"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ouline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm capitalize"
                                >
                                    <option value="" selected disabled>
                                        Select Group
                                    </option>
                                    <option
                                        :value="item.id"
                                        v-for="item in group.data"
                                        :key="item.id"
                                    >
                                        {{ item.name }}
                                    </option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label
                                    for="selection_id"
                                    class="block text-sm font-medium text-gray-700"
                                    >Section</label
                                >
                                <select
                                    v-model="form.section_id"
                                    id="section_id"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:ouline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                >
                                    <option value="" selected disabled>
                                        Select a section
                                    </option>
                                    <option>Section A</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex gap-4 justify-end">
                            <button
                                class="bg-indigo-100 shadow-sm px-4 py-2 rounded-md text-indigo-700 hover:bg-indigo-200 font-semibold"
                            >
                                Cancel
                            </button>
                            <button
                                class="bg-indigo-600 border shadow-sm px-4 py-2 rounded-md text-white hover:bg-indigo-800 font-semibold"
                            >
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<style scoped></style>
