import { ref } from 'vue'
import { defineStore } from 'pinia'

export const useGlobalStore = defineStore('global', () => {
  const sidebarOpen = ref(false)

  function toggleDropwdownSideBar() {
    console.log(sidebarOpen.value)
    sidebarOpen.value = !sidebarOpen.value
  }

  return { sidebarOpen, toggleDropwdownSideBar }
})
