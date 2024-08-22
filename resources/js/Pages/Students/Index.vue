<script setup>
import Pagination from "@/Components/Pagination.vue";
import StudentSearchBar from "@/Components/StudentSearchBar.vue";
import { usePage } from "@inertiajs/vue3";

defineProps({
    students: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <div class="bg-gray-100 py-10">
        <div class="mx-auto max-w-7xl">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-xl font-semibold text-gray-900">
                            Students
                        </h1>
                        <p class="mt-2 text-sm text-gray-700">
                            A list of all Students
                        </p>
                    </div>
                </div>
                <StudentSearchBar />

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white">
                        <thead
                            class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal"
                        >
                            <tr>
                                <th class="py-3 px-4 text-left">ID</th>
                                <th class="py-3 px-4 text-left">First Name</th>
                                <th class="py-3 px-4 text-left">Last Name</th>
                                <th class="py-3 px-4 text-left">Email</th>
                                <th class="py-3 px-4 text-left">Group</th>
                                <th class="py-3 px-4 text-left">Section</th>
                                <th class="py-3 px-4 text-left">Created At</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-500 font-light text-sm">
                            <tr
                                class="border-b border-gray-200 hover:bg-gray-100"
                                v-for="student in students.data"
                                :key="student.id"
                            >
                                <td class="py-3 px-4 text-left">
                                    {{ student.id }}
                                </td>
                                <td class="py-3 px-4 text-left">
                                    {{ student.first_name }}
                                </td>
                                <td class="py-3 px-4 text-left">
                                    {{ student.last_name }}
                                </td>
                                <td class="py-3 px-4 text-left">
                                    {{ student.email }}
                                </td>
                                <td class="py-3 px-4 text-left">
                                    {{ student.group?.name ?? "N/A" }}
                                </td>
                                <td class="py-3 px-4 text-left">
                                    {{ student.section?.name ?? "N/A" }}
                                </td>
                                <td class="py-3 px-4 text-left">
                                    {{ student.created_at }}
                                </td>
                                <div
                                    class="flex gap-4 text-blue-400 font-bold items-center justify-center"
                                >
                                    <button class="hover:text-blue-900">
                                        Edit
                                    </button>
                                    <button class="hover:text-blue-900">
                                        Delete
                                    </button>
                                </div>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt-5"><Pagination :data="students" /></div>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
