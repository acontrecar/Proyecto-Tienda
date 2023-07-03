<template lang="">
  <div :class="{ 'ml-0': !sidebarOpen, 'ml-44': sidebarOpen }" class="w-full mt-20">
    <div class="p-4 mt-14">
      <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
        <p class="text-2xl">Holaaa</p>
      </div>
    </div>

    <div v-if="isLoading" class="flex items-center justify-center">
      <img src="../assets/images/loading.gif" />
    </div>
    <div v-else class="flex items-center justify-center">
      <div
        class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4"
      >
        <button
          v-for="product in products"
          :key="product.id"
          class="product-item flex flex-col items-center justify-center w-64 h-64 p-4 m-4 bg-green-200 rounded shadow-md dark:bg-gray-800 hover:bg-green-300 dark:hover:bg-gray-700"
        >
          <!-- Usa la ruta completa incluyendo el prefijo 'storage' -->
          <img
            :src="'http://api-rest-tienda.test/productsImage/' + product.image"
            :alt="product.name"
            class="w-32 h-32 rounded-full"
          />
          {{ product.name }}
        </button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useGlobalStore } from '../stores/global.js'
import { useProductsStore } from '../stores/products.js'
import { computed, onMounted } from 'vue'
// import service from '../service/apiService'

// const arrayImagenes = ref([])

const store = useGlobalStore()
const productsStore = useProductsStore()

// const imageLoad = ref(false) // Valor inicial debería ser true, ya que asumimos que las imágenes están cargando

onMounted(async () => {
  await productsStore.getProducts() // Esperamos a que se carguen los productos antes de renderizar las imágenes
  console.log(productsStore.products)
  //   imageLoad.value = true // Luego de cargar los productos, indicamos que las imágenes ya cargaron
})

// const getImage = async (image) => {
//   console.log('Hola')
//   try {
//     const data = await service.get(`products-image/${image}`)
//     return `data:image/jpeg;base64,${data.data}`
//   } catch (error) {
//     console.error('Error fetching image:', error)
//     // Puedes hacer algo en caso de error, por ejemplo, mostrar una imagen de error o un mensaje
//     return '' // Devuelve una cadena vacía para que no se muestre ninguna imagen en caso de error.
//   }
// }

const products = computed(() => {
  return productsStore.products
})

const isLoading = computed(() => {
  return productsStore.isLoading
})

const sidebarOpen = computed(() => {
  return store.sidebarOpen
})
</script>

<style scoped>
.product-item {
  width: 18rem;
  height: 18rem;
  transition: transform 0.3s; /* Agrega una transición suave para el efecto */
}

/* Agrega el efecto de hover que aumenta el tamaño */
.product-item:hover {
  transform: scale(1.1); /* Aumenta el tamaño en un 10% (1.1 veces) al pasar el ratón */
}
</style>
