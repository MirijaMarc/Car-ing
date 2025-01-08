<template>
  <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-full sm:ml-8 sm:w-80 h-screen pt-20 overflow-y-auto transition-transform bg-white sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
    <div class="px-3 pb-4 border-black bg-slate-100 rounded-lg dark:bg-gray-800">
      <div class="p-6">
        <!-- Header -->
        <div class="flex items-center gap-2 mb-6">
          <div class="text-emerald-500 text-xl">#</div>
          <h2 class="text-lg font-medium">Filtres de recherche</h2>
        </div>

        <!-- Filters -->
        <div class="space-y-6">


         <!-- Marques -->
          <div class="space-y-3">
            <label class="text-gray-700">Marque</label>
            <select class="w-full px-4 py-2 rounded-lg border border-gray-200">
              <!-- Options dynamiques depuis la table -->
              <option value="">Tous</option>
            </select>
          </div>

          <!-- Modèle -->
          <div class="space-y-3">
            <label class="text-gray-700">Modèle</label>
            <select class="w-full px-4 py-2 rounded-lg border border-gray-200">
              <!-- Options dynamiques depuis la table -->
              <option value="">Tous</option>
            </select>
          </div>



          <!-- Kilométrage -->
          <div class="space-y-3">
            <label class="text-gray-700">Kilométrage</label>
            <div class="flex gap-4">
              <input type="number" placeholder="Min" class="w-full px-4 py-2 rounded-lg border border-gray-200">
              <input type="number" placeholder="Max" class="w-full px-4 py-2 rounded-lg border border-gray-200">
            </div>
          </div>

          <!-- Prix -->
          <div class="space-y-3">
            <label class="text-gray-700">Prix</label>
            <div class="flex gap-4">
              <input type="number" placeholder="Min" class="w-full px-4 py-2 rounded-lg border border-gray-200">
              <input type="number" placeholder="Max" class="w-full px-4 py-2 rounded-lg border border-gray-200">
            </div>
          </div>

          <!-- Statut -->
          <div class="space-y-3">
            <label class="text-gray-700">Statut</label>

            <div class="flex justify-evenly">
                <div class="flex items-center me-4">
                    <input id="inline-radio" type="radio" value="" name="statut" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="inline-radio" class="ms-2 text-sm font-medium text-gray-700 dark:text-gray-300">Neuf</label>
                </div>
                <div class="flex items-center me-4">
                    <input id="inline-2-radio" type="radio" value="" name="statut" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="inline-2-radio" class="ms-2 text-sm font-medium text-gray-700 dark:text-gray-300">Occasion</label>
                </div>
            </div>

          </div>

          <!-- Volant -->
          <div class="space-y-3">
            <label class="text-gray-700">Volant</label>
            <div class="flex justify-evenly">
                <div class="flex items-center me-4">
                    <input id="inline-radio2" type="radio" value="" name="volant" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="inline-radio2" class="ms-2 text-sm font-medium text-gray-700 dark:text-gray-300">Gauche</label>
                </div>
                <div class="flex items-center me-4">
                    <input id="inline-2-radio3" type="radio" value="" name="volant" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="inline-2-radio3" class="ms-2 text-sm font-medium text-gray-700 dark:text-gray-300">Droite</label>
                </div>
            </div>
          </div>


          <!-- Année -->
          <div class="space-y-3">
            <label class="text-gray-700">Année</label>
            <div class="flex gap-4">
              <input type="number" placeholder="Min" class="w-full px-4 py-2 rounded-lg border border-gray-200">
              <input type="number" placeholder="Max" class="w-full px-4 py-2 rounded-lg border border-gray-200">
            </div>
          </div>

          <!-- Climatisation -->
          <div class="space-y-3">
            <label class="text-gray-700">Climatisation</label>
            <div class="flex justify-evenly">
                <div class="flex items-center me-4">
                    <input id="inline-radio4" type="radio" value="" name="climatisation" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="inline-radio4" class="ms-2 text-sm font-medium text-gray-700 dark:text-gray-300">Oui</label>
                </div>
                <div class="flex items-center me-4">
                    <input id="inline-2-radio5" type="radio" value="" name="climatisation" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="inline-2-radio5" class="ms-2 text-sm font-medium text-gray-700 dark:text-gray-300">Non</label>
                </div>
            </div>
          </div>

          <!-- Moteur -->
          <div class="space-y-3">
            <label class="text-gray-700">Moteur</label>
            <input type="text" placeholder="Type de moteur" class="w-full px-4 py-2 rounded-lg border border-gray-200">
          </div>

          <!-- Carrosserie -->
          <div class="space-y-3">
            <label class="text-gray-700">Carrosserie</label>
            <select class="w-full px-4 py-2 rounded-lg border border-gray-200">
              <!-- Options dynamiques depuis la table -->
              <option value="">Tous</option>
            </select>
          </div>



          <!-- Carburant -->
          <div class="space-y-3">
            <label class="text-gray-700">Carburant</label>

            <div class="flex justify-evenly">
                <div class="flex items-center me-4">
                    <input id="inline-radio5" type="radio" value="" name="carburant" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="inline-radio5" class="ms-2 text-sm font-medium text-gray-700 dark:text-gray-300">Essence</label>
                </div>
                <div class="flex items-center me-4">
                    <input id="inline-2-radio6" type="radio" value="" name="carburant" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="inline-2-radio6" class="ms-2 text-sm font-medium text-gray-700 dark:text-gray-300">Diesel</label>
                </div>

                <div class="flex items-center me-4">
                    <input id="inline-2-radio7" type="radio" value="" name="carburant" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="inline-2-radio7" class="ms-2 text-sm font-medium text-gray-700 dark:text-gray-300">Electrique</label>
                </div>
            </div>
          </div>

          <!-- Boîte -->
          <div class="space-y-3">
            <label class="text-gray-700">Boîte de vitesses</label>
            <select class="w-full px-4 py-2 rounded-lg border border-gray-200">
              <!-- Options dynamiques depuis la table -->
              <option value="">Tous</option>
            </select>
          </div>

          <!-- Couleur -->
          <div class="space-y-3">
            <label class="text-gray-700">Couleur</label>
            <select class="w-full px-4 py-2 rounded-lg border border-gray-200">
              <!-- Options dynamiques depuis la table -->
              <option value="">Toutes</option>
            </select>
          </div>

        </div>
      </div>
    </div>
  </aside>
</template>
