<template>
  <div class="item-image item">
    <img src="../assets/images/image1.jpeg" alt="Visuel de la pizza" />
  </div>
  <div class="item-name item">
    <h2>{{ props.item.name }}</h2>
  </div>
  <div class="item-quantity item">
    <p>
      <span class="btn-quantity">➖</span>
      <span>quantité:</span>
      {{ props.item.quantity }}
      <span class="btn-quantity">➕</span>
    </p>
  </div>
  <div class="item-total item">
    <p>prix: {{ props.item.total }} €</p>
  </div>
  <div class="item-total item">
    <p>Total: {{ props.item.total * props.item.quantity }} €</p>
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

const props = defineProps({
  item: {
    type: Object,
  },
});

console.log(props);
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
}

.item-total p {
  font-weight: bold;
}
</style>
