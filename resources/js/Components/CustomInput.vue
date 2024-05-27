<template>
    <div>
        <label :for="id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            {{ inputlabel }}
        </label>
        <div class="relative">
            <div v-if="icon" class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                <div v-html="icon"></div>
            </div>
            <input :type="type" :name="name" :id="id" v-model="model" :required="required"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-300 focus:border-gray-300 block w-full  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                :class="[
                    icon ? 'ps-10' : '',
                    inputClass
                ]" :placeholder="placeholder" @input="validateInput" />
        </div>
        <div v-if="errorMessage" class="ml-2 text-red-600 text-sm mt-1">{{ errorMessage }}</div>
    </div>
</template>

<script setup>
import { ref, computed, watch, defineProps, defineEmits } from 'vue';
const model = defineModel({
    type: String,
    required: true,
});

const props = defineProps({
    type: {
        type: String,
        // required: true,
        default: "text"
    },
    value: {
        type: String,
        // required: true
    },
    name: {
        type: String,
        default: ''
    },
    inputlabel: {
        type: String,
        default: ''
    },
    id: {
        type: String,
        default: ''
    },
    required: {
        type: Boolean,
        default: true
    },
    placeholder: {
        type: String,
        default: ''
    },
    inputClass: {
        type: String,
        default: ''
    },
    errorMessage: {
        type: String,
        default: ''
    },
    icon: {
        type: String,
        default: ""
    }
});

const emit = defineEmits(['validate']);


function validateInput() {
    // emit('input', localValue.value);
    emit('validate', props.name, model.value);
}
</script>

<style scoped>
/* Add any custom styles if needed */
</style>