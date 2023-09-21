<script setup>
import { ref } from "vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout2.vue";

defineProps({
    list: Array,
});
</script>
<template>
    <GuestLayout>
        <main class="profile-page">
            <section class="relative block" style="height: 500px">
                <div class="absolute top-0 w-full h-full">
                    <img
                        src="./img/train-travel-srilanka-848x440.jpg"
                        alt="Background Image"
                        class="w-full h-full object-cover"
                    />
                    <span
                        id="blackOverlay"
                        class="w-full h-full absolute opacity-50 bg-black"
                    ></span>
                </div>
                <div
                    class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
                    style="height: 70px"
                >
                    <svg
                        class="absolute bottom-0 overflow-hidden"
                        xmlns="http://www.w3.org/2000/svg"
                        preserveAspectRatio="none"
                        version="1.1"
                        viewBox="0 0 2560 100"
                        x="0"
                        y="0"
                    >
                        <polygon
                            class="text-gray-300 fill-current"
                            points="2560 0 2560 100 0 100"
                        ></polygon>
                    </svg>
                </div>
            </section>
            <section class="relative bg-gray-300">
                <div class="container mx-auto px-4 max-w-screen-xl">
                    <div
                        class="relative px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 pb-5"
                        style="cursor: auto"
                        v-for="row in list"
                    >
                        <Link :href="route('cruise-lines.show', row.id)">
                            <div
                                class="max-w-lg mx-auto overflow-hidden rounded-lg shadow-lg lg:max-w-none"
                            >
                                <div class="lg:flex">
                                    <div
                                        class="flex-1 px-6 py-8 bg-white lg:p-12"
                                        style="cursor: auto"
                                    >
                                        <h3
                                            class="text-2xl font-extrabold text-gray-900 sm:text-3xl"
                                            style="cursor: auto"
                                        >
                                            {{ row.name }}
                                        </h3>
                                        <p class="text-base text-gray-500">
                                            {{ row.description }}
                                        </p>
                                    </div>
                                    <div
                                        class="px-6 py-8 text-center bg-gray-50 lg:flex-shrink-0 lg:flex lg:flex-col lg:justify-center lg:p-12"
                                        style="cursor: auto"
                                    >
                                        <img
                                            alt="..."
                                            :src="route('cruise-lines.img',row.img)"
                                            class="rounded-lg w-auto align-middle border-none"
                                            style="
                                                max-height: 350px;
                                                max-width: 350px;
                                            "
                                        />
                                    </div>
                                </div>
                            </div>
                        </Link>
                    </div>
                </div>
            </section>
        </main>
    </GuestLayout>
</template>
