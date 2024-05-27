<script setup>

import { Head, useForm, router } from "@inertiajs/vue3";
import Table from "@/Components/Table.vue";
import { ref, onMounted, computed } from "vue";
import axios from "axios";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Modal from "@/Components/Modal.vue";
import Input from "@/Components/CustomInput.vue";

const isOpenAddCategoryModal = ref(false);
const isOpenEditCategoryModal = ref(false);
const isOpenDeleteCategoryModal = ref(false);
const categoryForm = useForm({
    id: "",
    name: "",
});

const openAddCategoryModal = () => {
    isOpenAddCategoryModal.value = true;

    // nextTick(() => passwordInput.value.focus());
};

const closeModal = () => {
    isOpenAddCategoryModal.value = false;

    categoryForm.reset();
};

// add category method
const addProductCategory = async () => {

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
    console.log("data", data)
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
    <section class="space-y-6">
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
    </section>
</template>
