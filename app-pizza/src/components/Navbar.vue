<template>
  <nav class="navbar">
    <router-link to="/">Accueil</router-link>
    <router-link to="/my-pizza">Créer ma Pizza</router-link>
    <router-link to="/contact">Contact</router-link>
    <router-link to="/shopping" class="cart-orders">
      <img src="../assets/icons/shopping-cart.png" alt="Panier de commandes" />
      <span class="cart-count">{{ count }}</span>
    </router-link>
  </nav>
</template>

<script>
export default {
  name: "app-navbar",
};
</script>

<script setup>
import { computed } from "vue";
import { useStore } from "vuex";
const store = useStore();

// Computed
const count = computed(() => {
  return store.getters.getCounter;
});
</script>

<style scoped lang="scss">
.navbar {
  display: flex;
  align-items: center;
  padding: 30px;
  box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px,
    rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
  margin-bottom: 15px;
  background: #ffffff;
  a {
    font-weight: bold;
    color: #2c3e50;
    text-decoration: none;
    margin-right: 15px;

    &.router-link-exact-active {
      color: var(--main-red);
    }
  }

  .cart-orders {
    position: relative;
    img {
      width: 25px;
    }
    .cart-count {
      position: absolute;
      top: -12px;
      right: -5px;
      background: var(--main-red);
      width: 20px;
      height: 20px;
      border-radius: 50%;
      color: var(--main-white);
    }
  }
}
</style>
