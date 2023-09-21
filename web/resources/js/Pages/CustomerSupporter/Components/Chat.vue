<script setup>
import { ref, onMounted, defineProps, computed } from "vue";

const props = defineProps({
    list: Array,
});
const auth_id = ref("null");
</script>

<template>
    <div class="grid grid-cols-12 gap-y-2">
        <template v-for="row in list">
            <div
                v-if="row.who_inserted === 'USER'"
                class="col-start-6 col-end-13 p-3 rounded-lg"
            >
                <h1>{{ row.who_inserted }}</h1>
                <div class="flex items-center justify-start flex-row-reverse">
                    <div
                        class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0"
                    >
                        A
                    </div>
                    <div
                        class="relative mr-3 text-sm bg-indigo-100 py-2 px-4 shadow rounded-xl"
                    >
                        <div>
                            Lorem ipsum dolor sit, amet consectetur adipisicing.
                            ?
                        </div>
                        <div
                            class="absolute text-xs bottom-0 right-0 -mb-5 mr-2 text-gray-500"
                        >
                            Seen
                        </div>
                    </div>
                </div>
            </div>
            <div v-else class="col-start-1 col-end-8 p-3 rounded-lg">
                <div class="flex flex-row items-center">
                    <div
                        class="flex items-center justify-center h-10 w-10 rounded-full bg-indigo-500 flex-shrink-0"
                    >
                        A
                    </div>
                    <div
                        class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl"
                    >
                        <div>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Perspiciatis, in.
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>
</template>
