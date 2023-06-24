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
    <div class="flex items-center justify-center" v-else>
      <div
        v-for="product in products"
        :key="product.id"
        class="flex flex-col items-center justify-center w-64 h-64 p-4 m-4 bg-slate-400 rounded shadow-md dark:bg-gray-800"
      >
        <img :src="product.image" class="w-32 h-32 rounded-full" />
        {{ product.name }}
      </div>
    </div>
  </div>
</template>

<script setup>
import { useGlobalStore } from '../stores/global.js'
import { useProductsStore } from '../stores/products.js'
import { computed, onMounted } from 'vue'

const store = useGlobalStore()
const productsStore = useProductsStore()

onMounted(() => {
  productsStore.getProducts()
})

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

<style lang=""></style>
