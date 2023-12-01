<script setup>
import { ref } from "vue";
import CruiseLineLayout from "@/Layouts/CruiseCompanyLayout.vue";
import CardLink from "@/Components/CardLink.vue";
import img1 from "@/assets/public/img/ship.jpeg";
const date = new Date().getFullYear();

defineProps({
    ships: Array,
});
</script>

<template>
    <CruiseLineLayout>
        <template #header>
            <div class="relative bg-green-800 md:pt-32 pb-32 pt-12">
                <div class="px-4 md:px-10 mx-auto w-full">
                    <div></div>
                </div>
            </div>
        </template>

        <div class="w-full xl:w-full mb-12 xl:mb-0 px-4">
            <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded"
            >
                <div class="bg-white rounded-t mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                        <div
                            class="relative w-full px-4 max-w-full flex-grow flex-1"
                        >
                            <h3
                                class="font-semibold text-base text-blueGray-700"
                            >
                                Select Ship
                            </h3>
                        </div>

                    </div>
                </div>
            </div>
            <div class="relative break-words">
                <section
                    class="w-fit mx-auto grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 justify-items-center justify-center gap-x-14"
                >
                    <CardLink
                    v-for="row in ships"
                    :href="route('cruise-company-agent.ship-room.select-ship',row.id)"
                    :title="row.name"
                    >
                    <img :src="img1" />
                    </CardLink>
                </section>
            </div>
        </div>
        <div class="w-full xl:w-4/12 px-4"></div>
    </CruiseLineLayout>
</template>
