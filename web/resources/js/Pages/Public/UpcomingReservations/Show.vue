<template>
    <GuestLayout>
        <div class="max-w-4xl mx-auto p-4">
            <!-- upcomingReservations Header -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-6">
                <div class="relative h-64">
                    <img
                        :src="
                            getImagePath(
                                upcomingReservations.dp_id,
                                upcomingReservations.ap_id
                            )
                        "
                        class="w-full h-full object-cover"
                        alt="upcomingReservations Image"
                    />
                    <div
                        class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/60 p-4"
                    >
                        <h1 class="text-2xl font-bold text-white">
                            {{ upcomingReservations.name }}
                        </h1>
                        <p class="text-white/90">
                            {{ upcomingReservations.description }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Ship Details with Image -->
            <div class="bg-white rounded-lg shadow p-4 mb-6">
                <h2 class="text-lg font-semibold mb-4">Ship Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="relative h-64 rounded-lg overflow-hidden">
                        <img
                            :src="
                                route('ship.img', upcomingReservations.ship.img)
                            "
                            class="w-full h-full object-cover"
                            alt="Ship Image"
                        />
                    </div>
                    <div class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-gray-600">Name</p>
                                <p class="font-medium">
                                    {{ upcomingReservations.ship.name }}
                                </p>
                            </div>
                            <div>
                                <p class="text-gray-600">Launch Year</p>
                                <p class="font-medium">
                                    {{ upcomingReservations.ship.launch_at }}
                                </p>
                            </div>
                            <div>
                                <p class="text-gray-600">Size</p>
                                <p class="font-medium">
                                    {{ upcomingReservations.ship.size }}
                                </p>
                            </div>
                            <div>
                                <p class="text-gray-600">Style</p>
                                <p class="font-medium">
                                    {{ upcomingReservations.ship.style }}
                                </p>
                            </div>
                            <div>
                                <p class="text-gray-600">Length</p>
                                <p class="font-medium">
                                    {{ upcomingReservations.ship.length }}m
                                </p>
                            </div>
                            <div>
                                <p class="text-gray-600">Width</p>
                                <p class="font-medium">
                                    {{ upcomingReservations.ship.width }}m
                                </p>
                            </div>
                            <div>
                                <p class="text-gray-600">Decks</p>
                                <p class="font-medium">
                                    {{ upcomingReservations.ship.decks }}
                                </p>
                            </div>
                            <div>
                                <p class="text-gray-600">Cabins</p>
                                <p class="font-medium">
                                    {{ upcomingReservations.ship.no_cabins }}
                                </p>
                            </div>
                        </div>
                        <p class="text-gray-600 mt-4">
                            {{ upcomingReservations.ship.description }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Room Details with Image -->
            <div class="bg-white rounded-lg shadow p-4 mb-6">
                <h2 class="text-lg font-semibold mb-4">Room Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="relative h-64 rounded-lg overflow-hidden">
                        <img
                            :src="
                                route(
                                    'ship.room_img',
                                    upcomingReservations.room.img
                                )
                            "
                            class="w-full h-full object-cover"
                            alt="Room View"
                        />
                    </div>
                    <div class="space-y-4">
                        <div>
                            <p class="text-gray-600">Room View</p>
                            <p class="font-medium">
                                {{ upcomingReservations.room.room_view }}
                            </p>
                        </div>
                        <div>
                            <p class="text-gray-600">Available Rooms</p>
                            <p class="font-medium">
                                {{ upcomingReservations.room.room_count }}
                            </p>
                        </div>
                        <div>
                            <p class="text-gray-600">Rooms Available</p>
                            <div class="flex flex-wrap gap-2 mt-2">
                                <span
                                    v-for="type in JSON.parse(
                                        upcomingReservations.room.list
                                    )"
                                    :key="type"
                                    class="px-3 py-1 bg-gray-100 rounded-full text-sm"
                                >
                                    {{ type }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Trip Details -->
            <div class="w-full md:w-1/2 mb-6 mx-auto">
                <!-- Departure & Arrival -->
                <div class="bg-white rounded-lg shadow p-4">
                    <h2 class="text-lg font-semibold mb-4">Journey Details</h2>
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <div class="w-1/2">
                                <p class="text-gray-600">Departure</p>
                                <p class="font-medium">
                                    {{
                                        formatDate(
                                            upcomingReservations.depart_at
                                        )
                                    }}
                                </p>
                                <p class="text-sm text-gray-500">
                                    {{
                                        upcomingReservations.departure_port.name
                                    }}
                                </p>
                            </div>
                            <div class="w-1/2">
                                <p class="text-gray-600">Arrival</p>
                                <p class="font-medium">
                                    {{
                                        formatDate(
                                            upcomingReservations.arrive_at
                                        )
                                    }}
                                </p>
                                <p class="text-sm text-gray-500">
                                    {{ upcomingReservations.arrival_port.name }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <!-- Package Features -->
            <div class="bg-white rounded-lg shadow p-4">
                <h2 class="text-lg font-semibold mb-4">Package Features</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div
                        v-if="upcomingReservations.package.is_d"
                        class="flex items-center"
                    >
                        <span class="text-green-500">✓</span>
                        <span class="ml-2">Dinner</span>
                    </div>
                    <div
                        v-if="upcomingReservations.package.is_bl"
                        class="flex items-center"
                    >
                        <span class="text-green-500">✓</span>
                        <span class="ml-2">Breakfast & Lunch</span>
                    </div>
                    <div
                        v-if="upcomingReservations.package.is_en"
                        class="flex items-center"
                    >
                        <span class="text-green-500">✓</span>
                        <span class="ml-2">Entertainment</span>
                    </div>
                    <div
                        v-if="upcomingReservations.package.is_c"
                        class="flex items-center"
                    >
                        <span class="text-green-500">✓</span>
                        <span class="ml-2">Casino</span>
                    </div>
                    <div
                        v-if="upcomingReservations.package.is_ona"
                        class="flex items-center"
                    >
                        <span class="text-green-500">✓</span>
                        <span class="ml-2">On-board Activities</span>
                    </div>
                    <div
                        v-if="upcomingReservations.package.is_outa"
                        class="flex items-center"
                    >
                        <span class="text-green-500">✓</span>
                        <span class="ml-2">Outside Activities</span>
                    </div>
                    <div
                        v-if="upcomingReservations.package.is_kt"
                        class="flex items-center"
                    >
                        <span class="text-green-500">✓</span>
                        <span class="ml-2">Kitchen</span>
                    </div>
                    <div
                        v-if="upcomingReservations.package.is_w"
                        class="flex items-center"
                    >
                        <span class="text-green-500">✓</span>
                        <span class="ml-2">WiFi</span>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-4">
                <h2 class="text-lg font-semibold mb-4">Pricing</h2>
                <div class="space-y-2">
                    <div class="flex justify-between">
                        <span>Base Price</span>
                        <span>${{ upcomingReservations.price }}</span>
                    </div>
                    <div class="flex justify-between text-gray-600">
                        <span>Tax</span>
                        <span>${{ upcomingReservations.tax }}</span>
                    </div>
                    <div class="flex justify-between text-gray-600">
                        <span>Room Count</span>
                        <span>{{ selectedRooms.length }}</span>
                    </div>
                    <div
                        class="flex justify-between font-semibold text-lg pt-2 border-t"
                    >
                        <span>Total</span>
                        <span>${{ selectedRoomCountTotal }}</span>
                    </div>
                    <div class="flex items-center">
                        <label for="rooms" class="mr-2">Number of Rooms:</label>
                        <div class="flex flex-wrap gap-2">
                            <div
                                v-for="room in availableRooms"
                                :key="room"
                                class="px-3 py-1 bg-gray-100 rounded-full text-sm cursor-pointer"
                                :class="{
                                    'bg-blue-500 text-white':
                                        selectedRooms.includes(room),
                                }"
                                @click="toggleRoom(room)"
                            >
                                {{ room }}
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button
                            :class="[
                                'bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded',
                                {
                                    'bg-gray-300 cursor-not-allowed':
                                        selectedRooms.length === 0,
                                },
                            ]"
                            :disabled="selectedRooms.length === 0"
                            @click="handlePayment"
                        >
                            Book Now
                        </button>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-4 mt-6">
                <h2 class="text-lg font-semibold mb-4">Customer Feedback</h2>
                <div v-if="feedbacks.length === 0" class="text-gray-500">
                    No feedback available.
                </div>
                <div v-else class="space-y-4">
                    <div
                     v-for="(feedback, index) in feedbacks"
                        :key="index"
                        class="border-b pb-4 mb-4"
                    >
                        <h3 class="font-semibold">{{ feedback.user.name }}</h3>
                        <p class="mt-2">{{ feedback.comment }}</p>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
<script setup>
import { computed, ref } from "vue";
import GuestLayout from "@/Layouts/GuestLayout2.vue";
import axios from "axios";
import { Head, Link, useForm } from "@inertiajs/vue3";

const props = defineProps({
    upcomingReservations: {
        type: Object,
        required: true,
    },
    feedbacks: {
        type: Array,
        required: true,
    },
});

const paypalFrom = useForm({
    id: props.upcomingReservations.id,
    selectedRooms: [],
    processing: false,
});

const formatDate = (dateString) => {
    return new Date(dateString).toLocaleDateString("en-US", {
        year: "numeric",
        month: "short",
        day: "numeric",
        hour: "2-digit",
        minute: "2-digit",
    });
};

function getImagePath(dp_id, ap_id) {
    console.log(dp_id, ap_id);
    const images = import.meta.globEager("./img/map/*.jpg");
    const imageKey = `./img/map/${dp_id}_to_${ap_id}.jpg`;

    const image = images[imageKey];

    if (!image) {
        console.error(`Image ${imageKey} not found.`);
        return ""; // or a default image path
    }

    return image.default;
}

const total = computed(() => {
    return (
        Number(props.upcomingReservations.price) +
        Number(props.upcomingReservations.tax)
    );
});

const availableRooms = computed(() => {
    return JSON.parse(props.upcomingReservations.room.list).filter((room) =>
        props.upcomingReservations.booked_rooms == null
            ? true
            : !props.upcomingReservations.booked_rooms.includes(room)
    );
});

const selectedRooms = ref([]);

const selectedRoomCountTotal = computed(() => {
    return selectedRooms.value.length * total.value;
});

function handlePayment() {
    // Add your payment logic here
    console.log("Handling payment for", selectedRooms.value, "rooms");
    paypalFrom.selectedRooms = selectedRooms.value;
    axios
        .get(route("processTransaction", paypalFrom))
        .then((response) => {
            // Redirect the user to the PayPal payment page
            window.location.href = response.data;
            // window.location.href = response.data;
        })
        .catch((error) => {
            window.location.href = route("login");
        });
}

function toggleRoom(room) {
    if (selectedRooms.value.includes(room)) {
        selectedRooms.value = selectedRooms.value.filter((r) => r !== room);
    } else {
        selectedRooms.value.push(room);
    }
}
</script>
