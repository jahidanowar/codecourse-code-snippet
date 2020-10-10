<template>
  <div class="container mt-16">
    <div class="flex flex-col items-center">
      <h1 class="text-3xl text-gray-700 font-medium mb-10">Hello</h1>

      <form
        @submit.prevent="submit"
        action="#"
        class="bg-white p-8 rounded w-full md:w-1/2 lg:w-1/3 mb-10"
      >
        <div class="mb-6">
          <label for="email" class="block text-gray-600 font-medium mb-2"
            >Email Address</label
          >
          <input
            v-model="form.email"
            type="text"
            name="email"
            id="email"
            class="border border-2 border-gray-400 rounded w-full p-3"
          />

          <div class="text-red-500 mb-4 text-sm mt-1">Message</div>
        </div>
        <div class="mb-6">
          <label for="password" class="block text-gray-600 font-medium mb-2"
            >Password</label
          >
          <input
            v-model="form.password"
            type="text"
            name="password"
            id="password"
            class="border border-2 border-gray-400 rounded w-full p-3"
          />

          <div class="text-red-500 mb-4 text-sm mt-1">Message</div>
        </div>
        <div>
          <button
            type="submit"
            class="bg-blue-500 text-white p-4 rounded text-center font-medium block w-full"
          >
            Sign in
          </button>
        </div>
      </form>

      <div class="text-center text-gray-600">
        No account?

        <nuxt-link :to="{ name: 'index' }">Create one here</nuxt-link>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      form: {
        email: "",
        password: "",
      },
    };
  },
  methods: {
    async submit() {
      await this.$auth.loginWith("local", {
        data: {
          email: "kennethworks26@gmail.com",
          password: "password",
        },
      });
    },
  },
};
</script>
