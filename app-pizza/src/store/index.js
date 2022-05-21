import { createStore } from "vuex";
import axios from "axios";
import router from "@/router";

export default createStore({
  state: {
    products: [],
    shoppingCart: [],
    currentProduct: {},
    ingredientsByProduct: [],
    allIngredients: [],
    //newProduct: { name: "", ingredients: [] },
    //newIngredient: {},
    counter: 0,
  },
  getters: {
    getProducts: (state) => state.products,
    getCurrentProduct: (state) => state.currentProduct,
    getIngredients: (state) => state.ingredientsByProduct,
    getAllIngredients: (state) => state.allIngredients,
    getShoppingCart: (state) => state.shoppingCart,
    getCounter: (state) => state.counter,
  },
  actions: {
    async fetchProducts({ commit }) {
      try {
        const data = await axios.get("http://127.0.0.1:8000/api/products");
        commit("SET_PRODUCTS", data.data["hydra:member"]);
      } catch (error) {
        console.log(error);
      }
    },
    async setCurrentProduct({ commit }, productId) {
      try {
        const productFound = await axios.get(
          `http://127.0.0.1:8000/api/products/${productId}`
        );
        //console.log(productFound.data);
        commit("SET_CURRENT_PRODUCT", productFound.data);
      } catch (error) {
        console.log(error);
      }
    },
    async setIngredients({ commit }, productId) {
      try {
        const productFound = await axios.get(
          `http://127.0.0.1:8000/api/products/${productId}`
        );
        commit("SET_INGREDIENTS", productFound.data.ingredients);
      } catch (error) {
        console.log(error);
      }
    },
    async fetchIngredients({ commit }) {
      try {
        const data = await axios.get("http://127.0.0.1:8000/api/ingredients");
        commit("SET_ALL_INGREDIENTS", data.data["hydra:member"]);
      } catch (error) {
        console.log(error);
      }
    },
    addProductToCart(context, product) {
      console.log(context.state.shoppingCart);
      if (product) {
        const cart = context.state.shoppingCart.find(
          (item) => item.id === product.id
        );
        if (!cart) {
          context.commit("ADD_PRODUCT", product.id);
        } else {
          context.commit("ADD_QUANTITY", cart);
        }
        context.commit("REMOVE_QUANTITY", product);
      }
    },
    addNewProduct(context, newProduct) {
      let tmpArray = [];
      let listIngredients = [];
      newProduct.ingredients.forEach((ingredient) => {
        tmpArray.push(ingredient);
      });
      context.state.allIngredients.forEach((ingredient) => {
        if (tmpArray.find((element) => element === ingredient.name)) {
          listIngredients.push(`/api/ingredients/${ingredient.id}`);
        }
      });
      console.log({ name: newProduct.name, ingredients: listIngredients });
      try {
        axios.post("http://127.0.0.1:8000/api/products", {
          name: newProduct.name,
          ingredients: listIngredients,
        });
      } catch (e) {
        console.log(e);
      }
      router.push("/");
    },
    addNewIngredient(context, newIngredient) {
      console.log(newIngredient);
      try {
        axios.post("http://127.0.0.1:8000/api/ingredients", newIngredient);
      } catch (e) {
        console.log(e);
      }
      router.push("/");
    },
  },
  mutations: {
    SET_PRODUCTS(state, products) {
      state.products = products;
    },
    SET_CURRENT_PRODUCT(state, productId) {
      state.currentProduct = productId;
    },
    SET_INGREDIENTS(state, productId) {
      state.ingredientsByProduct = productId;
    },
    SET_ALL_INGREDIENTS(state, ingredients) {
      state.allIngredients = ingredients;
    },
    ADD_PRODUCT(state, productId) {
      state.shoppingCart.push({
        id: productId,
        quantity: 1,
      });
      state.counter++;
    },
    ADD_QUANTITY(state, product) {
      product.quantity++;
      state.counter++;
    },
    REMOVE_QUANTITY(state, product) {
      product.quantity--;
    },
  },
  modules: {},
});
