<script setup>
import { ref } from "vue";
import { Swiper, SwiperSlide } from "swiper/vue";
import "swiper/css";
import check_white from "@/assets/svg/check-white.svg";
import arrow_right from "@/assets/svg/arrow-right.svg";
import GuestLayout from "@/Layouts/GuestLayout2.vue";

defineProps({
    ships: Object,
});
</script>
<template>
    <GuestLayout>
        <main class="profile-page">
            <section class="relative block" style="height: 500px">
                <div class="absolute top-0 w-full h-full">
                    <img
                        src="./img/Carnival-Freedom-Cruise-Ship.jpg"
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
                        v-for="row in ships"
                    >
                        <div class="max-w-lg mx-auto overflow-hidden rounded-lg shadow-lg lg:max-w-none">
                            <div
                                class="lg:flex"
                            >
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
                                    <div class="mt-8">
                                        <div class="flex items-center">
                                            <h4
                                                class="flex-shrink-0 pr-4 text-sm font-semibold tracking-wider text-indigo-600 uppercase bg-white"
                                            >
                                                Specifications
                                            </h4>
                                            <div
                                                class="flex-1 border-t-2 border-gray-200"
                                            ></div>
                                        </div>
                                        <ul
                                            class="mt-8 space-y-5 lg:space-y-0 lg:grid lg:grid-cols-2 lg:gap-x-8 lg:gap-y-5"
                                        >
                                            <li
                                                class="flex items-start lg:col-span-1"
                                            >
                                                <div class="flex-shrink-0">
                                                    <svg
                                                        class="w-5 h-5 text-green-400"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20"
                                                        fill="currentColor"
                                                        aria-hidden="true"
                                                    >
                                                        <path
                                                            fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd"
                                                        ></path>
                                                    </svg>
                                                </div>
                                                <p
                                                    class="ml-3 text-sm text-gray-700"
                                                >
                                                    Size:{{ row.size }}
                                                </p>
                                            </li>
                                            <li
                                                class="flex items-start lg:col-span-1"
                                            >
                                                <div class="flex-shrink-0">
                                                    <svg
                                                        class="w-5 h-5 text-green-400"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20"
                                                        fill="currentColor"
                                                        aria-hidden="true"
                                                    >
                                                        <path
                                                            fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd"
                                                        ></path>
                                                    </svg>
                                                </div>
                                                <p
                                                    class="ml-3 text-sm text-gray-700"
                                                >
                                                    Style:{{ row.style }}
                                                </p>
                                            </li>
                                            <li
                                                class="flex items-start lg:col-span-1"
                                            >
                                                <div class="flex-shrink-0">
                                                    <svg
                                                        class="w-5 h-5 text-green-400"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20"
                                                        fill="currentColor"
                                                        aria-hidden="true"
                                                    >
                                                        <path
                                                            fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd"
                                                        ></path>
                                                    </svg>
                                                </div>
                                                <p
                                                    class="ml-3 text-sm text-gray-700"
                                                >
                                                    Type:{{ row.type }}
                                                </p>
                                            </li>
                                            <li
                                                class="flex items-start lg:col-span-1"
                                            >
                                                <div class="flex-shrink-0">
                                                    <svg
                                                        class="w-5 h-5 text-green-400"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20"
                                                        fill="currentColor"
                                                        aria-hidden="true"
                                                    >
                                                        <path
                                                            fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd"
                                                        ></path>
                                                    </svg>
                                                </div>
                                                <p
                                                    class="ml-3 text-sm text-gray-700"
                                                >
                                                    Year of launch:{{row.launch_at}}
                                                </p>
                                            </li>
                                            <li
                                                class="flex items-start lg:col-span-1"
                                            >
                                                <div class="flex-shrink-0">
                                                    <svg
                                                        class="w-5 h-5 text-green-400"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20"
                                                        fill="currentColor"
                                                        aria-hidden="true"
                                                    >
                                                        <path
                                                            fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd"
                                                        ></path>
                                                    </svg>
                                                </div>
                                                <p
                                                    class="ml-3 text-sm text-gray-700"
                                                >
                                                    Year of last refit:2015
                                                </p>
                                            </li>
                                            <li
                                                class="flex items-start lg:col-span-1"
                                            >
                                                <div class="flex-shrink-0">
                                                    <svg
                                                        class="w-5 h-5 text-green-400"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20"
                                                        fill="currentColor"
                                                        aria-hidden="true"
                                                    >
                                                        <path
                                                            fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd"
                                                        ></path>
                                                    </svg>
                                                </div>
                                                <p
                                                    class="ml-3 text-sm text-gray-700"
                                                >
                                                    Gross tonnage:{{row.gt}}
                                                </p>
                                            </li>
                                            <li
                                                class="flex items-start lg:col-span-1"
                                            >
                                                <div class="flex-shrink-0">
                                                    <svg
                                                        class="w-5 h-5 text-green-400"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20"
                                                        fill="currentColor"
                                                        aria-hidden="true"
                                                    >
                                                        <path
                                                            fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd"
                                                        ></path>
                                                    </svg>
                                                </div>
                                                <p
                                                    class="ml-3 text-sm text-gray-700"
                                                >
                                                    Length:{{row.length}}m
                                                </p>
                                            </li>
                                            <li
                                                class="flex items-start lg:col-span-1"
                                            >
                                                <div class="flex-shrink-0">
                                                    <svg
                                                        class="w-5 h-5 text-green-400"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20"
                                                        fill="currentColor"
                                                        aria-hidden="true"
                                                    >
                                                        <path
                                                            fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd"
                                                        ></path>
                                                    </svg>
                                                </div>
                                                <p
                                                    class="ml-3 text-sm text-gray-700"
                                                >
                                                    Width:{{row.width}}m
                                                </p>
                                            </li>
                                            <li
                                                class="flex items-start lg:col-span-1"
                                            >
                                                <div class="flex-shrink-0">
                                                    <svg
                                                        class="w-5 h-5 text-green-400"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20"
                                                        fill="currentColor"
                                                        aria-hidden="true"
                                                    >
                                                        <path
                                                            fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd"
                                                        ></path>
                                                    </svg>
                                                </div>
                                                <p
                                                    class="ml-3 text-sm text-gray-700"
                                                >
                                                    Speed:{{row.speed}}kts
                                                </p>
                                            </li>
                                            <li
                                                class="flex items-start lg:col-span-1"
                                            >
                                                <div class="flex-shrink-0">
                                                    <svg
                                                        class="w-5 h-5 text-green-400"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20"
                                                        fill="currentColor"
                                                        aria-hidden="true"
                                                    >
                                                        <path
                                                            fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd"
                                                        ></path>
                                                    </svg>
                                                </div>
                                                <p
                                                    class="ml-3 text-sm text-gray-700"
                                                >
                                                    Decks:{{row.decks}}
                                                </p>
                                            </li>
                                            <li
                                                class="flex items-start lg:col-span-1"
                                            >
                                                <div class="flex-shrink-0">
                                                    <svg
                                                        class="w-5 h-5 text-green-400"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20"
                                                        fill="currentColor"
                                                        aria-hidden="true"
                                                    >
                                                        <path
                                                            fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd"
                                                        ></path>
                                                    </svg>
                                                </div>
                                                <p
                                                    class="ml-3 text-sm text-gray-700"
                                                >
                                                    No. of passengers:{{row.nop}}
                                                </p>
                                            </li>
                                            <li
                                                class="flex items-start lg:col-span-1"
                                            >
                                                <div class="flex-shrink-0">
                                                    <svg
                                                        class="w-5 h-5 text-green-400"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20"
                                                        fill="currentColor"
                                                        aria-hidden="true"
                                                    >
                                                        <path
                                                            fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd"
                                                        ></path>
                                                    </svg>
                                                </div>
                                                <p
                                                    class="ml-3 text-sm text-gray-700"
                                                >
                                                    No. of crew:{{row.no_crew}}
                                                </p>
                                            </li>
                                            <li
                                                class="flex items-start lg:col-span-1"
                                            >
                                                <div class="flex-shrink-0">
                                                    <svg
                                                        class="w-5 h-5 text-green-400"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20"
                                                        fill="currentColor"
                                                        aria-hidden="true"
                                                    >
                                                        <path
                                                            fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd"
                                                        ></path>
                                                    </svg>
                                                </div>
                                                <p
                                                    class="ml-3 text-sm text-gray-700"
                                                >
                                                    No. of cabins:{{row.no_cabins}}
                                                </p>
                                            </li>
                                            <li
                                                class="flex items-start lg:col-span-1"
                                            >
                                                <div class="flex-shrink-0">
                                                    <svg
                                                        class="w-5 h-5 text-green-400"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20"
                                                        fill="currentColor"
                                                        aria-hidden="true"
                                                    >
                                                        <path
                                                            fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                            clip-rule="evenodd"
                                                        ></path>
                                                    </svg>
                                                </div>
                                                <p
                                                    class="ml-3 text-sm text-gray-700"
                                                >
                                                    wheelchair access:{{row.wa}}
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div
                                    class="px-6 py-8 text-center bg-gray-50 lg:flex-shrink-0 lg:flex lg:flex-col lg:justify-center lg:p-12"
                                    style="cursor: auto"
                                >
                                    <img
                                        alt="..."
                                        :src="route('ship.img',row.img)"
                                        class="rounded-lg w-auto align-middle border-none"
                                        style="max-height: 350px"
                                    />
                                </div>
                            </div>
                            <div class="border-t border-gray-300 px-6 py-8 bg-white lg:p-12">
                                <p class=" text-base text-gray-500">
                                    {{ row.description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </GuestLayout>
</template>
