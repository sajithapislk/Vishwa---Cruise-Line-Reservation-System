<script setup>
import { ref } from "vue";
import CruiseLineLayout from "@/Layouts/CruiseCompanyLayout.vue";
import DropFile from "@/Components/DropFile.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import { Head, Link, useForm, router } from "@inertiajs/vue3";
import TextInput from "@/Components/TextInput.vue";

const props = defineProps({
    ships: Array,
});

let tempList = ref([]);
let numbers = ref([]);
const inputValue=ref('');

const cruiseLineForm = useForm({
    s_id: props.ships[0].id,
    room_view: "",
    img: null,
    room_count: "",
});

const tempSave = () => {
    console.log(cruiseLineForm);
    tempList.value.push({
        s_id: cruiseLineForm.s_id,
        room_view: cruiseLineForm.room_view,
        img: cruiseLineForm.img,
        room_count: cruiseLineForm.room_count,
    });
    console.log(tempList);
    cruiseLineForm.reset("room_view", "img", "room_count");
};
let img = ref("");

const Img_drop = (e) => {
    console.log("drop1");
    img.value = e.dataTransfer.files[0];
    cruiseLineForm.img = img.value;
};
const selectedFile = (e) => {
    console.log("selectedFile1");
    img.value = e.target.files[0];
    cruiseLineForm.img = img.value;
};

const submit = () => {
    router.post(
        route("cruise-company-agent.cruise-ships-room.store"),
        tempList.value
    );
    // cruiseLineForm.reset();
    console.log(tempList);
};

const addNumber = (event) => {
    // Use optional chaining and check if key is 'Enter'
    if (event.key === 'Enter') {
        const trimmedValue = inputValue.value.trim();
        if (trimmedValue !== '') {
            numbers.value.push(trimmedValue);
            inputValue.value = ''; // Clear input
            event.preventDefault(); // Prevent form submission
        }
    }
};
</script>

<template>
    <CruiseLineLayout>
        <template #header>
            <div class="relative bg-blue-800 md:pt-32 pb-32 pt-12">
                <div class="px-4 md:px-10 mx-auto w-full">
                    <div></div>
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
                                class="font-semibold text-2xl text-blueGray-700"
                            >
                                Cruise Ship Room Insert
                            </h3>
                        </div>
                        <div
                            class="relative w-full px-4 max-w-full flex-grow flex-1 text-right"
                        ></div>
                    </div>
                </div>
                <div class="block w-full overflow-x-auto">
                    <div class="mb-0 px-4 py-3">
                        <div class="flex">
                            <div class="flex-1 py-5 pl-5 overflow-hidden">
                                <h1
                                    class="inline text-lg font-semibold leading-none"
                                >
                                    Cruise Room Create
                                </h1>
                            </div>
                        </div>
                        <form @submit.prevent="tempSave">
                            <div class="px-5 pb-5">
                                <div class="flex">
                                    <div class="flex-grow w-2/4 mr-2">
                                        <InputLabel
                                            for="img"
                                            value="Room View"
                                        />
                                        <TextInput
                                            v-model="cruiseLineForm.room_view"
                                            placeholder="Room View"
                                            class="w-full"
                                            required
                                        />
                                    </div>
                                    <div class="flex-grow w-1/4">
                                        <InputLabel for="img" value="Count" />
                                        <TextInput
                                            type="number"
                                            v-model="cruiseLineForm.room_count"
                                            placeholder="Count"
                                            class="w-full"
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="w-1/4 mr-2">
                                        <InputLabel
                                            for="s_id"
                                            value="Cruise Line Name"
                                        />
                                        <select
                                            name="s_id"
                                            v-model="cruiseLineForm.s_id"
                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                            aria-label="Default select example"
                                            required
                                        >
                                            <option selected disabled>
                                                Open this select field
                                            </option>
                                            <option
                                                v-for="ship in ships"
                                                :value="ship.id"
                                            >
                                                {{ ship.name }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="max-w-md mx-auto p-4 w-1/4 ">
                                        <InputLabel
                                            for="s_id"
                                            value="Room numbers"
                                        />
                                        <div class="mb-4">
                                            <input
                                                v-model.trim="inputValue"
                                               @keydown="addNumber"
                                                type="text"
                                                class="w-full p-2 border border-gray-300 rounded"
                                                placeholder="Type a Room number and press Enter"
                                            />
                                        </div>
                                        <div class="mb-4">
                                            <ul class="list-disc pl-5">
                                                <li
                                                    v-for="(
                                                        number, index
                                                    ) in numbers"
                                                    :key="index"
                                                >
                                                    {{ number }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <InputLabel for="img" value="Image" />
                                    <DropFile
                                        name="img"
                                        @drop.prevent="Img_drop"
                                        @change="selectedFile"
                                    />
                                    <span v-if="img.name" class="file-info">
                                        File: {{ img.name }}
                                    </span>
                                    <InputError
                                        class="mt-2"
                                        :message="cruiseLineForm.errors.img"
                                    />
                                </div>
                            </div>
                            <hr class="mt-4" />
                            <div class="flex flex-row-reverse p-3">
                                <div class="flex-initial pl-3">
                                    <button
                                        type="submit"
                                        class="flex items-center px-5 py-2.5 font-medium tracking-wide text-white capitalize bg-black rounded-md hover:bg-gray-800 focus:outline-none focus:bg-gray-900 transition duration-300 transform active:scale-95 ease-in-out"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            height="24px"
                                            viewBox="0 0 24 24"
                                            width="24px"
                                            fill="#FFFFFF"
                                        >
                                            <path
                                                d="M0 0h24v24H0V0z"
                                                fill="none"
                                            ></path>
                                            <path
                                                d="M5 5v14h14V7.83L16.17 5H5zm7 13c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zm3-8H6V6h9v4z"
                                                opacity=".3"
                                            ></path>
                                            <path
                                                d="M17 3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V7l-4-4zm2 16H5V5h11.17L19 7.83V19zm-7-7c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3zM6 6h9v4H6z"
                                            ></path>
                                        </svg>
                                        <span class="pl-2 mx-1">Insert</span>
                                    </button>
                                </div>
                                <div class="flex-initial">
                                    <button
                                        type="reset"
                                        class="flex items-center px-5 py-2.5 font-medium tracking-wide text-black capitalize rounded-md hover:bg-red-200 hover:fill-current hover:text-red-600 focus:outline-none transition duration-300 transform active:scale-95 ease-in-out"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            height="24px"
                                            viewBox="0 0 24 24"
                                            width="24px"
                                        >
                                            <path
                                                d="M0 0h24v24H0V0z"
                                                fill="none"
                                            ></path>
                                            <path
                                                d="M8 9h8v10H8z"
                                                opacity=".3"
                                            ></path>
                                            <path
                                                d="M15.5 4l-1-1h-5l-1 1H5v2h14V4zM6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9z"
                                            ></path>
                                        </svg>
                                        <span class="pl-2 mx-1">Reset</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
                                Cruise Company
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
                                    ships id
                                </th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                >
                                    Room View
                                </th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                >
                                    img
                                </th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                >
                                    Count
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="row in tempList">
                                <th
                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left"
                                >
                                    {{ row.s_id }}
                                </th>
                                <td
                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                                >
                                    {{ row.room_view }}
                                </td>
                                <td
                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                                >
                                    {{ row.img }}
                                </td>
                                <td
                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                                >
                                    {{ row.room_count }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <hr class="mt-4" />
                <div class="flex flex-row-reverse p-3">
                    <div class="flex-initial pl-3">
                        <button
                            @click="submit"
                            type="button"
                            class="flex items-center px-5 py-2.5 font-medium tracking-wide text-white capitalize bg-black rounded-md hover:bg-gray-800 focus:outline-none focus:bg-gray-900 transition duration-300 transform active:scale-95 ease-in-out"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                height="24px"
                                viewBox="0 0 24 24"
                                width="24px"
                                fill="#FFFFFF"
                            >
                                <path d="M0 0h24v24H0V0z" fill="none"></path>
                                <path
                                    d="M5 5v14h14V7.83L16.17 5H5zm7 13c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zm3-8H6V6h9v4z"
                                    opacity=".3"
                                ></path>
                                <path
                                    d="M17 3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V7l-4-4zm2 16H5V5h11.17L19 7.83V19zm-7-7c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3zM6 6h9v4H6z"
                                ></path>
                            </svg>
                            <span class="pl-2 mx-1">Save</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full xl:w-4/12 px-4"></div>
    </CruiseLineLayout>
</template>
