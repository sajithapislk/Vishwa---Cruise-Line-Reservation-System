<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <header>
        <nav class="bg-white shadow-sm">
            <div class="max-w-6xl mx-auto px-4">
                <div class="flex justify-between">
                    <div class="flex space-x-4">
                        <!-- Logo -->
                        <div>
                            <Link
                                href="/"
                                class="flex items-center py-5 px-2 text-gray-800 hover:text-blue-500"
                            >
                                <span class="font-bold text-lg"
                                    >Cruise Company Reservation System</span
                                >
                            </Link>
                        </div>

                        <!-- Primary Nav -->
                        <div class="hidden md:flex items-center space-x-1">
                            <Link
                                :href="route('ship.index')"
                                class="py-5 px-3 text-gray-600 hover:text-blue-500 transition-colors duration-200"
                            >
                                Cruise Ships
                            </Link>
                            <Link
                                :href="route('cruise-company.index')"
                                class="py-5 px-3 text-gray-600 hover:text-blue-500 transition-colors duration-200"
                            >
                                Cruise Company
                            </Link>
                            <Link
                                :href="route('port.index')"
                                class="py-5 px-3 text-gray-600 hover:text-blue-500 transition-colors duration-200"
                            >
                                Ports
                            </Link>
                            <Link
                                :href="route('upcoming-reservations.index')"
                                class="py-5 px-3 text-gray-600 hover:text-blue-500 transition-colors duration-200"
                            >
                                Search and Exploration
                            </Link>

                        </div>
                    </div>

                    <!-- Secondary Nav -->
                    <div
                        class="hidden md:flex items-center space-x-1"
                        v-if="!$page.props.auth.user"
                    >
                        <Link :href="route('login')" class="py-5 px-3 text-gray-600 hover:text-blue-500">
                            Login
                        </Link>
                        <Link
                            :href="route('register')"
                            class="py-2 px-3 bg-blue-500 hover:bg-blue-400 text-white rounded transition duration-300"
                        >
                            Signup
                        </Link>
                    </div>
                    <template v-else>
                        <Link :href="route('dashboard')" class="py-5 px-3 text-gray-600 hover:text-blue-500">
                            Booked
                        </Link>
                    </template>

                    <!-- Mobile Button -->
                    <div class="md:hidden flex items-center">
                        <button class="mobile-menu-button" @click="toggleMenu">
                            <svg
                                class="w-6 h-6 text-gray-600"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"
                                />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div
                class="mobile-menu md:hidden bg-gray-100 p-4"
                :class="{ hidden: isMenuHidden }"
            >
                <Link href="#" class="block py-2 px-4 text-sm text-gray-600 hover:bg-gray-200 rounded">
                    Cruise Ships
                </Link>
                <Link href="#" class="block py-2 px-4 text-sm text-gray-600 hover:bg-gray-200 rounded">
                    Cruise Company
                </Link>
                <Link href="#" class="block py-2 px-4 text-sm text-gray-600 hover:bg-gray-200 rounded">
                    Search
                </Link>
            </div>
        </nav>
        <div
            class="w-full lg:flex lg:items-center lg:w-auto hidden lg:hidden bg-blue-100 pt-0 lg:pt-0"
            id="nav-content"
        >
            <ul class="list-reset lg:flex justify-end flex-1 items-center space-x-6">
                <li>
                    <Link
                        class="mx-2 font-semibold text-gray-700 hover:text-blue-500"
                        href="/"
                    >
                        Our Services
                    </Link>
                </li>
                <li>
                    <Link
                        class="mx-2 font-semibold text-gray-700 hover:text-blue-500"
                        href="/"
                    >
                        About
                    </Link>
                </li>
                <li>
                    <Link
                        class="mx-2 font-semibold text-gray-700 hover:text-blue-500"
                        href="/"
                    >
                        News & Events
                    </Link>
                </li>
                <li>
                    <Link
                        class="mx-2 font-semibold text-gray-700 hover:text-blue-500"
                        href="/"
                    >
                        Contact
                    </Link>
                </li>
            </ul>
        </div>
    </header>

    <slot />

    <!-- Footer -->
    <section class="bg-gray-50">
        <div
            class="max-w-screen-xl px-4 py-12 mx-auto space-y-8 overflow-hidden sm:px-6 lg:px-8"
        >
            <div class="flex justify-center space-x-6">
                <a href="#" class="text-gray-500 hover:text-gray-800">
                    <span class="sr-only">Facebook</span>
                    <!-- Social Media SVGs go here -->
                </a>
                <a href="#" class="text-gray-500 hover:text-gray-800">
                    <span class="sr-only">Instagram</span>
                    <!-- Social Media SVGs go here -->
                </a>
                <a href="#" class="text-gray-500 hover:text-gray-800">
                    <span class="sr-only">Twitter</span>
                    <!-- Social Media SVGs go here -->
                </a>
            </div>
            <p class="mt-8 text-base leading-6 text-center text-gray-500">
                © 2025 Cruise Company, Inc. All rights reserved.
            </p>
        </div>
    </section>
</template>
