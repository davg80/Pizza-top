<template>
  <div class="home">
    <h1>{{ titleProducts }}</h1>
    <div class="container-cards">
      <div v-for="product in products" :key="product.id">
        <router-link :to="{ name: 'Product', params: { id: product.id } }"
          ><Card :namePizza="product.name"
        /></router-link>
      </div>
    </div>
  </div>
</template>

<script setup>
// @ is an alias to /src
import { ref, onMounted, computed } from "vue";
import { useStore } from "vuex";
import Card from "@/components/Card.vue";

const titleProducts = ref("Mes pizzas");

const store = useStore();

const products = computed(() => {
  return store.getters.getProducts;
});

onMounted(() => {
  store.dispatch("fetchProducts");
});
</script>

<style scoped lang="scss">
.home {
  display: flex;
  align-items: center;
  flex-direction: column;
  h1 {
    margin-bottom: 35px;
  }
}
.container-cards {
  width: 80%;
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 20px;
}
</style>
