<script setup>
import Product from "@/components/product/index.vue";
import Header from "@/components/layout/index.vue";
import Pagination from "@/components/pagination/index.vue";
import FilterByPrice from "@/components/filter/price.vue";
import FilterByCategory from "@/components/filter/category.vue";
import Modal from "@/components/modal/index.vue";
</script>

<template>
  <div class="overflow-x-hidden bg-gray-100">
    <Header />

    <div class="px-6 py-8">
      <div class="container flex justify-between mx-auto">
        <div class="w-full lg:w-8/12">
          <div class="flex gap-4 item-center flex-wrap">
            <Product
              v-for="product in products"
              :key="product.id"
              :product="product"
            />
          </div>

          <div class="mt-8">
            <div class="flex">
              <a
                href="#"
                class="
                  px-3
                  py-2
                  mx-1
                  font-medium
                  text-gray-500
                  bg-white
                  rounded-md
                  cursor-not-allowed
                "
              >
                previous
              </a>
              <Pagination
                v-for="number in pagination.to"
                :pagination="number"
                :key="`paginate#${number}`"
              />

              <a
                href="#"
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
                Next
              </a>
            </div>
          </div>
        </div>
        <div class="hidden w-4/12 -mx-8 lg:block">
          <Modal />

          <FilterByCategory />

          <FilterByPrice />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      products: [],
      pagination: {
        from: null,
        to: null,
        first_page_url: null,
        last_page: null,
        prev_page_url: null,
        next_page_url: null,
      },
    };
  },

  methods: {
    allProduct(pageNumber = 1) {
      axios
        .get(`http://127.0.0.1:8000/api/v1/products?page=${pageNumber}`)
        .then(({ data }) => {
          this.products = data.data;
          this.pagination = { ...data };
        })
        .catch((err) => {});
    },
  },
  beforeRouteUpdate(to) {
    // return the promise so vue router knows to wait on the API call before loading the page
    this.allProduct(to.query.page);
  },
  created() {
    this.allProduct(this.$route.query.id);
  },
};
</script>