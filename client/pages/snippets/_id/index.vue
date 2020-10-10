<template>
  <div>
    <div class="bg-white mb-16">
      <div class="container py-10 pb-16">
        <div class="w-5/6">
          <h1 class="text-4xl text-gray-700 font-medium leading-none mb-4">
            Snippet title
          </h1>

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