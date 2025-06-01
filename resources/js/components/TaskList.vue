<template>
  <div>
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Список задач</h2>
    <TaskForm @task-added="fetchTasks" />

    
    <div v-if="showModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
      <div class="bg-white p-6 rounded shadow-md w-[90%] max-w-lg relative">
        <button class="absolute top-2 right-2 text-gray-500 hover:text-red-600 text-xl" @click="closeModal">×</button>
        <TaskForm
          :taskToEdit="taskToEdit"
          @task-updated="handleTaskUpdated"
        />
      </div>
    </div>

    <table class="table-auto w-full border-collapse border border-gray-300 rounded-lg overflow-hidden shadow-sm">
  <thead class="bg-blue-600 text-white">
    <tr>
      <th class="px-4 py-2 text-left border border-blue-700">#</th>
      <th class="px-4 py-2 text-left border border-blue-700">Название</th>
      <th class="px-4 py-2 text-left border border-blue-700">Описание</th>
      <th class="px-4 py-2 text-left border border-blue-700">Срок</th>
      <th class="px-4 py-2 text-left border border-blue-700">Создано</th>
      <th class="px-4 py-2 text-left border border-blue-700">Обновлено</th>
      <th class="px-4 py-2 text-left border border-blue-700">Действия</th>
    </tr>
  </thead>
  <tbody>
    <tr
      v-for="(task, index) in tasks"
      :key="task.id"
      class="odd:bg-white even:bg-gray-50 hover:bg-blue-50 transition-colors"
    >
      <td class="px-4 py-2 border border-gray-300">{{ index + 1 }}</td>
      <td class="px-4 py-2 border border-gray-300">{{ task.title }}</td>
      <td class="px-4 py-2 border border-gray-300">{{ task.description }}</td>
      <td class="px-4 py-2 border border-gray-300">{{ task.due_date }}</td>
      <td class="px-4 py-2 border border-gray-300">{{ formatDate(task.created_at) }}</td>
      <td class="px-4 py-2 border border-gray-300">{{ formatDate(task.updated_at) }}</td>
      <td class="px-4 py-2 border border-gray-300 space-x-2">
        <button @click="editTask(task)" class="text-blue-600 hover:text-blue-800" title="Редактировать">
          ✏
        </button>
        <button @click="deleteTask(task.id)" class="text-red-600 hover:text-red-800" title="Удалить">
          🗑
        </button>
      </td>
    </tr>
  </tbody>
</table>

  </div>
</template>

<script>
import TaskForm from './TaskForm.vue';
import axios from 'axios';

export default {
  components: {
    TaskForm
  },
  data() {
    return {
      tasks: [],
      taskToEdit: null,
      showModal: false,
    }
  },
  methods: {
    async fetchTasks() {
      try {
        const response = await axios.get('/api/tasks');
        this.tasks = response.data;
      } catch (error) {
        console.error(error);
      }
    },
    async deleteTask(id) {
      if (confirm('Удалить задачу?')) {
        try {
          await axios.delete(`/api/tasks/${id}`);
          this.fetchTasks();
        } catch (error) {
          console.error(error);
          alert('Ошибка при удалении задачи');
        }
      }
    },
    formatDate(datetime) {
      const options = {
        year: 'numeric',
        month: '2-digit',
        day: '2-digit',
        hour: '2-digit',
        minute: '2-digit',
      };
      return new Date(datetime).toLocaleString('ru-RU', options);
    },
    editTask(task) {
      this.taskToEdit = { ...task };
      this.showModal = true;
    },
    handleTaskUpdated() {
      this.fetchTasks();
      this.closeModal();
    },
    closeModal() {
      this.taskToEdit = null;
      this.showModal = false;
    }
  },
  
  mounted() {
    this.fetchTasks();
  }
}

</script>



