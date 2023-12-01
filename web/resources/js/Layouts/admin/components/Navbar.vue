<template>
  <!-- Navbar -->
  <nav
    class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4"
  >
    <div
      class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4"
    >

      <div
        class="md:flex hidden flex-row flex-wrap items-center lg:ml-auto mr-3"
      >

      </div>
      <!-- User -->
      <ul
        class="flex-col md:flex-row list-none items-center hidden md:flex"
      >
        <user-dropdown-component></user-dropdown-component>
      </ul>
    </div>
  </nav>

  <!-- End Navbar -->
</template>
<script>
import UserDropdownComponent from "./UserDropdown.vue";
export default {
  components: {
    UserDropdownComponent
  }
};
</script>
