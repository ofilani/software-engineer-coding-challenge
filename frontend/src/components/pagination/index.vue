<template>
  <router-link
    :to="`${pagination}`"
    class="
      px-3
      py-2
      mx-1
      font-medium
      text-gray-700
      bg-white
      rounded-md
      hover:bg-blue-500 hover:text-white
    "
  >
    {{ pagination }}
  </router-link>
</template>

<script>
export default {
  name: "Pagination",
  props: ["pagination"],
};
</script>