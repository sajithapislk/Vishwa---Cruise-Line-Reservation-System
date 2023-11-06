<script setup>
import { ref } from "vue";
import { Swiper, SwiperSlide } from "swiper/vue";
import "swiper/css";
import GuestLayout from "@/Layouts/GuestLayout2.vue";
defineProps({
    cruiseLine: Array,
});

const onSwiper = (swiper) => {
    console.log(swiper);
};
const onSlideChange = () => {
    console.log("slide change");
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
                        <div class="px-6">
                            <div class="flex flex-wrap justify-center">
                                <div
                                    class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center"
                                >
                                    <div class="relative">
                                        <img
                                            alt="..."
                                            src="./img/team-2-800x800.jpg"
                                            class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16"
                                            style="max-width: 150px"
                                        />
                                    </div>
                                </div>
                                <div
                                    class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center"
                                ></div>
                                <div class="w-full lg:w-4/12 px-4 lg:order-1">
                                    <div
                                        class="flex justify-center py-4 lg:pt-4 pt-8"
                                    ></div>
                                </div>
                            </div>
                            <div class="text-center mt-12">
                                <h3
                                    class="text-4xl font-semibold leading-normal mb-2 text-gray-800 mb-2"
                                >
                                    {{ cruiseLine.name }}
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
                                        {{ cruiseLine.description }}
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
                                        v-for="row in cruiseLine.ships"
                                        :key="row.id"
                                    >
                                        <div
                                            class="group inline-block pb-4 bg-gradient-to-tr from-purple-600 to-orange-400 text-white overflow-hidden rounded-2xl shadow hover:shadow-md transition"
                                        >
                                            <figure
                                                class="max-h-64 aspect-square overflow-hidden"
                                            >
                                                <img
                                                    class="w-full h-full object-cover transition group-hover:scale-125"
                                                    :src="route('ship.img',row.img)"
                                                />
                                            </figure>
                                            <div class="p-4">
                                                <h3 class="text-xl font-bold">
                                                   {{ row.name }}
                                                </h3>
                                            </div>

                                        </div>
                                    </SwiperSlide>
                                </Swiper>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </GuestLayout>
</template>
