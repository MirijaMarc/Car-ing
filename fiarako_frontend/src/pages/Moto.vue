<template>
  <div class="filtre">
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
  </div>
  <div class="container mx-auto p-4">
    <!-- Barre de recherche et tri -->
    <div class="flex justify-between items-center mb-4">
      <input
        v-model="searchQuery"
        type="text"
        placeholder="Rechercher une voiture..."
        class="p-2 border border-gray-300 rounded w-1/3"
      />
      <select
        v-model="sortOption"
        class="p-2 border border-gray-300 rounded w-1/4"
      >
        <option value="">Trier par</option>
        <option value="priceAsc">Prix croissant</option>
        <option value="priceDesc">Prix décroissant</option>
        <option value="nameAsc">Nom A-Z</option>
        <option value="nameDesc">Nom Z-A</option>
      </select>
    </div>

    <!-- Nombre de véhicules -->
    <div class="mb-4 text-lg font-semibold">
      {{ filteredItems.length }} motos disponibles
    </div>

    <!-- Liste des cartes -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
      <AnnonceCard
        v-for="(item, index) in sortedAndFilteredItems"
        :key="index"
        :item="item"
      />
    </div>
  </div>
</template>

<script>
import AnnonceCard from "@/components/AnnonceCard.vue";

export default {
  components: {
    AnnonceCard,
  },
  data() {
    return {
      searchQuery: "",
      sortOption: "",
      items: [
        {
          model: "Toyota Corolla",
          mileage: 120000,
          transmission: "Manuelle",
          year: 2010,
          price: 8000,
          publishedDate: "2025-01-01T10:00:00Z",
          location: "Antananarivo",
          image: "https://via.placeholder.com/300",
          fuelType: "Essence",
        },
        {
          model: "Ford Mustang",
          mileage: 50000,
          transmission: "Automatique",
          year: 2018,
          price: 25000,
          publishedDate: "2024-12-30T15:00:00Z",
          location: "Mahajanga",
          image: "https://via.placeholder.com/300",
          fuelType: "Essence",
        },
        {
          model: "Honda Civic",
          mileage: 90000,
          transmission: "Manuelle",
          year: 2015,
          price: 12000,
          publishedDate: "2024-12-29T08:00:00Z",
          location: "Fianarantsoa",
          image: "https://via.placeholder.com/300",
          fuelType: "Diesel",
        },
        {
          model: "Ford Mustang",
          mileage: 50000,
          transmission: "Automatique",
          year: 2018,
          price: 25000,
          publishedDate: "2024-12-30T15:00:00Z",
          location: "Mahajanga",
          image: "https://via.placeholder.com/300",
          fuelType: "Essence",
        },
      ],
    };
  },
  computed: {
    filteredItems() {
      return this.items.filter((item) =>
        item.model.toLowerCase().includes(this.searchQuery.toLowerCase())
      );
    },
    sortedAndFilteredItems() {
      const items = [...this.filteredItems];
      if (this.sortOption === "priceAsc") {
        return items.sort((a, b) => a.price - b.price);
      } else if (this.sortOption === "priceDesc") {
        return items.sort((a, b) => b.price - a.price);
      } else if (this.sortOption === "nameAsc") {
        return items.sort((a, b) => a.model.localeCompare(b.model));
      } else if (this.sortOption === "nameDesc") {
        return items.sort((a, b) => b.model.localeCompare(a.model));
      }
      return items;
    },
  },
};
</script>
