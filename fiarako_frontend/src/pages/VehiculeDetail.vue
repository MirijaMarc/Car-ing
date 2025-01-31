<template>

  <div v-if="loading">
    <AnnonceDetailsSkeleton />
  </div>
  <div v-if="annonce" class="max-w-7xl mx-auto bg-white rounded-lg shadow-md p-6">
  <button
    @click="goBack"
    class="px-4 py-2 mb-3 border rounded-md text-gray-700 bg-white hover:bg-gray-100 disabled:opacity-50 disabled:cursor-not-allowed"
  >
    <i class="fas fa-arrow-left"></i> Retour
  </button>
    <!-- Titre de l'annonce -->
    <h1 class="text-2xl font-bold text-gray-900 mb-4">{{ annonce.modele.marque.label+' '+annonce.modele.label + ' '+ annonce.annee }}</h1>
    <p class="text-sm text-gray-500 mb-4">Publié {{ timeSince(annonce.date_annonce) }}</p>

    <!-- Galerie d'images -->
    <div class="mb-6">
      <h2 class="text-lg font-bold text-gray-800 mb-2">Galerie d'images</h2>
      <div class="relative">
        <div class="flex overflow-x-auto space-x-3 pb-2">
          <img
            v-for="(image, index) in annonce.images"
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
      <div class="absolute top-2 right-2 bg-green-700 text-white text-sm font-semibold px-4 py-1 rounded-md">
        {{ annonce.prix.toLocaleString() }} MGA
        <span v-if="annonce.statut === 1" class="text-white ml-2">(Négociable)</span>
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
          Carburant: <strong>{{ annonce.carburant.label }}</strong>
        </span>
      </div>
      <div class="flex items-center bg-gray-100 p-3 rounded-lg">
        <i class="fas fa-cogs text-blue-500 mr-3"></i>
        <span class="text-gray-700">
          Boîte: <strong>{{ annonce.transmission.label }}</strong>
        </span>
      </div>
      <div class="flex items-center bg-gray-100 p-3 rounded-lg">
        <i class="fas fa-palette text-purple-500 mr-3"></i>
        <span class="text-gray-700">
          Couleur: <strong>{{ annonce.couleur.label }}</strong>
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
          État: <strong>{{ annonce.etat === 1 ? 'Occasion' : 'Neuf' }}</strong>
        </span>
      </div>
    </div>

    <!-- Description -->
    <div class="mt-6">
      <h2 class="text-lg font-bold text-gray-800 mb-2">Description</h2>
      <p class="text-gray-700 leading-relaxed">
        Cette {{ annonce.modele.marque.label+' '+annonce.modele.label }} est une voiture idéale pour les trajets en ville ou les longs voyages. Avec son moteur {{ annonce.moteur }},
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
          <p class="text-gray-700 font-semibold">{{ annonce.utilisateur.nom }}</p>
          <p class="text-gray-500 text-sm">Localisation : Antananarivo</p>
        </div>
      </div>
      <div class="mt-4">
        <p class="text-gray-700">
          <strong>Contact : </strong>{{ annonce.utilisateur.telephone }}
        </p>
        <p class="text-gray-500 text-sm">
          Appelez directement pour obtenir plus d'informations sur cette annonce.
        </p>
      </div>
    </div>
  </div>
</template>

<script>
import AnnonceDetailsSkeleton from '@/components/skeletons/AnnonceDetailsSkeleton.vue';
import axios from 'axios';


export default {
  components: {
    AnnonceDetailsSkeleton
  },
  data() {
    return {
      loading: false,
      annonce_id:"",
      annonce : null,
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
    async fetchAnnonceById(){
      this.loading = true;
      axios
      .get(`http://localhost:8000/api/annonces/${this.annonce_id}`)
      .then((response) =>{
        this.annonce = response.data;
        console.log(this.annonce);
        this.loading = false
      })
      .catch((error) =>{
        console.log(error);
        this.loading = false
      })
      .finally(() =>{
        this.loading = false
      })
    },
    goBack() {
      // Utilise l'historique du navigateur pour revenir à la page précédente
      this.$router ? this.$router.go(-1) : window.history.back();
    },
  },
  mounted(){
    this.annonce_id = this.$route.params.id;
    console.log(this.annonce_id);

    this.fetchAnnonceById()
  }
};
</script>
