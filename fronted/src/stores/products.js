import { ref } from 'vue'
import { defineStore } from 'pinia'
import service from '../service/apiService'

export const useProductsStore = defineStore('products', () => {
  const products = ref([])
  const isLoading = ref(true)

  const getProducts = async () => {
    isLoading.value = true
    const { data } = await service.get('/products')
    // products.value = data.data
    products.value = data.data.map((product) => ({
      ...product,
      image: 'http://api-rest-tienda.test' + '/storage/productsImage/' + product.image
    }))
    isLoading.value = false

    console.log('products', products.value)
  }

  return { products, isLoading, getProducts }
})
