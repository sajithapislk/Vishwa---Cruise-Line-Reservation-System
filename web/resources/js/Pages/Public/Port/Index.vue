<script setup>
import { ref } from "vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout2.vue";

defineProps({
    list: Array,
});
const filterForm = useForm({
    text: ""
});
const filter = () => {
    filterForm.get(route("port.search"));
};
</script>
<template>
    <GuestLayout>
        <main class="profile-page">
            <section class="relative block" style="height: 500px">
                <div class="absolute top-0 w-full h-full">
                    <img
                        src="./img/photo-1499336315816-097655dcfbda.jpeg"
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
            <section class="relative py-16 bg-gray-300">
                <div class="container mx-auto px-4 max-w-5xl">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64"
                    >
                        <div class="flex flex-col">
                            <div class="bg-white p-6 rounded-xl shadow-lg">
                                <form @submit.prevent="filter">
                                    <div
                                        class=""
                                    >
                                        <div class="flex flex-col">
                                            <label
                                                for="status"
                                                class="font-medium text-sm text-stone-600"
                                                >Ship</label
                                            >
                                            <input
                                                v-model="filterForm.text"
                                                type="text"
                                                class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-300 focus:ring focus:ring-orange-200 focus:ring-opacity-50"
                                            />
                                        </div>
                                    </div>
                                    <div
                                        class="grid md:flex grid-cols-2 justify-end space-x-4 w-full mt-6"
                                    >
                                        <button
                                            type="submit"
                                            class="flex items-center px-5 py-2.5 font-medium tracking-wide text-white capitalize bg-black rounded-md hover:bg-gray-800 focus:outline-none focus:bg-gray-900 transition duration-300 transform active:scale-95 ease-in-out"
                                        >
                                            <span class="pl-2 mx-1"
                                                >Search</span
                                            >
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="relative bg-gray-300">
                <div class="container mx-auto px-4 max-w-screen-xl">
                    <div
                        class="relative px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 pb-5"
                        style="cursor: auto"
                        v-for="row in list"
                    >

                        <Link :href="route('cruise-company.show', row.id)">
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
                                        <p class="text-base text-gray-500"  v-html="row.description">

                                        </p>
                                    </div>
                                    <div
                                        class="px-6 py-8 text-center bg-gray-50 lg:flex-shrink-0 lg:flex lg:flex-col lg:justify-center lg:p-12"
                                        style="cursor: auto"
                                    >
                                        <img
                                            alt="..."
                                            :src="route('port.img',row.img)"
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
