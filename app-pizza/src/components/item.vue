<template>
  <div class="item-image item">
    <img src="../assets/images/image1.jpeg" alt="Visuel de la pizza" />
  </div>
  <div class="item-name item">
    <h2><span>name:</span> {{ props.item.name }}</h2>
  </div>
  <div class="item-quantity item">
    <p><span>quantité:</span> {{ props.item.quantity }}</p>
  </div>
  <div class="item-total item">
    <p><span>prix:</span> {{ props.item.total }} €</p>
  </div>
  <div class="item-total item">
    <p><span>Total:</span> {{ props.item.total * props.item.quantity }} €</p>
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
}

.item-image {
  width: 350px;
  display: flex;
  img {
    width: 100%;
  }
}
span {
  font-weight: normal;
  font-size: 14px;
}
.item-quantity p {
  font-weight: bold;
}

.item-total p {
  font-weight: bold;
}
</style>
