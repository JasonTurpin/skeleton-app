<template>
    <div class="min-h-screen bg-gradient-to-b from-blue-100 to-white px-6 py-10">
        <div class="max-w-6xl mx-auto bg-white rounded-2xl shadow-xl p-8">
            <h1 class="text-4xl font-bold text-[#1a1a40] mb-6">Recipe Search</h1>

            <form @submit.prevent="onSearch" class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                <input v-model="filters.email" type="email" placeholder="Author Email" class="border border-gray-300 p-2 rounded" />
                <input v-model="filters.ingredient" type="text" placeholder="Ingredient"
                       class="border border-gray-300 p-2 rounded"/>
                <input v-model="filters.keyword" type="text" placeholder="Keyword"
                       class="border border-gray-300 p-2 rounded"/>
                <button type="submit"
                        class="md:col-span-3 bg-[#fca311] hover:bg-[#e07a00] text-white font-semibold py-2 rounded">
                    Search
                </button>
            </form>

            <!-- Results Table -->
            <table v-if="recipes.length" class="w-full table-fixed border border-gray-300 border-collapse text-left">
                <thead class="bg-[#1a1a40] text-white">
                    <tr>
                        <th class="p-3 border border-[#1a1a40]">Name</th>
                        <th class="p-3 border border-[#1a1a40]">Description</th>
                        <th class="p-3 border border-[#1a1a40]">Author</th>
                        <th class="p-3 border border-[#1a1a40]">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="recipe in recipes" :key="recipe.slug" class="hover:bg-blue-50">
                        <td class="p-3 border border-[#1a1a40]">{{ recipe.name }}</td>
                        <td class="p-3 border border-[#1a1a40]">{{ recipe.description }}</td>
                        <td class="p-3 border border-[#1a1a40]">{{ recipe.author_email }}</td>
                        <td class="p-3 border border-[#1a1a40]">
                            <NuxtLink :to="`/recipe/${recipe.slug}`" class="text-[#fca311] font-semibold underline">View</NuxtLink>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- No Results -->
            <div v-if="!pending && recipes.length === 0" class="text-center text-gray-600 py-6">
                No recipes found. Try adjusting your search criteria.
            </div>

            <!-- Pagination -->
            <div
                v-if="!pending && recipes.length && pagination.last_page > 1"
                class="flex justify-center mt-6 space-x-2"
            >
                <button
                    v-for="page in pages"
                    :key="page"
                    @click="goToPage(page)"
                    :disabled="page === '...'"
                    :class="[
                        'px-3 py-1 rounded',
                        page === pagination.current_page ? 'bg-[#1a1a40] text-white' : 'bg-white border',
                        page === '...' ? 'cursor-default text-gray-500' : 'hover:bg-[#fca311] hover:text-white'
                    ]"
                >
                    {{ page }}
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
    import {ref, onMounted, computed} from 'vue';
    import {useRouter, useRoute} from 'vue-router';

    const route = useRoute();
    const router = useRouter();

    const filters = ref({
        email: route.query.email || '',
        ingredient: route.query.ingredient || '',
        keyword: route.query.keyword || ''
    });

    const recipes = ref([]);
    const pagination = ref({current_page: 1, last_page: 1});
    const config = useRuntimeConfig();
    const pending = ref(false);
    const error = ref(null);

    const fetchRecipes = async (page = 1) => {
        const query = {...filters.value, page};
        const queryString = new URLSearchParams(query).toString();

        pending.value = true;
        error.value = null;

        try {
            const res = await $fetch(`${config.public.apiBase}/recipes?${queryString}`);
            recipes.value = res.data;
            pagination.value = res.meta;
            router.push({path: route.path, query});
        } catch (err) {
            error.value = err;
            console.error('Fetch failed:', err);
        } finally {
            pending.value = false;
        }
    };

    const onSearch = () => {
        fetchRecipes(1);
    };

    const pages = computed(() => {
        const {current_page, last_page} = pagination.value;
        const delta = 2;
        const range = [];

        const start = Math.max(current_page - delta, 1);
        const end = Math.min(current_page + delta, last_page);

        if (start > 1) {
            range.push(1);
            if (start > 2) range.push('...');
        }

        for (let i = start; i <= end; i++) {
            range.push(i);
        }

        if (end < last_page) {
            if (end < last_page - 1) range.push('...');
            range.push(last_page);
        }

        return range;
    });

    const goToPage = (page) => {
        if (page !== '...') fetchRecipes(page);
    };

    onMounted(() => {
        const page = parseInt(route.query.page) || 1;
        fetchRecipes(page);
    });
</script>

<style scoped>
    th, td {
        word-wrap: break-word;
        max-width: 200px;
    }
</style>
