<script setup>
import { ref } from "vue";

const name = ref("");
const contact = ref("");
const comment = ref("");
const file = ref(null);
const fileName = ref("");
const loading = ref(false);

function handleFile(event) {
  file.value = event.target.files[0];
  fileName.value = file.value ? file.value.name : "";
}

async function sendForm() {
  if (!file.value) {
    alert("Пожалуйста, прикрепите файл");
    return;
  }

  loading.value = true;
  const formData = new FormData();
  formData.append("name", name.value);
  formData.append("contact", contact.value);
  formData.append("comment", comment.value);
  formData.append("file", file.value);

  await fetch("http://localhost:3000/send", {
    method: "POST",
    body: formData
  });

  loading.value = false;
  alert("Заявка отправлена!");
}

</script>

<template>
  <div class="form">
    <div class="container">
      <div class="form__block">
        <div class="form__header">
          <h2 class="form__title">Ваш проект</h2>
          <p class="form__description">Расскажите нам о вашем проекте и мы свяжемся с вами в ближайшее время</p>
          <h3>Укажите в комментарии следующие данные:</h3>
          <ul>
            <li>
              <p>материал</p>
            </li>
            <li>
              <p>размер</p>
            </li>
            <li>
              <p>сроки</p>
            </li>
          </ul>
          <p class="form__text">* Дополнительно вы можете прикрепить файл с вашими чертежами</p>
        </div>
        <form class="form__main" @submit.prevent="sendForm">
          <input type="text" v-model="name" placeholder="Имя" required>
          <input type="text" v-model="contact" placeholder="Телефон или Email" required>
          <textarea v-model="comment" rows="7" placeholder="Комментарий"></textarea>

          <!-- Кастомное поле файла -->
          <input type="file" id="file" @change="handleFile" required>
          <label for="file" class="file-label">
            {{ fileName || "📎 Прикрепить файл" }}
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
  padding: 70px 0 200px;
  background: #f9f9f9;

  .form__block {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 50px;

    @media (max-width: 768px) {
      grid-template-columns: 1fr;
      gap: 30px;
    }

    .form__header {
      background: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.05);

      @include vp-767 {
        padding: 25px 20px;
      }

      .form__title {
        font-size: 36px;
        font-weight: 600;
        margin-bottom: 15px;
        text-transform: uppercase;

        @media (max-width: 768px) {
          font-size: 24px;
        }
      }

      .form__description {
        font-size: 18px;
        color: #555;
        margin-bottom: 20px;
      }

      h3 {
        font-weight: 600;

        @include vp-767 {
          font-size: 20px;
        }
      }

      ul {
        list-style: none;
        padding: 10px 0 20px;

        li {
          position: relative;
          padding-left: 25px;
          margin-bottom: 8px;

          &::before {
            content: "✔";
            position: absolute;
            left: 0;
            color: #2ecc71;
          }
        }
      }

      .form__text {
        color: #555;
        font-size: 18px;
      }
    }

    .form__main {
      background: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.05);
      display: flex;
      flex-direction: column;
      gap: 12px;

      input,
      textarea {
        padding: 14px 16px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 18px;
        transition: all 0.2s;

        &:focus {
          outline: none;
          border-color: #2ecc71;
          box-shadow: 0 0 0 3px rgba(46, 204, 113, 0.2);
        }
      }

      textarea {
        resize: none;
        min-height: 140px;
      }

      // Скрываем стандартный input file
      input[type="file"] {
        display: none;
      }

      // Кастомная кнопка загрузки файла
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
          border-color: #2ecc71;
        }
      }

      button {
        background: #2ecc71;
        color: white;
        padding: 14px;
        font-size: 16px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.2s;

        &:hover {
          background: #27ae60;
          box-shadow: 0 4px 10px rgba(0,0,0,0.1);
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
