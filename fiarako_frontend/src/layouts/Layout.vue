<script setup lang="js">
  import Filtre from '@/components/Filtre.vue';
  import Sidebar from '@/components/Sidebar.vue';
</script>
<template>
  <Sidebar />

  <div class="p-4 mt-[calc(100vh-80%)] sm:mt-20 transition-all">
    <router-view />
  </div>

</template>
