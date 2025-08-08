<script setup>
import {Swiper, SwiperSlide} from 'swiper/vue'
import 'swiper/css'
import {onMounted, ref} from 'vue'
import 'swiper/css/effect-cube'
import {EffectCube, Autoplay} from 'swiper/modules'

const swiperRef = ref(null)
onMounted(() => {
  if (swiperRef.value && swiperRef.value.swiper) {
    swiperRef.value.swiper.autoplay.start()
  }
})

const images = [
  {id: 1, img: "photo_1.jpg"},
  {id: 2, img: "photo_2.jpg"},
  {id: 3, img: "photo_3.jpg"},
  {id: 4, img: "photo_4.jpg"},
  {id: 5, img: "photo_5.jpg"},
].map(({id, img}) => ({
  id,
  webp1x: new URL(`../assets/img/${img}?format=webp&width=400`, import.meta.url).href,
  webp2x: new URL(`../assets/img/${img}?format=webp&width=800`, import.meta.url).href,
  fallback: new URL(`../assets/img/${img}?width=400`, import.meta.url).href
}))
</script>

<template>
  <div class="about">
    <div class="container">
      <h2 class="about__title">О компании</h2>
      <div class="about__block">

        <Swiper
            :loop="true"
            :modules="[EffectCube, Autoplay]"
            effect="cube"
            :speed="1000"
            :space-between="10"
            :autoplay="{delay: 2500, disableOnInteraction: false, pauseOnMouseEnter: false }"
            :cube-effect="{shadow: true, slideShadows: true, shadowOffset: 20, shadowScale: 0.94}"
            class="about__swiper"
        >
          <SwiperSlide v-for="(img, id) in images" :key="id" class="about--slide">
            <picture>
              <source
                  :srcset="`${img.webp1x} 1x, ${img.webp2x} 2x`" type="image/webp"/>
              <img class="about__img" :src="img.fallback" width="500px" height="500" alt="фото услуги"/>
            </picture>
          </SwiperSlide>
        </Swiper>

        <div class="about__content">
          <h3 class="about__subtitle">Технологичная лазерная резка неметаллов на заказ.</h3>
          <p class="about__text">Мы работаем на 19 современных станках с ЧПУ (до 300 Вт), режем точно, чисто и быстро.
            От единичных деталей до крупных партий.
            Максимальная рабочая зона — 1500×3000 см.
            Работаем официально, с НДС и документами.</p>
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
  padding-top: 120px;

  @include vp-767 {
    padding: 100px 0 0;
  }

  .about__title {
    color: var(--color-bright-grey);
    font-size: 34px;
    margin-bottom: 70px;
    text-align: center;
    text-transform: uppercase;

    @include vp-767 {
      margin-bottom: 25px;
      font-size: 24px;
    }
  }

  .about__block {
    display: grid;
    grid-template-columns: 500px 600px;
    gap: 0 100px;
    align-items: flex-end;

    @include vp-767 {
      grid-template-columns: 1fr;
      gap: 20px 0;
    }

    .about__swiper {
      will-change: transform;
      transform: translateZ(0);
      width: 500px;

      @include vp-767 {
        width: 300px;
        height: 300px;
      }
    }

    .about__img {
      width: 500px;
      height: 500px;
      object-fit: cover;

      @include vp-767 {
        width: 100%;
        height: 100%;
        min-height: 300px;
      }
    }
  }

  .about__content {
    display: flex;
    flex-direction: column;
    gap: 40px 0;

    @include vp-767 {
      gap: 20px 0;
    }

    .about__subtitle {
      font-size: 36px;
      font-weight: 400;
      color: var(--color-bright-grey);

      @include vp-767 {
        font-size: 24px;
        line-height: 26px;
      }
    }

    .about__text {
      font-size: 30px;
      line-height: 40px;
      color: var(--color-bright-grey);

      @include vp-767 {
        font-size: 20px;
        line-height: 22px;
        text-align: justify;
      }
    }
  }
}

</style>
