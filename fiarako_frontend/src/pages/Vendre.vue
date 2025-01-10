<template>
  <div class="max-w-7xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <button
    @click="goBack"
      class="px-4 py-2 mb-3 border rounded-md text-gray-700 bg-white hover:bg-gray-100 disabled:opacity-50 disabled:cursor-not-allowed"
    >
      <i class="fas fa-arrow-left"></i> Retour
    </button>
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Ajouter une nouvelle annonce</h2>
    <form @submit.prevent="submitForm">
      <div class="mb-4">
          <label for="type" class="block text-sm font-medium text-gray-700">Type de véhicule</label>
          <select
            id="type"
            v-model="form.etat"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            required
          >
            <option value="" disabled>Choisir un type de véhicule</option>
            <option value="10">Voiture</option>
            <option value="20">Moto</option>



          </select>
      </div>



      <!-- Section : Marque et Modèle -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <div>
          <label for="marque" class="block text-sm font-medium text-gray-700">Marque</label>
          <select
            id="marque"
            v-model="form.marque_id"
            @change="handleSelectedMarque"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            required
          >
            <option value="" disabled>Choisir une marque</option>
            <option v-for="marque in marques" :key="marque.id" :value="marque.id">
              {{ marque.label }}
            </option>
          </select>
        </div>
        <div>
          <label for="modele" class="block text-sm font-medium text-gray-700">Modèle</label>
          <select
            id="modele"
            v-model="form.modele_id"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            required
          >
            <option value="" disabled>Choisir un modèle</option>
            <option v-for="modele in modeles" :key="modele.id" :value="modele.id">
              {{ modele.label }}
            </option>
          </select>
        </div>
      </div>

      <!-- Section : Carrosserie, Année, Kilométrage -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div>
          <label for="carrosserie" class="block text-sm font-medium text-gray-700">Carrosserie</label>
          <select
            id="carrosserie"
            v-model="form.carrosserie_id"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            required
          >
            <option value="" disabled>Choisir une carrosserie</option>
            <option v-for="carrosserie in carrosseries" :key="carrosserie.id" :value="carrosserie.id">
              {{ carrosserie.label }}
            </option>
          </select>
        </div>
        <div>
          <label for="annee" class="block text-sm font-medium text-gray-700">Année</label>
          <select
            id="annee"
            v-model="form.annee"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            required
          >
            <option value="" disabled>Choisir une année</option>
            <option v-for="item in years" :key="item" :value="item">
              {{ item }}
            </option>
          </select>
        </div>
        <div>
          <label for="kilometrage" class="block text-sm font-medium text-gray-700">Kilométrage</label>
          <input
            id="kilometrage"
            v-model="form.kilometrage"
            type="number"
            min="0"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            placeholder="Ex : 50000"
            required
          />
        </div>
      </div>

      <!-- Section : Prix et négociation -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <div>
          <label for="prix" class="block text-sm font-medium text-gray-700">Prix (en Ariary)</label>
          <input
            id="prix"
            v-model="form.prix"
            type="number"
            min="0"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            placeholder="Ex : 20 000 000"
            required
          />
        </div>
        <div class="flex items-center space-x-4">
          <label class="text-sm font-medium text-gray-700">Négociable</label>
          <input
            id="negotiable"
            v-model="form.is_negotiable"
            type="checkbox"
            class="h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
          />
        </div>
      </div>

      <!-- Section : Couleur et Climatisation -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <div>
          <label for="couleur" class="block text-sm font-medium text-gray-700">Couleur</label>
          <select
            id="couleur"
            v-model="form.couleur_id"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            required
          >
            <option value="" disabled>Choisir une couleur</option>
            <option v-for="couleur in couleurs" :key="couleur.id" :value="couleur.id">
              {{ couleur.label }}
            </option>
          </select>
        </div>
        <div class="flex items-center space-x-4">
          <label class="text-sm font-medium text-gray-700">Climatisation</label>
          <input
            id="climatisation"
            v-model="form.climatisation"
            type="checkbox"
            class="h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
          />
        </div>
      </div>

      <!-- Section : Carburant et Transmission et Moteur -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div>
          <label for="carburant" class="block text-sm font-medium text-gray-700">Carburant</label>
          <select
            id="carburant"
            v-model="form.carburant_id"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            required
          >
            <option value="" disabled>Choisir un carburant</option>
            <option v-for="carburant in carburants" :key="carburant.id" :value="carburant.id">
              {{ carburant.label }}
            </option>
          </select>
        </div>
        <div>
          <label for="transmission" class="block text-sm font-medium text-gray-700">Transmission</label>
          <select
            id="transmission"
            v-model="form.transmission_id"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            required
          >
            <option value="" disabled>Choisir une transmission</option>
            <option v-for="transmission in transmissions" :key="transmission.id" :value="transmission.id">
              {{ transmission.label }}
            </option>
          </select>
        </div>
        <div>
          <label for="moteur" class="block text-sm font-medium text-gray-700">Moteur</label>
          <input
            id="moteur"
            v-model="form.moteur"
            type="text"
            min="0"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            placeholder="Ex : 1.8L"
            required
          />
        </div>
      </div>

            <!-- Section : Statut et Volant -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <div>
          <label for="statut" class="block text-sm font-medium text-gray-700">Statut</label>
          <select
            id="statu"
            v-model="form.statut"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            required
          >
            <option value="" disabled>Choisir un Statut</option>
            <option value="10">Neuf</option>
            <option value="1">Occasion</option>
          </select>
        </div>
        <div>
          <label for="volant" class="block text-sm font-medium text-gray-700">Volant</label>
          <select
            id="volant"
            v-model="form.volant"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            required
          >
            <option value="" disabled>Choisir un volant</option>
            <option value="0">Gauche</option>
            <option value="1">Droite</option>
          </select>
        </div>
      </div>



      <!-- Section : Description -->
      <div class="mb-6">
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea
          id="description"
          v-model="form.description"
          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
          placeholder="Décrivez votre annonce..."
          rows="4"
          required
        ></textarea>
      </div>

      <div class="mb-6">
        <label for="images" class="block text-sm font-medium text-gray-700">Images</label>
        <input
          id="images"
          type="file"
          ref="fileInput"
          multiple
          accept="image/*"
          @change="handleImageUpload"
          class="mt-1 block w-full text-sm text-gray-500
                 file:mr-4 file:py-2 file:px-4
                 file:rounded-md file:border-0
                 file:text-sm file:font-semibold
                 file:bg-blue-50 file:text-blue-700
                 hover:file:bg-blue-100"
        />
        <div class="mt-4 grid grid-cols-2 md:grid-cols-4 gap-4">
          <div v-for="(image, index) in previewImages" :key="index" class="relative">
            <img
              :src="image"
              alt="Prévisualisation de l'image"
              class="w-full h-32 object-cover rounded-md shadow-md"
            />
            <button
              type="button"
              class="absolute top-2 right-2 bg-red-600 text-white text-xs px-2 py-1 rounded"
              @click="removeImage(index)"
            >
              X
            </button>
          </div>
        </div>
      </div>

      <!-- Bouton de soumission -->
      <div class="text-right">
        <button
          type="submit"
          class="px-6 py-2 bg-green-600 text-white font-bold rounded-md hover:bg-green-700 focus:ring focus:ring-green-300"
        >
          Ajouter l'annonce
        </button>
      </div>
    </form>
  </div>
</template>


<script>
import axios from 'axios';

export default {
  data() {
    return {
      years : this.generateYears(1990,2025),
      form: {
        modeleId: "",
        carrosserie_id: "",
        annee: null,
        kilometrage: null,
        prix: null,
        is_negotiable: false,
        couleur_id: "",
        climatisation: false,
        carburant_id: "",
        transmission_id: "",
        utilisateur_id: "1",
        moteur: "",
        statut: "",
        volant: "",
        etat: "10"
      },
      marques: [],
      modeles: [],
      carrosseries: [],
      carburants: [],
      transmissions: [],
      couleurs: [],
      images: [], // Tableau pour stocker les fichiers image
      previewImages: [], // Tableau pour stocker les URLs des images à prévisualiser
    };
  },
  methods: {


    generateYears(start, end) {
      const years = [];
      for (let year = start; year <= end; year++) {
        years.push(year);
      }
      return years;
    },


    handleSelectedMarque(){
      this.fetchModeleByMarque();
    },

    handleImageUpload(event) {
    const files = Array.from(event.target.files);

    // Ajouter les nouveaux fichiers à la liste existante
    files.forEach((file) => {
      this.images.push(file);
      const reader = new FileReader();
      reader.onload = (e) => {
        this.previewImages.push(e.target.result);
      };
      reader.readAsDataURL(file);
    });

    // Recrée la liste de fichiers combinée (anciens + nouveaux)
    const dataTransfer = new DataTransfer();
    this.images.forEach((file) => {
      dataTransfer.items.add(file);
    });

    // Réinitialise le champ input avec la liste combinée
    this.$refs.fileInput.files = dataTransfer.files;
  },

  removeImage(index) {
    // Supprime l'image des listes
    this.images.splice(index, 1);
    this.previewImages.splice(index, 1);

    // Recrée une liste de fichiers après suppression
    const dataTransfer = new DataTransfer();
    this.images.forEach((file) => {
      dataTransfer.items.add(file);
    });

    // Réinitialise le champ input avec la nouvelle liste
    this.$refs.fileInput.files = dataTransfer.files;
  },
  async submitForm() {
    console.log("Form data:", this.form);
    console.log("Uploaded images:", this.images);
    alert("Annonce ajoutée avec succès !");
  },
  goBack() {
    // Utilise l'historique du navigateur pour revenir à la page précédente
    this.$router ? this.$router.go(-1) : window.history.back();
  },

  async fetchModeleByMarque(){
      axios
      .get("http://localhost:8000/api/modeles/marques/"+this.form.marque_id)
      .then((response)=>{
        this.modeles = response.data.data
        console.log(this.modeles);


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
      let url = "http://localhost:8000/api/carrosseries"
      if (this.form.etat == 20){
        url = "http://localhost:8000/api/carrosseries_motos"
      }
      axios
      .get(url)
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
  },
  mounted() {
    this.fecthMarques();
    this.fetchCarrosseries();
    this.fetchTransmissions();
    this.fetchCouleurs();
    this.fetchCarburants();

  },
  watch: {
    'form.etat'(newValue, oldValue){
      this.fetchCarrosseries()

    }
  }
};
</script>
