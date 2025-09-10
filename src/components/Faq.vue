<script setup>
import {ref, nextTick} from "vue";

const faqs = ref([
  {
    q: "С какими материалами вы работаете?",
    a: "Фанера, оргстекло, силикон, фторопласт, резина, паронит, пенопласт, картон и др. — кроме металлов",
    open: true
  },
  {
    q: "Какие форматы вы принимаете?",
    a: "DXF, DWG, PDF, JPG, CDR, AI, эскизы — поможем доработать при необходимости.",
    open: false
  },
  {
    q: "Работаете ли вы с НДС?",
    a: "Да, мы — официальная организация. Есть ИП и ООО, работаем с НДС и по договору.",
    open: false
  },
  {
    q: "Как организуется доставка?",
    a: "Отправляем по всей РФ через ПЭК, Деловые Линии, СДЭК и другие проверенные службы.",
    open: false
  }
]);

const toggle = async (index) => {
  const content = document.querySelector(`#faq-${index} .faq__content`);

  if (!faqs.value[index].open) {
    // Открываем
    faqs.value[index].open = true;
    await nextTick();

    // Начинаем с высоты 0
    content.style.height = "0px";

    // Даем браузеру кадр, потом анимируем
    requestAnimationFrame(() => {
      content.style.height = content.scrollHeight + "px";
    });

    // После окончания анимации ставим auto
    setTimeout(() => {
      content.style.height = "auto";
    }, 400);
  } else {
    // Закрываем
    content.style.height = content.scrollHeight + "px";

    requestAnimationFrame(() => {
      faqs.value[index].open = false;
      content.style.height = "0px";
    });
  }
};


</script>

<template>
  <div class="faq" id="faq">
    <div class="container">
      <h2 class="faq__title">Часто задаваемые вопросы</h2>
      <div class="faq__list">
        <div
            v-for="(item, i) in faqs"
            :key="i"
            class="faq__item"
            :id="`faq-${i}`"
        >
          <button class="faq__question" @click="toggle(i)">
            {{ item.q }}
            <span
                class="faq__icon"
                :class="{ open: item.open }"
            ></span>
          </button>
          <div
              class="faq__content"
              :style="{ height: item.open ? 'auto' : '0px' }"
          >
            <p>{{ item.a }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped lang="scss">
@use '@/assets/styles/media.scss' as *;
@use '@/assets/styles/container.scss' as *;

.faq {
  padding: 80px;
  //background-image: url('../assets/img/bc.jpg');

  @include vp-767 {
    padding: 30px 0;
  }
}

.faq__title {
  text-align: center;
  font-size: 34px;
  margin-bottom: 20px;
  text-transform: uppercase;
  color: var(--color-bright-grey);

  @include vp-767 {
    margin-bottom: 25px;
    font-size: 24px;
  }
}

.faq__item {
  border-bottom: 1px solid var(--color-bright-grey);
}

.faq__question {
  position: relative;
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: none;
  border: none;
  padding: 15px 0;
  font-size: 24px;
  cursor: pointer;
  transition: all 0.7s;
  color: var(--color-bright-grey);

  @include vp-767 {
    font-size: 18px;
    text-align: left;
    gap: 0 15px;
  }

  &::before {
    content: "";
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(
            to right,
            rgba(255, 255, 255, 0.1) 0%,
            var(--color-medium-sea-green) 70%,
            rgba(255, 255, 255, 0.8) 100%
    );
    opacity: 0;
    transition: opacity 0.7s ease;
    pointer-events: none; // чтобы клик проходил
    border-radius: 2px; // если надо, чтоб не выступал
    z-index: 0;

    @include vp-767 {
      background: linear-gradient(
              to right,
              rgba(255, 255, 255, 0) 0%,
              rgba(255, 255, 255, 0) 100%,
      );
    }
  }

  &:hover::before {
    opacity: 1;
  }

  > * {
    position: relative;
    z-index: 1;
  }

  &:hover {
    .faq__icon {
      background-color: var(--color-medium-sea-green);
      border: 1px solid var(--color-medium-sea-green);

      @include vp-767 {
        background-color: var(--color-default-white);
      }

      &:after,
      &:before {
        background-color: var(--color-default-white);

        @include vp-767 {
          background-color: var(--color-bright-grey);
        }
      }

      &.open {
        color: var(--color-medium-sea-green);
        transform: rotate(450deg);

        &::after {
          transform: scaleY(0);
        }

        &:before {
          background-color: var(--color-default-white);

          @include vp-767 {
            background-color: var(--color-medium-sea-green);
          }
        }
      }
    }
  }
}

.faq__icon {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 33px;
  height: 33px;
  border-radius: 50%;
  border: 1px solid currentColor;
  position: relative;
  transition: all 0.4s ease;

  @include vp-767 {
    width: 28px;
    height: 28px;
  }

  &::before,
  &::after {
    content: "";
    position: absolute;
    background-color: currentColor;
    transition: transform 0.3s ease;
  }

  &::before {
    width: 1px;
    height: 20px;

    @include vp-767 {
      height: 17px;
    }
  }

  &::after {
    width: 20px;
    height: 1px;

    @include vp-767 {
      width: 17px;
    }
  }

  &.open {
    color: var(--color-medium-sea-green);
    transform: rotate(450deg);

    &::after {
      transform: scaleY(0);
    }

    &:before {
      background-color: var(--color-medium-sea-green);
    }
  }
}

.faq__content {
  overflow: hidden;
  height: 0;
  transition: height 0.4s ease;

  p {
    margin: 0 0 15px;
    font-size: 20px;

    @include vp-767 {
      font-size: 16px;
    }
  }
}

</style>
