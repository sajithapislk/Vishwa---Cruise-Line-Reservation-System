<script setup>
import { ref } from "vue";
import axios from "axios";
import CruiseLineLayout from "@/Layouts/CruiseLineLayout.vue";
const date = new Date().getFullYear();
import DropFile from "@/Components/DropFile.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
const editor = ref(ClassicEditor);
const editorConfig = ref({
    // The configuration of the editor.
});

defineProps({
    shipTypes: Array,
});

let img = ref("");

const Img_drop = (e) => {
    console.log("drop1");
    img.value = e.dataTransfer.files[0];
    submitForm.img = img.value;
};
const selectedFile = (e) => {
    console.log("selectedFile1");
    img.value = e.target.files[0];
    submitForm.img = img.value;
};

const submitForm = useForm({
    type_id: "",
    name: "",
    description: "",
    img: "",
    style: "",
    size: "",
    type: "",
    launch_at: "",
    last_refit_at: "",
    gt: "",
    length: "",
    width: "",
    speed: "",
    decks: "",
    nop: "",
    no_crew: "",
    no_cabins: "",
    wa: "",
    launch_at: "2024",
    last_refit_at: "2024",
});

const submit = () => {
    submitForm
        .post(route("cruise-line-agent.ship.store"))
        .then((res) => {
            console.log("success");
            submitForm.reset();
        })
        .catch((error) => console.log(error));
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
                <form @submit.prevent="submit">
                    <div class="rounded-t mb-0 px-4 py-3 border-0">
                        <div class="flex flex-wrap items-center">
                            <div
                                class="relative w-full px-4 max-w-full flex-grow flex-1"
                            >
                                <h3
                                    class="font-semibold text-2xl text-blueGray-700"
                                >
                                    Cruise Ship Insert
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
                                        Cruise Ship Information
                                    </h1>
                                </div>
                            </div>
                            <div class="px-5 pb-5">
                                <div class="flex">
                                    <div class="flex-grow w-1/4 mr-2">
                                        <label
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                            for="grid-password"
                                        >
                                            Name
                                        </label>

                                        <input
                                            v-model="submitForm.name"
                                            placeholder="Style"
                                            class="text-black placeholder-gray-600 w-full px-4 py-2.5 text-base transition duration-500 ease-in-out transsubmitForm border-transparent rounded-lg bg-gray-200 focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"
                                        />
                                    </div>
                                    <div class="flex-grow w-1/4 mr-2">
                                        <label
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                            for="grid-password"
                                        >
                                            Ship Type
                                        </label>
                                        <select
                                            name="s_id"
                                            v-model="submitForm.type_id"
                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                            aria-label="Default select example"
                                            required
                                        >
                                            <option selected disabled>
                                                Open this select field
                                            </option>
                                            <option
                                                v-for="row in shipTypes"
                                                :value="row.id"
                                            >
                                                {{ row.name }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="flex-grow w-1/4 mr-2">
                                        <label
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                            for="grid-password"
                                        >
                                        Style
                                        </label>
                                        <input
                                            v-model="submitForm.style"
                                            placeholder="Style"
                                            class="text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transsubmitForm border-transparent rounded-lg bg-gray-200 focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"
                                        />
                                    </div>
                                    <div class="flex-grow w-1/4">
                                        <input
                                            v-model="submitForm.size"
                                            placeholder="Size"
                                            class="text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transsubmitForm border-transparent rounded-lg bg-gray-200 focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"
                                        />
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="flex-grow w-1/4 mr-2">
                                        <input
                                            v-model="submitForm.type"
                                            placeholder="Type"
                                            class="text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transsubmitForm border-transparent rounded-lg bg-gray-200 focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"
                                        />
                                    </div>
                                    <div class="flex-grow w-1/4">
                                        <input
                                            v-model="submitForm.gt"
                                            placeholder="Gt"
                                            class="text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transsubmitForm border-transparent rounded-lg bg-gray-200 focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"
                                        />
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="flex-grow w-1/4 mr-2">
                                        <input
                                            v-model="submitForm.length"
                                            placeholder="Length"
                                            class="text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transsubmitForm border-transparent rounded-lg bg-gray-200 focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"
                                        />
                                    </div>
                                    <div class="flex-grow w-1/4">
                                        <input
                                            v-model="submitForm.width"
                                            placeholder="Width"
                                            class="text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transsubmitForm border-transparent rounded-lg bg-gray-200 focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"
                                        />
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="flex-grow w-1/4 mr-2">
                                        <input
                                            v-model="submitForm.speed"
                                            placeholder="Speed"
                                            class="text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transsubmitForm border-transparent rounded-lg bg-gray-200 focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"
                                        />
                                    </div>
                                    <div class="flex-grow w-1/4">
                                        <input
                                            v-model="submitForm.decks"
                                            placeholder="Decks"
                                            class="text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transsubmitForm border-transparent rounded-lg bg-gray-200 focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"
                                        />
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="flex-grow w-1/4 mr-2">
                                        <input
                                            v-model="submitForm.nop"
                                            placeholder="Nop"
                                            class="text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transsubmitForm border-transparent rounded-lg bg-gray-200 focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"
                                        />
                                    </div>
                                    <div class="flex-grow w-1/4">
                                        <input
                                            v-model="submitForm.no_crew"
                                            placeholder="No_crew"
                                            class="text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transsubmitForm border-transparent rounded-lg bg-gray-200 focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"
                                        />
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="flex-grow w-1/4 mr-2">
                                        <input
                                            v-model="submitForm.wa"
                                            placeholder="Wa"
                                            class="text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transsubmitForm border-transparent rounded-lg bg-gray-200 focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"
                                        />
                                    </div>
                                    <div class="flex-grow w-1/4 mr-2">
                                        <input
                                            v-model="submitForm.no_cabins"
                                            placeholder="no_cabins"
                                            class="text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transsubmitForm border-transparent rounded-lg bg-gray-200 focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"
                                        />
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <InputLabel
                                        for="description"
                                        value="Description"
                                    />
                                    <ckeditor
                                        :editor="editor"
                                        v-model="submitForm.description"
                                        :config="editorConfig"
                                    ></ckeditor>
                                </div>

                                <div class="mt-4">
                                    <InputLabel
                                        for="img"
                                        value="Verify Address"
                                    />
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
                                        :message="submitForm.errors.img"
                                    />
                                </div>
                                <div class="flex">
                                    <div class="flex-grow w-1/4 mr-2">
                                        <input
                                            v-model="submitForm.launch_at"
                                            placeholder="launch_at"
                                            type="number"
                                            min="1900"
                                            max="2035"
                                            step="1"
                                            class="text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transsubmitForm border-transparent rounded-lg bg-gray-200 focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"
                                        />
                                    </div>
                                    <div class="flex-grow w-1/4">
                                        <input
                                            v-model="submitForm.last_refit_at"
                                            placeholder="last_refit_at"
                                            type="number"
                                            min="1900"
                                            max="2035"
                                            step="1"
                                            class="text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transsubmitForm border-transparent rounded-lg bg-gray-200 focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400"
                                        />
                                    </div>
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
                                        <span class="pl-2 mx-1">Save</span>
                                    </button>
                                </div>
                                <div class="flex-initial">
                                    <button
                                        type="button"
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
                                        <span class="pl-2 mx-1">Delete</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="w-full xl:w-4/12 px-4"></div>
    </CruiseLineLayout>
</template>
