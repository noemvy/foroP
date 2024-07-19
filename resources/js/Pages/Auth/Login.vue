<script setup>
import { ref } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-md w-full space-y-8">
                <div class="text-center">
                    <!-- Imagen de Nexus -->
                    <img src="/pics/logonegro.png" alt="Nexus Logo" class="mx-auto h-45 w-auto" />

                    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                        Inicia sesión en tu cuenta
                    </h2>
                    <p class="mt-2 text-center text-sm text-gray-600">
                        O
                        <Link :href="route('register')" class="font-medium text-indigo-600 hover:text-indigo-500">
                            Crea una nueva cuenta
                        </Link>
                    </p>
                </div>

                <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                    {{ status }}
                </div>

                <form class="mt-8 space-y-6" @submit.prevent="submit">
                    <div class="rounded-md shadow-sm -space-y-px">
                        <div>
                            <label for="email" class="sr-only">Dirección de correo electrónico</label>
                            <input id="email" name="email" type="email" autocomplete="email" required
                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                placeholder="Dirección de correo electrónico" v-model="form.email">
                        </div>
                        <div>
                            <label for="password" class="sr-only">Contraseña</label>
                            <input id="password" name="password" type="password" autocomplete="current-password" required
                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                placeholder="Contraseña" v-model="form.password">
                        </div>
                    </div>

                    <InputError class="mt-2" :message="form.errors.email" />
                    <InputError class="mt-2" :message="form.errors.password" />

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember-me" name="remember-me" type="checkbox"
                                class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                                v-model="form.remember">
                            <label for="remember-me" class="ml-2 block text-sm text-gray-900">
                                Recuérdame
                            </label>
                        </div>

                        <div class="text-sm">
                            <Link v-if="canResetPassword" :href="route('password.request')"
                                class="font-medium text-indigo-600 hover:text-indigo-500">
                                ¿Olvidaste tu contraseña?
                            </Link>
                        </div>
                    </div>

                    <div>
                        <PrimaryButton
                            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Iniciar sesión
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </GuestLayout>
</template>
