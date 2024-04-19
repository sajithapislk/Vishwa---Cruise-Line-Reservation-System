<script setup>
import { ref } from "vue";
import treasure_map from "@/assets/svg/treasure_map.svg";
import { Head, Link, useForm } from "@inertiajs/vue3";
import axios from "axios";
import GuestLayout from "@/Layouts/GuestLayout2.vue";
import Modal from "@/Components/Modal.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import CheckBoxColor from "@/Components/CheckBoxColor.vue";

import "swiper/css";
const props = defineProps({
    upcomingDeals: Array,
    ships: Array,
    ports: Array,
    packages: Array,
});
const list = ref(props.upcomingDeals);

const bookModal = ref(false);
const roomModal = ref(false);
const shipModal = ref(false);

const shipImg = ref("");
const roomImg = ref("");
const total = ref(0.0);
const price = ref(0.0);
const tax = ref(0.0);

const filterForm = useForm({
    ship_id: "",
    depart_id: "",
    arrive_id: "",
    depart_at: "",
    is_d: false,
    is_bl: false,
    is_en: false,
    is_c: false,
    is_ona: false,
    is_outa: false,
    is_kt: false,
    is_w: false,
    is_s: false,
});

const filter = () => {
    axios
        .post(route("upcoming-reservations.filter"), filterForm)
        .then((res) => {
            list.value = res.data;
            console.log(res.data);
        })
        .catch((error) => console.log(error));
};

const paypalFrom = useForm({
    id: "",
    qty: 0,
    processing: false,
});

const ModalBook = (data) => {
    paypalFrom.reset();
    if (typeof data !== "undefined" && !(data instanceof PointerEvent)) {
        paypalFrom.id = data.id;
        price.value = data.price;
        tax.value = data.tax;
        console.log(paypalFrom.cd_id);
    }
    bookModal.value = !bookModal.value;
};
const ModalRoom = (img) => {
    if (typeof img !== "undefined" && !(img instanceof PointerEvent)) {
        roomImg.value = img;
    }
    roomModal.value = !roomModal.value;
};
const ModalShip = (img) => {
    if (typeof img !== "undefined" && !(img instanceof PointerEvent)) {
        shipImg.value = img;
    }
    shipModal.value = !shipModal.value;
};
function bookPayment() {
    axios
        .get(route("processTransaction", paypalFrom))
        .then((response) => {
            // Redirect the user to the PayPal payment page
            window.location.href = response.data;
            // window.location.href = response.data;
        })
        .catch((error) => {
            window.location.href = route("login");
        });
}

function getImagePath(dp_id, ap_id) {
    const images = import.meta.globEager("./img/map/*.jpg");
    const imageKey = `./img/map/${dp_id}_to_${ap_id}.jpg`;

    const image = images[imageKey];

    if (!image) {
        console.error(`Image ${imageKey} not found.`);
        return ""; // or a default image path
    }

    return image.default;
}
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
                                        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6"
                                    >
                                        <div class="flex flex-col">
                                            <label
                                                for="status"
                                                class="font-medium text-sm text-stone-600"
                                                >Ship</label
                                            >

                                            <select
                                                v-model="filterForm.ship_id"
                                                id="status"
                                                class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-300 focus:ring focus:ring-orange-200 focus:ring-opacity-50"
                                            >
                                                <option value="">All</option>
                                                <option
                                                    v-for="row in ships"
                                                    :value="row.id"
                                                >
                                                    {{ row.name }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="flex flex-col">
                                            <label
                                                for="status"
                                                class="font-medium text-sm text-stone-600"
                                                >Departure port</label
                                            >

                                            <select
                                                v-model="filterForm.depart_id"
                                                id="status"
                                                class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-300 focus:ring focus:ring-orange-200 focus:ring-opacity-50"
                                            >
                                                <option value="">All</option>
                                                <option
                                                    v-for="row in ports"
                                                    :value="row.id"
                                                >
                                                    {{ row.name }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="flex flex-col">
                                            <label
                                                for="status"
                                                class="font-medium text-sm text-stone-600"
                                                >arrive port</label
                                            >

                                            <select
                                                v-model="filterForm.arrive_id"
                                                id="status"
                                                class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-300 focus:ring focus:ring-orange-200 focus:ring-opacity-50"
                                            >
                                                <option>All</option>
                                                <option
                                                    v-for="row in ports"
                                                    :value="row.id"
                                                >
                                                    {{ row.name }}
                                                </option>
                                            </select>
                                        </div>

                                        <div class="flex flex-col">
                                            <label
                                                for="depart_at"
                                                class="font-medium text-sm text-stone-600"
                                                >date</label
                                            >
                                            <input
                                                v-model="filterForm.depart_at"
                                                type="date"
                                                id="depart_at"
                                                class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-300 focus:ring focus:ring-orange-200 focus:ring-opacity-50"
                                            />
                                        </div>
                                        <div class="flex flex-col col-span-4">
                                            <label
                                                for="depart_at"
                                                class="font-medium text-sm text-stone-600"
                                                >Select facilities you want</label
                                            >
                                            <ul>
                                                <CheckBoxColor
                                                    id="is_d"
                                                    name="Dining"
                                                    v-model:checked="
                                                        filterForm.is_d
                                                    "
                                                />
                                                <CheckBoxColor
                                                    id="is_bl"
                                                    name="Bars & Lounges"
                                                    v-model:checked="
                                                        filterForm.is_bl
                                                    "
                                                />
                                                <CheckBoxColor
                                                    id="is_en"
                                                    name="Entertainment & Nightlife"
                                                    v-model:checked="
                                                        filterForm.is_en
                                                    "
                                                />
                                                <CheckBoxColor
                                                    id="is_c"
                                                    name="Casino"
                                                    v-model:checked="
                                                        filterForm.is_c
                                                    "
                                                />
                                                <CheckBoxColor
                                                    id="is_ona"
                                                    name="Onboard Activities"
                                                    v-model:checked="
                                                        filterForm.is_ona
                                                    "
                                                />
                                                <CheckBoxColor
                                                    id="is_outa"
                                                    name="Outdoor Activities"
                                                    v-model:checked="
                                                        filterForm.is_outa
                                                    "
                                                />
                                                <CheckBoxColor
                                                    id="is_kt"
                                                    name="Kids & Teens"
                                                    v-model:checked="
                                                        filterForm.is_kt
                                                    "
                                                />
                                                <CheckBoxColor
                                                    id="is_w"
                                                    name="Wellness"
                                                    v-model:checked="
                                                        filterForm.is_w
                                                    "
                                                />
                                                <CheckBoxColor
                                                    id="is_s"
                                                    name="Shopping"
                                                    v-model:checked="
                                                        filterForm.is_s
                                                    "
                                                />
                                            </ul>
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
                                    <div class="mt-8">
                                        <div class="flex items-center">
                                            <h4
                                                class="flex-shrink-0 pr-4 text-sm font-semibold tracking-wider text-indigo-600 uppercase bg-white"
                                            >
                                                Package {{ row.package.name }}
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
                                                v-if="row.package.is_d"
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
                                                    Dining
                                                </p>
                                            </li>
                                            <li
                                                class="flex items-start lg:col-span-1"
                                                v-if="row.package.is_bl"
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
                                                    Bars & Lounges
                                                </p>
                                            </li>
                                            <li
                                                class="flex items-start lg:col-span-1"
                                                v-if="row.package.is_en"
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
                                                    Entertainment & Nightlife
                                                </p>
                                            </li>
                                            <li
                                                class="flex items-start lg:col-span-1"
                                                v-if="row.package.is_c"
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
                                                    Casino
                                                </p>
                                            </li>
                                            <li
                                                class="flex items-start lg:col-span-1"
                                                v-if="row.package.is_ona"
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
                                                    Onboard Activities
                                                </p>
                                            </li>
                                            <li
                                                class="flex items-start lg:col-span-1"
                                                v-if="row.package.is_outa"
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
                                                    Outdoor Activities
                                                </p>
                                            </li>
                                            <li
                                                class="flex items-start lg:col-span-1"
                                                v-if="row.package.is_kt"
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
                                                    Kids & Teens
                                                </p>
                                            </li>
                                            <li
                                                class="flex items-start lg:col-span-1"
                                                v-if="row.package.is_w"
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
                                                    Wellness
                                                </p>
                                            </li>
                                            <li
                                                class="flex items-start lg:col-span-1"
                                                v-if="row.package.is_s"
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
                                                    Shopping
                                                </p>
                                            </li>
                                        </ul>

                                        <div
                                            class="flex items-start lg:col-span-1 mt-10"
                                        >
                                            <div class="flex-shrink-0">
                                                <svg
                                                    width="23"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    viewBox="0 0 40 40"
                                                >
                                                    <path
                                                        fill="#fff"
                                                        d="M8.5 2.5H31.5V37.5H8.5z"
                                                    />
                                                    <path
                                                        fill="#4788c7"
                                                        d="M31,3v34H9V3H31 M32,2H8v36h24V2L32,2z"
                                                    />
                                                    <path
                                                        fill="#98ccfd"
                                                        d="M8 5H32V35H8z"
                                                    />
                                                    <path
                                                        fill="#fff"
                                                        d="M28.5 34.581L28.5 5.419 38.5 1.718 38.5 38.282z"
                                                    />
                                                    <path
                                                        fill="#4788c7"
                                                        d="M38,2.436v35.127l-9-3.331V5.768L38,2.436 M39,1L28,5.071v29.857L39,39V1L39,1z"
                                                    />
                                                    <path
                                                        fill="#b6dcfe"
                                                        d="M36 16L36 5.309 31 7.16 31 16zM31 18L31 32.84 36 34.691 36 18z"
                                                    />
                                                    <g>
                                                        <path
                                                            fill="#fff"
                                                            d="M1.5 1.718L11.5 5.419 11.5 34.581 1.5 38.282z"
                                                        />
                                                        <path
                                                            fill="#4788c7"
                                                            d="M2,2.436l9,3.331v28.465l-9,3.331V2.436 M1,1v38l11-4.071V5.071L1,1L1,1z"
                                                        />
                                                    </g>
                                                    <g>
                                                        <path
                                                            fill="#b6dcfe"
                                                            d="M4 16L4 5.309 9 7.16 9 16zM9 18L9 32.84 4 34.691 4 18z"
                                                        />
                                                    </g>
                                                </svg>
                                            </div>
                                            <p
                                                class="ml-3 text-sm text-gray-700"
                                            >
                                                Room View :
                                                {{ row.room.room_view }}
                                                <PrimaryButton
                                                    @click="
                                                        ModalRoom(row.room.img)
                                                    "
                                                    >View</PrimaryButton
                                                >
                                            </p>
                                            <p
                                                class="ml-3 text-sm text-gray-700"
                                            >
                                                Ship View :
                                                {{ row.ship.name }}
                                                <PrimaryButton
                                                    @click="
                                                        ModalShip(row.ship.img)
                                                    "
                                                    >View</PrimaryButton
                                                >
                                            </p>
                                        </div>

                                        <div
                                            class="flex items-start lg:col-span-1 mt-10"
                                        >
                                            <div class="flex-shrink-0">
                                                <svg
                                                    width="23"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    viewBox="0 0 48 48"
                                                >
                                                    <path
                                                        fill="#ffecb3"
                                                        d="M30,10L18,6L6,10v32l12-4l12,4l12-4V6L30,10z"
                                                    />
                                                    <path
                                                        fill="#ffe082"
                                                        d="M18,6v32l12,4V10L18,6z"
                                                    />
                                                    <path
                                                        fill="#8d6e63"
                                                        d="M26.9 15.5c0 .8-.7 1.5-1.5 1.5s-1.5-.7-1.5-1.5.7-1.5 1.5-1.5S26.9 14.7 26.9 15.5zM22.5 18.4c0 .8-.7 1.5-1.5 1.5s-1.5-.7-1.5-1.5c0-.8.7-1.5 1.5-1.5S22.5 17.6 22.5 18.4zM18.1 19.9c0 .8-.7 1.5-1.5 1.5-.8 0-1.5-.7-1.5-1.5 0-.8.7-1.5 1.5-1.5C17.4 18.4 18.1 19.1 18.1 19.9zM31.4 15.5c0 .8-.7 1.5-1.5 1.5s-1.5-.7-1.5-1.5S29 14 29.9 14 31.4 14.7 31.4 15.5zM35.8 17c0 .8-.7 1.5-1.5 1.5s-1.5-.7-1.5-1.5.7-1.5 1.5-1.5S35.8 16.1 35.8 17zM38.7 19.9c0 .8-.7 1.5-1.5 1.5s-1.5-.7-1.5-1.5c0-.8.7-1.5 1.5-1.5S38.7 19.1 38.7 19.9zM38.7 24.3c0 .8-.7 1.5-1.5 1.5s-1.5-.7-1.5-1.5c0-.8.7-1.5 1.5-1.5S38.7 23.5 38.7 24.3zM38.7 28.8c0 .8-.7 1.5-1.5 1.5s-1.5-.7-1.5-1.5.7-1.5 1.5-1.5S38.7 27.9 38.7 28.8zM35.8 31.7c0 .8-.7 1.5-1.5 1.5s-1.5-.7-1.5-1.5.7-1.5 1.5-1.5S35.8 30.9 35.8 31.7zM31.4 31.7c0 .8-.7 1.5-1.5 1.5s-1.5-.7-1.5-1.5.7-1.5 1.5-1.5S31.4 30.9 31.4 31.7zM26.9 30.2c0 .8-.7 1.5-1.5 1.5s-1.5-.7-1.5-1.5.7-1.5 1.5-1.5S26.9 29.4 26.9 30.2zM22.5 31.7c0 .8-.7 1.5-1.5 1.5s-1.5-.7-1.5-1.5.7-1.5 1.5-1.5S22.5 30.9 22.5 31.7zM13.7 18.4c0 .8-.7 1.5-1.5 1.5-.8 0-1.5-.7-1.5-1.5 0-.8.7-1.5 1.5-1.5C13 16.9 13.7 17.6 13.7 18.4z"
                                                    />
                                                    <path
                                                        fill="#f44336"
                                                        d="M16.6,35.7c-0.3,0-0.5-0.1-0.7-0.3l-4.4-4.4c-0.4-0.4-0.4-1,0-1.4s1-0.4,1.4,0l4.4,4.4 c0.4,0.4,0.4,1,0,1.4C17.1,35.6,16.8,35.7,16.6,35.7z"
                                                    />
                                                    <path
                                                        fill="#f44336"
                                                        d="M12.2,35.7c-0.3,0-0.5-0.1-0.7-0.3c-0.4-0.4-0.4-1,0-1.4l4.4-4.4c0.4-0.4,1-0.4,1.4,0s0.4,1,0,1.4 l-4.4,4.4C12.7,35.6,12.4,35.7,12.2,35.7z"
                                                    />
                                                </svg>
                                            </div>
                                            <p
                                                class="ml-3 text-sm text-gray-700"
                                            >
                                                Departure Port :
                                                {{ row.departure_port.name }}
                                            </p>
                                        </div>
                                        <div
                                            class="flex items-start lg:col-span-1"
                                        >
                                            <div class="flex-shrink-0">
                                                <svg
                                                    width="23"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    viewBox="0 0 48 48"
                                                >
                                                    <path
                                                        fill="#ffecb3"
                                                        d="M30,10L18,6L6,10v32l12-4l12,4l12-4V6L30,10z"
                                                    />
                                                    <path
                                                        fill="#ffe082"
                                                        d="M18,6v32l12,4V10L18,6z"
                                                    />
                                                    <path
                                                        fill="#8d6e63"
                                                        d="M26.9 15.5c0 .8-.7 1.5-1.5 1.5s-1.5-.7-1.5-1.5.7-1.5 1.5-1.5S26.9 14.7 26.9 15.5zM22.5 18.4c0 .8-.7 1.5-1.5 1.5s-1.5-.7-1.5-1.5c0-.8.7-1.5 1.5-1.5S22.5 17.6 22.5 18.4zM18.1 19.9c0 .8-.7 1.5-1.5 1.5-.8 0-1.5-.7-1.5-1.5 0-.8.7-1.5 1.5-1.5C17.4 18.4 18.1 19.1 18.1 19.9zM31.4 15.5c0 .8-.7 1.5-1.5 1.5s-1.5-.7-1.5-1.5S29 14 29.9 14 31.4 14.7 31.4 15.5zM35.8 17c0 .8-.7 1.5-1.5 1.5s-1.5-.7-1.5-1.5.7-1.5 1.5-1.5S35.8 16.1 35.8 17zM38.7 19.9c0 .8-.7 1.5-1.5 1.5s-1.5-.7-1.5-1.5c0-.8.7-1.5 1.5-1.5S38.7 19.1 38.7 19.9zM38.7 24.3c0 .8-.7 1.5-1.5 1.5s-1.5-.7-1.5-1.5c0-.8.7-1.5 1.5-1.5S38.7 23.5 38.7 24.3zM38.7 28.8c0 .8-.7 1.5-1.5 1.5s-1.5-.7-1.5-1.5.7-1.5 1.5-1.5S38.7 27.9 38.7 28.8zM35.8 31.7c0 .8-.7 1.5-1.5 1.5s-1.5-.7-1.5-1.5.7-1.5 1.5-1.5S35.8 30.9 35.8 31.7zM31.4 31.7c0 .8-.7 1.5-1.5 1.5s-1.5-.7-1.5-1.5.7-1.5 1.5-1.5S31.4 30.9 31.4 31.7zM26.9 30.2c0 .8-.7 1.5-1.5 1.5s-1.5-.7-1.5-1.5.7-1.5 1.5-1.5S26.9 29.4 26.9 30.2zM22.5 31.7c0 .8-.7 1.5-1.5 1.5s-1.5-.7-1.5-1.5.7-1.5 1.5-1.5S22.5 30.9 22.5 31.7zM13.7 18.4c0 .8-.7 1.5-1.5 1.5-.8 0-1.5-.7-1.5-1.5 0-.8.7-1.5 1.5-1.5C13 16.9 13.7 17.6 13.7 18.4z"
                                                    />
                                                    <path
                                                        fill="#f44336"
                                                        d="M16.6,35.7c-0.3,0-0.5-0.1-0.7-0.3l-4.4-4.4c-0.4-0.4-0.4-1,0-1.4s1-0.4,1.4,0l4.4,4.4 c0.4,0.4,0.4,1,0,1.4C17.1,35.6,16.8,35.7,16.6,35.7z"
                                                    />
                                                    <path
                                                        fill="#f44336"
                                                        d="M12.2,35.7c-0.3,0-0.5-0.1-0.7-0.3c-0.4-0.4-0.4-1,0-1.4l4.4-4.4c0.4-0.4,1-0.4,1.4,0s0.4,1,0,1.4 l-4.4,4.4C12.7,35.6,12.4,35.7,12.2,35.7z"
                                                    />
                                                </svg>
                                            </div>
                                            <p
                                                class="ml-3 text-sm text-gray-700"
                                            >
                                                Arrival Port :
                                                {{ row.arrival_port.name }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="px-6 py-8 text-center bg-gray-50 lg:flex-shrink-0 lg:flex lg:flex-col lg:justify-center lg:p-12"
                                    style="cursor: auto"
                                >
                                    <img
                                        alt="..."
                                        :src="
                                            getImagePath(row.dp_id, row.ap_id)
                                        "
                                        class="rounded-lg w-auto align-middle border-none"
                                        style="max-height: 350px"
                                    />
                                </div>
                            </div>
                            <div
                                class="sm:flex sm:justify-between sm:items-center px-6 py-8 bg-neutral-400 lg:p-12"
                            >
                                <div>
                                    <!-- <div class="text-lg text-gray-700"><span class="text-gray-900 font-bold">17</span> per person*</div>
                                    <div class="flex items-center">
                                        <div class="flex inline-flex -mx-px">
                                            <svg class="w-4 h-4 mx-px fill-current text-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                                                <path d="M6.43 12l-2.36 1.64a1 1 0 0 1-1.53-1.11l.83-2.75a1 1 0 0 0-.35-1.09L.73 6.96a1 1 0 0 1 .59-1.8l2.87-.06a1 1 0 0 0 .92-.67l.95-2.71a1 1 0 0 1 1.88 0l.95 2.71c.13.4.5.66.92.67l2.87.06a1 1 0 0 1 .59 1.8l-2.3 1.73a1 1 0 0 0-.34 1.09l.83 2.75a1 1 0 0 1-1.53 1.1L7.57 12a1 1 0 0 0-1.14 0z" /></svg>
                                            <svg class="w-4 h-4 mx-px fill-current text-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                                                <path d="M6.43 12l-2.36 1.64a1 1 0 0 1-1.53-1.11l.83-2.75a1 1 0 0 0-.35-1.09L.73 6.96a1 1 0 0 1 .59-1.8l2.87-.06a1 1 0 0 0 .92-.67l.95-2.71a1 1 0 0 1 1.88 0l.95 2.71c.13.4.5.66.92.67l2.87.06a1 1 0 0 1 .59 1.8l-2.3 1.73a1 1 0 0 0-.34 1.09l.83 2.75a1 1 0 0 1-1.53 1.1L7.57 12a1 1 0 0 0-1.14 0z" /></svg>
                                            <svg class="w-4 h-4 mx-px fill-current text-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                                                <path d="M6.43 12l-2.36 1.64a1 1 0 0 1-1.53-1.11l.83-2.75a1 1 0 0 0-.35-1.09L.73 6.96a1 1 0 0 1 .59-1.8l2.87-.06a1 1 0 0 0 .92-.67l.95-2.71a1 1 0 0 1 1.88 0l.95 2.71c.13.4.5.66.92.67l2.87.06a1 1 0 0 1 .59 1.8l-2.3 1.73a1 1 0 0 0-.34 1.09l.83 2.75a1 1 0 0 1-1.53 1.1L7.57 12a1 1 0 0 0-1.14 0z" /></svg>
                                            <svg class="w-4 h-4 mx-px fill-current text-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                                                <path d="M6.43 12l-2.36 1.64a1 1 0 0 1-1.53-1.11l.83-2.75a1 1 0 0 0-.35-1.09L.73 6.96a1 1 0 0 1 .59-1.8l2.87-.06a1 1 0 0 0 .92-.67l.95-2.71a1 1 0 0 1 1.88 0l.95 2.71c.13.4.5.66.92.67l2.87.06a1 1 0 0 1 .59 1.8l-2.3 1.73a1 1 0 0 0-.34 1.09l.83 2.75a1 1 0 0 1-1.53 1.1L7.57 12a1 1 0 0 0-1.14 0z" /></svg>
                                            <svg class="w-4 h-4 mx-px fill-current text-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                                                <path d="M6.43 12l-2.36 1.64a1 1 0 0 1-1.53-1.11l.83-2.75a1 1 0 0 0-.35-1.09L.73 6.96a1 1 0 0 1 .59-1.8l2.87-.06a1 1 0 0 0 .92-.67l.95-2.71a1 1 0 0 1 1.88 0l.95 2.71c.13.4.5.66.92.67l2.87.06a1 1 0 0 1 .59 1.8l-2.3 1.73a1 1 0 0 0-.34 1.09l.83 2.75a1 1 0 0 1-1.53 1.1L7.57 12a1 1 0 0 0-1.14 0z" /></svg>
                                        </div>
                                        <div class="text-gray-600 ml-2 text-sm md:text-base mt-1">28 reviews</div>
                                    </div> -->
                                    <p
                                        class="mt-4 text-gray-500"
                                    >
                                        TAX : ${{ row.tax }}
                                    </p>
                                    <div
                                        class="flex items-center justify-center mt-4 text-5xl font-extrabold text-gray-900"
                                    >
                                        <span>${{ row.price }}</span>
                                    </div>
                                </div>
                                <button
                                    @click="ModalBook(row)"
                                    class="mt-3 sm:mt-0 py-2 px-5 md:py-3 md:px-6 bg-indigo-700 hover:bg-indigo-600 font-bold text-white md:text-lg rounded-lg shadow-md"
                                >
                                    Book now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </GuestLayout>
    <Modal :show="bookModal" @close="ModalBook">
        <div class="p-6">
            <form @submit.prevent="bookPayment">
                <div class="w-full px-3">
                    <label
                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-password"
                    >
                        No of people
                    </label>

                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-email"
                        type="boolean"
                        @input="
                            () => {
                                if (paypalFrom.qty > 5 || paypalFrom.qty < 0) {
                                    paypalFrom.qty = 5;
                                }
                                total = (price * paypalFrom.qty) + tax * paypalFrom.qty;
                                console.log(total);
                            }
                        "
                        v-model="paypalFrom.qty"
                    />
                    <label
                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-password"
                    >
                        Total: {{ total }}
                    </label>
                </div>

                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="ModalBook">
                        Cancel
                    </SecondaryButton>

                    <PrimaryButton
                        class="ml-3"
                        :class="{ 'opacity-25': paypalFrom.processing }"
                        :disabled="paypalFrom.processing"
                        @click="bookPayment"
                    >
                        Payment
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </Modal>
    <Modal :show="roomModal" @close="ModalRoom">
        <img
            alt="..."
            :src="route('ship.room_img', roomImg)"
            class="rounded-lg h-auto max-w-full align-middle border-none"
        />
    </Modal>
    <Modal :show="shipModal" @close="ModalShip">
        <img
            alt="..."
            :src="route('ship.img', shipImg)"
            class="rounded-lg h-auto max-w-full align-middle border-none"
        />
    </Modal>
</template>
