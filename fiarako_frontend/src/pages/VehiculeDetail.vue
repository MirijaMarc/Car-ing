<template>
  <div class="max-w-7xl mx-auto bg-white rounded-lg shadow-md p-6">
    <!-- Titre de l'annonce -->
    <h1 class="text-2xl font-bold text-gray-900 mb-4">{{ modele.nom }}</h1>
    <p class="text-sm text-gray-500 mb-4">Publié {{ timeSince(annonce.date_annonce) }}</p>

    <!-- Galerie d'images -->
    <div class="mb-6">
      <h2 class="text-lg font-bold text-gray-800 mb-2">Galerie d'images</h2>
      <div class="relative">
        <div class="flex overflow-x-auto space-x-3 pb-2">
          <img
            v-for="(image, index) in images"
            :key="index"
            :src="image.label"
            alt="Car Image"
            class="w-32 h-24 object-cover rounded-lg cursor-pointer"
            @click="setMainImage(image.label)"
          />
        </div>
        <p class="text-sm text-gray-500 mt-2">Cliquez sur une image pour la voir en grand.</p>
      </div>
    </div>

    <!-- Image principale -->
    <div class="relative mb-4">
      <img
        :src="mainImage"
        alt="Car Image"
        class="w-full h-72 object-cover rounded-lg"
      />
      <div class="absolute top-2 right-2 bg-blue-700 text-white text-sm font-semibold px-4 py-1 rounded-md">
        {{ annonce.prix.toLocaleString() }} MGA
        <span v-if="annonce.statut === 1" class="text-green-500 ml-2">(Négociable)</span>
      </div>
    </div>

    <!-- Caractéristiques -->
    <div class="grid grid-cols-2 gap-4 mb-6">
      <div class="flex items-center bg-gray-100 p-3 rounded-lg">
        <i class="fas fa-calendar-alt text-orange-500 mr-3"></i>
        <span class="text-gray-700">
          Année: <strong>{{ annonce.annee }}</strong>
        </span>
      </div>
      <div class="flex items-center bg-gray-100 p-3 rounded-lg">
        <i class="fas fa-tachometer-alt text-green-500 mr-3"></i>
        <span class="text-gray-700">
          Kilométrage: <strong>{{ annonce.kilometrage.toLocaleString() }} km</strong>
        </span>
      </div>
      <div class="flex items-center bg-gray-100 p-3 rounded-lg">
        <i class="fas fa-gas-pump text-blue-500 mr-3"></i>
        <span class="text-gray-700">
          Carburant: <strong>{{ carburant.nom }}</strong>
        </span>
      </div>
      <div class="flex items-center bg-gray-100 p-3 rounded-lg">
        <i class="fas fa-cogs text-blue-500 mr-3"></i>
        <span class="text-gray-700">
          Boîte: <strong>{{ boite.nom }}</strong>
        </span>
      </div>
      <div class="flex items-center bg-gray-100 p-3 rounded-lg">
        <i class="fas fa-palette text-purple-500 mr-3"></i>
        <span class="text-gray-700">
          Couleur: <strong>{{ couleur.nom }}</strong>
        </span>
      </div>
      <div class="flex items-center bg-gray-100 p-3 rounded-lg">
        <i class="fas fa-snowflake text-cyan-500 mr-3"></i>
        <span class="text-gray-700">
          Climatisation: <strong>{{ annonce.climatisation === 1 ? 'Oui' : 'Non' }}</strong>
        </span>
      </div>
      <div class="flex items-center bg-gray-100 p-3 rounded-lg">
        <i class="fas fa-car text-gray-500 mr-3"></i>
        <span class="text-gray-700">
          Volant: <strong>{{ annonce.volant === 1 ? 'À gauche' : 'À droite' }}</strong>
        </span>
      </div>
      <div class="flex items-center bg-gray-100 p-3 rounded-lg">
        <i class="fas fa-tools text-gray-500 mr-3"></i>
        <span class="text-gray-700">
          État: <strong>{{ annonce.etat === 1 ? 'Neuf' : 'Occasion' }}</strong>
        </span>
      </div>
    </div>

    <!-- Description -->
    <div class="mt-6">
      <h2 class="text-lg font-bold text-gray-800 mb-2">Description</h2>
      <p class="text-gray-700 leading-relaxed">
        Cette {{ modele.nom }} est une voiture idéale pour les trajets en ville ou les longs voyages. Avec son moteur {{ annonce.moteur }},
        elle offre à la fois performance et efficacité. Son intérieur moderne est équipé de nombreuses options de confort,
        y compris la climatisation et des sièges ergonomiques. Elle a été soigneusement entretenue avec un historique complet
        des révisions. Parfaitement adaptée à Madagascar, cette voiture combine robustesse et élégance.
      </p>
    </div>

    <!-- Profil du vendeur -->
    <div class="mt-8 bg-gray-50 p-6 rounded-lg shadow-sm">
      <h2 class="text-lg font-bold text-gray-800 mb-2">À propos du vendeur</h2>
      <div class="flex items-center">
        <img
          src="https://via.placeholder.com/50"
          alt="Seller Profile"
          class="w-12 h-12 rounded-full mr-4"
        />
        <div>
          <p class="text-gray-700 font-semibold">{{ utilisateur.nom }}</p>
          <p class="text-gray-500 text-sm">Localisation : {{ utilisateur.localisation }}</p>
        </div>
      </div>
      <div class="mt-4">
        <p class="text-gray-700">
          <strong>Contact : </strong>{{ utilisateur.telephone }}
        </p>
        <p class="text-gray-500 text-sm">
          Appelez directement pour obtenir plus d'informations sur cette annonce.
        </p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      annonce: {
        id: 1,
        annee: 2020,
        kilometrage: 45000,
        prix: 35000000,
        statut: 1,
        volant: 1,
        climatisation: 1,
        moteur: "V8",
        date_annonce: "2025-01-01",
        etat: 1,
      },
      modele: {
        id: 1,
        nom: "Toyota Corolla",
      },
      carburant: {
        id: 1,
        nom: "Essence",
      },
      boite: {
        id: 1,
        nom: "Manuelle",
      },
      couleur: {
        id: 1,
        nom: "Bleu Métallisé",
      },
      utilisateur: {
        id: 1,
        nom: "Rasolo John",
        localisation: "Antananarivo, Madagascar",
        telephone: "+261 34 12 34 56",
      },
      images: [
        { id: 1, label: "https://via.placeholder.com/600x400" },
        { id: 2, label: "https://via.placeholder.com/600x400?text=Image+2" },
        { id: 3, label: "https://via.placeholder.com/600x400?text=Image+3" },
        { id: 4, label: "https://via.placeholder.com/600x400?text=Image+4" },
        { id: 5, label: "https://via.placeholder.com/600x400?text=Image+5" },
        { id: 6, label: "https://via.placeholder.com/600x400?text=Image+5" },
        { id: 7, label: "https://via.placeholder.com/600x400?text=Image+5" },
        { id: 8, label: "https://via.placeholder.com/600x400?text=Image+5" },
      ],
      mainImage: "https://via.placeholder.com/600x400",
    };
  },
  methods: {
    setMainImage(image) {
      this.mainImage = image;
    },
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
        if (count >= 1) return `${count} ${unit}${count > 1 ? "s" : ""}`;
      }
      return "quelques secondes";
    },
  },
};
</script>
