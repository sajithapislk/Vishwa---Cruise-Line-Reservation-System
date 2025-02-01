<script setup>
import { ref } from "vue";
import { useForm, Link } from "@inertiajs/vue3";
import CruiseLineLayout from "@/Layouts/CruiseCompanyLayout.vue";
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
    filters.post(route("cruise-company-agent.upcoming-reservations.filter"), {
        preserveScroll: true,
    });
    console.log("Filters applied:", filters.value);
};
const pdfDownload = () => {
    const queryParams = new URLSearchParams(filters).toString(); // Convert filters to query params
    window.location.href = route("cruise-company-agent.upcoming-reservations.pdf") + "?" + queryParams;
};

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
                class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded"
            >
                <div
                    class="rounded-t mb-0 px-4 py-3 border-b border-gray-200 bg-white shadow-lg"
                >
                    <div class="flex flex-wrap items-center justify-between">
                        <h3 class="font-semibold text-xl text-gray-900">
                            Upcoming Reservation
                        </h3>
                        <a
                            :href="route('cruise-company-agent.upcoming-reservations.create')"
                            class="bg-green-500 text-white hover:bg-green-600 text-sm font-medium uppercase px-4 py-2 rounded-lg transition duration-200"
                        >
                            Create
                        </a>
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
                    <div class="flex justify-between">
                        <div>
                            <label
                                for="s_id"
                                class="block text-sm font-medium text-gray-700 mb-1"
                            >
                                Name
                            </label>
                            <input
                                id="s_id"
                                type="text"
                                v-model="filters.name"
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            />
                        </div>
                        <div>

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
                                    id
                                </th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                >
                                    s_id
                                </th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                >
                                    dp_id
                                </th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                >
                                    p_id
                                </th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                >
                                    name
                                </th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                >
                                    description
                                </th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                >
                                    img
                                </th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                >
                                    tax
                                </th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                >
                                    depart_at
                                </th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                >
                                    arrive_at
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
                                    {{ row.s_id }}
                                </td>
                                <td
                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                                >
                                    {{ row.dp_id }}
                                </td>
                                <td
                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                                >
                                    {{ row.p_id }}
                                </td>
                                <td
                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                                >
                                    {{ row.name }}
                                </td>
                                <td
                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                                >
                                    {{ row.description }}
                                </td>
                                <td
                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                                >
                                    {{ row.img }}
                                </td>
                                <td
                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                                >
                                    {{ row.tax }}
                                </td>
                                <td
                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                                >
                                    {{ row.depart_at }}
                                </td>
                                <td
                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                                >
                                    {{ row.arrive_at }}
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
    </CruiseLineLayout>
</template>
