<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Input from "@/Components/CustomInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const form = useForm({
    first_name: "",
    last_name: "",
    email: "",
    password: "",
    password_confirmation: "",
});

const submit = () => {
    console.log("hello")
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};

const validate = (key, value) => {
    console.log("validate", key, value)
}
</script>

<template>
    <GuestLayout>

        <Head title="Register" />
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
                                <Input v-model="form.first_name" :errorMessage="form.errors.first_name" id="first_name"
                                    name="first_name" @validate="validate" inputlabel="First name"
                                    placeholder="First name" />
                            </div>
                            <div>
                                <Input v-model="form.last_name" :errorMessage="form.errors.last_name" id="last_name"
                                    name="last_name" @validate="validate" inputlabel="Last Name"
                                    placeholder="Last Name" />
                            </div>
                            <div>
                                <Input v-model="form.email" :errorMessage="form.errors.email" id="email-address"
                                    type="email" name="email" @validate="validate" inputlabel="Email"
                                    placeholder="Email Address" />
                            </div>
                            <div>
                                <Input v-model="form.password" :errorMessage="form.errors.password" id="email-address"
                                    name="password" type="password" @validate="validate" inputlabel="Password"
                                    placeholder="Password"
                                    icon='<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" viewBox="0 0 24 24" fill="currentColor"><path d="M12 17a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" /><path fill-rule="evenodd" d="M18 8h-1V6a5 5 0 10-10 0v2H6a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V10a2 2 0 00-2-2zm-2 0H8V6a4 4 0 118 0v2z" clip-rule="evenodd" /></svg>' />
                            </div>
                            <div>
                                <Input v-model="form.password_confirmation"
                                    :errorMessage="form.errors.password_confirmation" id="password_confirmation"
                                    name="password_confirmation" type="password" @validate="validate"
                                    inputlabel="Confirm Password" placeholder="Confirm Password"
                                    icon='<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" viewBox="0 0 24 24" fill="currentColor"><path d="M12 17a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" /><path fill-rule="evenodd" d="M18 8h-1V6a5 5 0 10-10 0v2H6a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V10a2 2 0 00-2-2zm-2 0H8V6a4 4 0 118 0v2z" clip-rule="evenodd" /></svg>' />
                            </div>


                            <div class="my-4 text-sm text-red-600" v-if="$page.props.errors.email">
                                {{ $page.props.errors.email }}
                            </div>
                            <PrimaryButton type="submit" :disabled="form.processing" :loading="form.processing">
                                Sign up
                            </PrimaryButton>
                            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                                Already registered?
                                <Link :href="route('login')"
                                    class="font-medium text-primary hover:underline dark:text-primary-500">Sign
                                in</Link>
                            </p>
                        </form>
                    </div>
                </div>
            </div>

        </section>


    </GuestLayout>
</template>

<!-- <form @submit.prevent="submit">
    <div>
        <InputLabel for="first_name" value="First Name" />

        <TextInput
            id="first_name"
            type="text"
            class="mt-1 block w-full"
            v-model="form.first_name"
            required
            autofocus
            autocomplete="first_name"
        />

        <InputError class="mt-2" :message="form.errors.first_name" />
    </div>
    <div>
        <InputLabel for="last_name" value="Last Name" />

        <TextInput
            id="last_name"
            type="text"
            class="mt-1 block w-full"
            v-model="form.last_name"
            required
            autofocus
            autocomplete="last_name"
        />

        <InputError class="mt-2" :message="form.errors.last_name" />
    </div>

    <div class="mt-4">
        <InputLabel for="email" value="Email" />

        <TextInput
            id="email"
            type="email"
            class="mt-1 block w-full"
            v-model="form.email"
            required
            autocomplete="username"
        />

        <InputError class="mt-2" :message="form.errors.email" />
    </div>

    <div class="mt-4">
        <InputLabel for="password" value="Password" />

        <TextInput
            id="password"
            type="password"
            class="mt-1 block w-full"
            v-model="form.password"
            required
            autocomplete="new-password"
        />

        <InputError class="mt-2" :message="form.errors.password" />
    </div>

    <div class="mt-4">
        <InputLabel
            for="password_confirmation"
            value="Confirm Password"
        />

        <TextInput
            id="password_confirmation"
            type="password"
            class="mt-1 block w-full"
            v-model="form.password_confirmation"
            required
            autocomplete="new-password"
        />

        <InputError
            class="mt-2"
            :message="form.errors.password_confirmation"
        />
    </div>

    <div class="flex items-center justify-end mt-4">
        <Link
            :href="route('login')"
            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        >
            Already registered?
        </Link>

        <PrimaryButton
            class="ms-4"
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
        >
            Register
        </PrimaryButton>
    </div>
</form> -->