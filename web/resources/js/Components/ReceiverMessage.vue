<script setup>
defineProps({
    value: String,
});
</script>
<template>
    <div class="flex items-center flex-row-reverse mb-4 mr-4">
        <!-- <div class="flex-none flex flex-col items-center space-y-1 ml-4">
          <img class="rounded-full w-10 h-10" src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" />
          <a href="#" class="block text-xs hover:underline">Jesse</a>
        </div> -->
        <div class="flex-1 bg-indigo-100 text-gray-800 p-2 rounded-lg mb-2 relative">
          <div>{{ value }}</div>

          <!-- arrow -->
          <!-- <div class="absolute right-0 top-1/2 transform translate-x-1/2 rotate-45 w-2 h-2 bg-indigo-100"></div> -->
          <!-- end arrow -->
        </div>
      </div>
</template>
