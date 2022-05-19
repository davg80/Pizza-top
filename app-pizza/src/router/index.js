import { createRouter, createWebHashHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import ProductView from "../views/ProductView.vue";
import ContactView from "../views/ContactView.vue";

const routes = [
  {
    path: "/",
    name: "home",
    component: HomeView,
  },
  {
    path: "/contact",
    name: "contact",
    component: ContactView,
  },
  {
    path: "/products/:id",
    name: "Product",
    props: true,
    component: ProductView,
  },
];

const router = createRouter({
  history: createWebHashHistory(),
  routes,
});

export default router;
