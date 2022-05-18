import { createStore } from "vuex";
import axios from "axios";

export default createStore({
  state: {
    products: [],
    cart: [],
    currentProduct: {},
    ingredients: [],
  },
  getters: {
    getProducts: (state) => state.products,
    getCurrentProduct: (state) => state.currentProduct,
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
        console.log(productFound.data);
        commit("SET_CURRENT_PRODUCT", productFound.data);
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
  },
  modules: {},
});
