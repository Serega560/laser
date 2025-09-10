<script setup>
import { ref } from 'vue'

import IconFactory from '@/assets/icons/work/factory.svg'
import IconArchitect from '@/assets/icons/work/architect.svg'
import IconDesigner from '@/assets/icons/work/designer.svg'
import IconAdvertising from '@/assets/icons/work/advertising.svg'
import IconCraftsman from '@/assets/icons/work/craftsman.svg'

import IconStep1 from '@/assets/icons/work/step1.svg'
import IconStep2 from '@/assets/icons/work/step2.svg'
import IconStep3 from '@/assets/icons/work/step3.svg'
import IconStep4 from '@/assets/icons/work/step4.svg'
import IconStep5 from '@/assets/icons/work/step5.svg'

const forList = [
  {text: "Производственных компаний", icon: IconFactory},
  {text: "Архитектурных бюро", icon: IconArchitect},
  {text: "Дизайнеров и инженеров", icon: IconDesigner},
  {text: "Рекламных агентств", icon: IconAdvertising},
  {text: "Мастеров по дереву и пластикам", icon: IconCraftsman},
]

const howList = [
  {text: "Присылаете задачу или чертёж",icon: IconStep1, description: "Вы отправляете нам техническое задание или чертежи в любом удобном формате"},
  {text: "Мы делаем расчёт и согласуем детали", icon: IconStep2, description: "Наши специалисты проводят расчеты и согласовывают с вами все нюансы"},
  {text: "Изготавливаем пробный образец", icon: IconStep3, description: "Перед запуском в производство создаем тестовый образец для проверки"},
  {text: "Запускаем резку", icon: IconStep4, description: "После утверждения образца начинаем основной производственный процесс"},
  {text: "Упаковываем и отправляем", icon: IconStep5, description: "Аккуратно упаковываем готовую продукцию и организуем доставку"},
]

const activeStep = ref(null)

const toggleStep = (index) => {
  activeStep.value = activeStep.value === index ? null : index
}
</script>

<template>
  <div class="work">
    <div class="container">
      <div class="work__block">
        <div class="work__for for">
          <h2 class="for__title">Для кого мы работаем</h2>
          <ul class="for__list">
            <li v-for="(item, index) in forList"
                :key="index"
                class="for__item">
              <component :is="item.icon" class="for__svg" />
              <p class="for__text">{{item.text}}</p>
            </li>
          </ul>
        </div>
        <div class="work__how how">
          <h2 class="how__title">Как мы работаем</h2>
          <ul class="how__list">
            <li v-for="(item, index) in howList"
                :key="index"
                class="how__item"
                @mouseenter="toggleStep(index)"
                @mouseleave="toggleStep(index)"
                :class="{'how__item--active': activeStep === index}">
                <component :is="item.icon" class="how__svg"/>
                <p class="how__text">{{item.text}}</p>
              <transition name="fade">
                <p v-if="activeStep === index" class="how__description">{{item.description}}</p>
              </transition>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped lang="scss">
@use '@/assets/styles/media.scss' as *;
@use '@/assets/styles/container.scss' as *;

.work {
  padding: 100px 0;
  background-color: #f9f9f9;
  position: relative;
  overflow: hidden;
  //background-image: url('../assets/img/bc.jpg');

  &::before {
    content: '';
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 1px;
    height: 100%;
    background: linear-gradient(to bottom, rgba(0,0,0,0), rgba(0,0,0,0.1), rgba(0,0,0,0));
  }

  @include vp-767 {
    padding: 60px 0;

    &:before {
      display: none;
    }
  }

  .work__block {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 0 80px;
    max-width: 1200px;
    margin: 0 auto;

    @include vp-767 {
      grid-template-columns: 1fr;
      gap: 50px 0;
    }
  }

  .for__title,
  .how__title {
    color: var(--color-bright-grey);
    font-size: 32px;
    margin-bottom: 40px;
    text-transform: uppercase;
    position: relative;
    padding-bottom: 15px;
    font-weight: 700;
    text-align: center;

    &::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 60px;
      height: 3px;
      background-color: var(--color-accent);
    }

    @include vp-767 {
      margin-bottom: 25px;
      font-size: 26px;
    }
  }

  .for__list,
  .how__list {
    display: flex;
    flex-direction: column;
    gap: 20px 0;

    @include vp-767 {
      gap: 15px 0;
    }
  }

  .for__item,
  .how__item {
    display: flex;
    align-items: center;
    gap: 20px;
    padding: 15px 20px;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;

    @include vp-767 {
      gap: 0 10px;
    }

    &:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
    }

    .for__svg {
      width: 24px;
      height: 24px;
      flex-shrink: 0;
      color: var(--color-accent);
    }

    .for__text {
      font-size: 20px;
      font-weight: 500;
      color: var(--color-dark);

      @include vp-767 {
        font-size: 18px;
      }
    }
  }

  .how__item {
    padding: 15px 20px;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
    cursor: pointer;
    position: relative;

    &:hover {
      border-left-color: var(--color-accent);
    }

    &.how__item--active {
      background-color: var(--color-primary-light);
      z-index: 0;

    }

    .how__step {
      display: flex;
      align-items: center;
      gap: 20px;
    }

    .how__svg {
      width: 24px;
      height: 24px;
      flex-shrink: 0;
      color: var(--color-primary);
    }

    .how__text {
      font-size: 20px;
      font-weight: 500;
      color: var(--color-dark);

      @include vp-767 {
        font-size: 18px;
      }
    }

    .how__description {
      font-size: 16px;
      color: var(--color-default-white);
      width: 320px;
      position: absolute;
      top: 17px;
      right: -160px;
      background-color: var(--color-bright-grey);
      border: #6201a3;
      z-index: 5;
      border-radius: 10px;
      padding: 10px 10px;

      @include vp-767 {
        display: none;
      }
    }
  }

  .fade-enter-active,
  .fade-leave-active {
    transition: opacity 0.3s ease;
  }

  .fade-enter-from,
  .fade-leave-to {
    opacity: 0;
  }
}

  .fade-enter-active,
  .fade-leave-active {
    transition: opacity 0.3s ease;
  }

  .fade-enter-from,
  .fade-leave-to {
    opacity: 0;
  }

</style>
