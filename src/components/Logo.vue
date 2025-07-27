<script setup>
import Logo from '@/assets/img/logo.png'

</script>

<template>
  <div class="logo">
    <a class="img" href="#">
      <img :src="Logo" alt="Logo" class="logo-img"/>
    </a>
    <p class="logo__text">лазерная <br>
      резка <br>
      неметаллов</p>
  </div>
</template>

<style scoped lang="scss">
@use '@/assets/styles/media.scss' as *;
@use '@/assets/styles/container.scss' as *;

.logo {
  display: flex;
  gap: 10px 0;
  margin-right: auto;

  .img {
    border: none;

    @include vp-767 {
      order: -2;
    }

    .logo-img {
      border-radius: 50%;
      width: 100px;
      height: 100px;

      @include vp-767 {
        width: 50px;
        height: 50px;
      }
    }
  }

  .logo__text {
    font-size: 26px;
    line-height: 32px;
    font-family: 'BankGothic', sans-serif;
  }
}


</style>
