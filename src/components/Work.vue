<script setup>
import SticIcon from '@/assets/icons/work/stic.svg'

const forList = [
  {text:"Производственных компаний"},
  {text:"Архитектурных бюро"},
  {text:"Дизайнеров и инженеров"},
  {text:"Рекламных агентств"},
  {text:"Мастеров по дереву и пластикам"},
]
const howList = [
  {text:"Присылаете задачу или чертёж"},
  {text:"Мы делаем расчёт и согласуем детали"},
  {text:"Изготавливаем пробный образец"},
  {text:"Запускаем резку"},
  {text:"Упаковываем и отправляем"},
]

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
              <SticIcon class="for__svg" />
              <p class="for__text">{{item.text}}</p>
            </li>
          </ul>
        </div>
        <div class="work__how how">
          <h2 class="how__title">Как мы работаем</h2>
          <ul class="how__list">
            <li v-for="(item, index) in howList"
                :key="index"
                class="how__item">
              <SticIcon class="how__svg"/>
              <p class="how__text">{{item.text}}</p>
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
  padding-top: 120px;
  padding-bottom: 100px;

  @include vp-767 {
    padding-top: 70px;
    padding-bottom: 30px;
  }

  .work__block {
    display: grid;
    grid-template-columns: 1fr 1fr;

    @include vp-767 {
      grid-template-columns: 1fr;
      gap: 50px 0;
    }

    .for__title,
    .how__title {
      color: var(--color-bright-grey);
      font-size: 30px;
      margin-bottom: 70px;
      text-align: center;
      text-transform: uppercase;

      @include vp-767 {
        margin-bottom: 25px;
        font-size: 24px;
      }
    }

    .for__list,
    .how__list{
      display: flex;
      flex-direction: column;
      gap: 15px 0;

      @include vp-767 {
        gap: 10px 0;
      }

      .for__item,
      .how__item{
        display: flex;
        align-items: center;
        justify-content: center;
        gap:20px 10px;

        .for__text,
        .how__text {
          font-size: 24px;

          @include vp-767 {
            font-size: 18px;
          }
        }
      }

      .for__svg,
      .how__svg{
        width: 40px;
        height: 40px;

        @include vp-767 {
          width: 30px;
          height:  30px;
        }
      }
    }
  }
}

</style>
