<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";
import clickSound from "./sound/new_message.wav";
import Chat from "./Components/Chat.vue";

defineProps({
    users: Array,
});

const list = ref([]);

const connect = (id) => {
    form.id = id;
    console.log(`chat.${id}`);
    axios
        .get(route("customer-supporter.chat", id))
        .then((res) => (list.value = res.data))
        .catch((error) => console.log(error));

    window.Echo.channel(`chat.${id}`).listen(".user-new-message", (data) => {
        const audio = new Audio(clickSound);
        audio.play();

        console.log(data);
        list.value.push(data.chat);
    });
};

const form = {
    id: null,
    message: "",
};

const submitForm = ()=> {
    axios
        .post(route("customer-supporter.chat.store"), form)
        .then((response) => {
            list.value.push(response.data);
            form.message = "";

            // scrollContainer.value.scrollTop = scrollContainer.value.scrollHeight;
        })
        .catch((error) => {
            console.log(error);
        });
}
</script>
<template>
    <div class="flex h-screen antialiased text-gray-800">
        <div class="flex flex-row h-full w-full overflow-x-hidden">
            <div
                class="flex flex-col py-8 pl-6 pr-2 w-64 bg-white flex-shrink-0"
            >
                <div
                    class="flex flex-row items-center justify-center h-12 w-full"
                >
                    <div
                        class="flex items-center justify-center rounded-2xl text-indigo-700 bg-indigo-100 h-10 w-10"
                    >
                        <svg
                            class="w-6 h-6"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"
                            ></path>
                        </svg>
                    </div>
                    <div class="ml-2 font-bold text-2xl">Customer Support</div>
                </div>
                <div class="flex flex-col mt-8">
                    <div
                        class="flex flex-row items-center justify-between text-xs"
                    >
                        <span class="font-bold">Active Conversations</span>
                        <span
                            class="flex items-center justify-center bg-gray-300 h-4 w-4 rounded-full"
                            >4</span
                        >
                    </div>
                    <div
                        class="flex flex-col space-y-1 mt-4 -mx-2 h-48 overflow-y-auto"
                    >
                        <button
                            class="flex flex-row items-center hover:bg-gray-100 rounded-xl p-2"
                            v-for="row in users"
                            @click="connect(row.user_id)"
                        >
                            <div
                                class="flex items-center justify-center h-8 w-8 bg-indigo-200 rounded-full"
                            >
                                H
                            </div>
                            <div class="ml-2 text-sm font-semibold">
                                {{ row.user.name }}
                            </div>
                        </button>
                    </div>
                </div>
            </div>
            <div class="flex flex-col flex-auto h-full p-6">
                <div
                    class="flex flex-col flex-auto flex-shrink-0 rounded-2xl bg-gray-100 h-full p-4"
                >
                    <div class="flex flex-col h-full overflow-x-auto mb-4">
                        <div class="flex flex-col h-full">
                            <Chat :list="list" />
                        </div>
                    </div>
                    <div
                        class="flex flex-row items-center h-16 rounded-xl bg-white w-full px-4"
                    >
                        <div>
                            <button
                                class="flex items-center justify-center text-gray-400 hover:text-gray-600"
                            >
                                <svg
                                    class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"
                                    ></path>
                                </svg>
                            </button>
                        </div>
                        <div class="w-full mx-2">
                            <input
                                class="w-full rounded-full border border-gray-200"
                                type="text"
                                placeholder="Aa"
                                autofocus
                                v-model="form.message"
                            />
                        </div>

                        <!-- chat send action -->

                        <div>
                            <button
                                class="inline-flex hover:bg-indigo-50 rounded-full p-2"
                                type="button"
                                @click="submitForm"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
