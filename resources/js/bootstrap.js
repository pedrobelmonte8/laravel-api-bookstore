import axios from 'axios';
window.axios = axios;


axios.defaults.baseURL = 'http://localhost:8000'
axios.defaults.withCredentials = true;