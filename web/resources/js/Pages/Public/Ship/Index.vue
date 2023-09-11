<script setup>
import { ref } from "vue";
import { Swiper, SwiperSlide } from "swiper/vue";
import "swiper/css";
import check_white from "@/assets/svg/check-white.svg";
import arrow_right from "@/assets/svg/arrow-right.svg";

defineProps({
    ship: Array,
});
const onSwiper = (swiper) => {
    console.log(swiper);
};
const onSlideChange = () => {
    console.log("slide change");
};
</script>
<template>
    <div>
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
            <section class="relative py-16 bg-gray-300">
                <div class="container mx-auto px-4 max-w-screen-xl">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg -mt-64"
                    >
                        <div class="px-6">
                            <div class="text-center mt-12">
                                <h3
                                    class="text-4xl font-semibold leading-normal mb-2 text-gray-800 mb-2"
                                >
                                    {{ ship.name }}
                                </h3>
                            </div>
                            <div
                                class="mt-10 py-10 border-t border-gray-300 text-center"
                            >
                                <div class="flex flex-wrap justify-center">
                                    <div class="w-full lg:w-9/12 px-4">
                                        <p
                                            class="mb-4 text-lg leading-relaxed text-gray-800"
                                        >
                                            An artist of considerable range,
                                            Jenna the name taken by
                                            Melbourne-raised, Brooklyn-based
                                            Nick Murphy writes, performs and
                                            records all of his own music, giving
                                            it a warm, intimate feel with a
                                            solid groove structure. An artist of
                                            considerable range.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-10 py-10 border-t border-gray-300">
                                <Swiper
                                    :slides-per-view="3"
                                    :space-between="50"
                                    @swiper="onSwiper"
                                    @slideChange="onSlideChange"
                                >
                                    <SwiperSlide
                                        v-for="row in ship.packages"
                                        :key="row.id"
                                    >
                                        <div
                                            class="w-full flex-1 p-8 order-1 shadow-xl rounded-3xl bg-gray-900 text-gray-400 sm:w-96 lg:w-full lg:order-2 lg:mt-0"
                                        >
                                            <div
                                                class="mb-8 pb-8 flex items-center border-b border-gray-600"
                                            >
                                                <div class="ml-5">
                                                    <span
                                                        class="block text-xl font-semibold text-white"
                                                        >Startup</span
                                                    >
                                                </div>
                                            </div>
                                            <ul
                                                class="mb-10 font-medium text-lg"
                                            >
                                                <li class="flex mb-6" v-if="row.is_d">
                                                    <img :src="check_white" />
                                                    <span class="ml-3"
                                                        >Dining
                                                    </span>
                                                </li>
                                                <li class="flex mb-6" v-if="row.is_bl">
                                                    <img :src="check_white" />
                                                    <span class="ml-3"
                                                        >Bars & Lounges
                                                    </span>
                                                </li>
                                                <li class="flex" v-if="row.is_en">
                                                    <img :src="check_white" />
                                                    <span class="ml-3"
                                                        >Entertainment &
                                                        Nightlife</span
                                                    >
                                                </li>
                                                <li class="flex" v-if="row.is_c">
                                                    <img :src="check_white" />
                                                    <span class="ml-3"
                                                        >Casino</span
                                                    >
                                                </li>
                                                <li class="flex" v-if="row.is_ona">
                                                    <img :src="check_white" />
                                                    <span class="ml-3"
                                                        >Onboard Activities</span
                                                    >
                                                </li>
                                                <li class="flex" v-if="row.is_ona">
                                                    <img :src="check_white" />
                                                    <span class="ml-3"
                                                        >Outdoor Activities</span
                                                    >
                                                </li>
                                                <li class="flex" v-if="row.is_kt">
                                                    <img :src="check_white" />
                                                    <span class="ml-3"
                                                        >Kids & Teens</span
                                                    >
                                                </li>
                                                <li class="flex" v-if="row.is_kt">
                                                    <img :src="check_white" />
                                                    <span class="ml-3"
                                                        >Wellness</span
                                                    >
                                                </li>
                                                <li class="flex" v-if="row.is_s">
                                                    <img :src="check_white" />
                                                    <span class="ml-3"
                                                        >Shopping</span
                                                    >
                                                </li>
                                            </ul>
                                            <a
                                                href="#/"
                                                class="flex justify-center items-center bg-indigo-600 rounded-xl p-4 text-center text-white text-xl"
                                            >
                                                Choose Plan
                                                <img
                                                    :src="arrow_right"
                                                    class="ml-2"
                                                />
                                            </a>
                                        </div>
                                    </SwiperSlide>
                                </Swiper>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</template>
