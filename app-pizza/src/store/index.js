import { createStore } from "vuex";
import axios from "axios";

export default createStore({
  state: {
    products: [],
    cart: [],
    currentProduct: {},
    ingredients: [],
    counter: 0,
    total: 0,
  },
  getters: {
    getProducts: (state) => state.products,
    getCurrentProduct: (state) => state.currentProduct,
    getIngredients: (state) => state.ingredients,
  },
  actions: {
    async fetchProducts({ commit }) {
      try {
        const data = await axios.get("http://127.0.0.1:8000/api/products");
        console.log(data.data["hydra:member"]);
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
        console.log(productFound.data.ingredients);
        commit("SET_INGREDIENTS", productFound.data.ingredients);
      } catch (error) {
        console.log(error);
      }
    },
    async setOneIngredients({ commit }, productId) {
      try {
        const productFound = await axios.get(
          `http://127.0.0.1:8000/api/products/${productId}`
        );
        console.log(productFound.data.ingredients);
        commit("SET_INGREDIENTS", productFound.data.ingredients);
      } catch (error) {
        console.log(error);
      }
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
      state.ingredients = productId;
    },
  },
  modules: {},
});
