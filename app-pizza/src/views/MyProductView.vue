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
            required
          />
          <span class="error">{{ errorProduct }}</span>
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
          <span class="error-list">{{ errorList }}</span>
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
            required
          />
          <span class="error">{{ errorIngredient }}</span>
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
            required
          />
          <span class="error">{{ errorPrice }}</span>
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
const errorProduct = ref("");
const errorIngredient = ref("");
const errorList = ref("");
const errorPrice = ref("");
// Store
const store = useStore();
// Computed
const allIngredients = computed(() => {
  return store.getters.getAllIngredients;
});
function addNewProduct() {
  if (newProduct.value !== "" && checkedNames.value.length > 1) {
    store.dispatch("addNewProduct", {
      name: newProduct.value[0].toUpperCase() + newProduct.value.substring(1),
      ingredients: checkedNames.value,
    });
  } else {
    errorProduct.value = "Les champs ne peuvent pas être vides.";
    errorList.value = "Vous devez faire minimum 2 choix.";
  }
}
function addNewIngredient() {
  if (
    newIngredient.value !== "" &&
    newIngredient.value.length >= 2 &&
    newPrice.value !== "" &&
    parseFloat(newPrice.value)
  ) {
    store.dispatch("addNewIngredient", {
      name:
        newIngredient.value[0].toUpperCase() + newIngredient.value.substring(1),
      price: newPrice.value,
    });
  } else {
    errorIngredient.value =
      "Les champs ne peuvent pas être vides (2 caractères min).";
    errorPrice.value = "Le prix doit être un nombre (Ex: 4.25).";
  }
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
    width: 40%;
    min-width: max-content;
    min-height: 400px;
    padding: 20px;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    border-radius: 10px;
    background: #ffffff;
  }
  .right {
    width: 40%;
    min-width: max-content;
    min-height: 400px;
    padding: 20px;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    border-radius: 10px;
    background: #ffffff;
  }
  h1 {
    text-align: center;
    font-size: 35px;
    text-transform: uppercase;
    margin-bottom: 30px;
    color: var(--main-red);
  }
  h3 {
    margin-right: 10px;
  }
  .form-group {
    position: relative;
    margin-top: 25px;
    .error {
      position: absolute;
      left: 0;
      bottom: -20px;
    }
  }
  .label-group-product {
    text-align: start;
    font-size: 18px;
    font-weight: 600;
    display: block;
    margin: 0px 0px 25px 0px;
  }
  .list-ingredients {
    position: relative;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
    margin-top: 25px;
    .error-list {
      position: absolute;
      bottom: -20px;
      color: var(--main-red);
      font-size: 12px;
    }
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
    border: 2px solid var(--main-gray-light);
    border-radius: 26px;
    opacity: 1;
    padding: 10px;
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
