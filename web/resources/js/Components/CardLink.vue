<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    title: {
        type: String,
        required: true,
    },
    description: {
        type: String,
    },
});
</script>
<template>
    <Link :href="href">
        <div class="duration-500 hover:scale-105 hover:shadow-xl">
            <div
                class="bg-white max-w-sm rounded overflow-hidden shadow-lg mx-auto my-8"
            >

                <slot />
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{ title }}</div>
                    <p v-if="description" class="text-gray-600 text-base">
                        {{ description }}
                    </p>
                </div>

            </div>
        </div>
    </Link>
</template>
