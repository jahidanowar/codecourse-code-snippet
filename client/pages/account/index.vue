<template>
  <div class="container mt-16">
    <div class="flex flex-col items-center">
      <h1 class="text-3xl text-gray-700 font-medium mb-10">
        {{ $auth.user.name }}
      </h1>

      <div class="w-full md:w-1/2 lg:w-1/3 mb-10">
        <form
          @submit.prevent="submit"
          action="#"
          class="mb-6"
        >
          <div class="mb-6">
            <label
              for="email"
              class="block text-gray-600 font-medium mb-2"
              :class="{ 'text-red-500': validation.email }"
            >Email Address</label>
            <input
              v-model="form.email"
              type="text"
              name="email"
              id="email"
              class="border-2 border-gray-400 rounded w-full p-3"
              :class="{ 'border-red-500': validation.email }"
            />

            <div
              v-if="validation.email"
              class="text-red-500 font-medium mb-4 text-sm mt-1"
            >
              {{ validation.email[0] }}
            </div>
          </div>
          <div class="mb-6">
            <label
              for="name"
              class="block text-gray-600 font-medium mb-2"
              :class="{ 'text-red-500': validation.name }"
            >Name</label>
            <input
              v-model="form.name"
              type="text"
              name="name"
              id="name"
              class="border-2 border-gray-400 rounded w-full p-3"
              :class="{ 'border-red-500': validation.name }"
            />

            <div
              v-if="validation.name"
              class="text-red-500 font-medium mb-4 text-sm mt-1"
            >
              {{ validation.name[0] }}
            </div>
          </div>
          <div class="mb-6">
            <label
              for="username"
              class="block text-gray-600 font-medium mb-2"
              :class="{ 'text-red-500': validation.username }"
            >Username</label>
            <input
              v-model="form.username"
              type="text"
              name="username"
              id="username"
              class="border-2 border-gray-400 rounded w-full p-3"
              :class="{ 'border-red-500': validation.username }"
            />

            <div
              v-if="validation.username"
              class="text-red-500 font-medium mb-4 text-sm mt-1"
            >
              {{ validation.username[0] }}
            </div>
          </div>
          <div class="mb-6">
            <label
              for="password"
              class="block text-gray-600 font-medium mb-2"
              :class="{ 'text-red-500': validation.password }"
            >Password</label>
            <input
              v-model="form.password"
              type="password"
              name="password"
              id="password"
              class="border-2 border-gray-400 rounded w-full p-3"
              :class="{ 'border-red-500': validation.password }"
            />

            <div
              v-if="validation.password"
              class="text-red-500 font-medium mb-4 text-sm mt-1"
            >
              {{ validation.password[0] }}
            </div>

            <div class="text-sm text-gray-500">
              Leave black to keep the same
            </div>
          </div>
          <div>
            <button
              type="submit"
              class="bg-blue-500 text-white p-4 rounded text-center font-medium block w-full focus:outline-none"
            >
              Update
            </button>
          </div>
        </form>

        <div>
          <nuxt-link :to="{
              name: 'author-id',
              params: {
                id: $auth.user.username
              }
            }">View your public profile link</nuxt-link>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  middleware: ["auth"],
  head () {
    return {
      title: "Account"
    };
  },
  data () {
    return {
      form: {
        email: this.$auth.user.email,
        password: "",
        name: this.$auth.user.name,
        username: this.$auth.user.username
      },
      validation: {}
    };
  },
  methods: {
    async submit () {
      try {
        await this.$axios.$patch(
          `users/${this.$auth.user.username}`,
          this.form
        );
        await this.$auth.fetchUser();

        this.form.password = ''
        this.validation = {}
      } catch (e) {
        if (e.response.status === 422) {
          this.validation = e.response.data.errors;
        }
      }
    }
  }
};
</script>
