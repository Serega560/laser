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
  align-self: start;
  box-sizing: border-box;
  width: max-content;
  padding: 14px 0;
  gap: 0 15px;
  color: var(--color-bright-grey);
  grid-column: 3/4;
  grid-row: 1 / 2;

  .telephone__item {
    font-size: 24px;

    @include vp-767 {
      font-size: 20px;
    }

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
  gap: 10px 0;
  padding: 0;

  @include vp-767 {
    order: 3;
    gap: 5px 0;
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
