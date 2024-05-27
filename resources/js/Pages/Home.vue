<script setup>
import CommonLayout from "@/Layouts/CommonLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Dashboard" />

    <CommonLayout>
        <div class="bg-white">
            <div
                class="container mx-auto flex flex-col lg:flex-row items-center justify-center"
            >
                <!-- Left Column -->
                <div class="lg:w-1/2">
                    <h2 class="text-3xl lg:text-4xl font-semibold mb-4">
                        Discover Our New Collection
                    </h2>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Vivamus ut ante ut felis efficitur fermentum. Nullam
                        quis neque justo. Curabitur nec purus vitae odio
                        hendrerit consequat.
                    </p>
                    <a
                        href="#"
                        class="inline-block bg-primary text-white font-bold py-2 px-4 rounded hover:bg-primary-dark"
                        >Shop Now</a
                    >
                </div>

                <!-- Right Column -->
                <div class="lg:w-1/2 lg:pr-12 mb-8 lg:mb-0">
                    <img
                        src="https://via.placeholder.com/600x400"
                        alt="Product Image"
                        class="rounded-lg shadow-lg"
                    />
                </div>
            </div>
        </div>
        <!-- Categories -->
        <div class="my-6 py-12 px-12 h-50 border-2 border-gray-200"></div>
        <!-- Products -->
        <div class="py-12 px-12">
            <!-- <h1 class="text-xl font-bold">Flash Sales</h1> -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Product Card 1 -->
                <div
                    class="max-w-sm rounded overflow-hidden shadow-lg relative pb-3"
                >
                    <img
                        class="w-full"
                        src="https://via.placeholder.com/300x200"
                        alt="Product Image"
                    />
                    <div
                        class="absolute top-0 right-0 bg-primary text-white px-2 py-1 rounded-bl"
                    >
                        <span>20% OFF</span>
                    </div>
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-0">Product Title</div>
                        <p class="text-gray-700 text-base">Headphones</p>

                        <div class="mt-1 flex items-center">
                            <svg
                                class="w-5 h-5 fill-current text-yellow-500 mr-1"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"
                                />
                                <path d="M0 0h24v24H0z" fill="none" />
                            </svg>
                            <svg
                                class="w-5 h-5 fill-current text-yellow-500 mr-1"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"
                                />
                                <path d="M0 0h24v24H0z" fill="none" />
                            </svg>
                            <svg
                                class="w-5 h-5 fill-current text-yellow-500 mr-1"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"
                                />
                                <path d="M0 0h24v24H0z" fill="none" />
                            </svg>
                            <svg
                                class="w-5 h-5 fill-current text-gray-400"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"
                                />
                                <path d="M0 0h24v24H0z" fill="none" />
                            </svg>
                            <svg
                                class="w-5 h-5 fill-current text-gray-400"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"
                                />
                                <path d="M0 0h24v24H0z" fill="none" />
                            </svg>
                            <span class="text-gray-700">(200) </span>
                        </div>
                    </div>
                    <div class="flex justify-around py-2">
                        <p
                            class="text-gray-700 text-base mt-2 text-lg font-bold"
                        >
                            $19.99
                        </p>
                        <button
                            type="button"
                            class="px-3 py-2 text-sm font-medium text-center text-white rounded bg-primary hover:bg-primary-dark focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        >
                            Add to Cart
                        </button>
                    </div>
                </div>
                <!-- Product Card 1 -->
                <div
                    class="max-w-sm rounded overflow-hidden shadow-lg relative"
                >
                    <img
                        class="w-full"
                        src="https://via.placeholder.com/300x200"
                        alt="Product Image"
                    />
                    <div
                        class="absolute top-0 right-0 bg-primary text-white px-2 py-1 rounded-bl"
                    >
                        <span>20% OFF</span>
                    </div>
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-0">Product Title</div>
                        <p class="text-gray-700 text-base">Headphones</p>

                        <div class="mt-1 flex items-center">
                            <svg
                                class="w-5 h-5 fill-current text-yellow-500 mr-1"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"
                                />
                                <path d="M0 0h24v24H0z" fill="none" />
                            </svg>
                            <svg
                                class="w-5 h-5 fill-current text-yellow-500 mr-1"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"
                                />
                                <path d="M0 0h24v24H0z" fill="none" />
                            </svg>
                            <svg
                                class="w-5 h-5 fill-current text-yellow-500 mr-1"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"
                                />
                                <path d="M0 0h24v24H0z" fill="none" />
                            </svg>
                            <svg
                                class="w-5 h-5 fill-current text-gray-400"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"
                                />
                                <path d="M0 0h24v24H0z" fill="none" />
                            </svg>
                            <svg
                                class="w-5 h-5 fill-current text-gray-400"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"
                                />
                                <path d="M0 0h24v24H0z" fill="none" />
                            </svg>
                            <span class="text-gray-700">(200) </span>
                        </div>
                    </div>
                    <div class="flex justify-around py-2">
                        <p
                            class="text-gray-700 text-base mt-2 text-lg font-bold"
                        >
                            $19.99
                        </p>
                        <button
                            type="button"
                            class="px-3 py-2 text-sm font-medium text-center text-white rounded bg-primary hover:bg-primary-dark focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        >
                            Add to Cart
                        </button>
                    </div>
                </div>
                <!-- Product Card 1 -->
                <div
                    class="max-w-sm rounded overflow-hidden shadow-lg relative"
                >
                    <img
                        class="w-full"
                        src="https://via.placeholder.com/300x200"
                        alt="Product Image"
                    />
                    <div
                        class="absolute top-0 right-0 bg-primary text-white px-2 py-1 rounded-bl"
                    >
                        <span>20% OFF</span>
                    </div>
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-0">Product Title</div>
                        <p class="text-gray-700 text-base">Headphones</p>

                        <div class="mt-1 flex items-center">
                            <svg
                                class="w-5 h-5 fill-current text-yellow-500 mr-1"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"
                                />
                                <path d="M0 0h24v24H0z" fill="none" />
                            </svg>
                            <svg
                                class="w-5 h-5 fill-current text-yellow-500 mr-1"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"
                                />
                                <path d="M0 0h24v24H0z" fill="none" />
                            </svg>
                            <svg
                                class="w-5 h-5 fill-current text-yellow-500 mr-1"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"
                                />
                                <path d="M0 0h24v24H0z" fill="none" />
                            </svg>
                            <svg
                                class="w-5 h-5 fill-current text-gray-400"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"
                                />
                                <path d="M0 0h24v24H0z" fill="none" />
                            </svg>
                            <svg
                                class="w-5 h-5 fill-current text-gray-400"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"
                                />
                                <path d="M0 0h24v24H0z" fill="none" />
                            </svg>
                            <span class="text-gray-700">(200) </span>
                        </div>
                    </div>
                    <div class="flex justify-around py-2">
                        <p
                            class="text-gray-700 text-base mt-2 text-lg font-bold"
                        >
                            $19.99
                        </p>
                        <button
                            type="button"
                            class="px-3 py-2 text-sm font-medium text-center text-white rounded bg-primary hover:bg-primary-dark focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        >
                            Add to Cart
                        </button>
                    </div>
                </div>
                <!-- Product Card 1 -->
                <div
                    class="max-w-sm rounded overflow-hidden shadow-lg relative"
                >
                    <img
                        class="w-full"
                        src="https://via.placeholder.com/300x200"
                        alt="Product Image"
                    />
                    <div
                        class="absolute top-0 right-0 bg-primary text-white px-2 py-1 rounded-bl"
                    >
                        <span>20% OFF</span>
                    </div>
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-0">Product Title</div>
                        <p class="text-gray-700 text-base">Headphones</p>

                        <div class="mt-1 flex items-center">
                            <svg
                                class="w-5 h-5 fill-current text-yellow-500 mr-1"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"
                                />
                                <path d="M0 0h24v24H0z" fill="none" />
                            </svg>
                            <svg
                                class="w-5 h-5 fill-current text-yellow-500 mr-1"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"
                                />
                                <path d="M0 0h24v24H0z" fill="none" />
                            </svg>
                            <svg
                                class="w-5 h-5 fill-current text-yellow-500 mr-1"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"
                                />
                                <path d="M0 0h24v24H0z" fill="none" />
                            </svg>
                            <svg
                                class="w-5 h-5 fill-current text-gray-400"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"
                                />
                                <path d="M0 0h24v24H0z" fill="none" />
                            </svg>
                            <svg
                                class="w-5 h-5 fill-current text-gray-400"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"
                                />
                                <path d="M0 0h24v24H0z" fill="none" />
                            </svg>
                            <span class="text-gray-700">(200) </span>
                        </div>
                    </div>
                    <div class="flex justify-around py-2">
                        <p
                            class="text-gray-700 text-base mt-2 text-lg font-bold"
                        >
                            $19.99
                        </p>
                        <button
                            type="button"
                            class="px-3 py-2 text-sm font-medium text-center text-white rounded bg-primary hover:bg-primary-dark focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        >
                            Add to Cart
                        </button>
                    </div>
                </div>
                <!-- Add more product cards here as needed -->
            </div>
        </div>

        <!-- Carouesel -->
        <div class="my-6 py-12 px-12 h-50 border-2 border-gray-200"></div>
    </CommonLayout>
</template>
