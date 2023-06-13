import axios from 'axios'

const service = axios.create({
  baseURL: 'http://api-rest-tienda.test/api'
})

export default service
