<template>
  <section class="my-product">
    <h1>{{ titleCreateProduct }}</h1>
    <div class="forms">
      <form class="my-product-form left">
        <div class="form-group">
          <label htmlFor="name-product" class="label-group-product">
            Nom de la pizza</label
          >
          <input
            class="input-product"
            type="text"
            v-model="newProduct"
            id="name-product"
            placeholder=" Ex: Ma super pizza"
          />
        </div>
        <div class="list-ingredients">
          <div
            v-for="ingredient in allIngredients"
            :key="ingredient.id"
            class="inputs-group-ingredients"
          >
            <input
              type="checkbox"
              v-bind:id="ingredient.id"
              v-bind:value="ingredient.name"
              v-model="checkedNames"
            />
            <label v-bind:for="ingredient.id">{{ ingredient.name }}</label>
          </div>
        </div>
        <button class="my-product-btn" @click="addNewProduct">
          Valider ma création
        </button>
      </form>
      <form class="my-product-form right">
        <div class="form-group">
          <label for="new-ingredient" class="label-group-product">
            Ajouter un nouvel ingredient
          </label>
          <input
            class="input-product"
            type="text"
            v-model="newIngredient"
            id="new-ingredient"
            placeholder=" Ex: mon nouvel ingredient"
          />
        </div>
        <div class="form-group">
          <label for="new-price" class="label-group-product">
            Ajouter le prix
          </label>
          <input
            class="input-product"
            type="number"
            min="0"
            step="0.01"
            v-model="newPrice"
            id="new-price"
            placeholder=" Ex: 4.25"
          />
        </div>
        <button class="my-product-btn" @click="addNewIngredient">
          Ajouter un nouvel ingrédient
        </button>
      </form>
    </div>
    <div class="box-tags" v-if="checkedNames.length > 0">
      <h3>Mes choix:</h3>
      <div v-for="name in checkedNames" :key="name">
        <span>{{ name }}</span>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref, onMounted, computed } from "vue";
import { useStore } from "vuex";

// Initialisation
const titleCreateProduct = ref("Créer ma pizza");
const checkedNames = ref([]);
const newIngredient = ref("");
const newPrice = ref("");
const newProduct = ref("");
// Store
const store = useStore();

// Computed
const allIngredients = computed(() => {
  return store.getters.getAllIngredients;
});

function addNewProduct() {
  store.dispatch("addNewProduct", {
    name: newProduct.value,
    ingredients: checkedNames.value,
  });
}

function addNewIngredient() {
  store.dispatch("addNewIngredient", {
    name: newIngredient.value,
    price: newPrice.value,
  });
}
onMounted(() => {
  store.dispatch("fetchIngredients");
});
</script>
<style scoped lang="scss">
.my-product {
  .forms {
    position: relative;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 20px;
  }
  .left {
    width: 50%;
    min-width: 280px;
    height: max-content;
    min-height: 340px;
    padding: 20px;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    border-radius: 10px;
  }
  .right {
    height: max-content;
    min-height: 340px;
    padding: 20px;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    border-radius: 10px;
  }

  h1 {
    text-align: center;
    font-size: 35px;
    text-transform: uppercase;
    margin-bottom: 30px;
  }
  h3 {
    margin-right: 10px;
  }
  .form-group {
    margin-top: 15px;
  }
  .label-group-product {
    text-align: start;
    font-size: 18px;
    font-weight: 600;
    display: block;
    margin: 0px 0px 16px 0px;
  }

  .list-ingredients {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));

    .inputs-group-ingredients {
      display: flex;
      label {
        margin: 10px;
      }
    }
  }

  .input-product {
    width: 100%;
    height: 41px;
    background: var(--unnamed-color-ffffff) 0% 0% no-repeat padding-box;
    background: #ffffff 0% 0% no-repeat padding-box;
    box-shadow: 0px 0px 6px #0000000d;
    border: 2px solid #ffffff33;
    border-radius: 26px;
    opacity: 1;
    padding: 10px;
    margin-bottom: 25px;
    &:focus {
      outline: none;
      border: none;
      border: 2px solid var(--main-red);
    }
  }

  .my-product-btn {
    width: 235px;
    height: 35px;
    margin-top: 25px;
    background: var(--main-green);
    outline: none;
    border: none;
    border-radius: 15px;
    color: var(--main-color-white);
    font-weight: 600;
    cursor: pointer;
    &:hover {
      color: var(--main-white);
    }
  }

  .box-tags {
    width: 100%;
    margin-top: 20px;
    display: flex;
    justify-content: center;
    span {
      color: var(--main-gray);
      margin-right: 10px;
      background: var(--main-gray-light);
      padding: 5px 10px;
      border-radius: 15px;
    }
  }
}
</style>
