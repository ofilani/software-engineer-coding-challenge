<script setup>
import Product from "@/components/product/index.vue";
import Header from "@/components/layout/index.vue";
</script>

<template>
  <!-- component -->
  <div class="overflow-x-hidden bg-gray-100">
    <!-- here header component -->
    <Header />

    <div class="px-6 py-8">
      <div class="container flex justify-between mx-auto">
        <div class="w-full lg:w-8/12">
          <!-- start -->
          <div class="flex gap-4 item-center flex-wrap">
            <!-- here product component -->
            <Product />
          </div>
          <!-- end -->

          <!-- here pagination component -->
        </div>
        <div class="hidden w-4/12 -mx-8 lg:block">
          <div class="px-8 mt-10">
            <!-- The button to open modal -->
            <label for="my-modal-3" class="btn modal-button"
              >Create product</label
            >

            <!-- Put this part before </body> tag -->
            <input type="checkbox" id="my-modal-3" class="modal-toggle" />
            <div class="modal">
              <div class="modal-box relative">
                <label
                  for="my-modal-3"
                  class="btn btn-sm btn-circle absolute right-2 top-2"
                  >✕</label
                >
                <h3 class="text-lg font-bold">
                  Congratulations random Interner user!
                </h3>
                <p class="py-4">
                  You've been selected for a chance to get one year of
                  subscription to use Wikipedia for free!
                </p>
              </div>
            </div>
          </div>
          <div class="px-8 mt-10">
            <h1 class="mb-4 text-xl font-bold text-gray-700">
              Filter by category
            </h1>
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
              <select class="select select-primary w-full max-w-xs">
                <option disabled selected>What is the best TV show?</option>
                <option>Game of Thrones</option>
                <option>Lost</option>
                <option>Breaking Bad</option>
                <option>Walking Dead</option>
              </select>
            </div>
          </div>

          <div class="px-8 mt-10">
            <h1 class="mb-4 text-xl font-bold text-gray-700">
              Filter by price
            </h1>
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
                  class="
                    input input-bordered input-sm input-primary
                    w-full
                    max-w-xs
                  "
                />
                <input
                  type="text"
                  placeholder="Max"
                  class="
                    input input-bordered input-sm input-primary
                    w-full
                    max-w-xs
                  "
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
        </div>
      </div>
    </div>
  </div>
</template>