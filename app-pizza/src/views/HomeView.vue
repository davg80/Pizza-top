<template>
  <div class="home">
    <h1>{{ titleProducts }}</h1>
    <p class="subtitle-information">
      Toutes nos Pizzas sont disponibles en version Cheezy Crust ou en pâte Pan
      ou Classic, en taille Medium ou Xlarge
    </p>
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

// Initialisation

const titleProducts = ref("Nos pizzas");
const store = useStore();

// Computed
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
    text-align: center;
    font-size: 35px;
    text-transform: uppercase;
    margin-bottom: 30px;
    color: var(--main-red);
  }

  .subtitle-information {
    margin-bottom: 20px;
  }
}
.container-cards {
  width: 80%;
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 20px;

  a {
    text-decoration: none;
  }
}
</style>
