<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <header>
        <nav class="bg-gray-100">
            <div class="max-w-6xl mx-auto px-4">
                <div class="flex justify-between">
                    <div class="flex space-x-4">
                        <!-- logo -->
                        <div>
                            <Link
                                href="#"
                                class="flex items-center py-5 px-2 text-gray-700 hover:text-gray-900"
                            >
                                <span class="font-bold"
                                    >Cruise Line Reservation System</span
                                >
                            </Link>
                        </div>

                        <!-- primary nav -->
                        <div class="hidden md:flex items-center space-x-1">
                            <Link
                                :href="route('ship.index')"
                                class="py-5 px-3 text-gray-700 hover:text-gray-900"
                                >Ship</Link
                            >
                            <Link
                                :href="route('cruise-lines.index')"
                                class="py-5 px-3 text-gray-700 hover:text-gray-900"
                                >Cruise Line</Link
                            >
                            <Link
                                :href="route('upcoming-deal.index')"
                                class="py-5 px-3 text-gray-700 hover:text-gray-900"
                                >Search</Link
                            >
                        </div>
                    </div>

                    <!-- secondary nav -->
                    <div
                        class="hidden md:flex items-center space-x-1"
                        v-if="!$page.props.auth.user"
                    >
                        <Link :href="route('login')" class="py-5 px-3"
                            >Login</Link
                        >
                        <Link
                            :href="route('register')"
                            class="py-2 px-3 bg-yellow-400 hover:bg-yellow-300 text-yellow-900 hover:text-yellow-800 rounded transition duration-300"
                            >Signup</Link
                        >
                    </div>
                    <template v-else>
                        <Link :href="route('dashboard')" class="py-5 px-3"
                            >Dashboard</Link
                        >
                    </template>

                    <!-- mobile button goes here -->
                    <div class="md:hidden flex items-center">
                        <button class="mobile-menu-button" @click="toggleMenu">
                            <svg
                                class="w-6 h-6"
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

            <!-- mobile menu -->
            <div
                class="mobile-menu md:hidden"
                :class="{ hidden: isMenuHidden }"
            >
                <Link href="#" class="block py-2 px-4 text-sm hover:bg-gray-200"
                    >Ship</Link
                >
                <Link href="#" class="block py-2 px-4 text-sm hover:bg-gray-200"
                    >Cruise Line</Link
                >
                <Link href="#" class="block py-2 px-4 text-sm hover:bg-gray-200"
                    >Search</Link
                >
            </div>
        </nav>
        <div
            class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:hidden pt-0 lg:pt-0 bg-gray-200"
            id="nav-content"
        >
            <ul class="list-reset lg:flex justify-end flex-1 items-center">
                <li class="mr-3 my-3">
                    <Link
                        class="mx-2 font-semibold text-gray-700 hover:text-teal-600"
                        href="/"
                        >Our Services</Link
                    >
                </li>
                <li class="mr-3 my-3">
                    <Link
                        class="mx-2 font-semibold text-gray-700 hover:text-teal-600"
                        href="/"
                        >About</Link
                    >
                </li>
                <li class="mr-3 my-3">
                    <Link
                        class="mx-2 font-semibold text-gray-700 hover:text-teal-600"
                        href="/"
                        >News & Events</Link
                    >
                </li>
                <li class="mr-3 mt-3">
                    <Link
                        class="mx-2 font-semibold text-gray-700 hover:text-teal-600"
                        href="/"
                        >Contact</Link
                    >
                </li>
            </ul>
        </div>
    </header>
    <slot />
</template>
