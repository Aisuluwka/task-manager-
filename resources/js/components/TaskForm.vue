<template>
  <form @submit.prevent="submitForm" class="mb-6 flex flex-wrap gap-3 items-center">
    <input
      v-model="title"
      type="text"
      placeholder="Название задачи"
      class="border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 flex-grow min-w-[180px]"
      required
    />
    <input
      v-model="description"
      type="text"
      placeholder="Описание"
      class="border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 flex-grow min-w-[180px]"
      required
    />
    <input
      v-model="due_date"
      type="date"
      class="border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
      required
    />
    <button
      type="submit"
      class="bg-blue-600 text-white rounded px-5 py-2 hover:bg-blue-700 transition-colors"
    >
      {{ taskToEdit ? 'Обновить' : 'Добавить' }}
    </button>

  </form>
</template>

<script>
import axios from 'axios';

export default {
  props: {
    taskToEdit: {
      type: Object,
      default: null
    }
  },
  data() {
    return {
      title: '',
      description: '',
      due_date: ''
    };
  },
  watch: {
    taskToEdit: {
      immediate: true,
      handler(newVal) {
        if (newVal) {
          this.title = newVal.title;
          this.description = newVal.description;
          this.due_date = newVal.due_date;
        } else {
          this.clearForm();
        }
      }
    }
  },
  methods: {
    async submitForm() {
      try {
        if (this.taskToEdit) {
          await axios.put(`/api/tasks/${this.taskToEdit.id}`, {
            title: this.title,
            description: this.description,
            due_date: this.due_date,
          });
          this.$emit('task-updated');
        } else {
          await axios.post('/api/tasks', {
            title: this.title,
            description: this.description,
            due_date: this.due_date,
          });
          this.$emit('task-added');
        }
        this.clearForm();
      } catch (error) {
        console.error(error);
        alert('Ошибка при сохранении задачи');
      }
    },
    clearForm() {
      this.title = '';
      this.description = '';
      this.due_date = '';
    }
  }
}
</script>

