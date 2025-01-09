<template>
  <div
    class="max-w-sm cursor-pointer bg-white border border-gray-300 rounded-lg shadow-md transform transition-all duration-300 hover:shadow-lg hover:scale-[1.01] hover:-translate-x-2"
  >
  <router-link :to="{ name : 'Details', params :{ id : item.id}}">
    <!-- Image de la voiture -->
    <div class="relative">
      <img
        :src="'https://via.placeholder.com/300'"
        alt="Car Image"
        class="rounded-t-lg object-cover h-48 w-full"
      />
      <!-- Prix de la voiture -->
      <div class="absolute top-2 right-2 bg-green-700 text-white text-sm font-semibold px-4 py-1 rounded-md">
        {{ item.prix.toLocaleString() }} MGA
        <span v-if="item.is_negociable" class="text-green-500 ml-2">(Négociable)</span>
      </div>
    </div>

    <!-- Contenu de la carte -->
    <div class="p-4">
      <!-- Modèle -->
      <h5 class="text-xl font-bold text-gray-900">{{ item.modele.marque.label+' '+ item.modele.label }}</h5>

      <!-- Localisation -->
      <div class="flex items-center mb-4 text-sm">
        <i class="fas fa-map-marker-alt text-red-500 mr-2"></i>
        <span class="text-gray-700">Antananarivo</span>
      </div>

      <!-- Caractéristiques -->
      <div class="grid grid-cols-2 gap-3">
        <div class="flex items-center">
          <i class="fas fa-tachometer-alt text-green-500 mr-2"></i>
          <span class="text-gray-700">{{ item.kilometrage.toLocaleString() }} km</span>
        </div>
        <div class="flex items-center">
          <i
            class="fas"
            :class="item.transmission.label === 'Manuelle' ? 'fa-cogs text-blue-500 mr-2' : 'fa-car-side text-blue-500 mr-2'"
          ></i>
          <span class="text-gray-700">{{ item.transmission.label }}</span>
        </div>
        <div class="flex items-center">
          <i class="fas fa-calendar-alt text-orange-500 mr-2"></i>
          <span class="text-gray-700">{{ item.annee }}</span>
        </div>
        <div class="flex items-center">
          <i class="fas fa-gas-pump text-yellow-300 mr-2"></i>
          <span class="text-gray-700">{{ item.carburant.label }}</span>
        </div>
      </div>

      <!-- Publié -->
      <div class="mt-4 text-sm text-gray-500 opacity-75 flex items-center">
        <i class="fas fa-clock text-gray-400 mr-2"></i>
        Publié {{ timeSince(item.date_annonce) }}
      </div>
    </div>
  </router-link>
  </div>
</template>

<script>
export default {
  props: {
    item: {
      type: Object,
      required: true,
    },
  },
  methods: {
    /**
     * Calcul de la date relative
     * @param {Date} date
     * @returns {String}
     */
    timeSince(date) {
      const now = new Date();
      const seconds = Math.floor((now - new Date(date)) / 1000);

      const intervals = {
        year: 31536000,
        month: 2592000,
        week: 604800,
        day: 86400,
        hour: 3600,
        minute: 60,
      };

      for (const [unit, value] of Object.entries(intervals)) {
        const count = Math.floor(seconds / value);
        if (count >= 1) {
          return `${count} ${unit}${count > 1 ? "s" : ""}`;
        }
      }
      return "quelques secondes";
    },
  },
};
</script>


