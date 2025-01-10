<script setup>
import { ref, computed, onMounted } from "vue";
import axios from "axios";
import CruiseLineLayout from "@/Layouts/CruiseCompanyLayout.vue";
import DropFile from "@/Components/DropFile.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import { useForm } from "@inertiajs/vue3";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

const props = defineProps({
    shipTypes: Array,
    cruiseShip: Object, // Pass the existing cruise ship data as a prop
});

const editor = ref(null);
const editorConfig = ref({});
const img = ref(null);
const imgPreview = ref(null);

const submitForm = useForm({
    _method: 'PUT',
    id: props.cruiseShip ? props.cruiseShip.id : null,
    type_id: props.cruiseShip ? props.cruiseShip.type_id : "",
    name: props.cruiseShip ? props.cruiseShip.name : "",
    description: props.cruiseShip ? props.cruiseShip.description : "",
    img: null,
    style: props.cruiseShip ? props.cruiseShip.style : "",
    size: props.cruiseShip ? props.cruiseShip.size : "",
    launch_at: props.cruiseShip ? props.cruiseShip.launch_at : "",
    last_refit_at: props.cruiseShip ? props.cruiseShip.last_refit_at : "",
    gt: props.cruiseShip ? props.cruiseShip.gt : "",
    length: props.cruiseShip ? props.cruiseShip.length : "",
    width: props.cruiseShip ? props.cruiseShip.width : "",
    speed: props.cruiseShip ? props.cruiseShip.speed : "",
    decks: props.cruiseShip ? props.cruiseShip.decks : "",
    nop: props.cruiseShip ? props.cruiseShip.nop : "",
    no_crew: props.cruiseShip ? props.cruiseShip.no_crew : "",
    no_cabins: props.cruiseShip ? props.cruiseShip.no_cabins : "",
    wa: props.cruiseShip ? props.cruiseShip.wa : "",
});

const handleFileChange = (e) => {
    const file = e.target.files[0];
    img.value = file;
    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            imgPreview.value = e.target.result;
        };
        reader.readAsDataURL(file);
    } else {
        imgPreview.value = null;
    }
};

const submit = async () => {
    try {
        await submitForm.post(route("cruise-company-agent.cruise-ship.update", props.cruiseShip.id), {
            onFinish: () => {
                submitForm.reset();
                img.value = null;
                imgPreview.value = null;
            }
        });
    } catch (error) {
        if (error.response && error.response.data && error.response.data.errors) {
            console.error("Validation errors:", error.response.data.errors);
        } else {
            console.error("An unexpected error occurred:", error);
        }
    }
};

const hasImage = computed(() => img.value !== null);

onMounted(() => {
    if (cruiseShip) {
        submitForm.fill(cruiseShip);
    }
});
</script>

<template>
    <CruiseLineLayout>
        <div class="w-full xl:w-full mb-12 xl:mb-0 px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                <form @submit.prevent="submit">
                    <div class="rounded-t mb-0 px-4 py-3 border-0">
                        <h3 class="font-semibold text-2xl text-blueGray-700">
                            Cruise Line Edit
                        </h3>
                    </div>
                    <div class="block w-full overflow-x-auto">
                        <div class="mb-0 px-4 py-3">
                            <div class="px-5 pb-5">
                                <div class="flex mt-2">
                                    <div class="flex-grow w-1/4 mr-2">
                                        <InputLabel for="name" value="Name" />
                                        <input v-model="submitForm.name" placeholder="Ship Name" class="text-black placeholder-gray-600 w-full px-4 py-2.5 border-transparent rounded-lg bg-gray-200 focus:bg-white focus:outline-none" />
                                        <InputError class="mt-2" :message="submitForm.errors.name" />
                                    </div>
                                    <div class="flex-grow w-1/4 mr-2">
                                        <InputLabel for="type_id" value="Ship Type" />
                                        <select v-model="submitForm.type_id" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 leading-tight focus:bg-white focus:border-gray-500" required>
                                            <option selected disabled>Select Ship Type</option>
                                            <option v-for="type in shipTypes" :value="type.id">{{ type.name }}</option>
                                        </select>
                                        <InputError class="mt-2" :message="submitForm.errors.type_id" />
                                    </div>
                                </div>
                                <!-- Additional input fields go here -->
                                <div class="mt-4">
                                    <InputLabel for="description" value="Description" />
                                    <ckeditor :editor="editor" v-model="submitForm.description" :config="editorConfig" @ready="editor = $event" />
                                </div>

                                <div class="mt-4">
                                    <InputLabel for="img" value="Image" />
                                    <input type="file" @change="handleFileChange" accept="image/*">
                                    <div v-if="hasImage">
                                        <img :src="imgPreview" alt="Preview" style="max-width: 200px;">
                                    </div>
                                    <InputError class="mt-2" :message="submitForm.errors.img" />
                                </div>

                                <div class="flex mt-3">
                                    <div class="flex-grow w-1/4 mr-2">
                                        <InputLabel for="launch_at" value="Launch Year" />
                                        <input v-model="submitForm.launch_at" type="number" min="1900" max="2035" step="1" class="text-black placeholder-gray-600 w-full px-4 py-2.5" />
                                    </div>
                                    <div class="flex-grow w-1/4">
                                        <InputLabel for="last_refit_at" value="Last Refit Year" />
                                        <input v-model="submitForm.last_refit_at" type="number" min="1900" max="2035" step="1" class="text-black placeholder-gray-600 w-full px-4 py-2.5" />
                                    </div>
                                </div>
                            </div>

                            <hr class="mt-4" />
                            <div class="flex flex-row-reverse p-3">
                                <button type="submit" class="save-button">Save</button>
                                <button type="button" class="delete-button">Delete</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </CruiseLineLayout>
</template>

<style scoped>
.save-button {
    @apply flex items-center px-5 py-2.5 font-medium tracking-wide text-white capitalize bg-black rounded-md hover:bg-gray-800 focus:outline-none transition duration-300;
}

.delete-button {
    @apply flex items-center px-5 py-2.5 font-medium tracking-wide text-black capitalize rounded-md hover:bg-red-200 focus:outline-none transition duration-300;
}

/* Add additional styles as necessary */
</style>
