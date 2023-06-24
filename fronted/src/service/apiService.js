import axios from 'axios'

const baseURL = 'http://api-rest-tienda.test/api'
const service = axios.create({
  baseURL
})

export default service
