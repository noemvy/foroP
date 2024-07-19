<template>
    <div class=" w-full lg:inline-block hover:bg-sky-300 p-2 px-4 lg:pr-6 rounded-full cursor-pointer transition duration-200 ease-in-out">
        <div class="flex items-center">
            <component :is="icon" fillColor="black" :size="30" />
            <span class="lg:block hidden text-black font-extrabold text-[23px] pl-4 mt-0.5">
                {{ iconString }}
            </span>
        </div>
    </div>
</template>

<script setup>
import { toRefs } from 'vue'
import Home from 'vue-material-design-icons/Home.vue';
import Pound from 'vue-material-design-icons/Pound.vue';
import BellOutline from 'vue-material-design-icons/BellOutline.vue';
import AccountOutline from 'vue-material-design-icons/AccountOutline.vue';

const props = defineProps({
    iconString: String,
})

const { iconString } = toRefs(props)

let icon = null

if (iconString.value === 'Inicio') icon = Home
if (iconString.value === 'Explora') icon = Pound
if (iconString.value === 'Notificaciones') icon = BellOutline

</script>
