<template>
  <section class="shopping">
    <h1>Ma commande</h1>
    <div class="shopping-cart" v-for="item in shoppingCart" :key="item.id">
      <Item :item="item" />
    </div>
    <div class="item-name">
      <h2><span>Total des produits:</span> {{ totalOrder.toFixed(2) }} €</h2>
    </div>
  </section>
</template>

<script setup>
// @ is an alias to /src
import { useStore } from "vuex";
import { computed } from "vue";
import Item from "@/components/item";
const store = useStore();

// Computed
const shoppingCart = computed(() => {
  return store.getters.getShoppingCart;
});

const totalOrder = computed(() => {
  let result = 0;
  shoppingCart.value.forEach((item) => {
    console.log(item);
    result += parseFloat(item.total) * parseInt(item.quantity);
  });
  return result;
});
</script>

<style scoped lang="scss">
.shopping {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  h1 {
    text-align: center;
    font-size: 35px;
    text-transform: uppercase;
    margin-bottom: 30px;
    color: var(--main-red);
  }
  .shopping-cart {
    display: flex;
    justify-content: space-around;
    align-items: center;
    box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
    width: 65%;
    margin-bottom: 15px;
    background: #ffffff;
    &:hover {
      scale: 1.011;
    }
  }
}

@media only screen and (max-width: 680px) {
  .shopping-cart {
    flex-direction: column;
  }
}
</style>
