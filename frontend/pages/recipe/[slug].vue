<template>
    <div class="min-h-screen bg-gradient-to-b from-blue-100 to-white px-6 py-10">
        <div class="max-w-5xl mx-auto bg-white rounded-2xl shadow-xl p-8">

            <!-- Back Link -->
            <NuxtLink
                to="/"
                class="inline-flex items-center text-sm text-[#fca311] hover:underline font-medium mb-4"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Back to Recipes
            </NuxtLink>

            <!-- Error Message -->
            <div v-if="error" class="text-red-600 text-center py-12">
                <p class="text-lg font-semibold">Recipe not found or an error occurred.</p>
                <p class="text-sm">Please try again later.</p>
            </div>

            <!-- Recipe Display -->
            <div v-else-if="recipe" class="animate-fade-in">
                <!-- Title -->
                <h1 class="text-4xl font-bold text-[#1a1a40] mb-4">
                    {{ recipe.name }}
                </h1>

                <!-- Description -->
                <p class="text-gray-700 italic mb-8">
                    {{ recipe.description }}
                </p>

                <!-- Ingredients & Steps -->
                <div class="grid md:grid-cols-2 gap-10">
                    <!-- Lists ingredients -->
                    <div>
                        <h2 class="text-xl font-semibold text-[#14213d] mb-4">Ingredients</h2>
                        <ul class="list-disc list-inside text-gray-800 space-y-2">
                            <li v-for="(ingredient, index) in recipe.ingredients" :key="index">
                                {{ ingredient }}
                            </li>
                        </ul>
                    </div>

                    <!-- Lists recipe steps -->
                    <div>
                        <h2 class="text-xl font-semibold text-[#14213d] mb-4">Instructions</h2>
                        <ol class="list-decimal list-inside text-gray-800 space-y-4 font-medium">
                            <li v-for="(step, index) in recipe.steps" :key="index">
                                {{ step.content }}
                            </li>
                        </ol>
                    </div>
                </div>

                <!-- Footer where author is displayed -->
                <div class="mt-12 border-t pt-6 text-sm text-gray-600">
                    <span>Submitted by {{ recipe.author.email }}</span>
                </div>
            </div>

            <!-- Loading State -->
            <div v-else class="text-center py-12 text-gray-500">Loading recipe...</div>
        </div>
    </div>
</template>

<script setup>
  const route   = useRoute()
  const config  = useRuntimeConfig()
  const baseUrl = process.server ? config.apiBase : config.public.apiBase

  const { data, error, pending } = await useFetch(`${baseUrl}/recipes/${route.params.slug}`, {
      key: `recipe-${route.params.slug}`,
  })

  const recipe = computed(() => data.value?.data)
</script>
