<script setup>
import DeliveryIcon from '@/assets/icons/advantages/delivery.svg'
import DocumentIcon from '@/assets/icons/advantages/document.svg'
import DrawingIcon from '@/assets/icons/advantages/drawing.svg'
import MachineIcon from '@/assets/icons/advantages/machine.svg'
import PresentIcon from '@/assets/icons/advantages/present.svg'
import SizeIcon from '@/assets/icons/advantages/size.svg'

import MachinePhoto from '@/assets/img/featured-machine.png'

const FEATURED_INDEX = 1

const advantagesItems = [
  {
    picture: PresentIcon,
    label: "Пробный образец — бесплатно",
    description: "При заказе партии",
    colors: {accent: "#6C5CE7", bg: "rgba(108, 92, 231, 0.12)"}
  },
  {
    picture: MachineIcon,
    label: "19 станков по 300 Вт",
    description: "Резка без очередей и задержек",
    colors: {accent: "#2ECC71", bg: "rgba(46, 204, 113, 0.14)"}
  },
  {
    picture: SizeIcon,
    label: "До 1500×3000 см",
    description: "Обрабатываем даже габаритные изделия",
    colors: {accent: "#00B894", bg: "rgba(0, 184, 148, 0.12)"}
  },
  {
    picture: DrawingIcon,
    label: "Любые форматы чертежей",
    description: "DXF, DWG, PDF, JPG и даже эскизы",
    colors: {accent: "#0984E3", bg: "rgba(9, 132, 227, 0.12)"}
  },
  {
    picture: DocumentIcon,
    label: "Работаем с НДС",
    description: "Официальный договор и документация",
    colors: {accent: "#E17055", bg: "rgba(225, 112, 85, 0.12)"}
  },
  {
    picture: DeliveryIcon,
    label: "Доставка по РФ",
    description: "ПЭК, Деловые Линии, СДЭК и др.",
    colors: {accent: "#E84393", bg: "rgba(232, 67, 147, 0.12)"}
  }
]

const normalItems = advantagesItems.filter((_, idx) => idx !== FEATURED_INDEX)
const featuredItem = advantagesItems[FEATURED_INDEX]
</script>

<template>
  <section class="advantages">
    <div class="container">
      <h2 class="advantages__title">Наши преимущества</h2>

      <!-- верхняя строка — 5 карточек -->
      <ul class="advantages__list advantages__list--top">
        <li
            v-for="(item, index) in normalItems"
            :key="index"
            class="advantages__item"
            :style="{ '--accent': item.colors.accent, '--accent-bg': item.colors.bg }"
        >
          <div class="advantages__card">
            <div class="advantages__icon">
              <component :is="item.picture" class="advantages__svg"/>
            </div>
            <div class="advantages__content">
              <span class="advantages__subtitle">{{ item.label }}</span>
              <span class="advantages__desc">{{ item.description }}</span>
            </div>
          </div>
        </li>
      </ul>

      <!-- главная карточка — с картинкой и текстом в две колонки -->
      <div
          class="advantages__item advantages__item--featured"
          :style="{ '--accent': featuredItem.colors.accent, '--accent-bg': featuredItem.colors.bg }"
      >
        <div class="advantages__card advantages__card--featured">
          <!-- левая колонка: изображение -->
          <div class="featured__media">
            <!-- используем импортированное изображение -->
            <img :src="MachinePhoto" alt="Станок лазерной резки" class="featured__img"/>
          </div>

          <!-- правая колонка: текст -->
          <div class="advantages__content--featured">
            <span class="advantages__badge">19 станков по 300Вт</span>
            <h3 class="advantages__subtitle--featured">Мощная и быстрая лазерная резка</h3>

            <div class="advantages__stats">
              <div class="stat-item">
                <svg class="stat-icon" viewBox="0 0 24 24">
                  <path d="M12 2L15 10H9L12 2ZM4 14H20V22H4V14Z" fill="currentColor"/>
                </svg>
                <span>300 Вт — мощность</span>
              </div>
              <div class="stat-item">
                <svg class="stat-icon" viewBox="0 0 24 24">
                  <path d="M2 12H22M12 2L15 5L12 8M12 16L9 19L12 22" stroke="currentColor" stroke-width="2"/>
                </svg>
                <span>Скорость резки — без задержек</span>
              </div>
            </div>

            <p class="advantages__desc--featured">
              Выполняем срочные заказы <strong>в тот же день</strong>. Работаем без очередей, любая сложность.
            </p>

            <ul class="advantages__bullets advantages__bullets--big">
              <li>Срочные заказы</li>
              <li>Без очередей</li>
              <li>Качество промышленного уровня</li>
            </ul>
          </div>

        </div>
      </div>
    </div>
  </section>
</template>

<style scoped lang="scss">
@use '@/assets/styles/media.scss' as *;
@use '@/assets/styles/container.scss' as *;

.advantages {
  padding: 80px 0;

  @include vp-767 {
    padding: 40px 0;
  }

  .advantages__title {
    color: var(--color-bright-grey);
    font-size: 34px;
    margin-bottom: 40px;
    text-align: center;
    text-transform: uppercase;
    @include vp-767 {
      font-size: 24px;
      margin-bottom: 20px;
    }
  }

  /* верхняя строка — 5 карточек */
  .advantages__list--top {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 20px;
    margin-bottom: 30px;
    @include vp-767 {
      grid-template-columns: 1fr;
      gap: 16px;
      margin-bottom: 20px;
    }
  }

  .advantages__item {
    list-style: none;
  }

  .advantages__card {
    height: 100%;
    border-radius: 16px;
    padding: 22px 18px;
    background: #fff;
    box-shadow: 0 6px 24px rgba(0, 0, 0, .06);
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 12px;
    text-align: center;
    transition: transform .2s ease, box-shadow .2s ease;

    &:hover {
      transform: translateY(-4px);
      box-shadow: 0 10px 28px rgba(0, 0, 0, .10);
    }

    .advantages__content {
      display: flex;
      flex-direction: column;
      gap: 13px;
    }
  }

  .advantages__icon {
    width: 88px;
    height: 88px;
    border-radius: 50%;
    background: var(--accent-bg);
    display: grid;
    place-items: center;
    @include vp-767 {
      width: 72px;
      height: 72px;
    }
  }

  .advantages__svg {
    width: 44px;
    height: 44px;
    color: var(--accent);
  }

  .advantages__subtitle {
    font-weight: 700;
    font-size: 18px;
    color: #202327;
  }

  .advantages__desc {
    font-size: 18px;
    color: #5b6166;
  }

  /* главная карточка: 2-колоночная раскладка */
  .advantages__item--featured {
    .advantages__card--featured {
      display: grid;
      grid-template-columns: 550px 1fr;
      align-items: end; /* прижимаем всё к низу */
      gap: 26px;
      padding: 25px 28px;
      border-radius: 22px;
      background: linear-gradient(95deg, #e9fff3 0%, #ffffff 60%);
      border: 1px solid rgba(46, 204, 113, .25);
      box-shadow: 0 12px 40px rgba(157, 250, 195, 0.18);
      position: relative;
      overflow: hidden;

      &::after {
        content: '';
        position: absolute;
        left: -20%; right: -20%; top: -40%;
        height: 70%;
        background: radial-gradient(closest-side, rgba(46,204,113,.18), transparent 70%);
        filter: blur(10px);
        pointer-events: none;
      }

      @include vp-767 {
        grid-template-columns: 1fr;
        align-items: flex-start;
        padding: 22px;
        gap: 14px;
      }
    }

    .featured__media {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 90%;
    }

    .featured__img {
      max-width: 100%;
      height: auto;
      object-fit: contain;
      border-radius: 12px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.06);
    }

    .advantages__content--featured {
      max-width: 720px;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      gap: 10px;
      align-items: flex-start;
      text-align: left;
      height: 100%;
    }

    .advantages__stats {
      display: flex;
      flex-wrap: wrap;
      gap: 12px;
      margin: 10px 0 18px;
    }

    .stat-item {
      display: flex;
      align-items: center;
      gap: 6px;
      font-size: 18px;
      font-weight: 600;
      color: #134e38;
      background: #eafff4;
      padding: 6px 10px;
      border-radius: 8px;

      .stat-icon {
        width: 20px;
        height: 20px;
        color: var(--accent, #2ecc71);
        flex-shrink: 0;
      }
    }

    .advantages__bullets--big li {
      font-size: 18px;
      font-weight: 600;
      color: #0f3a2b;
    }


    .advantages__badge {
      font-size: 20px;
      font-weight: 800;
      text-transform: uppercase;
      color: #1f6f4f;
      background: #dff9ec;
      border-radius: 999px;
      padding: 6px 12px;
      margin-bottom: 6px;
    }

    .advantages__subtitle--featured {
      font-size: 40px;
      font-weight: 800;
      color: #134e38;
      line-height: 1.1;
      @include vp-767 { font-size: 24px; text-align: center; }
    }

    .advantages__tagline {
      font-size: 22px;
      font-weight: 700;
      color: #0f3a2b;
      margin-top: 6px;
      margin-bottom: 8px;
      @include vp-767 { font-size: 18px; text-align: center; }
    }

    .advantages__desc--featured {
      font-size: 20px;
      color: #1b5c43;
      @include vp-767 { font-size: 16px; text-align: center; }
    }

    .advantages__bullets {
      margin-top: 12px;
      list-style: none;
      padding: 0;
      display: grid;
      gap: 6px;

      li {
        font-size: 20px;
        color: #1b5c43;
        position: relative;
        padding-left: 18px;

        &::before {
          content: '';
          position: absolute;
          left: 0; top: 8px;
          width: 8px; height: 8px;
          background: var(--accent);
          border-radius: 50%;
        }
      }
    }
  }

}
</style>
