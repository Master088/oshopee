<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="grid grid-cols-1 md:grid-cols-12 gap-4 h-full ">
        <div class="col-span-12 md:col-span-7 flex justify-center items-center">
            <Link href="/">
            <ApplicationLogo class="w-500 h-500 fill-current text-gray-500" />
            </Link>
        </div>
        <div class="col-span-12 md:col-span-5  flex items-center">
            <div class="w-full">
                <slot />
            </div>
        </div>
    </div>


</template>

<!-- <div>
    <Link href="/">
    <ApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
    </Link>
</div>

<div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
    <slot />
</div> -->