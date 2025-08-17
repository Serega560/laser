<script setup>

import Logo from "@/components/Logo.vue";
import Social from "@/components/Social.vue";
import Telephone from "@/components/Telephone.vue";
import Menu from "@/components/Menu.vue";
</script>

<template>
  <div class="footer">
    <div class="container">
      <ul class="footer__list">
        <Logo :inFooter="true"/>
        <li class="footer__item footer__item--main">
          <h3>Главная</h3>
          <Menu :inFooter="true"/>
        </li>
        <li class="footer__item footer__item--details">
          <h3>Реквизиты</h3>
          <p>ООО "Масштаб"</p>
          <p>ОГРНП 9999999999999999999</p>
          <p>ИНН 00000000000000000000</p>
        </li>
        <li class="footer__item footer__item--accounts">
          <h3>Аккаунты</h3>
          <Social position="footer"/>
        </li>
        <li class="footer__item footer__item--telephone">
          <h3>Телефоны</h3>
          <Telephone :inFooter="true"/>
        </li>
      </ul>
    </div>
  </div>

</template>

<style scoped lang="scss">
@use '@/assets/styles/media.scss' as *;
@use '@/assets/styles/container.scss' as *;

.footer {
  padding: 40px 0 40px;
  position: relative;
  display: flex;
  background-color: var(--color-default-white);

  .footer__list {
    display: grid;
    grid-template-columns: 1fr 1fr 350px 1fr 1fr;

    @include vp-767 {
      display: grid;
      grid-template-columns: 200px auto;
      grid-template-rows: auto auto auto;
      flex-wrap: wrap;
      gap: 20px 0;
    }
  }

  .footer__item {

    h3 {
      margin-bottom: 15px;
      text-align: left;

      @include vp-767 {
        text-align: center;
      }
    }

    &--details {
      h3 {
        @include vp-767 {
          text-align: center;
        }
      }

      p:not(:last-child) {
        margin-bottom: 20px;

        @include vp-767 {
          margin-bottom: 6px;
        }
      }

      @include vp-767 {
        order: 4;
        grid-column: 1/3;
        grid-row: 3/4;
        width: 100%;
      }
    }

    &--main {
      h3 {
        margin-left: 20px;

        @include vp-767 {
          text-align: center;
          margin-left: 0;
          margin-bottom: 10px;
        }
      }
    }

    &--accounts {
      h3 {
        margin-left: 9px;

        @include vp-767 {
          text-align: center;
          margin-left: 0;
          margin-bottom: 17px;
        }
      }
    }

    &--telephone {

      @include vp-767 {
        grid-column: 1/3;
        grid-row: 2/3;
      }

      h3 {
        margin-bottom: 10px;
      }

      a {
        display: flex;
        justify-self: center;
      }
    }

  }
}


</style>
