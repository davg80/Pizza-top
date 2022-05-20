<template>
  <section class="product">
    <h1>{{ titleProduct }} : {{ product.name }}</h1>
    <CardProduct :product="product" v-on:click="viewProduct(product)" />
  </section>
</template>

<script setup>
// @ is an alias to /src
import CardProduct from "@/components/CardProduct";
import { ref, computed, onMounted } from "vue";
import { useRoute } from "vue-router";
import { useStore } from "vuex";

// Initialisation
const titleProduct = ref("Ma pizza");
let productChoice = ref({});
const route = useRoute();
const store = useStore();

// Computed
const product = computed(() => {
  return store.getters.getCurrentProduct;
});

function viewProduct(product) {
  productChoice = product;
  console.log(productChoice);
}

onMounted(() => {
  store.dispatch("setCurrentProduct", route.params.id);
  store.dispatch("setIngredients", route.params.id);
});
</script>

<style scoped lang="scss">
.product {
  width: 100%;
  display: flex;
  align-items: center;
  flex-direction: column;
  h1 {
    text-align: center;
    font-size: 35px;
    text-transform: uppercase;
    margin-bottom: 30px;
  }
}
</style>
