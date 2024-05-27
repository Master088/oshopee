<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm, router } from "@inertiajs/vue3";
import Table from "@/Components/Table.vue";
import { ref, onMounted, computed } from "vue";
import axios from "axios";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Modal from "@/Components/Modal.vue";
import Input from "@/Components/CustomInput2.vue";

const columns = [
    { label: "ID", key: "id" },
    { label: "Title", key: "name" },
    { label: "Slug", key: "slug" },
    { label: "Default", key: "is_default" },
];

const currentPage = ref(1);
const pageSizes = [5, 10, 50, 100];
const sortKey = ref("id");
const sortOrder = ref("asc");
const loading = ref(false);

const isOpenAddCategoryModal = ref(false);
const isOpenEditCategoryModal = ref(false);
const isOpenDeleteCategoryModal = ref(false);
const categoryForm = useForm({
    id: "",
    name: "",
});


let props = defineProps({
    categories: Object,
    size: {
        type: Number,
        default: 5,
    },
    search: {
        type: String,
        default: "",
    },
    sort: {
        type: String,
        default: "id",
    },
    order: {
        type: String,
        default: "id",
    },

});

const perPage = ref(props.size);
const searchQuery = ref(props.search);


const fetchData = async () => {
    loading.value = true;
    const params = {
        q: searchQuery.value,
        _page: currentPage.value,
        _limit: perPage.value,
        _sort: sortKey.value,
        _order: sortOrder.value,
    };

    try {
        router.get(
            "category",
            {
                ...params,
            },
            {
                preserveState: true,
                replace: true,
            }
        );
    } catch (error) {
        console.error("Error fetching data:", error);
    } finally {
        loading.value = false; // Set loading to false after fetching data
    }
};

const handleChangeParams = (page, search, size, sort, order) => {

    searchQuery.value = search;
    currentPage.value = page; // Reset to first page
    perPage.value = size;
    sortKey.value = sort;
    sortOrder.value = order;

    fetchData();
};

const openAddCategoryModal = () => {
    isOpenAddCategoryModal.value = true;
};

const closeModal = () => {
    isOpenAddCategoryModal.value = false;
    categoryForm.reset();
};

// add category method
const addProductCategory = async () => {
    // Validate Here

    categoryForm.post(route("product.category.store"), {
        preserveScroll: true,
        onSuccess: () => {
            categoryForm.reset();
            closeModal();
        },
        onError: (err) => {
            console.log(err);
        },
    });
};

// Edit category
const openEditCategoryModal = (data) => {
    isOpenEditCategoryModal.value = true;
    categoryForm.id = data.id;
    categoryForm.name = data.name;
};

const closeEditModal = () => {
    isOpenEditCategoryModal.value = false;
    categoryForm.reset();
};

// add product method
const editProductCategory = async () => {

    categoryForm.patch(
        route("product.category.update", categoryForm.id),
        {
            preserveScroll: true,
            onSuccess: () => {
                categoryForm.reset();
                closeEditModal();
            },
            onError: (err) => {
                console.log(err);
            },
        });
};

// delete category
const openDeleteCategoryModal = (data) => {
    console.log("data", data)
    isOpenDeleteCategoryModal.value = true;
    categoryForm.id = data.id;
    categoryForm.name = data.name;

};

const closeDeleteModal = () => {
    isOpenDeleteCategoryModal.value = false;
    categoryForm.reset();
};

// delete category method
const deleteProductCategory = async () => {
    console.log("delete", categoryForm)
    categoryForm.delete(
        route("product.category.destroy", categoryForm.id),
        {
            preserveScroll: true,
            onSuccess: () => {
                categoryForm.reset();
                closeDeleteModal();
            },
            onError: (err) => {
                console.log(err);
            },
        });
};

</script>

<template>

    <Head title="Category" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-primary leading-tight">Category</h2>
        </template>

        <div class="mb-4">
            <Table :items="categories.data" :headers="columns" :currentPage="currentPage" :totalPages="categories.total"
                :pageSize="props.size" :search="props.search" :from="categories.from" :to="categories.to"
                @changeParams="handleChangeParams" :isLoading="loading" :links="categories.links" :sort="props.sort"
                :order="props.order" :pageSizes="pageSizes">

                <template #buttons>
                    <PrimaryButton type="button" @click="openAddCategoryModal"
                        class="flex items-center justify-center text-white bg-primary hover:bg-primary focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                        <svg class="h-5 w-5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        Add category
                    </PrimaryButton>
                </template>

                <template #filters>
                    <!-- <button id="actionsDropdownButton" data-dropdown-toggle="actionsDropdown"
                        class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                        type="button">
                        <svg class="-ml-1 mr-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                        </svg>
                        Actions
                    </button>
                    <div id="actionsDropdown"
                        class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="actionsDropdownButton">
                            <li>
                                <a href="#"
                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mass
                                    Edit</a>
                            </li>
                        </ul>
                        <div class="py-1">
                            <a href="#"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete
                                all</a>
                        </div>
                    </div>
                    <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown"
                        class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                        type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" class="h-4 w-4 mr-2 text-gray-400"
                            viewbox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                                clip-rule="evenodd" />
                        </svg>
                        Filter
                        <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                        </svg>
                    </button>
                    <div id="filterDropdown" class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                        <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">
                            Choose brand
                        </h6>
                        <ul class="space-y-2 text-sm" aria-labelledby="filterDropdownButton">
                            <li class="flex items-center">
                                <input id="apple" type="checkbox" value=""
                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                                <label for="apple"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Apple (56)</label>
                            </li>
                            <li class="flex items-center">
                                <input id="fitbit" type="checkbox" value=""
                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                                <label for="fitbit"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Microsoft
                                    (16)</label>
                            </li>
                            <li class="flex items-center">
                                <input id="razor" type="checkbox" value=""
                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                                <label for="razor"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Razor (49)</label>
                            </li>
                            <li class="flex items-center">
                                <input id="nikon" type="checkbox" value=""
                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                                <label for="nikon"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Nikon (12)</label>
                            </li>
                            <li class="flex items-center">
                                <input id="benq" type="checkbox" value=""
                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" />
                                <label for="benq" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">BenQ
                                    (74)</label>
                            </li>
                        </ul>
                    </div> -->
                </template>

                <template #actions="actionProps">
                    <li>
                        <a href="#"
                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white cursor-pointer">Show{{
                                actionProps.item.id }}</a>
                    </li>
                    <li @click="openEditCategoryModal(actionProps.item)">
                        <span
                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white cursor-pointer">Edit</span>
                    </li>
                    <li @click="openDeleteCategoryModal(actionProps.item)">
                        <span
                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white cursor-pointer">Delete</span>
                    </li>
                </template>
            </Table>
        </div>

        <!-- Modals -->

        <Modal :show="isOpenAddCategoryModal" @close="closeModal" maxWidth="2xl">
            <template #header> Add Product Category </template>
            <template #body>
                <!-- Modal body content -->

                <div>
                    <Input v-model="categoryForm.name" :errorMessage="categoryForm.errors.name" id="name" name="name"
                        inputlabel="Category" placeholder="Category title" />
                </div>
            </template>
            <template #footer>
                <div class="w-[150px]">
                    <PrimaryButton type="submit" customClass="text-start" :disabled="categoryForm.processing"
                        :loading="categoryForm.processing" @click="addProductCategory">
                        Submit
                    </PrimaryButton>
                </div>
            </template>
        </Modal>

        <Modal :show="isOpenDeleteCategoryModal" @close="closeDeleteModal" maxWidth="2xl">
            <template #header> Delete Product Category </template>
            <template #body>
                <!-- Modal body content -->
                <h2 class="text-lg font-medium text-gray-900">
                    Are you sure you want to delete {{ categoryForm.name }} category record?
                </h2>

            </template>
            <template #footer>
                <div class="w-[150px]">
                    <PrimaryButton type="submit" customClass="text-start" :disabled="categoryForm.processing"
                        :loading="categoryForm.processing" @click="deleteProductCategory">
                        Delete
                    </PrimaryButton>
                </div>
            </template>
        </Modal>

        <Modal :show="isOpenEditCategoryModal" @close="closeEditModal" maxWidth="2xl">

            <template #header> Edit Product Category </template>

            <template #body>
                <!-- Modal body content -->

                <div>
                    <Input v-model="categoryForm.name" :errorMessage="categoryForm.errors.name" id="name" name="name"
                        inputlabel="Category" placeholder="Category title" />
                </div>
            </template>

            <template #footer>
                <div class="w-[150px]">
                    <PrimaryButton type="submit" customClass="text-start" :disabled="categoryForm.processing"
                        :loading="categoryForm.processing" @click="editProductCategory">
                        Save
                    </PrimaryButton>
                </div>
            </template>
        </Modal>
    </AuthenticatedLayout>
</template>
