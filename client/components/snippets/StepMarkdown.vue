<template>
    <div v-html="markdown"></div>
</template>

<script>
const markdown = require('markdown-it')();

export default {
  props: {
    value: {
      required: true,
      type: String
    }
  },
  computed: {
    markdown() {
      return markdown.render(this.value);
    }
  }
}
</script>
