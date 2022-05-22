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
  min-height: 100vh;
  max-height: 100%;
  font-family: "Open Sans", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  background: var(--main-bg-app);
}

.error {
  color: var(--main-red);
  font-size: 12px;
}
</style>
