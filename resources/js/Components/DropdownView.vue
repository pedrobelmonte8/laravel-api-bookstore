<template>
  <div class="p-4">
    <select v-model="selected" class="border px-3 py-2 rounded w-64">
      <option disabled value="">Selecciona un elemento</option>
      <option value="books">Books</option>
      <option value="categories">Categories</option>
    </select>

    <div class="mt-6">
      <BooksList v-if="selected === 'books'" />
      <CategoriesList v-if="selected === 'categories'" />
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import BooksList from '@/Components/Books/Books.vue'
import CategoriesList from '@/Components/Categories/Categories.vue'

const selected = ref('')
</script>
