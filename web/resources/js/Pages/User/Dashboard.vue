<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import { ref } from "vue";
import Modal from "@/Components/Modal.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";

defineProps({
    list: Array,
});

const feedbackModal = ref(false);
const refundModal = ref(false);

const feedbackFrom = useForm({
    b_id: "",
    rate: 0,
    processing: false,
});
const refundForm = useForm({
    b_id: null,
    reason: "",
    processing: false,
});

const ModalFeedback = (id) => {
    feedbackFrom.reset();
    if (typeof id !== "undefined" && !(id instanceof PointerEvent)) {
        feedbackFrom.b_id = id;
        console.log(feedbackFrom.b_id);
    }
    feedbackModal.value = !feedbackModal.value;
};

function ModalRefund(id) {
    refundForm.reset();
    if (typeof id !== "undefined" && !(id instanceof PointerEvent)) {
        refundForm.b_id = id;
        console.log(refundForm.b_id);
    }
    refundModal.value = !refundModal.value;
}

const feedbackSave = () => {
    feedbackFrom.post(route("user.feedback.store"), {
        preserveScroll: true,
        onSuccess: () => ModalFeedback(),
        onFinish: () => feedbackFrom.reset(),
    });
};
const refundSave = () => {
    refundForm.post(route("user.refund.store"), {
        preserveScroll: true,
        onSuccess: () => ModalRefund(),
        onFinish: () => refundForm.reset(),
    });
};
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
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
                                        reservation
                                    </th>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                    >
                                        payment
                                    </th>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                    >
                                        status
                                    </th>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                    >
                                        price
                                    </th>
                                    <th
                                        class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                                    >
                                        created at
                                    </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="row in list">
                                    <th
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left"
                                    >
                                        {{ row.id }}
                                    </th>
                                    <th
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left"
                                    >
                                        {{ row.reservation.name }}(#{{
                                            row.reservation.id
                                        }})
                                    </th>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                                    >
                                        {{ row.payment.method }}(#{{
                                            row.payment.id
                                        }})
                                    </td>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                                    >
                                        {{ row.status }}
                                    </td>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                                    >
                                        {{ row.payment.amount }}
                                    </td>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                                    >
                                        {{ row.created_at }}
                                    </td>
                                    <td
                                        class="px-5 py-5 border-b border-gray-200 bg-white text-sm"
                                    >
                                        <div class="grid grid-cols-2">
                                            <Dropdown align="right" width="48">
                                                <template v-slot:trigger>
                                                    <span
                                                        class="inline-flex rounded-md"
                                                    >
                                                        <button
                                                            type="button"
                                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                                        >
                                                            <svg
                                                                class="ml-2 -mr-0.5 h-4 w-4"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 20 20"
                                                                fill="currentColor"
                                                            >
                                                                <path
                                                                    fill-rule="evenodd"
                                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                    clip-rule="evenodd"
                                                                />
                                                            </svg>
                                                        </button>
                                                    </span>
                                                </template>
                                                <template v-slot:content>
                                                    <div>
                                                        <button
                                                            @click="
                                                                ModalFeedback(
                                                                    row.id
                                                                )
                                                            "
                                                        >
                                                            Feedback
                                                        </button>
                                                    </div>
                                                    <div>
                                                        <button
                                                            @click="
                                                                ModalRefund(
                                                                    row.id
                                                                )
                                                            "
                                                        >
                                                            Refund
                                                        </button>
                                                    </div>
                                                    <div>
                                                        <Link :href="route('paypal.pdf',row.id)">
                                                            view slip
                                                        </Link>
                                                    </div>
                                                </template>
                                            </Dropdown>
                                        </div>
                                    </td>
                                </tr>
                                <tr v-if="list.length == 0">
                                    <td colspan="5">no recode</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
    <Modal :show="feedbackModal" @close="ModalFeedback">
        <div class="p-6">
            <form action="#">
                <div class="w-full px-3">
                    <label
                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-password"
                    >
                        Rate
                    </label>

                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-email"
                        type="boolean"
                        @input="
                            () => {
                                if (value > 5 || value < 0) {
                                    value = 5;
                                }
                            }
                        "
                        v-model="feedbackFrom.b_id"
                    />
                </div>
            </form>

            <div class="mt-6 flex justify-end">
                <SecondaryButton @click="ModalFeedback">
                    Cancel
                </SecondaryButton>

                <PrimaryButton
                    class="ml-3"
                    :class="{ 'opacity-25': feedbackFrom.processing }"
                    :disabled="feedbackFrom.processing"
                    @click="feedbackSave"
                >
                    Save
                </PrimaryButton>
            </div>
        </div>
    </Modal>
    <Modal :show="refundModal" @close="ModalRefund">
        <div class="p-6">
            <form action="#">
                <div class="w-full px-3">
                    <label
                        class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for="grid-password"
                    >
                        Name
                    </label>

                    <input
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-email"
                        type="boolean"
                        v-model="refundForm.b_id"
                    />
                </div>
            </form>

            <div class="mt-6 flex justify-end">
                <SecondaryButton @click="ModalRefund"> Cancel </SecondaryButton>

                <PrimaryButton
                    class="ml-3"
                    :class="{ 'opacity-25': refundForm.processing }"
                    :disabled="refundForm.processing"
                    @click="refundSave"
                >
                    Save
                </PrimaryButton>
            </div>
        </div>
    </Modal>
</template>
