<template>
  <div class="card-pizza">
    <div>
      <img class="card-image" src="../assets/images/image1.jpeg" alt="pizza" />
    </div>
    <h1>
      {{ props.namePizza[0].toUpperCase() + props.namePizza.substring(1) }}
    </h1>
    <button class="card-btn">Voir plus</button>
  </div>
</template>

<script>
export default {
  name: "app-card",
};
</script>

<script setup>
import { defineProps, onMounted, ref } from "vue";
const randomImage = ref("");
const props = defineProps({
  namePizza: {
    type: String,
  },
});
onMounted(() => {
  return (randomImage.value = "image1");
});
</script>

<style scoped lang="scss">
.card-pizza {
  position: relative;
  width: 250px;
  height: 300px;
  box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
  border-radius: 5px;
  background: var(--main-white);
  h1 {
    text-align: start;
    margin-left: 20px;
    margin-top: 10px;
    font-size: 18px;
    color: var(--main-gray);
  }
  .card-image {
    width: 250px;
    height: 150px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
  }
  .card-btn {
    position: absolute;
    left: 0;
    bottom: 0;
    border: none;
    width: 100%;
    padding: 18px 0px;
    cursor: pointer;
    font-size: 18px;
    background: var(--main-green);
    color: var(--main-white);
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    &:hover {
      color: var(--main-white);
      background: var(--main-green-light);
    }
  }
  &:hover {
    scale: 1.02;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
  }
}
</style>
