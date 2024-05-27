<template>
    <div class="">
        <div class="relative">
            <input :type="type" :name="name" :id="id" v-model="model" :required="required" :class="[
                errorMessage ? 'block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white dark:border-red-500 border-red-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer' : 'block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer',
                inputClass
            ]" @input="validateInput" placeholder=" " />
            <label :for="id" :class="[
                errorMessage ? 'absolute text-sm text-red-600 dark:text-red-500 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto' : 'absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-1 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-4 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto',
                inputClass
            ]" class="">{{
                inputlabel }}</label>
        </div>
        <p v-if="errorMessage" id="outlined_error_help" class="ml-2 mt-1 text-sm text-red-600 dark:text-red-400">
            {{ errorMessage }}
        </p>
    </div>

</template>

<script setup>
import { ref, computed, watch, defineProps, defineEmits } from "vue";
const model = defineModel({
    type: String,
    required: true,
});

const props = defineProps({
    type: {
        type: String,
        // required: true,
        default: "text",
    },
    value: {
        type: String,
        // required: true
    },
    name: {
        type: String,
        default: "",
    },
    inputlabel: {
        type: String,
        default: "",
    },
    id: {
        type: String,
        default: "",
    },
    required: {
        type: Boolean,
        default: true,
    },
    placeholder: {
        type: String,
        default: "",
    },
    inputClass: {
        type: String,
        default: "",
    },
    errorMessage: {
        type: String,
        default: "",
    },
    icon: {
        type: String,
        default: "",
    },
});

const emit = defineEmits(["validate"]);

function validateInput() {
    // emit('input', localValue.value);
    emit("validate", props.name, model.value);
}
</script>

<style scoped>
/* Add any custom styles if needed */
</style>