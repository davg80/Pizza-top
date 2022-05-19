<template>
  <article class="cardProduct-container">
    <div class="image-cardProduct">
      <img src="../assets/image1.jpg" alt="Pizza individuelle" />
    </div>
    <div class="list-ingredients-cardProduct">
      <ul v-for="ingredient in ingredients" :key="ingredient.id">
        <li>
          <strong>{{
            ingredient.name[0].toUpperCase() + ingredient.name.slice(1)
          }}</strong>
          <span>{{ ingredient.price }} €</span>
        </li>
      </ul>
      <button class="btn-cardProduct">Commander</button>
    </div>
  </article>
</template>

<script>
export default {
  name: "CardProduct",
  props: {
    ingredients: Array,
  },
};
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
    width: 50%;
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
        span {
          align-items: end;
        }
      }
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
</style>
