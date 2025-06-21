// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
    devtools: { enabled: true },
    modules: ['@nuxtjs/tailwindcss'],
    runtimeConfig: {
        apiBase: process.env.API_BASE || 'http://localhost/api',

        public: {
            // Exposed to browser (client-side)
            apiBase: process.env.NUXT_PUBLIC_API_BASE || 'http://localhost:8888/api'
        }
    }
})
