<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Welcome" />
    <div class="relative min-h-screen bg-blue-500 selection:bg-red-500 selection:text-white flex flex-col items-center justify-center">
        <!-- Contenido principal centrado -->
        <div class="text-center max-w-4xl mx-auto px-4">
            <h1 class="text-5xl font-bold text-black mb-4">¡Bienvenido a Nexus Comunitario!</h1>
            <h2 class="text-3xl font-semibold text- mb-6">¡Únete a la comunidad!</h2>

            <div class="bg-white p-6 rounded-lg shadow-lg mb-8">
                <p class="text-2xl text-gray-800 leading-relaxed">
                    Publica y vota las problemáticas de tu país. ¡Tu voz importa!
                </p>
            </div>

            <div class="space-y-4">
                <Link
                    v-if="$page.props.auth.user"
                    :href="route('dashboard')"
                    class="block w-full px-4 py-2 text-lg font-semibold bg-white text-blue-600 hover:bg-gray-100 rounded-md transition duration-150 ease-in-out"
                >Dashboard</Link>

                <template v-else>
                    <Link
                        :href="route('login')"
                        class="block w-full px-4 py-2 text-lg font-semibold bg-white text-blue-600 hover:bg-gray-100 rounded-md transition duration-150 ease-in-out"
                    >Iniciar sesión</Link>

                    <Link
                        v-if="canRegister"
                        :href="route('register')"
                        class="block w-full px-4 py-2 text-lg font-semibold bg-white text-blue-600 hover:bg-gray-100 rounded-md transition duration-150 ease-in-out"
                    >Registrarse</Link>
                </template>
            </div>

            <p class="mt-4 text-white">
                ¿No tienes una cuenta? <Link :href="route('register')" class="font-semibold underline">Regístrate ahora</Link>
            </p>
        </div>
    </div>
</template>

<style>
.bg-blue-500 {
    background-image: url('https://images.unsplash.com/photo-1632505702897-cc41b0ba3b64?q=80&w=1933&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
}

.selection\:bg-red-500::selection {
    background-color: #ef4444;
    color: white;
}

h1 {
    font-size: 3rem;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
}
</style>
