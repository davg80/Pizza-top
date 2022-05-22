<template>
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
          @input="$emit('updateNames', $event.target.value)"
        />
        <label v-bind:for="ingredient.id">{{ ingredient.name }}</label>
      </div>
      <span class="error-list">{{ errorList }}</span>
    </div>
    <button class="my-product-btn" @click="addNewProduct">
      Valider ma création
    </button>
  </form>
</template>

<script>
export default {
  name: "ProductForm",
};
</script>

<script setup>
import { ref, computed } from "vue";
import { useStore } from "vuex";

// Initialisation
const checkedNames = ref([]);
const newProduct = ref("");
const errorProduct = ref("");
const errorList = ref("");

// Store
const store = useStore();

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
</script>

<style scoped lang="scss">
.left {
  width: 40%;
  min-width: max-content;
  min-height: 400px;
  padding: 20px;
  box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
  border-radius: 10px;
  background: #ffffff;
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
</style>
