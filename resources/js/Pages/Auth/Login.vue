<script setup>
import Checkbox from "@/Components/Checkbox.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Input from "@/Components/CustomInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    console.log("form")
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};

</script>

<template>
    <GuestLayout>

        <Head title="Log in" />

        <section class="bg-gray-50 dark:bg-gray-900">

            <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">

                <div
                    class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1
                            class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                            Sign in to your account
                        </h1>

                        <form @submit.prevent="submit" class="space-y-4 md:space-y-6" action="#">
                            <div>

                                <Input v-model="form.email" :errorMessage="passwordError" id="email-address"
                                    name="email" @validate="validatePassword" inputlabel="Email"
                                    placeholder="Email Address"
                                    icon=' <svg class="w-5 h-5 mt-auto text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16"><path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" /> <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" /></svg>' />

                            </div>
                            <div>
                                <Input v-model="form.password" :errorMessage="passwordError" id="email-address"
                                    name="password" type="password" @validate="validatePassword" inputlabel="Password"
                                    placeholder="Password"
                                    icon='<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" viewBox="0 0 24 24" fill="currentColor"><path d="M12 17a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" /><path fill-rule="evenodd" d="M18 8h-1V6a5 5 0 10-10 0v2H6a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V10a2 2 0 00-2-2zm-2 0H8V6a4 4 0 118 0v2z" clip-rule="evenodd" /></svg>' />
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">

                                        <Checkbox id="remember" name="remember" v-model:checked="form.remember" />


                                        <!-- <input id="remember" aria-describedby="remember" type="checkbox" name="remember"
                                            v-model="form.remember"
                                            class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800 text-primary"
                                         > -->



                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="remember" class="text-gray-500 dark:text-gray-300">Remember
                                            me</label>
                                    </div>
                                </div>
                                <Link :href="route('password.request')"
                                    class="text-sm font-medium text-primary hover:underline dark:text-primary">Forgot
                                password?</Link>
                            </div>
                            <div class="mb-4 text-sm text-red-600" v-if="$page.props.errors.email">
                                {{ $page.props.errors.email }}
                            </div>
                            <PrimaryButton type="submit" :disabled="form.processing" :loading="form.processing">
                                Sign in
                            </PrimaryButton>
                            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                                Don’t have an account yet?
                                <Link :href="route('register')"
                                    class="font-medium text-primary hover:underline dark:text-primary-500">Sign
                                up</Link>
                            </p>
                        </form>
                    </div>
                </div>
            </div>

        </section>


    </GuestLayout>
</template>
