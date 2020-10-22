<template>
  <div>
    <div class="bg-white mb-16">
      <div class="container py-10 pb-16">
        <h1 class="text-4xl text-gray-700 font-medium leading-tight mb-4">
          Search
        </h1>
      </div>
    </div>

    <div class="container">
      <h1 class="text-xl text-gray-600 font-medium mb-6">Snippets (x)</h1>

      <ais-instant-search-ssr>
        <ais-search-box class="mb-10" />
        <ais-stats class="mb-6" />
        <ais-refinement-list attribute="brand" />
        <ais-hits class="mb-10">
          <template slot="item" slot-scope="{ item }">
            <p>
              <ais-highlight attribute="data.title" :hit="item" />
            </p>
            <p>
              <ais-highlight attribute="data.author" :hit="item" />
            </p>
          </template>
        </ais-hits>
        <ais-pagination />
      </ais-instant-search-ssr>
    </div>
  </div>
</template>

<script>
import {
  AisInstantSearchSsr,
  AisRefinementList,
  AisHits,
  AisHighlight,
  AisSearchBox,
  AisStats,
  AisPagination,
  createServerRootMixin,
} from "vue-instantsearch";
import algoliasearch from "algoliasearch/lite";

const searchClient = algoliasearch(
  process.env.ALGOLIA_APP_ID,
  process.env.ALGOLIA_SECRET
);

export default {
  components: {
    AisInstantSearchSsr,
    AisRefinementList,
    AisHits,
    AisHighlight,
    AisSearchBox,
    AisStats,
    AisPagination,
  },
  head() {
    return {
      title: "Search",
      link: [
        {
          rel: "stylesheet",
          href:
            "https://cdn.jsdelivr.net/npm/instantsearch.css@7.3.1/themes/algolia-min.css",
        },
      ],
    };
  },
  mixins: [
    createServerRootMixin({
      searchClient,
      indexName: "snippets",
    }),
  ],
  serverPrefetch() {
    return this.instantsearch.findResultsState(this).then((algoliaState) => {
      this.$ssrContext.nuxt.algoliaState = algoliaState;
    });
  },
  beforeMount() {
    const results =
      this.$nuxt.context.nuxtState.algoliaState || window.__NUXT__.algoliaState;

    this.instantsearch.hydrate(results);
  },
};
</script>
