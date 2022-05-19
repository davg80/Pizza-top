<template>
  <nav class="navbar">
    <router-link to="/">Accueil</router-link>
    <router-link to="/contact">Contact</router-link>
  </nav>
</template>

<script>
export default {
  name: "AppNavbar",
};
</script>

<style scoped lang="scss">
.navbar {
  padding: 30px;
  box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px,
    rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
  margin-bottom: 15px;
  a {
    font-weight: bold;
    color: #2c3e50;
    text-decoration: none;
    margin-right: 15px;

    &.router-link-exact-active {
      color: var(--main-red);
    }
  }
}
</style>
