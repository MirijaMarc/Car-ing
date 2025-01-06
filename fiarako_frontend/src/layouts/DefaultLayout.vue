<script setup lang="js">
  import Filtre from '@/components/Filtre.vue';
  import Sidebar from '@/components/Sidebar.vue';
</script>
<template>
  <Sidebar />
  <Filtre />

  <div class="p-4 mt-[calc(100vh-80%)] sm:mt-20 sm:ml-96 transition-all">
    <router-view />
  </div>

</template>

