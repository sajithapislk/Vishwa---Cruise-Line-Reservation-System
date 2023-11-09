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
import GuestLayout from "@/Layouts/GuestLayout2.vue";
import clickSound from "@/Assets/sound/new_message.wav";

const props = defineProps({
    user_id:String
});

const btn = ref(null);
const menu = ref(null);
const isMenuHidden = ref(true);

onMounted(() => {
    btn.value = document.querySelector("button.mobile-menu-button");
    menu.value = document.querySelector(".mobile-menu");
});

const toggleMenu = () => {
    menu.value.classList.toggle("hidden");
};

const chat = ref([]);
const chatBox = ref(true);

const ChatBot = () => {
    chatBox.value = !chatBox.value;
};

const form = {
    message: "",
};

if(props.user_id){
    window.Echo.channel(`chat.${props.user_id}`).listen(
        ".customer-supporter-new-message",
        (data) => {
            const audio = new Audio(clickSound);
            audio.play();

            console.log(data);
            chat.value.push(data.chat);
        }
    );
}
function submitForm() {
    axios
        .post(route("chat.store"), form)
        .then((response) => {
            chat.value.push(response.data);
            form.message = "";
        })
        .catch((error) => {
            console.log(error);
        });
}
</script>

<template>
    <Head title="Welcome" />

    <GuestLayout>
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
                                    World Largest Online Cruise Reservation
                                                    <br>Enjoy Your Vacation With Best Deals
                                </h1>
                                <p class="font-light text-lg">
                                    Cruiselinereservation.com provides a diverse range of cruise options to cater to a wide variety of travelers with varying preferences and financial constraints. Their offerings are suitable for solo adventurers, families, and those interested in both luxurious and more budget-friendly cruise experiences. With over 20 different cruise lines to choose from, including Carnival Cruises, Royal Caribbean Cruises, MSC Cruises, Celebrity Cruises, Disney Cruises, and more, they offer a comprehensive selection.
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
                    CRUISE DESTINATIONS
                    </h2>
                    <div
                        class="flex mb-4 flex-wrap shadow-2xl border-light-gray text-main-blue text-center"
                    >
                        <div
                            class="w-1/2 lg:w-1/3 bg-white h-64 border-light-gray p-2 flex flex-col justify-center items-center scale-on-hover hover:shadow-md"
                        >
                            <img :src="registryEditor" />
                            <h3 class="font-semibold mt-4 text-xl">
                                CRUISE LINES
                            </h3>
                            <Link href="/"
                                ><p
                                    class="text-teal-400 hover:text-teal-500 font-semibold text-lg"
                                >
                                    See our solution
                                </p></Link
                            >
                        </div>
                        <div
                            class="w-1/2 lg:w-1/3 scale-on-hover hover:shadow-xl bg-white h-64 border-light-gray p-2 flex flex-col justify-center items-center"
                        >
                            <img :src="project" />
                            <h3 class="font-semibold mt-4 text-xl">
                                CRUISE SHIPS
                            </h3>
                            <Link href="/"
                                ><p
                                    class="text-teal-400 hover:text-teal-500 font-semibold text-lg"
                                >
                                    See our solution
                                </p></Link
                            >
                        </div>
                        <div
                            class="w-1/2 lg:w-1/3 scale-on-hover hover:shadow-xl bg-white h-64 border-light-gray p-2 flex flex-col justify-center items-center"
                        >
                            <img :src="warehouse" />
                            <h3 class="font-semibold mt-4 text-xl">
                                DEPARTURE PORTS
                            </h3>
                            <Link href="/"
                                ><p
                                    class="text-teal-400 hover:text-teal-500 font-semibold text-lg"
                                >
                                    See our solution
                                </p></Link
                            >
                        </div>
                        <div
                            class="w-1/2 lg:w-1/3 scale-on-hover hover:shadow-xl bg-main-blue h-64 border-light-gray p-2 flex flex-col justify-center items-center"
                        >
                            <img :src="cargoShip" />
                            <h3 class="text-white font-semibold mt-4 text-xl">
                                SHIPPING
                            </h3>
                            <Link href="/"
                                ><p
                                    class="text-teal-400 font-semibold text-lg hover:text-teal-500"
                                >
                                    See our solution
                                </p></Link
                            >
                        </div>
                        <div
                            class="w-1/2 lg:w-1/3 scale-on-hover hover:shadow-xl bg-white h-64 border-light-gray p-2 flex flex-col justify-center items-center"
                        >
                            <img :src="interstateTruck" />
                            <h3 class="font-semibold mt-4 text-xl">
                                TODAY'S TOP
                            </h3>
                            <Link href="/">
                                <p
                                    class="text-teal-400 hoer:text-teal-500 font-semibold text-lg"
                                >
                                    See our solution
                                </p>
                            </Link>
                        </div>
                        <div
                            class="w-1/2 lg:w-1/3 scale-on-hover hover:shadow-xl bg-white h-64 border-light-gray p-2 flex flex-col justify-center items-center"
                        >
                            <img :src="commercialDevelopmentManagement" />
                            <h3 class="font-semibold mt-4 text-xl">
                                CRUISE DEALS
                            </h3>
                            <Link href="/"
                                ><p
                                    class="text-teal-400 hover:text-teal-500 font-semibold text-lg"
                                >
                                    See our solution
                                </p></Link
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
                            <Link href="">
                                <div
                                    class="bg-white absolute bottom-0 left--4 shadow-full px-6 py-8 max-w-sm min-w-xl font-roboto scale-on-hover"
                                >
                                    <h3
                                        class="font-semibold text-main-blue text-2xl mb-4 font-regular"
                                    >
                                    TOP CRUISE LINES
                                    </h3>

                                    <p class="text-gray-700">
                                        Experience the pinnacle of cruise travel with our top cruise lines. From the elegance of luxury liners to the family-friendly fun of well-known names, our curated selection ensures the perfect cruise for every traveler. Unwind in opulent staterooms, savor gourmet cuisine, and enjoy world-class entertainment as you embark on a journey with cruise lines renowned for exceptional service and unforgettable experiences.                                  </p>
                                </div>
                            </Link>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section--working w-full my-8 py-16">
                <div class="container mx-auto px-3 sm:px-4 h-full">
                    <div class="flex mb-4 h-full flex-col md:flex-row">
                        <div
                            class="w-full md:w-1/2 relative order-2 md:order-2"
                        >
                            <Link href="">
                                <div
                                    class="bg-white absolute bottom-0 right--4 shadow-full px-6 py-8 max-w-xl min-w-xl font-roboto scale-on-hover"
                                >
                                    <h3
                                        class="font-semibold text-main-blue text-2xl mb-4 font-regular"
                                    >
                                    TOP CRUISE DESTINATIONS
                                    </h3>

                                    <p class="text-gray-700 mb-4">
                                        Explore the world's most enticing cruise destinations with us. From the idyllic Caribbean beaches and breathtaking Alaskan wilderness to the historic charm of the Mediterranean and the exotic allure of the South Pacific, our cruises offer an unforgettable blend of adventure and relaxation. Discover stunning landscapes, vibrant cultures, and unique experiences on every voyage. Join us as we set sail to these top cruise destinations, where your dream vacation becomes a reality.
                                    </p>
                                    <p
                                        class="text-teal-400 font-semibold text-lg"
                                    >
                                        See open vacancies
                                    </p>
                                </div>
                            </Link>
                        </div>
                        <div
                            class="w-full md:w-1/2 section--working__image h-full bg-cover order-1 md:order-2"
                        ></div>
                    </div>
                </div>
            </section>
            <section
                class="section--case-study w-full py-16 relative shadow-full"
            >
                <div
                    class="absolute h-full w-full top-0 left-0 bg-hero-gradient z-1"
                >
                    <div
                        class="container mx-auto h-full w-full relative px-3 sm:px-4"
                    >
                        <Link href="">
                            <div
                                class="bg-white absolute sm:bottom-0 mt-8 sm:mt-0 right-0 mx-3 sm:mx-0 px-6 py-8 max-w-xl min-w-xl font-roboto scale-on-hover"
                            >
                                <h3
                                    class="font-semibold text-main-blue text-2xl mb-4 font-regular"
                                >
                                    CASE STUDY
                                </h3>

                                <p class="text-gray-700 mb-4">
                                    Unlock incredible savings on special cruise deals with our exclusive offers and discounts. Whether you're seeking a romantic getaway, a family adventure, or a luxurious escape, our special cruise deals cater to every traveler. From last-minute offers to early booking discounts, we make dream cruises more accessible than ever. Don't miss the chance to embark on an extraordinary journey while keeping your budget in check. Explore our special cruise offers today and set sail on an unforgettable voyage at an unbeatable value.
                                </p>
                                <p class="text-teal-400 font-semibold text-lg">
                                    More information
                                </p>
                            </div>
                        </Link>
                    </div>
                </div>
            </section>
        </main>
        <button
            class="fixed bottom-4 right-4 inline-flex items-center justify-center text-sm font-medium disabled:pointer-events-none disabled:opacity-50 border rounded-full w-16 h-16 bg-black hover:bg-gray-700 m-0 cursor-pointer border-gray-200 bg-none p-0 normal-case leading-5 hover:text-gray-900"
            type="button"
            aria-haspopup="dialog"
            aria-expanded="false"
            data-state="closed"
            @click="ChatBot"
        >
            <svg
                xmlns=" http://www.w3.org/2000/svg"
                width="30"
                height="40"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="text-white block border-gray-200 align-middle"
            >
                <path
                    d="m3 21 1.9-5.7a8.5 8.5 0 1 1 3.8 3.8z"
                    class="border-gray-200"
                ></path>
            </svg>
        </button>

        <div
            v-if="chatBox"
            style="
                box-shadow: 0 0 #0000, 0 0 #0000, 0 1px 2px 0 rgb(0 0 0 / 0.05);
            "
            class="fixed bottom-[calc(4rem+1.5rem)] right-0 mr-4 bg-white p-6 rounded-lg border border-[#e5e7eb] w-[440px] h-[634px]"
        >
            <!-- Heading -->
            <div class="flex flex-col space-y-1.5 pb-6">
                <h2 class="font-semibold text-lg tracking-tight">Customer Support</h2>
            </div>

            <!-- Chat Container -->
            <div class="pr-4 h-[474px]" style="min-width: 100%; display: table">
                <h1  v-if="!$page.props.auth.user">Sign in first</h1>

                <template  v-for="(row, index) in chat">
                    <template v-if="row.who_inserted === 'User'">
                        <SenderMessage :value="row.msg" />
                    </template>
                    <template v-else>
                        <ReceiverMessage :value="row.msg" />
                    </template>
                </template>
            </div>
            <!-- Input box  -->
            <div  v-if="$page.props.auth.user" class="flex items-center pt-0">
                <form @submit.prevent="submitForm" class="flex items-center justify-center w-full space-x-2">
                    <input
                        class="flex h-10 w-full rounded-md border border-[#e5e7eb] px-3 py-2 text-sm placeholder-[#6b7280] focus:outline-none focus:ring-2 focus:ring-[#9ca3af] disabled:cursor-not-allowed disabled:opacity-50 text-[#030712] focus-visible:ring-offset-2"
                        placeholder="Type your message"
                        v-model="form.message"
                    />
                    <button

                        class="inline-flex items-center justify-center rounded-md text-sm font-medium text-[#f9fafb] disabled:pointer-events-none disabled:opacity-50 bg-black hover:bg-[#111827E6] h-10 px-4 py-2"
                    >
                        Send
                    </button>
                </form>
            </div>
        </div>
    </GuestLayout>
</template>

<style>
@import url("https://fonts.googleapis.com/css?family=Roboto&display=swap");

:root {
    --main-blue: #f9c805;
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
    /*background: #c4c4c4; /* fallback for old browsers */
   /* background: -webkit-linear-gradient(
        to right,
        rgba(2, 28, 121, 0.8),
        rgba(5, 118, 230, 0.5)
    ); /* Chrome 10-25, Safari 5.1-6 */
    /*background: linear-gradient(
        to right,
        rgba(2, 28, 121, 0.8),
        rgba(5, 118, 230, 0.5)
    ); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}

.bg-gray-200 {
   background-color: #ffffff;/* */
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
