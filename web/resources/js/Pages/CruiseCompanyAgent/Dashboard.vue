<script setup>
import CruiseCompanyLayout from "@/Layouts/CruiseCompanyLayout.vue";
import { ref } from "vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const date = new Date().getFullYear();

defineProps({
    list: Array,
});

const filters = useForm({
    start_date: "",
    end_date: "",
    s_id: "",
    name: ""
});

const applyFilters = () => {
    filters.post(route("cruise-company-agent.dashboard.filter"), {
        preserveScroll: true,
    });
    console.log("Filters applied:", filters.value);
};
const pdfDownload = () => {
    const queryParams = new URLSearchParams(filters).toString(); // Convert filters to query params
    window.location.href = route("cruise-company-agent.dashboard.pdf") + "?" + queryParams;
};
</script>
<template>
    <CruiseCompanyLayout>
        <template #header>
            <div class="relative bg-blue-800 md:pt-32 pb-32 pt-12">
                <div class="px-4 md:px-10 mx-auto w-full">
                    <div>
                        <!-- Card stats -->
                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                                <div
                                    class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg"
                                >
                                    <div class="flex-auto p-4">
                                        <div class="flex flex-wrap">
                                            <div
                                                class="relative w-full pr-4 max-w-full flex-grow flex-1"
                                            >
                                                <h5
                                                    class="text-blueGray-400 uppercase font-bold text-xs"
                                                >
                                                    Traffic
                                                </h5>
                                                <span
                                                    class="font-semibold text-xl text-blueGray-700"
                                                >
                                                    350,897
                                                </span>
                                            </div>
                                            <div
                                                class="relative w-auto pl-4 flex-initial"
                                            >
                                                <div
                                                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-red-500"
                                                >
                                                    <i
                                                        class="far fa-chart-bar"
                                                    ></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p
                                            class="text-sm text-blueGray-400 mt-4"
                                        >
                                            <span class="text-emerald-500 mr-2">
                                                <i class="fas fa-arrow-up"></i>
                                                3.48%
                                            </span>
                                            <span class="whitespace-nowrap">
                                                Since last month
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                                <div
                                    class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg"
                                >
                                    <div class="flex-auto p-4">
                                        <div class="flex flex-wrap">
                                            <div
                                                class="relative w-full pr-4 max-w-full flex-grow flex-1"
                                            >
                                                <h5
                                                    class="text-blueGray-400 uppercase font-bold text-xs"
                                                >
                                                    New users
                                                </h5>
                                                <span
                                                    class="font-semibold text-xl text-blueGray-700"
                                                >
                                                    2,356
                                                </span>
                                            </div>
                                            <div
                                                class="relative w-auto pl-4 flex-initial"
                                            >
                                                <div
                                                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-orange-500"
                                                >
                                                    <i
                                                        class="fas fa-chart-pie"
                                                    ></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p
                                            class="text-sm text-blueGray-400 mt-4"
                                        >
                                            <span class="text-red-500 mr-2">
                                                <i
                                                    class="fas fa-arrow-down"
                                                ></i>
                                                3.48%
                                            </span>
                                            <span class="whitespace-nowrap">
                                                Since last week
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                                <div
                                    class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg"
                                >
                                    <div class="flex-auto p-4">
                                        <div class="flex flex-wrap">
                                            <div
                                                class="relative w-full pr-4 max-w-full flex-grow flex-1"
                                            >
                                                <h5
                                                    class="text-blueGray-400 uppercase font-bold text-xs"
                                                >
                                                    Sales
                                                </h5>
                                                <span
                                                    class="font-semibold text-xl text-blueGray-700"
                                                >
                                                    924
                                                </span>
                                            </div>
                                            <div
                                                class="relative w-auto pl-4 flex-initial"
                                            >
                                                <div
                                                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-pink-500"
                                                >
                                                    <i class="fas fa-users"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p
                                            class="text-sm text-blueGray-400 mt-4"
                                        >
                                            <span class="text-orange-500 mr-2">
                                                <i
                                                    class="fas fa-arrow-down"
                                                ></i>
                                                1.10%
                                            </span>
                                            <span class="whitespace-nowrap">
                                                Since yesterday
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
                                <div
                                    class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg"
                                >
                                    <div class="flex-auto p-4">
                                        <div class="flex flex-wrap">
                                            <div
                                                class="relative w-full pr-4 max-w-full flex-grow flex-1"
                                            >
                                                <h5
                                                    class="text-blueGray-400 uppercase font-bold text-xs"
                                                >
                                                    Performance
                                                </h5>
                                                <span
                                                    class="font-semibold text-xl text-blueGray-700"
                                                >
                                                    49,65%
                                                </span>
                                            </div>
                                            <div
                                                class="relative w-auto pl-4 flex-initial"
                                            >
                                                <div
                                                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-lightBlue-500"
                                                >
                                                    <i
                                                        class="fas fa-percent"
                                                    ></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p
                                            class="text-sm text-blueGray-400 mt-4"
                                        >
                                            <span class="text-emerald-500 mr-2">
                                                <i class="fas fa-arrow-up"></i>
                                                12%
                                            </span>
                                            <span class="whitespace-nowrap">
                                                Since last month
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>

        <div class="w-full xl:w-full mb-12 xl:mb-0 px-4">
            <div
                class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded"
            >
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                        <div
                            class="relative w-full px-4 max-w-full flex-grow flex-1"
                        >
                            <h3
                                class="font-semibold text-base text-blueGray-700"
                            >
                                Cruise Company Information
                            </h3>
                        </div>
                        <div
                            class="relative w-full px-4 max-w-full flex-grow flex-1 text-right"
                        ></div>
                    </div>
                </div>

                <div class="p-4 bg-gray-50 rounded-lg shadow-md space-y-4">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                        <div>
                            <label
                                for="start_date"
                                class="block text-sm font-medium text-gray-700 mb-1"
                            >
                                Start Date
                            </label>
                            <input
                                id="start_date"
                                type="date"
                                v-model="filters.start_date"
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            />
                        </div>
                        <div>
                            <label
                                for="end_date"
                                class="block text-sm font-medium text-gray-700 mb-1"
                            >
                                End Date
                            </label>
                            <input
                                id="end_date"
                                type="date"
                                v-model="filters.end_date"
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            />
                        </div>
                        <div>
                            <label
                                for="s_id"
                                class="block text-sm font-medium text-gray-700 mb-1"
                            >
                                S_ID
                            </label>
                            <input
                                id="s_id"
                                type="text"
                                v-model="filters.s_id"
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            />
                        </div>
                    </div>
                    <div class="flex justify-end">


                        <button
                            type="button"
                            @click="applyFilters"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-medium px-6 py-2 rounded-lg shadow-md transition duration-200"
                        >
                            Apply Filters
                        </button>
                        <button
                            type="button"
                            @click="pdfDownload"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-medium px-6 py-2 rounded-lg shadow-md transition duration-200"
                        >
                            PDF
                        </button>
                    </div>
                </div>

                <div class="block w-full overflow-x-auto">
                    <!-- Projects table -->
                    <table
                        class="items-center w-full bg-transparent border-collapse"
                    >
                        <thead>
                            <tr>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                >
                                    ID
                                </th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                >
                                    ur_id
                                </th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                >
                                    user_id
                                </th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                >
                                    payment_id
                                </th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                >
                                    status
                                </th>

                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                >
                                    created_at
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="row in list">
                                <th
                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left"
                                >
                                    {{ row.id }}
                                </th>
                                <td
                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                                >
                                    {{ row.ur_id }}
                                </td>
                                <td
                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                                >
                                    {{ row.user_id }}
                                </td>
                                <td
                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                                >
                                    {{ row.payment_id }}
                                </td>
                                <td
                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                                >
                                    {{ row.status }}
                                </td>
                                <td
                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                                >
                                    {{ row.created_at }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="w-full xl:w-4/12 px-4"></div>
    </CruiseCompanyLayout>
</template>
