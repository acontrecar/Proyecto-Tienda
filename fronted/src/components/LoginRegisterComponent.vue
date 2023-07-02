<template>
  <div class="w-full h-screen flex items-center justify-center">
    <div class="flex flex-col md:flex-row">
      <div class="w-full md:w-1/2 p-8">
        <form @submit="login">
          <!-- Formulario de inicio de sesión -->
          <h2 class="text-2xl font-bold mb-4">Login</h2>

          <label for="email">Email</label>
          <input
            type="email"
            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
            id="email"
            autocomplete="email"
            v-model="emailLogin"
          />

          <label for="password">Password</label>
          <input
            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
            type="password"
            id="password"
            v-model="passwordLogin"
          />
          <button
            type="submit"
            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mt-4"
          >
            Iniciar sesión
          </button>
        </form>
      </div>

      <div class="w-full md:w-1/2 p-8">
        <form @submit="register">
          <!-- Formulario de registro -->
          <h2 class="text-2xl font-bold mb-4">Register</h2>

          <label for="name">Name</label>
          <input
            type="text"
            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-200 sm:text-sm sm:leading-6"
            id="name"
            autocomplete="name"
            v-model="name"
          />

          <label for="emailRegister">Email</label>
          <input
            type="email"
            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-200 sm:text-sm sm:leading-6"
            id="emailRegister"
            autocomplete="email"
            v-model="emailRegister"
          />

          <label for="passwordRegister">Password</label>
          <input
            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-200 sm:text-sm sm:leading-6"
            type="password"
            pattern="^(?=.*[A-Z])(?=.*\d).+$"
            title="La contraseña debe contener al menos una mayúscula y un número."
            id="passwordRegister"
            v-model="passwordRegister"
          />

          <label for="passwordRegister">Repeat password</label>
          <input
            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-200 sm:text-sm sm:leading-6"
            type="password"
            id="passwordRegisterRepeat"
            v-model="passwordRegisterRepeat"
          />
          <button
            type="submit"
            class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded mt-4"
          >
            Registrarse
          </button>
        </form>
      </div>
    </div>
  </div>
</template>
<script setup>
import { ref } from 'vue'
import { useUserStore } from '@/stores/user'

const user = ref([])
const name = ref('')
const emailRegister = ref('')
const passwordRegister = ref('')
const passwordRegisterRepeat = ref('')

const emailLogin = ref('')
const passwordLogin = ref('')

const store = useUserStore()

const register = (e) => {
  e.preventDefault()

  if (passwordRegister.value !== passwordRegisterRepeat.value) {
    alert('Las contraseñas no coinciden')
    return
  }

  user.value.push({
    name: name.value,
    email: emailRegister.value,
    password: passwordRegister.value
  })

  store.register(user.value[0])

  user.value = []
}

const login = (e) => {
  e.preventDefault()

  user.value.push({
    email: emailLogin.value,
    password: passwordLogin.value
  })

  store.login(user.value[0])

  user.value = []
}
</script>
<style scoped></style>
