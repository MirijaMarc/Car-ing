<template>
  <div class="max-w-7xl mx-auto bg-white rounded-lg shadow-md p-6 animate-pulse">
    <!-- Skeleton du titre -->
    <div class="h-6 bg-gray-200 rounded w-2/3 mb-4 shimmer"></div>
    <div class="h-4 bg-gray-200 rounded w-1/3 mb-6 shimmer"></div>

    <!-- Skeleton de la galerie d'images -->
    <div class="mb-6">
      <div class="h-6 bg-gray-200 rounded w-1/4 mb-4 shimmer"></div>
      <div class="flex space-x-3">
        <div class="w-32 h-24 bg-gray-200 rounded-lg shimmer"></div>
        <div class="w-32 h-24 bg-gray-200 rounded-lg shimmer"></div>
        <div class="w-32 h-24 bg-gray-200 rounded-lg shimmer"></div>
      </div>
    </div>

    <!-- Skeleton de l'image principale -->
    <div class="relative mb-4">
      <div class="w-full h-72 bg-gray-200 rounded-lg shimmer"></div>
      <div class="absolute top-2 right-2 bg-gray-300 text-transparent text-sm font-semibold px-4 py-1 rounded-md w-24 h-6"></div>
    </div>

    <!-- Skeleton des caractéristiques -->
    <div class="grid grid-cols-2 gap-4 mb-6">
      <div class="h-10 bg-gray-200 rounded-lg shimmer"></div>
      <div class="h-10 bg-gray-200 rounded-lg shimmer"></div>
      <div class="h-10 bg-gray-200 rounded-lg shimmer"></div>
      <div class="h-10 bg-gray-200 rounded-lg shimmer"></div>
      <div class="h-10 bg-gray-200 rounded-lg shimmer"></div>
      <div class="h-10 bg-gray-200 rounded-lg shimmer"></div>
      <div class="h-10 bg-gray-200 rounded-lg shimmer"></div>
      <div class="h-10 bg-gray-200 rounded-lg shimmer"></div>
    </div>

    <!-- Skeleton de la description -->
    <div class="mt-6">
      <div class="h-6 bg-gray-200 rounded w-1/4 mb-4 shimmer"></div>
      <div class="h-4 bg-gray-200 rounded w-full mb-2 shimmer"></div>
      <div class="h-4 bg-gray-200 rounded w-5/6 mb-2 shimmer"></div>
      <div class="h-4 bg-gray-200 rounded w-2/3 shimmer"></div>
    </div>

    <!-- Skeleton du profil du vendeur -->
    <div class="mt-8 bg-gray-50 p-6 rounded-lg shadow-sm">
      <div class="h-6 bg-gray-200 rounded w-1/4 mb-4 shimmer"></div>
      <div class="flex items-center mb-4 shimmer">
        <div class="w-12 h-12 bg-gray-200 rounded-full mr-4 shimmer"></div>
        <div class="space-y-2">
          <div class="h-4 bg-gray-200 rounded w-32 shimmer"></div>
          <div class="h-4 bg-gray-200 rounded w-24 shimmer"></div>
        </div>
      </div>
      <div class="space-y-2">
        <div class="h-4 bg-gray-200 rounded w-1/3 shimmer"></div>
        <div class="h-4 bg-gray-200 rounded w-2/3 shimmer"></div>
      </div>
    </div>
  </div>
</template>

