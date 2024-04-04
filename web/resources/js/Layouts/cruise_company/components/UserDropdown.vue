<template>
    <div>
        <a
            class="text-blueGray-500 block"
            href="#pablo"
            v-on:click="toggleDropdown($event)"
            ref="btnDropdownRef"
        >
            <div class="items-center flex">
                <span
                    class="w-12 h-12 text-sm text-white bg-blueGray-200 inline-flex items-center justify-center rounded-full"
                >
                    <img
                        alt="..."
                        class="w-full rounded-full align-middle border-none shadow-lg"
                        src="../assets/img/team-1-800x800.jpg"
                    />
                </span>
            </div>
        </a>
        <div
            ref="popoverDropdownRef"
            class="bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg mt-1"
            v-bind:class="{
                hidden: !dropdownPopoverShow,
                block: dropdownPopoverShow,
            }"
            style="min-width: 12rem"
        >
            <DropdownLink
                :href="route('cruise-company-agent.logout')"
                method="post"
                as="button"
            >
                Log Out
            </DropdownLink>
        </div>
    </div>
</template>
<script>
import { createPopper } from "@popperjs/core";
import DropdownLink from "@/Components/DropdownLink.vue";

export default {
    data() {
        return {
            dropdownPopoverShow: false,
        };
    },
    methods: {
        toggleDropdown: function (event) {
            event.preventDefault();
            if (this.dropdownPopoverShow) {
                this.dropdownPopoverShow = false;
            } else {
                this.dropdownPopoverShow = true;
                createPopper(
                    this.$refs.btnDropdownRef,
                    this.$refs.popoverDropdownRef,
                    {
                        placement: "bottom-end",
                    }
                );
            }
        },
    },
    components: {
        DropdownLink,
    },
};
</script>
