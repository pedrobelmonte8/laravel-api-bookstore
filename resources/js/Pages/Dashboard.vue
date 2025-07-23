<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';


//Prueba carga de libros
import { ref, onMounted } from 'vue'
import axios from 'axios'

const categories = ref([])

onMounted(async () => {
  try {
    const response = await axios.get('/api/categories')
    categories.value = response.data.data
    console.log('Categorías cargadas:', categories.value[1].name)
  } catch (error) {
    console.error('Error al cargar categorías:', error)
  }
})

</script>

<template>
    <Head title="Dashboard" />

    <div>
    <h1 class="text-2xl font-bold mb-4">Mis Categorías</h1>

    <ul v-if="categories.length">
      <li v-for="category in categories" :key="category.id" class="mb-2">
        <strong>{{ category.name }}</strong> - {{ category.description }}
      </li>
    </ul>

    <p v-else>No tienes categorías aún.</p>
  </div>

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900">
                        You're logged in!
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
