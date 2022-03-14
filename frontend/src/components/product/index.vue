<template>
  <div class="card w-48 bg-base-100 shadow-xl">
    <figure>
      <img
        :src="`http://127.0.0.1:8000/images/products/${product.image}`"
        alt="Shoes"
      />
    </figure>
    <div class="card-body">
      <h2 class="card-title">{{ product.name }}</h2>
      <p>{{ product.description }}</p>
      <div class="card-actions justify-end">
        <span class="text-gray-500 mt-2">{{ product.price }}</span>

        <button class="btn btn-primary btn-sm">Buy Now</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Product",
  props: ["product"],
};
</script>