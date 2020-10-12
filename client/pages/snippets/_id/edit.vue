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
      <div class="flex items-center mb-6">
        <div class="text-xl text-gray-600 font-medium mr-3">1/5.</div>
        <input
          v-model="currentStep.title"
          type="text"
          class="text-xl text-gray-600 font-medium px-2 py-1 bg-transparent border-2 rounded border-dashed border-gray-400 w-full"
          value=""
          placeholder="Untitled step"
        />
      </div>
      <div class="flex flex-wrap lg:flex-no-wrap">
        <div
          class="w-full lg:w-2/3 lg:mr-16 flex flex-wrap lg:flex-no-wrap justify-between items-start mb-8"
        >
          <div class="flex flex-row lg:flex-col mr-2 order-first">
            <nuxt-link
              :to="{}"
              class="block mb-2 p-3 bg-blue-500 rounded-lg mr-2 lg:mr-0"
              title="Previous step"
            >
              <svg
                class="fill-current text-white h-6 w-6"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                width="24"
                height="24"
              >
                <path
                  class="heroicon-ui"
                  d="M5.41 11H21a1 1 0 0 1 0 2H5.41l5.3 5.3a1 1 0 0 1-1.42 1.4l-7-7a1 1 0 0 1 0-1.4l7-7a1 1 0 0 1 1.42 1.4L5.4 11z"
                />
              </svg>
            </nuxt-link>

            <nuxt-link
              :to="{}"
              class="block mb-2 p-3 bg-blue-500 rounded-lg"
              title="Add step before"
            >
              <svg
                class="fill-current text-white h-6 w-6"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                width="24"
                height="24"
              >
                <path
                  class="heroicon-ui"
                  d="M17 11a1 1 0 0 1 0 2h-4v4a1 1 0 0 1-2 0v-4H7a1 1 0 0 1 0-2h4V7a1 1 0 0 1 2 0v4h4z"
                />
              </svg>
            </nuxt-link>
          </div>

          <div class="w-full lg:mr-2">
            <textarea
              v-model="currentStep.body"
              class="w-full mb-6 border-dashed border-2 border-gray-400 rounded-lg"
            ></textarea>
            <div class="bg-white p-8 rounded-lg text-gray-600">
              Markdown content
            </div>
          </div>

          <div
            class="flex flex-row-reverse lg:flex-col order-first lg:order-last"
          >
            <nuxt-link
              :to="{}"
              class="block mb-2 p-3 bg-blue-500 rounded-lg mr-2 lg:mr-0"
              title="Next step"
            >
              <svg
                class="fill-current text-white h-6 w-6"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                width="24"
                height="24"
              >
                <path
                  class="heroicon-ui"
                  d="M18.59 13H3a1 1 0 0 1 0-2h15.59l-5.3-5.3a1 1 0 1 1 1.42-1.4l7 7a1 1 0 0 1 0 1.4l-7 7a1 1 0 0 1-1.42-1.4l5.3-5.3z"
                />
              </svg>
            </nuxt-link>
            <nuxt-link
              :to="{}"
              class="block mb-2 p-3 bg-blue-500 rounded-lg"
              title="Add step after"
            >
              <svg
                class="fill-current text-white h-6 w-6"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                width="24"
                height="24"
              >
                <path
                  class="heroicon-ui"
                  d="M17 11a1 1 0 0 1 0 2h-4v4a1 1 0 0 1-2 0v-4H7a1 1 0 0 1 0-2h4V7a1 1 0 0 1 2 0v4h4z"
                />
              </svg>
            </nuxt-link>
            <nuxt-link
              :to="{}"
              class="block mb-2 p-3 bg-blue-500 rounded-lg mr-2 lg:mr-0"
              title="Delete step"
            >
              <svg
                class="fill-current text-white h-6 w-6"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                width="24"
                height="24"
              >
                <path
                  class="heroicon-ui"
                  d="M8 6V4c0-1.1.9-2 2-2h4a2 2 0 0 1 2 2v2h5a1 1 0 0 1 0 2h-1v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8H3a1 1 0 1 1 0-2h5zM6 8v12h12V8H6zm8-2V4h-4v2h4zm-4 4a1 1 0 0 1 1 1v6a1 1 0 0 1-2 0v-6a1 1 0 0 1 1-1zm4 0a1 1 0 0 1 1 1v6a1 1 0 0 1-2 0v-6a1 1 0 0 1 1-1z"
                />
              </svg>
            </nuxt-link>
          </div>
        </div>
        <div class="w-full lg:w-1/3">
          <div class="mb-8">
            <h1 class="text-xl text-gray-600 font-medium mb-6">Steps</h1>
            <ul>
              <li
                class="mb-1"
                v-for="(step, index) in orderedStepsAsc"
                :key="index"
              >
                <nuxt-link
                  :to="{}"
                  :class="{ 'font-bold': currentStep.uuid === step.uuid }"
                  >{{ step.order }}. {{ step.title }}</nuxt-link
                >
              </li>
            </ul>
          </div>

          <div class="text-gray-500 text-sm">
            Use
            <div class="highlight">ctrl</div>
            +
            <div class="highlight">shift</div>
            +
            <div class="highlight">left or right</div>
            on your keyboard to navigation between steps
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { orderBy as _orderBy } from "lodash";
import { debounce as _debounce } from "lodash";

export default {
  data() {
    return {
      snippet: null,
      steps: [],
    };
  },
  watch: {
    "snippet.title": {
      handler: _debounce(async function (title) {
        await this.$axios.$patch(`snippets/${this.snippet.uuid}`, {
          title,
        });
      }, 500),
    },
    currentStep: {
      deep: true,
      handler: _debounce(async function (step) {
        await this.$axios.$patch(
          `snippets/${this.snippet.uuid}/steps/${step.uuid}`,
          {
            title: step.title,
            body: step.body,
          }
        );
      }, 500),
    },
  },
  computed: {
    orderedStepsAsc() {
      return _orderBy(this.steps, "order", "asc");
    },
    firstStep() {
      return this.orderedStepsAsc[0];
    },
    currentStep() {
      return (
        this.orderedStepsAsc.find((s) => s.uuid === this.$route.query.step) ||
        this.firstStep
      );
    },
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

<style scoped>
.highlight {
  @apply inline-block px-2 leading-relaxed text-gray-600 rounded bg-gray-400 text-sm;
}
</style>