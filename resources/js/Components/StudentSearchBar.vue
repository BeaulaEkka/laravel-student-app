<script setup>
import MagnifyingGlass from "./Icons/MagnifyingGlass.vue";
</script>

<template>
    <div class="border bg-white rounded-md my-2">
        <label
            for="StudentSearch"
            class="flex items-center justify-between px-2"
        >
            <input
                type="text"
                id="StudentSearch"
                placeholder="Search"
                class="border border-transparent rounded-md w-full my-4 mx-1"
            />
            <MagnifyingGlass />
        </label>
        
    </div>
</template>

<style scoped></style>
