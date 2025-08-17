<script setup>

defineProps({
  inFooter: {
    type: Boolean,
    default: false
  }
})
</script>

<template>
  <div class="telephone" :class="{ 'telephone__list--footer': inFooter }">
    <a class="telephone__item" href="tel:89260204518">+7 (926) 020-45-18</a>
    <a class="telephone__item" href="tel:89814224892">+7 (926) 422-48-92</a>
    <a class="telephone__item" href="tel:89814224892">+7 (981) 422-48-92</a>
  </div>
</template>

<style scoped lang="scss">
@use '@/assets/styles/media.scss' as *;
@use '@/assets/styles/container.scss' as *;

.telephone {
  display: flex;
  align-items: center;
  box-sizing: border-box;
  width: max-content;
  padding: 12px 0;
  gap: 0 15px;
  color: var(--color-bright-grey);

  .telephone__item {
    font-size: 24px;

    &:hover {
      color: var(--color-havelock-blue);
    }
  }


  @include vp-767 {
    display: none;
  }
}

.telephone__list--footer {
  display: flex;
  flex-direction: column;
  gap: 20px 0;

  @include vp-767 {
    order: 3;
    gap: 10px 0;
    align-items: center;
    justify-content: center;
    width: 100%;
  }

  .telephone__item {

    &:hover {
      color: var(--color-bright-grey);
    }

    @include vp-767 {
      display: flex;
    }
  }
}
</style>
