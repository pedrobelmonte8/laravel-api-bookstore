<template>
  <div class="p-6 max-w-2xl mx-auto">
    <h2 class="text-2xl font-bold mb-4">Listado de Categorías</h2>

    <!-- Listado de categorías -->
    <ul class="mb-8">
      <li
        v-for="category in categories"
        :key="category.id"
        class="border-b py-2"
      >
        <strong>{{ category.name }}</strong><br />
        <span class="text-gray-600 text-sm">{{ category.description }}</span>
      </li>
    </ul>

    <!-- Formulario para añadir categoría -->
    <h3 class="text-xl font-semibold mb-2">Añadir nueva categoría</h3>
    <form @submit.prevent="submitForm" class="space-y-4">
      <div>
        <label class="block text-sm font-medium">Nombre</label>
        <input
          v-model="form.name"
          type="text"
          required
          class="w-full border rounded px-3 py-2"
        />
      </div>
      <div>
        <label class="block text-sm font-medium">Descripción</label>
        <textarea
          v-model="form.description"
          required
          maxlength="255"
          class="w-full border rounded px-3 py-2"
        ></textarea>
      </div>
      <button
        type="submit"
        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded"
      >
        Añadir categoría
      </button>
    </form>

    <!-- Mensaje de éxito -->
    <p v-if="successMessage" class="text-green-600 mt-4">
      {{ successMessage }}
    </p>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const categories = ref([])
const form = ref({
  name: '',
  description: ''
})
const successMessage = ref('')

// Cargar categorías
const loadCategories = async () => {
  try {
    const res = await axios.get('/api/categories', {
      withCredentials: true
    })
    categories.value = res.data.data
  } catch (err) {
    console.error('Error al cargar categorías:', err)
  }
}

onMounted(() => {
  loadCategories()
})

// Enviar formulario
const submitForm = async () => {
  try {
    const res = await axios.post(
      '/api/categories',
      form.value,
      {
        withCredentials: true
      }
    )

    successMessage.value = 'Categoría añadida correctamente.'
    form.value.name = ''
    form.value.description = ''
    await loadCategories()
  } catch (err) {
    console.error('Error al añadir categoría:', err)
  }
}
</script>
