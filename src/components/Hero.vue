<script setup>

</script>

<template>
  <div class="hero">
    <video poster="" autoplay="true" loop="true" muted="muted" playsinline="true">
      <source type="video/mp4" src="../assets/img/hero.mp4"/>
    </video>
    <div class="container">
      <div class="hero__block">
        <div>
          <h1 class="hero__title">Лазерная резка ЧПУ неметаллов. <br>
            Быстро. Точно. С НДС и доставкой.</h1>
          <p class="hero__text">Фанера, оргстекло, силикон, резина и другие материалы. <br>
            Пробный образец — бесплатно. Работаем по всей России.
          </p>
        </div>
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

    @include vp-767 {
      height: 450px;
    }
  }

  .hero__block {
    padding-top: 170px;

    @include vp-767 {
      padding-top: 285px;
    }

    div {
      background-color: rgba(64, 99, 140, 0.7);
      border-radius: 15px;
      padding: 20px;
      width: max-content;

      @include vp-767 {
        width: 100%;
      }
    }

    .hero__title {
      color: var(--color-default-white);
      font-size: 40px;
      line-height: 40px;
      margin-bottom: 6px;

      @include vp-767 {
        font-size: 24px;
        line-height: 24px;
        margin-bottom: 0;
      }
    }

    .hero__text {
      font-size: 24px;
      color: var(--color-default-white);

      @include vp-767 {
        display: none;
      }
    }
  }
}


</style>
