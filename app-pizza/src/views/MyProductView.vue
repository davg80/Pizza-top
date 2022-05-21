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
        <div>
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
        <button class="my-product-btn" @click="onSubmitProduct">
          Valider ma création
        </button>
        <div v-if="checkedNames.length > 0">
          Recapitulatifs des ingredients selectionnnés: {{ checkedNames }}
        </div>
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
        <button class="my-product-btn" @click="onSubmitIngredient">
          Ajouter un nouvel ingrédient
        </button>
      </form>
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

function onSubmitProduct() {
  console.log(checkedNames.value);
  console.log(newProduct.value);
}

function onSubmitIngredient() {
  //Update nouvel ingredient
  console.log(newIngredient.value);
  console.log(newPrice.value);
}

onMounted(() => {
  store.dispatch("fetchIngredients");
});
</script>
<style scoped lang="scss">
.my-product {
  .forms {
    display: flex;
    justify-content: center;
    align-items: start;
    flex-wrap: wrap;
    gap: 30px;
  }
  .left {
    min-height: 340px;
    margin-top: 35px;
    display: flex;
    align-items: center;
    flex-direction: column;
  }
  .right {
    margin-top: 35px;
    display: flex;
    align-items: center;
    flex-direction: column;
  }

  h1 {
    text-align: center;
    font-size: 35px;
    text-transform: uppercase;
    margin-bottom: 30px;
  }
  .form-group {
    margin-top: 15px;
  }
  .label-group-product {
    text-align: start;
    font-size: 22px;
    font-weight: 600;
    display: block;
    margin: 0px 0px 16px 0px;
  }

  .inputs-group-ingredients {
    display: flex;
    label {
      margin-left: 10px;
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
}
</style>
