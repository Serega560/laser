<script setup>
import Logo from '@/components/Logo.vue'
import Menu from '@/components/Menu.vue'
import Social from '@/components/Social.vue'
import Telephone from '@/components/Telephone.vue'
</script>

<template>
  <div class="header">
    <div class="container">
      <div class="header-block">

        <Logo />
        <Social position="header"/>
        <Telephone />
        <Menu />

      </div>
    </div>
  </div>
</template>

<style scoped lang="scss">
@use '@/assets/styles/media.scss' as *;
@use '@/assets/styles/container.scss' as *;

.header {
  position: relative;
  display: flex;
  background-color: var(--color-default-white);

  .header-block {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    flex-wrap: wrap;
    align-items: start;
    justify-content: flex-end;
    padding: 10px 0;
    gap: 0 15px;

    @include vp-767 {
      display: flex;
      padding: 8px 0;
      justify-content: space-between;
    }

    .header__menu {
      grid-column: 2/4;
      grid-row: 1 / 2;
      align-self: end;
      justify-self: end;
      background-color: var(--color-default-white);
    }
  }
}
</style>
