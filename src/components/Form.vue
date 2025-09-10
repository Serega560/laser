<script setup>
import {ref} from "vue";
const formRef = ref(null);
const name = ref("");
const email = ref("");
const phone = ref("");
const comment = ref("");
const loading = ref(false);

// файл (для отображения названия)
const fileName = ref("📎 Прикрепить файл");

function handleFile(e) {
  const f = e.target.files?.[0] || null;
  fileName.value = f ? `Файл: ${f.name}` : "📎 Прикрепить файл";
}

// ===== валидация =====
function validateEmail(v) {
  return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v);
}

function validatePhone(v) {
  return /^\+7\d{10}$/.test(v);
}

function onPhoneFocus() {
  if (!phone.value) phone.value = "+7";
}

function onPhoneInput(e) {
  let v = e.target.value;
  phone.value = v.startsWith("+") ? "+" + v.slice(1).replace(/\D/g, "") : v.replace(/\D/g, "");
}

 // сюда написать код отправки формы
async function sendForm() {
  loading.value = true;
  const formData = new FormData(formRef.value);

  try {
    const res = await fetch("sendmail.php", {
      method: "POST",
      body: formData,
    });
    const data = await res.json();
    alert(data.message);
  } catch (e) {
    alert("Ошибка отправки");
  } finally {
    loading.value = false;
  }
}


</script>

<template>
  <div class="form" id="form">
    <div class="container">
      <div class="form__block">
        <div class="form__header">
          <h2 class="form__title">Ваш проект</h2>
          <p class="form__description">
            Расскажите нам о вашем проекте и мы свяжемся с вами в ближайшее время
          </p>
          <h3>Укажите в комментарии следующие данные:</h3>
          <ul>
            <li><p>материал</p></li>
            <li><p>размер</p></li>
            <li><p>количество деталей</p></li>
            <li><p>сроки</p></li>
          </ul>
          <p class="form__text">* Дополнительно вы можете прикрепить файл с вашими чертежами</p>
        </div>

        <!-- ВАЖНО: ref="formRef" и name-атрибуты -->
        <form ref="formRef" class="form__main" @submit.prevent="sendForm">
          <input type="text" name="name" v-model="name" placeholder="Имя" required/>

          <input
              type="tel"
              name="phone"
              v-model="phone"
              @focus="onPhoneFocus"
              @input="onPhoneInput"
              placeholder="Телефон"
          />

          <input type="email" name="email" v-model="email" placeholder="Email"/>
          <textarea name="comment" v-model="comment" rows="2" placeholder="Комментарий"></textarea>

          <!-- ФАЙЛ: имя поля 'attachment' (EmailJS распознаёт как вложение) -->
          <input type="file" id="file" name="image" @change="handleFile"/>
          <label for="file" class="file-label">
            {{ fileName }}
          </label>

          <button type="submit" :disabled="loading">
            {{ loading ? "Отправка..." : "Отправить" }}
          </button>
        </form>
      </div>
    </div>
  </div>
</template>

<style scoped lang="scss">
@use '@/assets/styles/media.scss' as *;
@use '@/assets/styles/container.scss' as *;

.form {
  padding: 80px 0;
  background: #f9f9f9;
  //background-image: url('../assets/img/bc.jpg');

  .form__block {
    display: grid;
    grid-template-columns: 400px 1fr;
    gap: 50px;

    @media (max-width: 768px) {
      grid-template-columns: 1fr;
      gap: 30px;
    }

    .form__header {
      background: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);

      @include vp-767 {
        padding: 25px 20px;
      }

      .form__title {
        font-size: 34px;
        font-weight: 600;
        margin-bottom: 20px;
        text-transform: uppercase;
        color: var(--color-bright-grey);


        @include vp-767 {
          font-size: 24px;
        }
      }

      .form__description {
        font-size: 20px;
        color: #555;
        margin-bottom: 20px;
      }

      h3 {
        font-weight: 400;
        font-size: 20px;
      }

      ul {
        list-style: none;
        padding: 10px 0 55px;

        @include vp-767 {
          padding: 10px 0 20px;
        }

        li {
          position: relative;
          padding-left: 25px;
          margin-bottom: 8px;

          &::before {
            content: "✔";
            position: absolute;
            left: 0;
            color: var(--color-medium-sea-green);
          }
        }
      }

      .form__text {
        color: #555;
        font-size: 18px;
        margin-top: auto;
      }
    }

    .form__main {
      background: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
      display: flex;
      flex-direction: column;
      gap: 12px;

      input, textarea {
        padding: 10px 12px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 18px;
        transition: all 0.2s;

        &:focus {
          outline: none;
          border-color: var(--color-medium-sea-green);
          box-shadow: 0 0 0 3px rgba(46, 204, 113, 0.2);
        }
      }

      textarea {
        resize: none;
        min-height: 120px;
      }

      /* скрываем дефолтный файл-инпут */
      input[type="file"] {
        display: none;
      }

      /* кастомная кнопка загрузки */
      .file-label {
        display: inline-block;
        background: #f5f5f5;
        padding: 12px 16px;
        border-radius: 8px;
        cursor: pointer;
        border: 2px dashed #ccc;
        text-align: center;
        font-size: 16px;
        transition: all 0.2s;

        &:hover {
          background: #e8f6f0;
          border-color: var(--color-medium-sea-green);
        }
      }

      button {
        background: var(--color-medium-sea-green);
        color: white;
        padding: 14px;
        font-size: 16px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.2s;

        &:hover {
          background: var(--color-medium-sea-green);
          box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        &:disabled {
          opacity: 0.6;
          cursor: not-allowed;
        }
      }
    }
  }
}
</style>
