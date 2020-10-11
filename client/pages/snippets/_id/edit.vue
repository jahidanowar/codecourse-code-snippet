<template>
  <div>
    <div class="bg-white mb-16">
      <div class="container py-10 pb-16">
        <div class="w-5/6">
          <input
            v-model="snippet.title"
            type="text"
            class="w-full block rounded border-2 border-dashed border-gray-400 text-4xl text-gray-700 font-medium leading-tight p-2 mb-4"
            value=""
            placeholder="Untitled snippet"
          />

          <div class="text-gray-600">
            Created by
            <nuxt-link :to="{ name: 'index' }">Kenneth Fernandez</nuxt-link>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <h3 class="text-xl text-gray-600 font-medium mb-6">1/1. Step title</h3>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      snippet: null,
      steps: [],
    };
  },
  async asyncData({ app, params }) {
    let snippet = await app.$axios.$get(`snippets/${params.id}`);

    return {
      snippet: snippet.data,
      steps: snippet.data.steps.data,
    };
  },
};
</script>