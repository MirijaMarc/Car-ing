<template>
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
