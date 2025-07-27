<script setup>

</script>

<template>
  <div class="about">
    <div class="container">
      <h2 class="about__title">О компании</h2>
      <div class="about__block">
        <img class="about__img" src="../assets/img/about.jpg" alt="фото">
        <div class="about__content">
          <h3 class="about__subtitle">Технологичная лазерная резка неметаллов на заказ</h3>
          <p class="about__text">Мы работаем на 19 современных станках с ЧПУ (до 300 Вт), режем точно, чисто и быстро. От единичных деталей до крупных партий.
            Максимальная рабочая зона — 1500×3000 мм.
            Работаем официально, с НДС и документами</p>
        </div>
      </div>
    </div>
  </div>

</template>

<style scoped lang="scss">
@use '@/assets/styles/media.scss' as *;
@use '@/assets/styles/container.scss' as *;

.about {
  margin-top: 200px;
  padding: 100px;

  .about__title {
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

  .about__block {
    display: flex;
    gap: 0 70px;

    .about__img {
      width: 500px;
      height: auto;
    }
  }

  .about__content {
    display: flex;
    flex-direction: column;
    gap: 40px 0;

    .about__subtitle{
      font-size: 32px;
      font-weight: 400;
    }

    .about__text {
      font-size: 26px;
      line-height: 30px;
    }
  }
}

</style>
