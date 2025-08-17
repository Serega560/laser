<script setup>
import {Swiper, SwiperSlide} from 'swiper/vue'
import {Autoplay} from 'swiper/modules'
import 'swiper/css'
import 'swiper/css/autoplay'

const modules = [Autoplay]

const imagesProducts = [
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
  <div class="products" id="products">
    <div class="container">
      <h2 class="products__title">Наши работы</h2>

      <Swiper lazy="true"
              :modules="modules"
              :loop="true"
              :speed="1000"
              :autoplay="{ delay: 2500, disableOnInteraction: false, pauseOnMouseEnter: false }"
              :space-between="10"
              :breakpoints="{767: {slidesPerView: 1}, 820: {slidesPerView: 2}, 1440: {slidesPerView: 4}}">
        <SwiperSlide v-for="(img, id) in imagesProducts" :key="id">
          <picture>
            <source
                :srcset="`${img.webp1x} 1x, ${img.webp2x} 2x`"
                type="image/webp"
            />
            <img class="products__img" :src="img.fallback" width="400" height="350" alt="фото услуги"
            />
          </picture>
          <div class="swiper-lazy-preloader"></div>
        </SwiperSlide>

      </Swiper>

    </div>
  </div>

</template>

<style scoped lang="scss">
@use '@/assets/styles/media.scss' as *;
@use '@/assets/styles/container.scss' as *;

.products {
  padding: 80px 0;

  @include vp-767 {
    padding: 40px 0;
  }

  .products__title {
    color: var(--color-bright-grey);
    font-size: 34px;
    margin-bottom: 40px;
    text-align: center;
    text-transform: uppercase;

    @include vp-767 {
      margin-bottom: 25px;
      font-size: 24px;
    }
  }

  .products__img {
    object-fit: cover;

    @include vp-767 {
      width: 100%;
      height: 100%;
      min-height: 385px;
    }
  }
}


</style>
