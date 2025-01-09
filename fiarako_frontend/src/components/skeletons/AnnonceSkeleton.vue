<template>
  <div
    class="max-w-sm bg-white border border-gray-300 rounded-lg shadow-md transform transition-all duration-300"
  >
    <div>

      <!-- Skeleton Image de la voiture -->
      <div class="relative">
        <div class="bg-gray-300 rounded-t-lg h-48 w-full shimmer"></div>
        <!-- Skeleton du prix -->
        <div class="absolute top-2 right-2 bg-gray-300 text-white text-sm font-semibold px-4 py-1 rounded-md w-24 h-6"></div>
      </div>

      <!-- Skeleton du contenu de la carte -->
      <div class="p-4">
        <!-- Skeleton du modèle -->
        <div class="bg-gray-300 h-6 w-1/2 mb-4 rounded shimmer"></div>

        <!-- Skeleton de la localisation -->
        <div class="flex items-center mb-4 text-sm">
          <div class="bg-gray-300 h-4 w-10 mr-2 rounded shimmer"></div>
          <div class="bg-gray-300 h-4 w-20 rounded shimmer"></div>
        </div>

        <!-- Skeleton des caractéristiques -->
        <div class="grid grid-cols-2 gap-3">
          <div class="flex items-center">
            <div class="bg-gray-300 h-4 w-12 mr-2 rounded shimmer"></div>
            <div class="bg-gray-300 h-4 w-24 rounded shimmer"></div>
          </div>
          <div class="flex items-center">
            <div class="bg-gray-300 h-4 w-12 mr-2 rounded shimmer"></div>
            <div class="bg-gray-300 h-4 w-24 rounded shimmer"></div>
          </div>
          <div class="flex items-center">
            <div class="bg-gray-300 h-4 w-12 mr-2 rounded shimmer"></div>
            <div class="bg-gray-300 h-4 w-24 rounded shimmer"></div>
          </div>
          <div class="flex items-center">
            <div class="bg-gray-300 h-4 w-12 mr-2 rounded shimmer"></div>
            <div class="bg-gray-300 h-4 w-24 rounded shimmer"></div>
          </div>
        </div>

        <!-- Skeleton de la date publiée -->
        <div class="mt-4 text-sm text-gray-500 opacity-75 flex items-center">
          <div class="bg-gray-300 h-4 w-16 mr-2 rounded shimmer"></div>
          <div class="bg-gray-300 h-4 w-32 rounded shimmer"></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    item: {
      type: Object,
      required: false, // Défini comme optionnel pour afficher le skeleton
    },
  },
};
</script>

