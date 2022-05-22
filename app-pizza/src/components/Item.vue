<template>
  <div class="item-image item">
    <img src="../assets/images/image1.jpeg" alt="Visuel de la pizza" />
  </div>
  <div class="item-name item">
    <h2>{{ props.item.name }}</h2>
  </div>
  <div class="item-quantity item">
    <p>
      <span class="btn-quantity" @click="decremente(props)">➖</span>
      <span>quantité:</span>
      {{ props.item.quantity }}
      <span class="btn-quantity" @click="incremente(props)">➕</span>
    </p>
  </div>
  <div class="item-total item">
    <p>prix: {{ props.item.total }} €</p>
  </div>
  <div class="item-total item">
    <p>Total: {{ (props.item.total * props.item.quantity).toFixed(2) }} €</p>
  </div>
  <div class="item-trash item">
    <p @click="deleteProduct(props)">
      <img src="../assets/icons/delete.png" alt="Trash icons" />
    </p>
  </div>
</template>

<script>
export default {
  name: "app-item",
};
</script>

<script setup>
// Props
import { defineProps } from "vue";
import { useStore } from "vuex";
// Props
const props = defineProps({
  item: {
    type: Object,
  },
});

console.log(props.item);

// Initialisation
const store = useStore();
//methods
function incremente(props) {
  store.dispatch("plusCounter");
  return props.item.quantity++;
}
const deleteProduct = () => {
  return store.dispatch("removeProductToCart", props.item);
};
function decremente(props) {
  if (props.item.quantity < 1) {
    store.dispatch("removeProductToCart", props.item);
  }
  if (props.item.quantity >= 1) {
    store.dispatch("minusCounter");
    return props.item.quantity--;
  }
}
</script>

<style scoped lang="scss">
.item {
  margin: 10px;
  width: 150px;
  display: inline;
}
.item-image {
  width: 250px;
  display: flex;
  img {
    width: 100%;
  }
}
span {
  font-weight: normal;
  font-size: 14px;
}
.item-quantity {
  p {
    font-weight: bold;
    font-size: 0.875em;
  }
  .btn-quantity {
    width: 10px;
    height: 13px;
    border: 1px solid var(--main-gray-light);
    padding: 3px;
    border-radius: 50%;
    cursor: pointer;
    margin-right: 5px;
  }
}
.item-total p {
  font-weight: bold;
}
.item-trash {
  img {
    width: 25px;
  }
}
</style>
