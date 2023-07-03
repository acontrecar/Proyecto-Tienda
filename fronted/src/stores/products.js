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
    products.value = data.data
    // .map((product) => ({
    //   ...product,
    //   image: getImage(product.image)
    // }))
    isLoading.value = false
    console.log('products', products.value)
  }

  //   const getProducts = async () => {
  //     isLoading.value = true
  //     const { data } = await service.get('/products')

  //     const imagesPromises = data.data.map((product) => getImage(product.image))
  //     const images = await Promise.all(imagesPromises)

  //     products.value = data.data.map((product, index) => ({
  //       ...product,
  //       image: images[index]
  //     }))

  //     isLoading.value = false

  //     console.log('products', products.value)
  //   }

  //   const getImage = async (image) => {
  //     const data = await service.get(`/products-image/${image}`)
  //     console.log('data', data.data)
  //     return data.data
  //   }

  return { products, isLoading, getProducts }
})
