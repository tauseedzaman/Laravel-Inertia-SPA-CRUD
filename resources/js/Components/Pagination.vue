<template>
  <div v-if="links.length > 3">
    <div class="flex flex-wrap mb-1">
      <template class="" v-for="(link, i) in links" :key="i">
        <div
          v-if="link.url === null"
          class="
            mr-1
            mb-1
            px-4
            py-3
            leading-4
            text-sm text-gray-400
            border
            rounded
          "
          v-html="link.label"
        />
        <Inertia-Link
          v-else
          class="
            mr-1
            mb-1
            p-4
            text-sm
            leading-4
            border
            rounded
            hover:bg-white
            focus:border-indigo-500 focus:text-indigo-500
          "
          :class="{'bg-blue-700 text-white':link.active }"
          :href="link.url"
          v-html="link.label"
        />
      </template>
    </div>
  </div>
</template>

<script>
import { InertiaLink } from "@inertiajs/inertia-vue3";
export default {
    components:{
        InertiaLink
    },
    props:{
        links:Array
    }
};
</script>

<style>
</style>
