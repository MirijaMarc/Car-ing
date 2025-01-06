<template>
  <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-full sm:ml-8 sm:w-80 h-screen pt-20 transition-transform bg-white sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
    <div class="px-3 pb-4 border-black bg-slate-100 rounded-lg dark:bg-gray-800">
        <div class="p-6">
          <!-- Header -->
          <div class="flex items-center gap-2 mb-6">
            <div class="text-emerald-500 text-xl">#</div>
            <h2 class="text-lg font-medium">Filtres de recherche</h2>
          </div>

          <!-- Filters -->
          <div class="space-y-6">
            <!-- Type de véhicule -->
            <button class="w-full flex items-center justify-between px-4 py-3 bg-white rounded-lg border border-gray-200">
              <span class="text-gray-700">Type de véhicule</span>
              <i class="fas fa-chevron-right text-gray-400"></i>
            </button>

            <!-- Marque -->
            <button class="w-full flex items-center justify-between px-4 py-3 bg-white rounded-lg border border-gray-200">
              <span class="text-gray-700">Marque</span>
              <i class="fas fa-chevron-right text-gray-400"></i>
            </button>

            <!-- Prix d'achat -->
            <div class="space-y-3">
              <label class="text-gray-700">Prix d'achat</label>
              <div class="flex gap-4">
                <div class="flex-1 relative">
                  <input
                    type="text"
                    placeholder="Min"
                    class="w-full px-4 py-2 rounded-lg border border-gray-200 placeholder-gray-400"
                  />
                  <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400">€</span>
                </div>
                <div class="flex-1 relative">
                  <input
                    type="text"
                    placeholder="Max"
                    class="w-full px-4 py-2 rounded-lg border border-gray-200 placeholder-gray-400"
                  />
                  <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400">€</span>
                </div>
              </div>
              <label class="flex items-center gap-2">
                <input type="checkbox" class="w-4 h-4 rounded border-gray-300"/>
                <span class="text-gray-700">Baisse de prix</span>
              </label>
            </div>

            <!-- Mensualités -->
            <div class="space-y-3">
              <label class="text-gray-700">Mensualités</label>
              <div class="flex gap-4">
                <div class="flex-1 relative">
                  <input
                    type="text"
                    placeholder="Min"
                    class="w-full px-4 py-2 rounded-lg border border-gray-200 placeholder-gray-400"
                  />
                  <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400">€</span>
                </div>
                <div class="flex-1 relative">
                  <input
                    type="text"
                    placeholder="Max"
                    class="w-full px-4 py-2 rounded-lg border border-gray-200 placeholder-gray-400"
                  />
                  <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400">€</span>
                </div>
              </div>
            </div>


          </div>
        </div>
    </div>
  </aside>
</template>
