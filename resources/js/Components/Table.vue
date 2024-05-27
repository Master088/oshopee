<script setup>
import { defineProps, defineEmits, ref, onUpdated, computed } from "vue";
import { initFlowbite } from "flowbite";
import { debounce } from "lodash";
import { Link } from "@inertiajs/vue3";

onUpdated(() => {
    // Initialize Flowbite components after Vue has rendered the dynamic content
    initFlowbite();
});

const props = defineProps({
    items: Array,
    headers: Array,
    currentPage: Number,
    totalPages: Number,
    isLoading: Boolean,
    pageSize: Number,
    links: Array,
    pageSizes: {
        type: Array,
        default: [10, 25, 50, 100],
    },
    from: Number,
    to: Number,
    search: String,
    sort: String,
    order: String,
});
const emit = defineEmits(["search", "sort", "changePage", "changeParams"]);

const localSearchQuery = ref("");
const selectedPageSize = ref(
    computed(() => {
        props.pageSize;
    })
);

const onSearch = debounce(async (e) => {
    console.log("search", e.target.value);
    localSearchQuery.value = e.target.value;
    emit("changeParams", 1, e.target.value, selectedPageSize.value, props.sort, props.order);
}, 800);

const onSort = (key) => {
    const sortOrder = props.sort == key ? (props.order == 'ASC' ? 'DESC' : 'ASC') : 'ASC';
    console.log("sort", key, sortOrder)
    emit("changeParams", 1, localSearchQuery.value, selectedPageSize.value, key, sortOrder);
    // emit("sort", key);
};

const changePageSize = (e) => {
    console.log("hello", e.target.value);
    selectedPageSize.value = e.target.value;
    emit("changeParams", 1, localSearchQuery.value, e.target.value, props.sort, props.order);
};

const totalItems = computed(() => {
    return props.totalPages;
});
</script>

<style scoped>
span {
    cursor: pointer;
    padding: 0.5em;
}

span.active {
    font-weight: bold;
}
</style>
<template>
    <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-96 mb-4">
        <section class="bg-gray-50 dark:bg-gray-900 sm:p-5">
            <div class="mx-auto max-w-screen">
                <!-- Start coding here -->
                <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden p-4">
                    <div
                        class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-5">
                        <div class="w-full md:w-1/3">
                            <div class="flex items-center">
                                <label for="simple-search" class="sr-only">Search</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                            fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>

                                    <input type="search" id="simple-search" :value="props.search" @input="onSearch"
                                        placeholder="Search..."
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" />
                                </div>
                            </div>
                        </div>
                        <div
                            class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                            <div class="flex items-center">
                                <label for="pageSizes" class="mr-2 text-sm font-medium text-gray-900">Show:</label>
                                <select id="pageSizes" @change="changePageSize"
                                    class="p-2 border border-gray-300 rounded-md">
                                    <option v-for="size in pageSizes" :key="size" :value="size"
                                        :selected="size == pageSize">
                                        {{ size }}
                                    </option>
                                </select>
                            </div>
                            <slot name="buttons"> </slot>

                            <div class="flex items-center space-x-3 w-full md:w-auto">
                                <slot name="filters"> </slot>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th v-for="(header, index) in headers" :key="index" @click="onSort(header.key)"
                                        scope="col" class="px-4 py-3 cursor-pointer">
                                        <font-awesome-icon v-if="header.key == props.sort && props.order == 'ASC'"
                                            :icon="['fas', 'sort-up']" />
                                        <font-awesome-icon v-else-if="header.key == props.sort && props.order == 'DESC'"
                                            :icon="['fas', 'sort-down']" />
                                        <font-awesome-icon v-else :icon="['fas', 'sort']" class="text-gray-300" />

                                        {{ header.label }}
                                    </th>
                                    <th scope="col" class="px-4 py-3">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <template v-if="isLoading">
                                    <tr>
                                        <td colspan="100" class="text-center">
                                            <div
                                                class="px-3 py-1 text-md leading-none text-center text-black animate-pulse dark:bg-blue-900 dark:text-blue-200">
                                                loading...
                                            </div>
                                        </td>
                                    </tr>
                                </template>
                                <template v-else-if="!isLoading && items.length == 0">
                                    <tr>
                                        <td colspan="100" class="text-center">
                                            <div class="px-3 py-1 text-lg font-bold text-center text-gray-500">
                                                No record found
                                            </div>
                                        </td>
                                    </tr>
                                </template>
                                <template v-else>
                                    <tr v-for="item in items" :key="item.id">
                                        <td v-for="(header, index) in headers" :key="index" scope="row"
                                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <span v-if="index === 1">{{ item[header.key] }}</span>
                                            <span v-else>{{ item[header.key] }}</span>
                                        </td>

                                        <td class="px-4 py-3 flex items-center relative">
                                            <button :id="`apple-imac-27-dropdown-button-${item.id}`"
                                                :data-dropdown-toggle="`apple-imac-27-dropdown-${item.id}`"
                                                class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                                type="button">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                </svg>
                                            </button>
                                            <div :id="`apple-imac-27-dropdown-${item.id}`" :class="{
                                                hidden: !item.showDropdown,
                                            }"
                                                class="z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                                    :aria-labelledby="`apple-imac-27-dropdown-button-${item.id}`">
                                                    <slot name="actions" :item="item"> </slot>
                                                </ul>

                                            </div>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                    <nav v-if="items.length > 0"
                        class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4"
                        aria-label="Table navigation">
                        <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                            Showing
                            <span class="font-semibold text-gray-900 dark:text-white">{{ from }} - {{ to }}</span>
                            of
                            <span class="font-semibold text-gray-900 dark:text-white">{{
                                totalItems
                            }}</span>
                        </span>

                        <ul class="flex flex-row -space-x-px">
                            <li v-if="links[0].url"
                                class="flex items-center justify-center py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                <Link :href="links[0].url">
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                </Link>
                            </li>
                            <li v-else
                                class="flex items-center justify-center py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white disabled">
                                <p>
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </p>
                            </li>
                            <li v-for="(item, index) in links.slice(1, -1)" :key="index">
                                <Link v-if="item.url" :href="item.url"
                                    class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-black-200 border border-gray-300 hover:bg-primary hover:text-white hover:text-white-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                    :class="{
                                        'bg-primary text-white': item.active,
                                    }">
                                {{ item.label }}
                                </Link>
                                <span v-else>{{ item.label }}</span>
                            </li>

                            <li v-if="links[links.length - 1].url"
                                class="flex items-center justify-center py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                <Link :href="links[links.length - 1].url">
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                </Link>
                            </li>
                            <li v-else
                                class="flex items-center justify-center py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-r-lg border border-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white disabled">
                                <p>
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </p>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </section>
    </div>
</template>
