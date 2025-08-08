<script setup>
</script>

<template>
  <div class="telephone">
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
</style>
