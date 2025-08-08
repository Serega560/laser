<script setup>
import Logo from '@/assets/img/logo.png'

</script>

<template>
  <div class="logo">
    <a class="img" href="index.html">
      <img :src="Logo" alt="Logo" class="logo-img"/>
    </a>
  </div>
</template>

<style scoped lang="scss">
@use '@/assets/styles/media.scss' as *;
@use '@/assets/styles/container.scss' as *;

.logo {
  display: flex;
  margin-right: auto;

  @include vp-767 {
    margin: 0;
    order: -2;
  }

  .img {
    border: none;

    .logo-img {
      border-radius: 50%;
      width: 120px;
      height: 120px;

      @include vp-767 {
        width: 50px;
        height: 50px;
      }
    }
  }
}


</style>
