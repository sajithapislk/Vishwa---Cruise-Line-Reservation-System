<script setup>
import { ref } from "vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";
const date = new Date().getFullYear();

defineProps({
    list: Array,
});
</script>

<template>
    <AdminLayout>
        <template #header>
            <div class="relative bg-blue-800 md:pt-32 pb-32 pt-12">
                <div class="px-4 md:px-10 mx-auto w-full">
                    <div>
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
                                Company Payments
                            </h3>
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
                                    ID
                                </th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                >
                                ref
                                </th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                >
                                    debit
                                </th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                >
                                credit
                                </th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                >
                                created at
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="row in list">
                                <th
                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left"
                                >
                                    {{row.id}}
                                </th>
                                <td
                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                                >
                                {{row.ref }}
                                </td>
                                <td
                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                                >
                                {{row.debit }}
                                </td>
                                <td
                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                                >
                                {{row.credit}}
                                </td>
                                <td>{{ row.created_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="w-full xl:w-4/12 px-4"></div>
    </AdminLayout>
</template>
