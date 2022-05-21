<template>
  <article class="cardProduct-container">
    <div class="image-cardProduct">
      <img src="../assets/image1.jpg" alt="Pizza individuelle" />
    </div>
    <div class="list-ingredients-cardProduct">
      <ul v-for="ingredient in props.product.ingredients" :key="ingredient.id">
        <li>
          <strong>{{
            ingredient.name[0].toUpperCase() + ingredient.name.slice(1)
          }}</strong>
          <span>{{ ingredient.price }} €</span>
        </li>
      </ul>
      <p class="total-cardProduct">Total: {{ props.product.total }} €</p>
      <button class="btn-cardProduct" @click="addProductToCart(product)">
        Commander
      </button>
    </div>
  </article>
</template>

<script>
export default {
  name: "app-CardProduct",
};
</script>

<script setup>
import { defineProps } from "vue";
import { useStore } from "vuex";

// Props
const props = defineProps({
  product: {
    type: Object,
  },
});

//Initialisation
const store = useStore();

function addProductToCart(product) {
  store.dispatch("addProductToCart", product);
}
</script>

<style scoped lang="scss">
.cardProduct-container {
  width: 62%;
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;

  .image-cardProduct img {
    width: 100%;
    height: max-content;
  }

  .list-ingredients-cardProduct {
    width: 60%;
    display: flex;
    align-items: center;
    flex-direction: column;
    ul {
      width: 80%;
      list-style-type: none;
      li {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
        cursor: pointer;
        span {
          align-items: end;
        }
      }
    }
    .total-cardProduct {
      font-weight: bold;
      margin-bottom: 10px;
    }
    .btn-cardProduct {
      position: absolute;
      right: 0;
      bottom: 0;
      border: none;
      width: 100%;
      padding: 18px 0px;
      cursor: pointer;
      font-size: 18px;
      background: var(--main-green);
      color: var(--main-white);
      &:hover {
        color: var(--main-white);
        background: var(--main-green-light);
      }
    }
  }
}

@media only screen and (max-width: 980px) {
  .cardProduct-container {
    flex-wrap: wrap;
    .list-ingredients-cardProduct {
      min-height: 350px;
      margin: 10px 0px;
    }
  }
}
</style>
