<script setup>
import { Head, Link } from "@inertiajs/vue3";
import registryEditor from "@/Assets/public/icon/registry-editor.png";
import warehouse from "@/Assets/public/icon/warehouse-1.png";
import project from "@/Assets/public/icon/project.png";
import interstateTruck from "@/Assets/public/icon/interstate-truck.png";
import commercialDevelopmentManagement from "@/Assets/public/icon/commercial-development-management.png";
import cargoShip from "@/Assets/public/icon/cargo-ship--v1.png";
import SenderMessage from "@/Components/SenderMessage.vue";
import ReceiverMessage from "@/Components/ReceiverMessage.vue";
import axios from "axios";
import { ref, onMounted } from "vue";
import Pusher from "pusher-js";

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

const chat = ref([]);
const chatBox = ref(true);
const scrollContainer = ref(null);

const ChatBot = () => {
    chatBox.value = !chatBox.value;
};

const form = {
    id: "",
    message: "",
};

window.Echo.channel('mychannel')
    .listen('.myevent', (data) => {
        console.log("Received event:", data);
    });
</script>

<template>
    <Head title="Welcome" />
    <header>
        <nav
            class="bg-gray-200 container mx-auto sm:px-4 px-3 flex justify-between items-center"
        >
            <div class="nav--logo">
                <img
                    src="https://www.tote-m.com/wp-content/uploads/2014/04/company-logo.jpg"
                    width="150px"
                    alt=""
                />
            </div>
            <div class="nav--menu hidden lg:block">
                <a
                    class="mx-2 font-semibold text-gray-700 hover:text-teal-600"
                    href="/"
                    >Our Services</a
                >
                <a
                    class="mx-2 font-semibold text-gray-700 hover:text-teal-600"
                    href="/"
                    >About</a
                >
                <a
                    class="mx-2 font-semibold text-gray-700 hover:text-teal-600"
                    href="/"
                    >News & Events</a
                >
                <a
                    class="mx-2 font-semibold text-gray-700 hover:text-teal-600"
                    href="/"
                    >Contact</a
                >
            </div>
            <div class="nav--cta hidden lg:block">
                <button
                    class="rounded-full bg-main-blue text-white font-semibold text-md hover:text-white py-2 px-4 hover:shadow-2xl hover:border-transparent rounded"
                >
                    +44 744 857321
                </button>
            </div>
            <div class="block lg:hidden">
                <button
                    id="nav-toggle"
                    class="flex items-center px-3 py-2 border rounded text-gray-500 border-blue-500"
                >
                    <svg
                        class="fill-current h-3 w-3"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                    </svg>
                </button>
            </div>
        </nav>
        <div
            class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:hidden pt-0 lg:pt-0 bg-gray-200"
            id="nav-content"
        >
            <ul class="list-reset lg:flex justify-end flex-1 items-center">
                <li class="mr-3 my-3">
                    <a
                        class="mx-2 font-semibold text-gray-700 hover:text-teal-600"
                        href="/"
                        >Our Services</a
                    >
                </li>
                <li class="mr-3 my-3">
                    <a
                        class="mx-2 font-semibold text-gray-700 hover:text-teal-600"
                        href="/"
                        >About</a
                    >
                </li>
                <li class="mr-3 my-3">
                    <a
                        class="mx-2 font-semibold text-gray-700 hover:text-teal-600"
                        href="/"
                        >News & Events</a
                    >
                </li>
                <li class="mr-3 mt-3">
                    <a
                        class="mx-2 font-semibold text-gray-700 hover:text-teal-600"
                        href="/"
                        >Contact</a
                    >
                </li>
            </ul>
        </div>
    </header>
    <main class="bg-gray">
        <section class="section--hero relative">
            <div class="flex mb-4 absolute top-0 left-0 h-full w-full z-1">
                <div
                    class="w-1/3 hidden lg:block bg-main-blue section--hero__height"
                ></div>
                <div
                    class="hero--image w-full lg:w-2/3 bg-gray-500 section--hero__height bg-cover relative"
                >
                    <div
                        class="absolute top-0 left-0 w-full h-full bg-hero-gradient"
                    ></div>
                </div>
            </div>
            <div class="absolute top-0 left-0 h-full w-full z-2">
                <div class="container mx-auto h-full sm:px-4 px-3">
                    <div class="flex mb-4 h-full items-center">
                        <div class="w-full lg:w-1/2 text-white font-roboto">
                            <h1
                                class="text-4xl sm:text-5xl md:text-6xl font-bold tracking-wide leading-tight mb-12"
                            >
                                The South Coast's leading port terminal
                                operators
                            </h1>
                            <p class="font-light text-lg">
                                SCH is the most experienced stevedore in the
                                Port of Southampton and our cargo operations are
                                further enhanced by our own dedicated warehouse
                                close to the Port, providing secure storage
                                supplemented by efficient stock management and
                                distribution.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section--services py-16 sm:my-8">
            <div class="container mx-auto h-full px-3 sm:px-4">
                <h2
                    class="mb-4 font-roboto font-semibold text-lg text-gray-700"
                >
                    OUR SERVICES
                </h2>
                <div
                    class="flex mb-4 flex-wrap shadow-2xl border-light-gray text-main-blue text-center"
                >
                    <div
                        class="w-1/2 lg:w-1/3 bg-white h-64 border-light-gray p-2 flex flex-col justify-center items-center scale-on-hover hover:shadow-md"
                    >
                        <img :src="registryEditor" />
                        <h3 class="font-semibold mt-4 text-xl">
                            DATA MONITORING
                        </h3>
                        <a href="/"
                            ><p
                                class="text-teal-400 hover:text-teal-500 font-semibold text-lg"
                            >
                                See our solution
                            </p></a
                        >
                    </div>
                    <div
                        class="w-1/2 lg:w-1/3 scale-on-hover hover:shadow-xl bg-white h-64 border-light-gray p-2 flex flex-col justify-center items-center"
                    >
                        <img :src="project" />
                        <h3 class="font-semibold mt-4 text-xl">
                            PROJECT MANAGEMENT
                        </h3>
                        <a href="/"
                            ><p
                                class="text-teal-400 hover:text-teal-500 font-semibold text-lg"
                            >
                                See our solution
                            </p></a
                        >
                    </div>
                    <div
                        class="w-1/2 lg:w-1/3 scale-on-hover hover:shadow-xl bg-white h-64 border-light-gray p-2 flex flex-col justify-center items-center"
                    >
                        <img :src="warehouse" />
                        <h3 class="font-semibold mt-4 text-xl">WAREHOUSING</h3>
                        <a href="/"
                            ><p
                                class="text-teal-400 hover:text-teal-500 font-semibold text-lg"
                            >
                                See our solution
                            </p></a
                        >
                    </div>
                    <div
                        class="w-1/2 lg:w-1/3 scale-on-hover hover:shadow-xl bg-main-blue h-64 border-light-gray p-2 flex flex-col justify-center items-center"
                    >
                        <img :src="cargoShip" />
                        <h3 class="text-white font-semibold mt-4 text-xl">
                            SHIPPING
                        </h3>
                        <a href="/"
                            ><p
                                class="text-teal-400 font-semibold text-lg hover:text-teal-500"
                            >
                                See our solution
                            </p></a
                        >
                    </div>
                    <div
                        class="w-1/2 lg:w-1/3 scale-on-hover hover:shadow-xl bg-white h-64 border-light-gray p-2 flex flex-col justify-center items-center"
                    >
                        <img :src="interstateTruck" />
                        <h3 class="font-semibold mt-4 text-xl">LOGISTICS</h3>
                        <a href="/">
                            <p
                                class="text-teal-400 hoer:text-teal-500 font-semibold text-lg"
                            >
                                See our solution
                            </p>
                        </a>
                    </div>
                    <div
                        class="w-1/2 lg:w-1/3 scale-on-hover hover:shadow-xl bg-white h-64 border-light-gray p-2 flex flex-col justify-center items-center"
                    >
                        <img :src="commercialDevelopmentManagement" />
                        <h3 class="font-semibold mt-4 text-xl">
                            PERSONNEL MANAGEMENT
                        </h3>
                        <a href="/"
                            ><p
                                class="text-teal-400 hover:text-teal-500 font-semibold text-lg"
                            >
                                See our solution
                            </p></a
                        >
                    </div>
                </div>
            </div>
        </section>
        <section class="section--latest-news w-full py-8 sm:my-8">
            <div class="container mx-auto px-3 sm:px-4 h-full">
                <div class="flex mb-4 h-full w-full flex-col sm:flex-row">
                    <div
                        class="w-full md:w-7/12 section--latest-news__image h-full bg-cover relative bg-center"
                    ></div>
                    <div class="w-full md:w-4/12 relative">
                        <a href="">
                            <div
                                class="bg-white absolute bottom-0 left--4 shadow-full px-6 py-8 max-w-sm min-w-xl font-roboto scale-on-hover"
                            >
                                <h3
                                    class="font-semibold text-main-blue text-lg mb-4 font-regular"
                                >
                                    LATEST NEWS
                                </h3>
                                <h4
                                    class="text-2xl font-semibold tracking-tight text-gray-900 mb-4"
                                >
                                    SUMMER OF CRUISE SHIP FIRSTS AT LIVERPOOL
                                </h4>
                                <p class="text-gray-700">
                                    Stevedores and port terminal management
                                    specialists SCH have been awarded the
                                    contract for a further three years with
                                    Liverpool City Council to handle all cruise
                                    ships calling at Liverpool Cruise Terminal
                                    (LCT).
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="section--working w-full my-8 py-16">
            <div class="container mx-auto px-3 sm:px-4 h-full">
                <div class="flex mb-4 h-full flex-col md:flex-row">
                    <div class="w-full md:w-1/2 relative order-2 md:order-2">
                        <a href="">
                            <div
                                class="bg-white absolute bottom-0 right--4 shadow-full px-6 py-8 max-w-xl min-w-xl font-roboto scale-on-hover"
                            >
                                <h3
                                    class="font-semibold text-main-blue text-lg mb-4 font-regular"
                                >
                                    OPPORTUNITIES
                                </h3>
                                <h4
                                    class="text-3xl font-semibold tracking-tight text-gray-900 mb-4"
                                >
                                    Working with us
                                </h4>
                                <p class="text-gray-700 mb-4">
                                    Our expertise extends from receiving and
                                    managing cargo at the quayside to ship
                                    planning and the subsequent loading,
                                    discharge and distribution of cargoes.
                                </p>
                                <p class="text-teal-400 font-semibold text-lg">
                                    See open vacancies
                                </p>
                            </div>
                        </a>
                    </div>
                    <div
                        class="w-full md:w-1/2 section--working__image h-full bg-cover order-1 md:order-2"
                    ></div>
                </div>
            </div>
        </section>
        <section class="section--case-study w-full py-16 relative shadow-full">
            <div
                class="absolute h-full w-full top-0 left-0 bg-hero-gradient z-1"
            >
                <div
                    class="container mx-auto h-full w-full relative px-3 sm:px-4"
                >
                    <a href="">
                        <div
                            class="bg-white absolute sm:bottom-0 mt-8 sm:mt-0 right-0 mx-3 sm:mx-0 px-6 py-8 max-w-xl min-w-xl font-roboto scale-on-hover"
                        >
                            <h3
                                class="font-semibold text-main-blue text-lg mb-4 font-regular"
                            >
                                CASE STUDY
                            </h3>
                            <h4
                                class="text-3xl font-semibold tracking-tight text-gray-900 mb-4"
                            >
                                Warehouse peak season
                            </h4>
                            <p class="text-gray-700 mb-4">
                                Our expertise extends from receiving and
                                managing cargo at the quayside to ship planning
                                and the subsequent loading, discharge and
                                distribution of cargoes.
                            </p>
                            <p class="text-teal-400 font-semibold text-lg">
                                More information
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <footer class="h-4 pb-8 pt-32">
            <p
                class="text-center font-roboto text-sm font-regular text-gray-700"
            >
                2019 Landing Page
            </p>
        </footer>
    </main>
    <div class="fixed bottom-0 right-0">
        <div class="flex space-x-4">
            <div
                v-if="chatBox"
                class="w-80 h-96 flex flex-col border shadow-md bg-white"
            >
                <div class="flex items-center justify-between border-b p-2">
                    <!-- user info -->
                    <div class="flex items-center">
                        <img
                            class="rounded-full w-10 h-10"
                            src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        />
                        <div class="pl-2">
                            <div class="font-semibold">
                                <a class="hover:underline" href="#">asds</a>
                            </div>
                            <div class="text-xs text-gray-600">Online</div>
                        </div>
                    </div>
                    <!-- end user info -->
                    <!-- chat box action -->
                    <div>
                        <a
                            class="inline-flex hover:bg-indigo-50 rounded-full p-2"
                            href="#"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"
                                />
                            </svg>
                        </a>

                        <button
                            class="inline-flex hover:bg-indigo-50 rounded-full p-2"
                            type="button"
                            @click="ChatBot"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </button>
                    </div>
                    <!-- end chat box action -->
                </div>

                <div
                    class="flex-1 px-4 py-4 overflow-y-auto"
                    ref="scrollContainer"
                >
                    <!-- chat message -->
                    <template v-for="(row, index) in chat">
                        <template v-if="row.who_inserted === 'User'">
                            <SenderMessage :value="row.message" />
                        </template>
                        <template v-else>
                            <ReceiverMessage :value="row.message" />
                        </template>
                    </template>
                    <!-- end chat message -->
                </div>

                <div class="flex items-center border-t p-2">
                    <!-- chat input action -->
                    <div>
                        <button
                            class="inline-flex hover:bg-indigo-50 rounded-full p-2"
                            type="button"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                                />
                            </svg>
                        </button>
                    </div>
                    <!-- end chat input action -->

                    <div class="w-full mx-2">
                        <input
                            class="w-full rounded-full border border-gray-200"
                            type="text"
                            placeholder="Aa"
                            autofocus
                            v-model="form.message"
                        />
                    </div>

                    <!-- chat send action -->

                    <div>
                        <button
                            class="inline-flex hover:bg-indigo-50 rounded-full p-2"
                            type="button"
                            @click="submitForm"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                                />
                            </svg>
                        </button>
                    </div>

                    <!-- end chat send action -->
                </div>
            </div>
        </div>
    </div>
</template>

<style>
@import url("https://fonts.googleapis.com/css?family=Roboto&display=swap");

:root {
    --main-blue: #2d3091;
}

.bg-gray {
    background-color: #f1f1f1;
}

.font-roboto {
    font-family: "Roboto", sans-serif;
}

.bg-main-blue {
    background-color: var(--main-blue);
}

.text-main-blue {
    color: var(--main-blue);
}

.scale-on-hover {
    transition: transform 250ms ease;
}

.scale-on-hover:hover {
    transform: scale(1.01);
}

.left--4 {
    left: -6rem;
}

.right--4 {
    right: -6rem;
}

.shadow-full {
    box-shadow: 0 0 32px rgba(0, 0, 0, 0.2);
}

.bg-hero-gradient {
    background: #0575e6; /* fallback for old browsers */
    background: -webkit-linear-gradient(
        to right,
        rgba(2, 28, 121, 0.8),
        rgba(5, 118, 230, 0.5)
    ); /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(
        to right,
        rgba(2, 28, 121, 0.8),
        rgba(5, 118, 230, 0.5)
    ); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}

.bg-gray-200 {
    background-color: #ffffff;
}

.border-light-gray {
    border: 1px solid #f1f1f1;
}

.section--hero {
    min-height: calc(80vh - 5rem);
}
.section--hero__height {
    min-height: calc(80vh - 5rem);
}
.hero--image {
    background-image: url("@/Assets/public/img/landing-top.jpeg");
}

.section--latest-news {
    height: 600px;
}

.section--working {
    height: 600px;
}

.section--working__image {
    background-image: url("@/Assets/public/img/work_with_us.jpeg");
}

.section--latest-news__image {
    background-image: url("@/Assets/public/img/ship.jpeg");
}

.min-w-xl {
    min-width: 18rem;
}

.section--case-study {
    height: 500px;
    background-image: url("@/Assets/public/img/warehouse.jpeg");
}

@media (max-width: 640px) {
    .left--4 {
        left: 0;
        bottom: -4rem;
        background-color: rgba(255, 255, 255, 0.95);
    }
}

@media (max-width: 768px) {
    .right--4 {
        right: 0;
        bottom: -4rem;
        background-color: rgba(255, 255, 255, 0.95);
    }
}
</style>
