<script setup>
import Logo from '@/assets/img/logo.png'

defineProps({
  inFooter: {
    type: Boolean,
    default: false
  }
})
</script>

<template>
  <div class="logo" :class="{ 'logo--footer': inFooter }">
    <a class="img" href="index.html">
      <img :src="Logo" alt="Logo" class="logo-img" width="1024" height="900" />
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
      width: 100px;
      height: 100px;

      @include vp-767 {
        width: 50px;
        height: 50px;
      }
    }
  }
}

.logo--footer {
  margin: 0;

  @include vp-767 {
    display: none;
  }
}

</style>
