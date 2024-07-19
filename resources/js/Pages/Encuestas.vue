<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

const showCreateSurvey = ref(false);
const showSurveyForm = ref(false);
const showResults = ref(false);
const showSurveys = ref(true);
const surveys = ref([
    {
        question: '¿Se están solucionando rápidamente las denuncias?',
        options: [{ value: 'Si', votes: 5 }, { value: 'No', votes: 3 }],
        results: [],
        createdAt: new Date().toLocaleString(),
        votedUsers: [] // Para almacenar los usuarios que ya han votado
    }
]);
const currentSurvey = ref(null);
const question = ref('');
const options = ref([{ value: '', votes: 0 }, { value: '', votes: 0 }]);
const userVote = ref(null);
const userId = ref(''); // Suponiendo que tienes una forma de obtener el ID del usuario, puede ser un ID o una cadena única

// Función para agregar una opción a la encuesta
const addOption = () => {
    options.value.push({ value: '', votes: 0 });
};

// Función para eliminar una opción de la encuesta
const removeOption = (index) => {
    if (options.value.length > 2) {
        options.value.splice(index, 1);
    }
};

// Función para manejar el envío del formulario de creación de encuesta
const handleSubmit = (event) => {
    event.preventDefault();
    const newSurvey = {
        question: question.value,
        options: [...options.value],
        results: [], // Inicializa los resultados vacíos
        createdAt: new Date().toLocaleString(), // Fecha de creación de la encuesta
        votedUsers: [] // Inicializa la lista de usuarios que han votado
    };
    surveys.value.push(newSurvey); // Agrega la nueva encuesta a la lista de encuestas
    showCreateSurvey.value = false;
    showSurveyForm.value = false;
    showResults.value = false;
    showSurveys.value = true;
    // Reinicia el formulario de creación
    question.value = '';
    options.value = [{ value: '', votes: 0 }, { value: '', votes: 0 }];
};

// Función para manejar el envío de una encuesta
const handleSurveySubmit = (event) => {
    event.preventDefault();
    if (userVote.value !== null) {
        if (!currentSurvey.value.votedUsers.includes(userId.value)) { // Verifica si el usuario ya ha votado
            currentSurvey.value.options[userVote.value].votes += 1;
            currentSurvey.value.votedUsers.push(userId.value); // Marca al usuario como votante
            showSurveyForm.value = false;
            showResults.value = true;
            calculateResults();
        } else {
            alert('Ya has votado en esta encuesta.');
        }
    }
};

// Función para calcular los resultados de la encuesta
const calculateResults = () => {
    const totalVotes = currentSurvey.value.options.reduce((sum, option) => sum + option.votes, 0);
    currentSurvey.value.results = currentSurvey.value.options.map(option => ({
        ...option,
        percentage: totalVotes > 0 ? (option.votes / totalVotes * 100).toFixed(2) : '0'
    }));
};

// Función para ver una encuesta
const viewSurvey = (survey) => {
    currentSurvey.value = survey;
    showSurveyForm.value = true;
    showResults.value = false;
    showSurveys.value = false;
};

// Función para eliminar una encuesta
const deleteSurvey = (index) => {
    surveys.value.splice(index, 1);
};

// Función para verificar si el usuario ya ha votado
const hasVoted = () => {
    return currentSurvey.value && currentSurvey.value.votedUsers.includes(userId.value);
};
</script>

<template>
    <Head title="Encuestas" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Encuestas</h2>
        </template>

        <div class="py-12">
            <div class="max-w-4xl mx-auto text-center bg-gray-100 p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4 text-sky-600">¡Participa en nuestra encuesta! 🗳️</h2>
        <p class="text-lg text-gray-700">
            Vota aquí y comparte tus opiniones para ayudarnos a abordar las problemáticas de nuestra comunidad.
        </p>
        </div>
        <br>
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <!-- Pestañas de navegación -->
                <div class="flex space-x-4 mb-6">
                    <button @click="showCreateSurvey = false; showSurveyForm = false; showResults = false; showSurveys = true" class="px-4 py-2 bg-gray-200 rounded-md text-gray-800 hover:bg-gray-300">
                        Ver Encuestas
                    </button>
                    <button @click="showCreateSurvey = true; showSurveyForm = false; showResults = false; showSurveys = false" class="px-4 py-2 bg-sky-600 text-white rounded-md hover:bg-sky-700">
                        Crear Encuesta
                    </button>
                </div>

                <!-- Listado de Encuestas -->
                <div v-if="showSurveys">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <h3 class="text-lg font-medium text-gray-900">Encuestas Disponibles</h3>
                        <ul class="mt-4 space-y-4">
                            <li v-for="(survey, index) in surveys" :key="index" class="border-b border-gray-200 pb-4 flex items-center justify-between">
                                <div>
                                    <h4 class="text-xl font-semibold">{{ survey.question }}</h4>
                                    <span class="text-gray-500 text-sm">Creada el: {{ survey.createdAt }}</span>
                                </div>
                                <div>
                                    <button
                                        @click="viewSurvey(survey)"
                                        :disabled="survey.votedUsers.includes(userId)"
                                        :class="{
                                            'mt-2 px-4 py-2 rounded-md text-white': true,
                                            'bg-sky-600 hover:bg-sky-700': !survey.votedUsers.includes(userId),
                                            'bg-gray-400 cursor-not-allowed': survey.votedUsers.includes(userId)
                                        }"
                                    >
                                        Participar
                                    </button>
                                    <button @click="deleteSurvey(index)" class="ml-2 px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                                        Eliminar
                                    </button>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Formulario para crear una encuesta -->
                <div v-if="showCreateSurvey">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <form @submit="handleSubmit" class="space-y-4">
                            <fieldset>
                                <legend class="text-lg font-medium text-gray-900">¿Cuál es la pregunta de tu encuesta?</legend>
                                <input v-model="question" type="text" placeholder="Escribe la pregunta" class="w-full border border-gray-300 rounded-md p-2">
                            </fieldset>

                            <fieldset>
                                <legend class="text-lg font-medium text-gray-900">Opciones</legend>
                                <div class="mt-4 space-y-2">
                                    <div v-for="(option, index) in options" :key="index" class="flex items-center space-x-4">
                                        <input v-model="option.value" type="text" placeholder="Escribe una opción" class="form-input text-gray-700 w-full border border-gray-300 rounded-md p-2">
                                        <button @click="removeOption(index)" type="button" class="text-red-500 hover:text-red-700">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <button @click="addOption" type="button" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">
                                        Añadir opción
                                    </button>
                                </div>
                            </fieldset>

                            <button type="submit" class="mt-4 px-4 py-2 bg-sky-600 text-white rounded-md hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-sky-500">
                                Crear Encuesta
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Formulario de la encuesta creada -->
                <div v-if="showSurveyForm">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <h3 class="text-lg font-medium text-gray-900">{{ currentSurvey.question }}</h3>
                        <form @submit="handleSurveySubmit" class="space-y-4 mt-4">
                            <div v-for="(option, index) in currentSurvey.options" :key="index" class="flex items-center space-x-4">
                                <input type="radio" :name="'survey_option'" :value="index" v-model="userVote" class="form-radio text-sky-600">
                                <span class="ml-2 text-gray-700">{{ option.value }}</span>
                            </div>
                            <button type="submit" class="mt-4 px-4 py-2 bg-sky-600 text-white rounded-md hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-sky-500">
                                Enviar Respuesta
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Resultados de la encuesta -->
                <div v-if="showResults">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <h3 class="text-lg font-medium text-gray-900">{{ currentSurvey.question }}</h3>
                        <div class="mt-4 space-y-2">
                            <div v-for="(result, index) in currentSurvey.results" :key="index" class="flex items-center space-x-4">
                                <div class="flex-1">
                                    <span class="text-gray-700">{{ result.value }}</span>
                                    <span class="text-gray-500 ml-2">({{ result.votes }} votos)</span>
                                </div>
                                <div class="w-1/3 h-4 bg-gray-200 rounded-full">
                                    <div :style="{ width: result.percentage + '%' }" class="h-full bg-sky-600 rounded-full"></div>
                                </div>
                                <span class="text-gray-700 ml-2">{{ result.percentage }}%</span>
                            </div>
                            <button @click="showCreateSurvey = false; showSurveyForm = false; showResults = false; showSurveys = true" class="mt-4 px-4 py-2 bg-sky-600 text-white rounded-md hover:bg-sky-700">
                                Volver a Encuestas
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
