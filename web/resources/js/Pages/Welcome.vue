<script setup>
import { Head, Link } from "@inertiajs/vue3";
import registryEditor from "@/Assets/public/icon/registry-editor.png";
import warehouse from "@/Assets/public/icon/warehouse-1.png";
import project from "@/Assets/public/icon/project.png";
import interstateTruck from "@/Assets/public/icon/interstate-truck.png";
import commercialDevelopmentManagement from "@/Assets/public/icon/commercial-development-management.png";
import cargoShip from "@/Assets/public/icon/cargo-ship--v1.png";
import landingTop from "@/Assets/public/img/landing-top.jpeg";

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
    <header>
        <nav
            class="bg-gray-200 container mx-auto sm:px-4 px-3 sm:my-5 flex justify-between items-center"
        >
            <!-- <div class="nav--logo">
                <img :src="landingTop" width="150px" alt="">
            </div> -->
            <div class="nav--menu hidden lg:block">
                <a
                    class="mx-2 font-semibold text-gray-700 hover:text-teal-600"
                    href="/"
                    >Cruise Line List</a
                >
                <a
                    class="mx-2 font-semibold text-gray-700 hover:text-teal-600"
                    href="/"
                    >Cruise Deals</a
                >
                <a
                    class="mx-2 font-semibold text-gray-700 hover:text-teal-600"
                    href="/"
                    >Cruise Destinations</a
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
                    Login / Register
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
                        >Cruise Line List</a
                    >
                </li>
                <li class="mr-3 my-3">
                    <a
                        class="mx-2 font-semibold text-gray-700 hover:text-teal-600"
                        href="/"
                        >Cruise Deals</a
                    >
                </li>
                <li class="mr-3 my-3">
                    <a
                        class="mx-2 font-semibold text-gray-700 hover:text-teal-600"
                        href="/"
                        >Cruise Destinations</a
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
                                Booking Cruises made easier!
                            </h1>
                            <p class="font-light text-lg">
                                cruise options to suit everyone’s lifestyle and
                                budget. From single travelers to larger
                                families, from luxury to budget friendly, from
                                shorter cruises to a cruise around the world.
                                Whether it’s a family getaway, Honeymoon, River
                                Cruise or Luxury vacation, you can compare
                                cruises from more than 20 cruise lines. Book
                                cheap cruise deals and last minute cruise deals
                                on Carnival Cruises, Royal Caribbean Cruises,
                                MSC Cruises, Celebrity Cruises, Disney Cruises
                                and other top cruises which you will find worth
                                booking. No matter your travel style or budget,
                                there is a cruise for you. Check out our
                                exciting cruise itineraries to book a cruise,
                                including cruises to Alaska, cruises to Panama
                                Canal, cruises to Caribbean, cruises to South
                                America, cruises to Europe and other cruise
                                destinations. Embark on a cruise for the
                                ultimate in luxury and enjoyment as you float in
                                the deep blue ocean and explore the world.
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
                            Cruise Destinations
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
                        <h3 class="font-semibold mt-4 text-xl">Cruise Line</h3>
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
                        <h3 class="font-semibold mt-4 text-xl">Cruise Deals</h3>
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
                                <!-- <h3
                                    class="font-semibold text-main-blue text-lg mb-4 font-regular"
                                >
                                    CRUISE SHIPS
                                </h3> -->
                                <h4
                                    class="text-2xl font-semibold tracking-tight text-gray-900 mb-4"
                                >
                                    CRUISE SHIPS
                                </h4>
                                <p class="text-gray-700">
                                    Lorem ipsum dolor sit amet, consectetur
                                    adipisicing elit. Pariatur architecto, eaque
                                    nesciunt sed asperiores explicabo ab esse
                                    placeat temporibus tempore nisi molestiae ex
                                    non sint! Modi debitis tenetur dignissimos!
                                    Quasi.
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
                                <!-- <h3
                                    class="font-semibold text-main-blue text-lg mb-4 font-regular"
                                >
                                    TOP CRUISE LINES
                                </h3> -->
                                <h4
                                    class="text-3xl font-semibold tracking-tight text-gray-900 mb-4"
                                >
                                    TOP CRUISE LINES
                                </h4>
                                <p class="text-gray-700 mb-4">
                                    Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Rem vitae, harum velit
                                    amet maiores ducimus? Provident, at laborum
                                    modi reprehenderit cumque libero, dolore
                                    aperiam labore impedit architecto iste
                                    corrupti accusamus?
                                </p>
                                <!-- <p class="text-teal-400 font-semibold text-lg">
                                    See open vacancies
                                </p> -->
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
                            <!-- <h3
                                class="font-semibold text-main-blue text-lg mb-4 font-regular"
                            >
                                CRUISE DEALS
                            </h3> -->
                            <h4
                                class="text-3xl font-semibold tracking-tight text-gray-900 mb-4"
                            >
                                CRUISE DEALS
                            </h4>
                            <p class="text-gray-700 mb-4">
                                Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Voluptas culpa dolor eaque
                                recusandae illum repudiandae consectetur
                                consequuntur. Quaerat porro aperiam ipsam ullam
                                voluptatibus doloremque at, illo recusandae
                                dolores minima temporibus?
                            </p>
                            <!-- <p class="text-teal-400 font-semibold text-lg">
                                More information
                            </p> -->
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <!-- <footer class="h-4 pb-8 pt-32">
            <p class="text-center font-roboto text-sm font-regular text-gray-700">2019 Landing Page</p>
        </footer> -->
    </main>
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
    background-image: url("@/Assets/public/img/ship1.jpg");
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
