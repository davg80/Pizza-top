<template>
  <div class="card-pizza">
    <div><img class="card-image" src="../assets/image1.jpg" alt="pizza" /></div>
    <h1>{{ namePizza }}</h1>
    <button class="card-btn">Voir plus</button>
  </div>
</template>

<script>
export default {
  name: "app-card",
  props: {
    namePizza: String,
  },
};
</script>

<style scoped lang="scss">
.card-pizza {
  position: relative;
  width: 250px;
  height: 300px;
  box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
  border-radius: 5px;
  h1 {
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
