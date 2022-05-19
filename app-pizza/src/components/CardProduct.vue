<template>
  <article class="cardProduct-container">
    <div class="image-cardProduct">
      <img src="../assets/image1.jpg" alt="Pizza individuelle" />
    </div>
    <div class="list-ingredients-cardProduct">
      <ul v-for="ingredient in ingredients" :key="ingredient.id">
        <li @click="choice(ingredient.id)">
          <strong>{{
            ingredient.name[0].toUpperCase() + ingredient.name.slice(1)
          }}</strong>
          <span>{{ ingredient.price }} €</span>
        </li>
      </ul>
      <p class="total-cardProduct">Total: {{ getTotal }} €</p>
      <button class="btn-cardProduct">Commander</button>
    </div>
  </article>
</template>

<script>
export default {
  props: ["ingredients"],
  data() {
    return {
      removeOfTotal: 0,
    };
  },
  methods: {
    choice(id) {
      console.log(this.ingredients.filter((ingredient) => id == ingredient.id));
      let ingredientRemove = this.ingredients.filter(
        (ingredient) => id == ingredient.id
      );
      this.removeOfTotal = ingredientRemove.price;
      console.log(this.removeOfTotal);
      return ingredientRemove;
    },
  },
  computed: {
    getTotal() {
      let result = 0;
      let workForce = 0;
      for (const key in this.ingredients) {
        let productPrice = parseFloat(this.ingredients[key].price);
        result += productPrice;
      }
      workForce = result / 2;
      return (result + workForce).toFixed(2);
    },
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
        cursor: pointer;
        span {
          align-items: end;
        }
      }
    }
    .total-cardProduct {
      font-weight: bold;
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
