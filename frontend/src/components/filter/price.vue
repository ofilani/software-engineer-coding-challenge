<template>
  <div class="px-8 mt-10">
    <h1 class="mb-4 text-xl font-bold text-gray-700">Filter by price</h1>
    <div
      class="
        flex flex-col
        max-w-sm
        px-8
        py-6
        mx-auto
        bg-white
        rounded-lg
        shadow-md
      "
    >
      <div class="flex justify-content items-center gap-5">
        <input
          type="text"
          placeholder="Min"
          class="input input-bordered input-sm input-primary w-full max-w-xs"
        />
        <input
          type="text"
          placeholder="Max"
          class="input input-bordered input-sm input-primary w-full max-w-xs"
        />
        <a
          href="#"
          class="
            px-3
            py-2
            mx-1
            font-medium
            text-white
            bg-neutral
            rounded-md
            hover:bg-neutral-focus hover:text-white
          "
        >
          Filter
        </a>
      </div>
    </div>
  </div>
</template>