import { createRouter, createWebHashHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import ProductView from "../views/ProductView.vue";
import ContactView from "../views/ContactView.vue";
import MyProductView from "../views/MyProductView.vue";
import ShoppingView from "../views/ShoppingView.vue";

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
    path: "/my-pizza",
    name: "pizza",
    props: true,
    component: MyProductView,
  },
  {
    path: "/products/:id",
    name: "Product",
    props: true,
    component: ProductView,
  },
  {
    path: "/shopping",
    name: "Shopping",
    props: true,
    component: ShoppingView,
  },
];

const router = createRouter({
  history: createWebHashHistory(),
  routes,
});

export default router;
