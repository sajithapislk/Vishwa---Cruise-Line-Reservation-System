<script setup>
import { ref } from "vue";
import CruiseLineLayout from "@/Layouts/CruiseCompanyLayout.vue";
import DropFile from "@/Components/DropFile.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import TextInput from "@/Components/TextInput.vue";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

defineProps({
    cruises: Array,
    ports: Array,
    packages:Array
});

const editor = ref(ClassicEditor);
const editorConfig = ref({});

const cruiseLineForm = useForm({
    s_id: "",
    sr_id: "",
    dp_id: "",
    ap_id: "",
    p_id: "",
    name: "",
    description: "",
    img: null,
    tax: "",
    price: "",
    depart_at: "",
    arrive_at: "",
});

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

const save = () => {
    cruiseLineForm.post(route("cruise-company-agent.upcoming-deal.store"), {
        preserveScroll: true,
        onSuccess: () => console.log(res),
        onFinish: () => cruiseLineForm.reset(),
    });
};

let packages = ref([]);
let rooms = ref([]);

const changeCruise = (event) => {
    console.log(event.target.value);
    axios
        .get(route("cruise-company-agent.cruise-package.list", event.target.value))
        .then((res) => (packages.value = res.data))
        .catch((error) => console.log(error));

    axios
        .get(route("cruise-company-agent.cruise-room.list", event.target.value))
        .then((res) => (rooms.value = res.data))
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
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                        <div
                            class="relative w-full px-4 max-w-full flex-grow flex-1"
                        >
                            <h3
                                class="font-semibold text-2xl text-blueGray-700"
                            >
                                Cruise Line Insert
                            </h3>
                        </div>
                        <div
                            class="relative w-full px-4 max-w-full flex-grow flex-1 text-right"
                        ></div>
                    </div>
                </div>
                <div class="block w-full overflow-x-auto">
                    <form @submit.prevent="save">
                        <div class="mb-0 px-4 py-3">
                            <div class="flex">
                                <div class="flex-1 py-5 pl-5 overflow-hidden">
                                    <h1
                                        class="inline text-lg font-semibold leading-none"
                                    >
                                        Cruise Line Information
                                    </h1>
                                </div>
                            </div>
                            <div class="px-5 pb-5">
                                <div class="w-full mr-2">
                                    <InputLabel for="s_id" value="s_id" />
                                    <select
                                        name="s_id"
                                        v-model="cruiseLineForm.s_id"
                                        @change="changeCruise($event)"
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        aria-label="Default select example"
                                        required
                                    >
                                        <option selected disabled>
                                            Open this select field
                                        </option>
                                        <option
                                            v-for="cruise in cruises"
                                            :value="cruise.id"
                                        >
                                            {{ cruise.name }}
                                        </option>
                                    </select>
                                </div>
                                <div class="flex">
                                    <div class="flex-grow w-1/4 mr-2">
                                        <InputLabel for="p_id" value="p_id" />
                                        <select
                                            name="p_id"
                                            v-model="cruiseLineForm.p_id"
                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                            aria-label="Default select example"
                                            required
                                        >
                                            <option selected disabled>
                                                Open this select field
                                            </option>
                                            <option
                                                v-for="row in packages"
                                                :value="row.id"
                                            >
                                                {{ row.name }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="flex-grow w-1/4 mr-2">
                                        <InputLabel for="sr_id" value="sr_id" />
                                        <select
                                            name="sr_id"
                                            v-model="cruiseLineForm.sr_id"
                                            @change="changePackage($event)"
                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                            aria-label="Default select example"
                                            required
                                        >
                                            <option selected disabled>
                                                Open this select field
                                            </option>
                                            <option
                                                v-for="row in rooms"
                                                :value="row.id"
                                            >
                                                {{ row.room_view }}
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="flex">
                                    <div class="flex-grow w-1/4 mr-2">
                                        <InputLabel
                                            for="dp_id"
                                            value="dp_id "
                                        />
                                        <select
                                            name="dp_id"
                                            v-model="cruiseLineForm.dp_id"
                                            @change="changeCruise($event)"
                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                            aria-label="Default select example"
                                            required
                                        >
                                            <option selected disabled>
                                                Open this select field
                                            </option>
                                            <option
                                                v-for="port in ports"
                                                :value="port.id"
                                            >
                                                {{ port.name }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="flex-grow w-1/4 mr-2">
                                        <InputLabel for="dp_id" value="ap_id" />
                                        <select
                                            name="ap_id"
                                            v-model="cruiseLineForm.ap_id"
                                            @change="changeCruise($event)"
                                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                            aria-label="Default select example"
                                            required
                                        >
                                            <option selected disabled>
                                                Open this select field
                                            </option>
                                            <option
                                                v-for="port in ports"
                                                :value="port.id"
                                            >
                                                {{ port.name }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <InputLabel for="name" value="name" />
                                    <TextInput
                                        v-model="cruiseLineForm.name"
                                        placeholder="name"
                                        class="w-full"
                                    />
                                </div>
                                <div class="flex">
                                    <div class="flex-grow w-1/4 mr-2">
                                        <InputLabel for="tax" value="tax" />
                                        <TextInput
                                            v-model="cruiseLineForm.tax"
                                            placeholder="tax"
                                            class="w-full"
                                        />
                                    </div>
                                    <div class="flex-grow w-1/4 mr-2">
                                        <InputLabel for="price" value="price" />
                                        <TextInput
                                            v-model="cruiseLineForm.price"
                                            placeholder="price"
                                            class="w-full"
                                        />
                                    </div>
                                </div>

                                <div class="flex">
                                    <div class="flex-grow w-1/4 mr-2">
                                        <InputLabel
                                            for="depart_at"
                                            value="depart_at"
                                        />
                                        <TextInput
                                            type="datetime-local"
                                            v-model="cruiseLineForm.depart_at"
                                            placeholder="depart_at"
                                            class="w-full"
                                        />
                                    </div>
                                    <div class="flex-grow w-1/4 mr-2">
                                        <InputLabel for="arrive_at" value="arrive_at" />
                                        <TextInput
                                            type="datetime-local"
                                            v-model="cruiseLineForm.arrive_at"
                                            placeholder="Flow"
                                            class="w-full"
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
                                        v-model="cruiseLineForm.description"
                                        :config="editorConfig"
                                    ></ckeditor>
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
                                        <span class="pl-2 mx-1">Reset</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="w-full xl:w-4/12 px-4"></div>
    </CruiseLineLayout>
</template>
