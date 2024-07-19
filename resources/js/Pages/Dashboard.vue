<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';
import Twitter from 'vue-material-design-icons/Twitter.vue';
import Magnify from 'vue-material-design-icons/Magnify.vue';
import DotsHorizontal from 'vue-material-design-icons/DotsHorizontal.vue';
import Feather from 'vue-material-design-icons/Feather.vue';
import Close from 'vue-material-design-icons/Close.vue';
import ChevronDown from 'vue-material-design-icons/ChevronDown.vue';
import Earth from 'vue-material-design-icons/Earth.vue';
import ImageOutline from 'vue-material-design-icons/ImageOutline.vue';
import FileGifBox from 'vue-material-design-icons/FileGifBox.vue';
import Emoticon from 'vue-material-design-icons/Emoticon.vue';
import ArrowLeft from 'vue-material-design-icons/ArrowLeft.vue';
import MenuItem from '@/Components/MenuItem.vue';
import Tweet from '@/Components/Tweet.vue';


defineProps ({tweets: Array})
let createTweet = ref(false)
let tweet = ref('')
let file = ref('')
let showUpload = ref('')
let uploadType = ref('')
let randImg1 = ref(`https://recordchiapas.mx/wp-content/uploads/2020/07/luz.jpg`);
let randImg2 = ref(`https://belleza-estetica.com.ar/wp-content/uploads/2024/03/escasez_de_agua_que_es_causas_consecuencias_y_soluciones_786_orig.jpg`);
let randImg3 = ref(`https://beta.tucomunidad.com.pa/wp-content/uploads/2021/02/IMG-1181.jpg`);
let randImg4 = ref(`https://picsum.photos/id/${(Math.random() * 200).toFixed(0)}/100`);

const getFile = (e) => {
    file.value = e.target.files[0]
    showUpload.value = URL.createObjectURL(e.target.files[0]);
    uploadType.value = file.value.name.split('.').pop();
}

const closeMessageBox = () => {
    createTweet.value = false
    tweet.value = ''
    showUpload.value = ''
    uploadType.value = ''
}
const addTweet = () => {
    if (!tweet.value) return

    let data = new FormData()

    data.append('tweet', tweet.value)
    data.append('file', file.value)

    router.post('/dashboard', data)

    createTweet.value = false
    tweet.value = ''
    showUpload.value = ''
    uploadType.value = ''
}
const textarea = ref(null);

const textareaInput = (e) => {
    textarea.value.style.height = "auto";
    textarea.value.style.height = `${e.target.scrollHeight}px`;

};

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="fixed w-full bg-white text-white">
            <div class="max-w-[1400px] flex mx-auto">
                <div class="lg:w-3/12 w-[60px] h-[100vh] max-w-[350px] lg:px-4 lg:mx-auto">
                    <div class="p-2 px-3 mb-4">
                        <Twitter fillColor="White" :size="37" />
                    </div>

                    <MenuItem iconString="Inicio" />
                    <MenuItem iconString="Explora" />
                    <MenuItem iconString="Notificaciones" />

                    <button
                        @click="createTweet = true"
                        class="lg:w-full mt-8 ml-2 text-white font-extrabold text-[22px] bg-sky-800 p-3 px-3 rounded-full cursor-pointer"
                    >
                        <span class="lg:block hidden">Publicación</span>
                        <span class="block lg:hidden"><Feather /></span>
                    </button>
                </div>

                <div class="lg:w-7/12 w-11/12 border-x border-sky-400 relative">
                    <div class=" bg-sky-200 bg-opacity-50 backdrop-blur-md z-10 absolute w-full">
                        <div class="border-white border-b w-full">
                            <div class="w-full text-black text-[22px] font-extrabold p-4">
                                Inicio
                            </div>
                            <div class="flex">
                                <div
                                    class="flex items-center justify-center w-full h-[60px] text-black text-[17px] font-extrabold p-4 hover:bg-sky-300 hover:bg-opacity-30 cursor-pointer transition duration-200 ease-in-out">
                                    <div class="inline-block text-center border-b-4 border-b-sky-500 h-[60px]">
                                        <div class="my-auto mt-4"> Publicaciones</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="absolute top-0 z-0 h-full w-full overflow-auto scrollbar-hide">
                        <div class="mt-[126px]">
                        </div>
                        <slot />
    <div class="text-black">
        <div class="flex" v-for="tweet in tweets":key="tweet">
        <Tweet :tweet="tweet"/>
    </div>
    <div class="border-b border-blue-800 mt-2"></div>
</div>
                    </div>
                </div>

                <div class="lg:block hidden lg:w-4/12 h-screen border-l border-sky-300 pl-4">
                    <div class="w-full p-1 mt-2 px-4 lg:flex items-center rounded-full hidden bg-sky-300">
                        <Magnify fillColor="#5e5c5c" :size="25" />
                        <input
                            class="
                                appearance-none
                                w-full
                                border-0
                                py-2
                                bg-sky-300
                                text-black
                                placeholder-gray-500
                                leading-tight
                                focus:ring-0
                            "
                            type="text"
                            placeholder=""
                        >
                    </div>

                    <div class="w-full mt-4 rounded-lg lg:block hidden bg-sky-300">
                        <div class="w-full p-4 text-black font-extrabold mb-6 text-[20px]">Sin luz por más de 24 Horas</div>

                        <div class="h-[80px] hover:bg-gray-800 cursor-pointer transition duration-200 ease-in-out">
                            <div class="flex p-3 justify-between h-[80px] py-3">
                                <div>
                                    <div class="text-[15px] text-white">Comunidades no soportan más</div>
                                    <div class="w-full text-white font-extrabold mb-6 text-[17px]">¿Dónde esta Naturgy?</div>
                                </div>
                                <img class="rounded-xl" :src="randImg1" alt="" />
                            </div>
                        </div>
                    </div>

                    <div class="w-full mt-4 rounded-lg lg:block hidden bg-sky-300">
                        <div class="w-full p-4 text-black font-extrabold mb-6 text-[20px]">Falta de Agua Potable </div>

                        <div class="h-[80px] hover:bg-gray-800 cursor-pointer transition duration-200 ease-in-out">
                            <div class="flex p-3 justify-between h-[80px] py-3">
                                <div>
                                    <div class="text-[15px] text-white">Exigen respuestas</div>
                                    <div class="w-full text-white font-extrabold mb-6 text-[17px]">Comunidades sin un poco de agua</div>
                                </div>
                                <img class="rounded-xl" :src="randImg2" alt="" />
                            </div>
                        </div>
                    </div>

                    <div class="w-full mt-4 rounded-lg lg:block hidden bg-sky-300">
                        <div class="w-full p-4 text-black font-extrabold mb-6 text-[20px]">No pasan los camiones de basura</div>

                        <div class="h-[80px] hover:bg-gray-800 cursor-pointer transition duration-200 ease-in-out">
                            <div class="flex p-3 justify-between h-[80px] py-3">
                                <div>
                                    <div class="text-[14px] text-white">Un problema de no acabar</div>
                                    <div class="w-full text-white font-extrabold mb-6 text-[17px]">La basura ganando territorio</div>
                                </div>
                                <img class="rounded-xl" :src="randImg3" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="OverlaySection" v-if="createTweet" class="fixed top-0 left-0 w-full h-screen bg-black md:bg-blue-400 md:bg-opacity-30 md:p-3 z-20">
            <div class="md:max-w-2xl md:mx-auto md:mt-10 md:rounded-xl bg-blue-950">
                <div class="flex items-center justify-between md:inline-block p-2 m-2 rounded-full cursor-pointer">
                    <div @click="closeMessageBox()" class="hover:bg-gray-800 inline-block p-2 rounded-full cursor-pointer">
                        <Close fillColor="#FFFFFF" :size="28" class="md:block hidden" />
                        <ArrowLeft fillColor="#FFFFFF" :size="28" class="md:hidden block" />
                    </div>
                    <button
                    n
                    :class="tweet ? 'bg-[#1C9CEF] text-white' : 'bg-[#124D77] text-gray-400'"
                    :disabled="!tweet"
                    @click="addTweet()"
                    class="md:hidden font-extrabold text-[16px] p-1.5 px-4 rounded-full cursor-pointer"
                >
                    Publicar
                </button>
            </div>
            <div class="w-full flex">
                <div class="ml-3.5 mr-2">
                    <img class="rounded-full" width="55"  :src="randImg4" />
                </div>
                <div class="w-[calc(100%-100px)]">
                    <div class="inline-block">
                        <div class="flex items-center border border-gray-700 rounded-full">
                            <span class="text-[#1C9CEF] p-0.5 pl-3.5 font-extrabold">Todos pueden ver</span>
                            <ChevronDown class="pr-2" fillColor="#1C9CEF" :size="25"/>
                        </div>
                    </div>
                    <div>
                        <textarea
                            ref="textarea"
                            :oninput="textareaInput"
                            v-model="tweet"
                            placeholder="¿Cuál es tu problemática?"
                            cols="30"
                            rows="4"
                            class="
                                w-full
                                bg-blue-950
                                border-0
                                mt-2
                                focus:ring-0
                                text-white
                                text-[19px]
                                font-extrabold
                                min-h-[120px]
                            "
                        ></textarea>
                    </div>
                    <div class="w-full">
                        <video controls v-if="uploadType === 'mp4'" :src="showUpload" class="rounded-xl overflow-auto"/>
                        <img v-else :src="showUpload" class="rounded-xl min-w-full">
                    </div>
                    <div class="flex py-2 items-center text-[#1C9CEF] font-extrabold">
                        <Earth class="pr-2" fillColor="#1C9CEF" :size="20" /> Cualquiera puede responder
                    </div>
                    <div class="border-b hover:bg-sky-100"></div>
                    <div class="flex items-center justify-between py-2">
                        <div class="flex items-center">
                            <div class="hover:bg-sky-100 inline-block p-2 rounded-full cursor-pointer">
                                <label for="fileUpload" class="cursor-pointer">
                                    <ImageOutline fillColor="#1C9CEF" :size="25" />
                                </label>
                                <input type="file" id="fileUpload" class="hidden" @change="getFile">
                            </div>
                        </div>
                        <button
                            :class="tweet ? 'bg-[#1C9CEF] text-white' : 'bg-[#124D77] text-gray-400'"
                            :disabled="!tweet"
                            @click="addTweet()"
                            class=" hidden md:block font-extrabold text-[16px] p-1.5 px-4 rounded-full cursor-pointer"
                        >
                            Publicar
                        </button>
        </div>
    </div>
</div>
</div>
</div>


    </AuthenticatedLayout>
</template>
