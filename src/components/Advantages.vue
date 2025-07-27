<script setup>

</script>

<template>
  <div class="advantages">
    <div class="container">
      <h2 class="advantages__title">Наши преимущества</h2>
      <div class="advantages__block">

      </div>
    </div>
  </div>

</template>

<style scoped lang="scss">
@use '@/assets/styles/media.scss' as *;
@use '@/assets/styles/container.scss' as *;

.advantages {
  padding-top: 100px;

  .advantages__title {
    color: var(--color-bright-grey);
    font-size: 40px;
    margin-bottom: 70px;
    text-align: center;
    text-transform: uppercase;

    @include vp-767 {
      margin-bottom: 25px;
      font-size: 24px;
    }
  }
}

</style>
