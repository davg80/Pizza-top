<template>
  <AppNavbar />
  <router-view />
</template>

<script>
import AppNavbar from "@/components/Navbar";
export default {
  components: {
    AppNavbar,
  },
};
</script>
<style lang="scss">
*,
::before,
::after {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}
#app {
  font-family: "Open Sans", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
</style>
