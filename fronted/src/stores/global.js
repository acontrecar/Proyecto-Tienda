import { ref } from 'vue'
import { defineStore } from 'pinia'

export const useGlobalStore = defineStore('global', () => {
  const sidebarOpen = ref(false)

  function toggleDropwdownSideBar() {
    sidebarOpen.value = !sidebarOpen.value
  }

  return { sidebarOpen, toggleDropwdownSideBar }
})
