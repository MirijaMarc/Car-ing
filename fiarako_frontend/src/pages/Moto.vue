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
            <select v-model="filters.marque_id" @change="handleSelectedMarque" class="w-full px-4 py-2 rounded-lg border border-gray-200">
              <!-- Options dynamiques depuis la table -->
              <option value="">Tous</option>
              <option v-for="marque in marques" :key="marque.id" :value="marque.id">
                {{ marque.label }}
              </option>
            </select>
          </div>

          <!-- Modèle -->
          <div class="space-y-3">
            <label class="text-gray-700">Modèle</label>
            <select v-model="filters.modele_id" class="w-full px-4 py-2 rounded-lg border border-gray-200">
              <!-- Options dynamiques depuis la table -->
              <option value="">Tous</option>
              <option value="" v-for="(item, index) in modeles" :key="index" :value="item.id">{{ item.label }}</option>
            </select>
          </div>



          <!-- Kilométrage -->
          <div class="space-y-3">
            <label class="text-gray-700">Kilométrage</label>
            <div class="flex gap-4">
              <input v-model="filters.kilometrage_min" type="number" placeholder="Min" class="w-full px-4 py-2 rounded-lg border border-gray-200">
              <input v-model="filters.kilometrage_max" type="number" placeholder="Max" class="w-full px-4 py-2 rounded-lg border border-gray-200">
            </div>
          </div>

          <!-- Prix -->
          <div class="space-y-3">
            <label class="text-gray-700">Prix</label>
            <div class="flex gap-4">
              <input v-model="filters.prix_min" type="number" placeholder="Min" class="w-full px-4 py-2 rounded-lg border border-gray-200">
              <input v-model="filters.prix_max" type="number" placeholder="Max" class="w-full px-4 py-2 rounded-lg border border-gray-200">
            </div>
          </div>

          <!-- Statut -->
          <div class="space-y-3">
            <label class="text-gray-700">Statut</label>

            <div class="flex justify-evenly">
                <div class="flex items-center me-4">
                    <input v-model="filters.statut" id="inline-radio" type="radio" value="10" name="statut" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="inline-radio" class="ms-2 text-sm font-medium text-gray-700 dark:text-gray-300">Neuf</label>
                </div>
                <div class="flex items-center me-4">
                    <input v-model="filters.statut" id="inline-2-radio" type="radio" value="1" name="statut" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="inline-2-radio" class="ms-2 text-sm font-medium text-gray-700 dark:text-gray-300">Occasion</label>
                </div>
            </div>

          </div>

          <!-- Volant -->
          <div class="space-y-3">
            <label class="text-gray-700">Volant</label>
            <div class="flex justify-evenly">
                <div class="flex items-center me-4">
                    <input v-model="filters.volant" id="inline-radio2" type="radio" value="0" name="volant" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="inline-radio2" class="ms-2 text-sm font-medium text-gray-700 dark:text-gray-300">Gauche</label>
                </div>
                <div class="flex items-center me-4">
                    <input v-model="filters.volant" id="inline-2-radio3" type="radio" value="1" name="volant" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="inline-2-radio3" class="ms-2 text-sm font-medium text-gray-700 dark:text-gray-300">Droite</label>
                </div>
            </div>
          </div>


          <!-- Année -->
          <div class="space-y-3">
            <label class="text-gray-700">Année</label>
            <div class="flex gap-4">
              <input v-model="filters.annee_min" type="number" placeholder="Min" class="w-full px-4 py-2 rounded-lg border border-gray-200">
              <input v-model="filters.annee_max" type="number" placeholder="Max" class="w-full px-4 py-2 rounded-lg border border-gray-200">
            </div>
          </div>

          <!-- Climatisation -->
          <div class="space-y-3">
            <label class="text-gray-700">Climatisation</label>
            <div class="flex justify-evenly">
                <div class="flex items-center me-4">
                    <input v-model="filters.climatisation" id="inline-radio4" type="radio" value="1" name="climatisation" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="inline-radio4" class="ms-2 text-sm font-medium text-gray-700 dark:text-gray-300">Oui</label>
                </div>
                <div class="flex items-center me-4">
                    <input v-model="filters.climatisation" id="inline-2-radio5" type="radio" value="0" name="climatisation" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="inline-2-radio5" class="ms-2 text-sm font-medium text-gray-700 dark:text-gray-300">Non</label>
                </div>
            </div>
          </div>

          <!-- Carrosserie -->
          <div class="space-y-3">
            <label class="text-gray-700">Carrosserie</label>
            <select v-model="filters.carrosserie_id" class="w-full px-4 py-2 rounded-lg border border-gray-200">
              <!-- Options dynamiques depuis la table -->
              <option value="">Tous</option>
              <option v-for="(carrosserie, index) in carrosseries" :key="index" :value="carrosserie.id">
                {{ carrosserie.label }}
              </option>
            </select>
          </div>



          <!-- Carburant -->
          <div class="space-y-3">
            <label class="text-gray-700">Carburant</label>

            <div class="flex justify-evenly">
                <div class="flex items-center me-4" v-for="(item, index) in carburants" :key="index">
                    <input v-model="filters.carburant_id" :id="'inline-radio'+ item.label" type="radio" name="carburant" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label :for="'inline-radio' + item.label" class="ms-2 text-sm font-medium text-gray-700 dark:text-gray-300">{{ item.label }}</label>
                </div>

            </div>
          </div>

          <!-- Boîte -->
          <div class="space-y-3">
            <label class="text-gray-700">Boîte de vitesses</label>
            <select v-model="filters.transmission_id" class="w-full px-4 py-2 rounded-lg border border-gray-200">
              <!-- Options dynamiques depuis la table -->
              <option value="">Tous</option>
              <option v-for="(item, index) in transmissions" :key="index" :value="item.id">{{ item.label }}</option>
            </select>
          </div>

          <!-- Couleur -->
          <div class="space-y-3">
            <label class="text-gray-700">Couleur</label>
            <select v-model="filters.couleur_id" class="w-full px-4 py-2 rounded-lg border border-gray-200">
              <!-- Options dynamiques depuis la table -->
              <option value="">Toutes</option>
              <option v-for="(item, index) in couleurs" :key="index" :value="item.id">{{ item.label }}</option>
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
      v-model="filters.keyword"
      type="text"
      placeholder="Rechercher une moto..."
      class="p-2 border border-gray-300 rounded w-1/3"
    />
    <select
      v-model="filters.sort_by"
      class="p-2 border border-gray-300 rounded w-1/4"
    >
      <option value="">Trier par</option>
      <option v-for="(item, index) in tris" :key="index" :value="item.code">{{ item.label }}</option>

    </select>
  </div>

  <!-- Nombre de véhicules -->
  <div v-if="loadingAnnonce" class="mb-4 text-lg font-semibold">
    <div class="bg-gray-300 h-4 w-32 mr-2 rounded shimmer"></div>
  </div>

  <div v-if="annonces" class="mb-4 text-lg font-semibold">
    {{ pagination.total }} motos disponibles
  </div>

  <!-- Liste des cartes -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
    <AnnonceSkeleton v-if="loadingAnnonce" v-for="(item, index) in numbers" :key="index"/>
    <AnnonceCard
      v-if="annonces"
      v-for="(item, index) in annonces"
      :key="index"
      :item="item"
      :isMoto="true"
    />
  </div>

<!-- Pagination -->
<nav v-if="annonces" class="flex items-center justify-between mt-6">
  <!-- Précédent -->
  <button
    :disabled="pagination.current_page === 1"
    @click="this.filters.page = pagination.current_page - 1"
    class="px-4 py-2 border rounded-md text-gray-700 bg-white hover:bg-gray-100 disabled:opacity-50 disabled:cursor-not-allowed"
  >
    Précédent
  </button>

  <!-- Numéro de page -->
  <span class="text-sm text-gray-600">
      Page <strong class="text-gray-900">{{ pagination.current_page }}</strong> sur
      <strong class="text-gray-900">{{ pagination.last_page }}</strong>
    </span>

    <!-- Suivant -->
    <button
      :disabled="pagination.current_page === pagination.last_page"
      @click="this.filters.page = pagination.current_page + 1"
      class="px-4 py-2 border rounded-md text-gray-700 bg-white hover:bg-gray-100 disabled:opacity-50 disabled:cursor-not-allowed"
    >
      Suivant
    </button>
  </nav>
</div>
</template>

<script>
import AnnonceCard from "@/components/AnnonceCard.vue";
import AnnonceSkeleton from "@/components/skeletons/AnnonceSkeleton.vue";
import axios from "axios";

export default {
components: {
  AnnonceCard,
  AnnonceSkeleton
},
data() {
  return {
    numbers: Array.from({ length: 5 }, (_, i) => i + 1),
    loadingAnnonce : false,
    pagination : null,
    sortOption: "",
    annonces: null,
    marques : [],
    carrosseries : [],
    transmissions : [],
    couleurs : [],
    carburants : [],
    modeles : [],
    tris: [],
    filters : {
      keyword: "",
      marque_id: "",
      modele_id : "",
      kilometrage_min : "",
      kilometrage_max: "",
      prix_min: "",
      prix_max: "",
      statut: "",
      volant: "",
      annee_min: "",
      annee_max: "",
      carrosserie_id: "",
      couleur_id: "",
      climatisation: "",
      carburant_id: "",
      transmission_id : "",
      sort_by: "dd",
      page: 1
    }

  };
},
computed: {

  // filteredItems() {
  //   return this.items.filter((item) =>
  //     item.model.toLowerCase().includes(this.searchQuery.toLowerCase())
  //   );
  // },
  // sortedAndFilteredItems() {
  //   const items = [...this.filteredItems];
  //   if (this.sortOption === "priceAsc") {
  //     return items.sort((a, b) => a.price - b.price);
  //   } else if (this.sortOption === "priceDesc") {
  //     return items.sort((a, b) => b.price - a.price);
  //   } else if (this.sortOption === "nameAsc") {
  //     return items.sort((a, b) => a.model.localeCompare(b.model));
  //   } else if (this.sortOption === "nameDesc") {
  //     return items.sort((a, b) => b.model.localeCompare(a.model));
  //   }
  //   return items;
  // },
},
created(){
  console.log("Mirija");
  this.fecthMarques();
  this.fetchCarrosseries();
  this.fetchTransmissions();
  this.fetchCouleurs();
  this.fetchCarburants();
  this.fetchTris();
  this.fetchAnnonces();

},
watch : {
  filters: {
    handler(newValue, oldValue){
      this.annonces = null
      this.fetchAnnonces();
    },
    deep: true
  }
},
methods : {

  handleSelectedMarque(){
    this.fetchModeleByMarque();
  },


  async fetchAnnonces(){
    this.loadingAnnonce = true;
    axios
    .get("http://localhost:8000/api/annonces_motos", {
      params :this.filters
    })
    .then((response) => {
      this.annonces =response.data.data
      console.log(response.data.data);
      this.pagination = {
        current_page: response.data.current_page,
        last_page: response.data.last_page,
        total: response.data.total,
      };
      this.loadingAnnonce = false;
    })
    .catch((error) =>{
      console.error(error)
      this.loadingAnnonce = false;
    })

  },

  async fetchTris(){
    axios
    .get("http://localhost:8000/api/tris")
    .then((response)=>{
      this.tris = response.data

    })
  },

  async fetchModeleByMarque(){
    axios
    .get("http://localhost:8000/api/modeles/marques/"+this.filters.marque_id)
    .then((response)=>{
      this.modeles = response.data.data

    })
  },

  async fetchCarburants(){
    axios
    .get("http://localhost:8000/api/carburants")
    .then((response) =>{
      this.carburants = response.data.data
    })
  },

  async fecthMarques(){
    axios
    .get("http://localhost:8000/api/marques")
    .then((response) =>{
      this.marques = response.data.data
    })
  },

  async fetchCarrosseries(){
    axios
    .get("http://localhost:8000/api/carrosseries_motos")
    .then((response) => {
      this.carrosseries = response.data.data
    })
  },

  async fetchTransmissions(){
    axios
    .get("http://localhost:8000/api/transmissions")
    .then((response) => {
      this.transmissions = response.data.data
    })
  },

  async fetchCouleurs(){
    axios
    .get("http://localhost:8000/api/couleurs")
    .then((response) => {
      this.couleurs = response.data.data
    })
  }
}

};
</script>

