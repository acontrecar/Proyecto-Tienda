import { ref } from 'vue'
import { defineStore } from 'pinia'
import service from '../service/apiService'

export const useUserStore = defineStore('user', () => {
  const user = ref(null)
  const token = ref(null)
  const error = ref(null)
  const loading = ref(false)
  const loggedIn = ref(false)
  const message = ref(null)

  const register = async (data) => {
    loading.value = true
    console.log('data', data)
    try {
      const headers = {
        Accept: 'application/json',
        'Content-Type': 'application/json'
      }
      const response = await service.post('/register', data, { headers })

      console.log('response', response)
      console.log('object')
      user.value = response.data.user
      token.value = response.data.token
      loggedIn.value = true
    } catch (err) {
      error.value = err.response.data.message
      console.error('Error:', err.response.data) // Agrega esta línea para ver el contenido del error
    }
  }

  const login = async (data) => {
    loading.value = true
    try {
      const headers = {
        Accept: 'application/json',
        'Content-Type': 'application/json'
      }
      const response = await service.post('/login', data, { headers })
      user.value = response.data.data
      token.value = response.data.token
      loggedIn.value = true
      message.value = response.data.message

      console.log('response', response.data)
    } catch (err) {
      error.value = err.response.data.message
      console.error('Error:', err.response.data) // Agrega esta línea para ver el contenido del error
    }
  }

  return { register, login, user, token, error, loading, loggedIn }
})
