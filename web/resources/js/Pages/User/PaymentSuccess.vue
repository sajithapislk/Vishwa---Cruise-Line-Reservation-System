<script setup>
import { Link,Head } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
defineProps({
    id:Number
});
</script>

<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout>

        <div class="py-12">
            <div class="card">
                <div
                    style="
                        border-radius: 200px;
                        height: 200px;
                        width: 200px;
                        background: #f8faf5;
                        margin: 0 auto;
                    "
                >
                    <i class="checkmark">✓</i>
                </div>
                <h1>Success</h1>
                <p>
                    Your payment Process Successfully!
                </p>
                <Link :href="route('paypal.pdf',id)" class="mt-6 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"> Payment Page </Link>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<style>
body {
    text-align: center;
    padding: 40px 0;
    background: #ebf0f5;
}
h1 {
    color: #88b04b;
    font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
    font-weight: 900;
    font-size: 40px;
    margin-bottom: 10px;
}
p {
    color: #404f5e;
    font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
    font-size: 20px;
    margin: 0;
}
i {
    color: #9abc66;
    font-size: 100px;
    line-height: 200px;
    margin-left: -15px;
}
.card {
    background: white;
    padding: 60px;
    border-radius: 4px;
    box-shadow: 0 2px 3px #c8d0d8;
    display: inline-block;
    margin: 0 auto;
}
</style>
