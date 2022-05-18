<template>
  <div class="product">
    <h1>{{ titleProduct }} : {{ product.name }}</h1>
    <ul v-for="ingredient in product.ingredients" :key="ingredient.id">
      <li>{{ ingredient.name }} {{ ingredient.price }} €</li>
    </ul>
  </div>
</template>

<script setup>
// @ is an alias to /src
import { ref, computed, onMounted } from "vue";
import { useRoute } from "vue-router";
import { useStore } from "vuex";

const titleProduct = ref("Ma pizza");
const route = useRoute();
const store = useStore();

const product = computed(() => {
  return store.getters.getCurrentProduct;
});

onMounted(() => {
  store.dispatch("setCurrentProduct", route.params.id);
});
</script>

<style scoped lang="scss"></style>
