<script setup>

</script>

<template>
  <div class="hero">
    <video poster="" autoplay="true" loop="true" muted="muted" playsinline="true">
      <source type="video/mp4" src="../assets/img/hero.mp4"/>
    </video>
    <div class="container">
      <div class="hero__block">
        <h1 class="hero__title">Лазерная резка ЧПУ неметаллов. <br>
          Быстро. Точно. С НДС и доставкой.</h1>
        <p class="hero__text">Фанера, оргстекло, силикон, резина и другие материалы. <br>
          Пробный образец — бесплатно. Работаем по всей России.
        </p>
      </div>
    </div>
  </div>

</template>

<style scoped lang="scss">
@use '@/assets/styles/media.scss' as *;
@use '@/assets/styles/container.scss' as *;

.hero {
  position: relative;
  max-height: 200px;

  video {
    position: absolute;
    height: 400px;
    width: 100%;
    object-fit: cover;
      z-index: -1;
  }

  .hero__block {
    padding-top: 200px;

    .hero__title {
      color: var(--color-default-white);
      font-size: 48px;
    }

    .hero__text {
      color: var(--color-default-white);
    }
  }

}


</style>
