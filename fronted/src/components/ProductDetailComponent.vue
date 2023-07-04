<template>
  <div :class="{ 'ml-0': !sidebarOpen, 'ml-44': sidebarOpen }" class="w-full mt-20">
    <div class="p-4 mt-6">
      <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
        <p class="text-2xl">Holaaa Furrete</p>
      </div>
    </div>

    <div></div>

    <div>
      <h1>Detalles del Producto</h1>
      <p>ID del producto: {{ id }}</p>
      <!-- Aquí puedes mostrar los detalles del producto según el ID utilizando la información de tu backend -->
    </div>
  </div>
</template>
<script setup>
import { ref, onMounted } from 'vue'
import { useRoute } from 'vue-router'

const route = useRoute()
const id = ref(null)

onMounted(() => {
  id.value = route.params.id
})
</script>
<style scoped></style>
