<script setup>
import DeliveryIcon from '@/assets/icons/advantages/delivery.svg'
import DocumentIcon from '@/assets/icons/advantages/document.svg'
import DrawingIcon from '@/assets/icons/advantages/drawing.svg'
import MachineIcon from '@/assets/icons/advantages/machine.svg'
import PresentIcon from '@/assets/icons/advantages/present.svg'
import SizeIcon from '@/assets/icons/advantages/size.svg'

const advantagesItems = [
  {picture: PresentIcon, label: "Пробный образец — бесплатно", description: 'При заказе партии'},
  {picture: MachineIcon, label: "19 станков по 300 Вт", description: 'Резка без очередей и задержек'},
  {picture: SizeIcon, label: "До 1500×3000 см", description: 'Обрабатываем даже габаритные изделия'},
  {picture: DrawingIcon, label: " Любые форматы чертежей", description: 'DXF, DWG, PDF, JPG и даже эскизы'},
  {picture: DocumentIcon, label: "Работаем с НДС", description: 'Официальный договор и документация'},
  {picture: DeliveryIcon, label: "Доставка по РФ", description: 'ПЭК, Деловые Линии, СДЭК и др.'},

]
</script>

<template>
  <div class="advantages">
    <div class="container">
      <h2 class="advantages__title">Наши преимущества</h2>
      <ul class="advantages__list">
        <li
            v-for="(item, index) in advantagesItems"
            :key="index"
            class="advantages__item">
          <component :is="item.picture" class="advantages__svg"/>
          <div class="advantages__content">
            <span class="advantages__subtitle">{{ item.label }}</span>
            <span>{{ item.description }}</span>
          </div>
        </li>
      </ul>
    </div>
  </div>

</template>

<style scoped lang="scss">
@use '@/assets/styles/media.scss' as *;
@use '@/assets/styles/container.scss' as *;

.advantages {
  padding-top: 120px;

  @include vp-767 {
    padding-top: 50px;
  }

  .advantages__title {
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

  .advantages__list {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 30px 0;
    flex-wrap: wrap;

    @include vp-767 {
      display: grid;
      grid-template-columns: 1fr;
      gap: 40px 0;
    }

    .advantages__item {
      display: flex;
      gap:10px 0;
      align-items: center;
      justify-content: center;
      flex-direction: column;

      .advantages__svg {
        width: 120px;
        height: 120px;

        @include vp-767 {
          width: 70px;
          height: 70px;
        }
      }

      .advantages__content {
        display: flex;
        flex-direction: column;
        gap: 5px 0;

        .advantages__subtitle {
          font-weight: 600;
          font-size: 24px;

          @include vp-767 {
            font-size: 18px;
          }
        }

        span {
          text-align: center;
          font-size: 24px;

          @include vp-767 {
            font-size: 18px;
          }
        }
      }
    }
  }
}

</style>
