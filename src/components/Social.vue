<script setup>
import WhatsappIcon from '@/assets/icons/social/whatsapp.svg'
import TelegramIcon from '@/assets/icons/social/telegram.svg'
import VkIcon from '@/assets/icons/social/vk.svg'

defineProps({
  position: {
    type: String,
    default: 'header',
    validator: (value) => ['header', 'footer'].includes(value)
  }
})
</script>

<template>
  <ul :class="['social', `social--${position}`]">
    <li class="social__item social__item--telegram">
      <a href="https://t.me/kytyryn_browka" target="_blank">
        <TelegramIcon />
      </a>
    </li>
    <li class="social__item social__item--whatsapp">
      <a href="https://wa.me/79281383908" target="_blank">
        <WhatsappIcon />
      </a>
    </li><li class="social__item social__item--vk">
      <a href="https://wa.me/79281383908" target="_blank">
        <VkIcon />
      </a>
    </li>
  </ul>
</template>

<style scoped lang="scss">
@use '@/assets/styles/media.scss' as *;

.social {
  display: flex;
  gap: 0 3px;
  align-items: flex-start;

  @include vp-767 {
    gap: 0 8px;
    order: -3;
  }

  .social__item {
    cursor: pointer;

    a {
      padding: 14px 8px;

      &:hover {
        svg {
          transform: scale(1.2);
        }
      }

      @include vp-767 {
        padding: 3px 2px;

        &:hover {
          svg {
            transform: scale(1);
          }
        }
      }

      svg {
        width: 40px;
        height: 40px;
        transition: color .3s ease, transform .3s ease-in-out;
      }
    }
  }

  .social__item--telegram {
    a {
      svg {
        color: var(--color-summer-sky);
      }

      &:active {
        svg {
          color: var(--color-sky-blue);
        }
      }
    }
  }

  .social__item--whatsapp {
    a {
      svg {
        color: var(--color-lime-green);
      }

      &:active {
        svg {
          color: var(--color-pastel-green);
        }
      }
    }
  }

  .social__item--vk {
    a {
      svg {
        color: var(--color-havelock-blue);
      }

      &:active {
        svg {
          color: var(--color-jordy-blue);
        }
      }
    }
  }

  &--header {
    @include vp-767 {
      gap: 0 8px;
      order: -1;
    }
  }

  &--footer {
    @include vp-767 {
      order: 1;
      flex-direction: column;
      gap: 30px 0;
      margin-top: 8px;
      align-self: flex-start;
    }

    .social__item {
      @include vp-767 {
        height: 40px;
      }

      a {
        @include vp-767 {
          padding: 0;
          border: 0;
          font-size: 0;
        }
      }
    }
  }
}

</style>
