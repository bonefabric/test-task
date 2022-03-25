<template>
  <div class="container">
    <div class="post">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores culpa est laudantium quae quis repellat
      repellendus totam! Fugiat, ut velit. Corporis cumque dolore impedit in mollitia nulla placeat quod sit.
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad animi assumenda cum cupiditate eaque eius eum,
      facere, facilis iusto nam quaerat quos sequi tempore, totam vel? Eius hic laudantium tempora.
    </div>
    <div class="comments"  v-if="!loading">
      <form action="" @submit.prevent>
        <p>Оставить комментарий:</p>
        <input type="email" placeholder="Email" name="email" v-model="email" required>
        <input type="text" placeholder="Заголовок" name="title" v-model="title" required>
        <input type="text" placeholder="Комментарий" name="comment" v-model="comment" required>
        <input type="submit" value="Отправить" @click="addComment">
      </form>
      <div class="list">
        <div v-for="comment in comments">
          <div class="comment">
            <p>{{ comment.email }}&nbsp;{{ comment.dateText }}</p>
            <p><strong>{{ comment.title }}</strong></p>
            <p>{{ comment.comment }}</p>
          </div>
          <hr>
        </div>
      </div>
    </div>
    <div v-else>Loading...</div>
  </div>
</template>

<script setup>
import {onBeforeMount, ref} from "vue";
import axios from "axios";

const loading = ref(true);
const comments = ref([]);
const email = ref('');
const title = ref('');
const comment = ref('');

onBeforeMount(async () => {
  const result = await axios.get('api/comments/get');
  if (typeof result.data === 'object' && result.data instanceof Array) {
    result.data.forEach(item => {
      const created = new Date(item.created);
      comments.value.push({
        email: item.email,
        title: item.title,
        comment: item.comment,
        dateText: created.toLocaleDateString() + ' : ' + created.toLocaleTimeString(),
        date: created
      });
    })
  }
  loading.value = false;
})

const addComment = () => {
  if (!email.value || !title.value || !comment.value) return;
  const now = new Date();
  const data = {
    email: email.value,
    title: title.value,
    comment: comment.value,
    dateText: now.toLocaleDateString() + ' : ' + now.toLocaleTimeString(),
    date: now
  };
  comments.value.push(data);
  axios.post('api/comments/store', data);
  email.value = '';
  comment.value = '';
  title.value = '';
}

</script>

<style lang="scss">
.container {
  margin: 0 20%;

  .post {
    margin-top: 20px;
  }

  .comments {
    form {
      width: 100%;
      border: 1px solid black;
      padding: 10px;
      display: flex;
      flex-direction: column;
      margin: 10px auto;

      input {
        margin-top: 5px;
      }
    }
  }
}
</style>