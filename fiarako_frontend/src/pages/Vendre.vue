<template>
  <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Ajouter une nouvelle annonce</h2>
    <form @submit.prevent="submitForm">
      <!-- Section : Marque et Modèle -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <div>
          <label for="marque" class="block text-sm font-medium text-gray-700">Marque</label>
          <select
            id="marque"
            v-model="form.marqueId"
            @change="loadModeles"
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
            v-model="form.modeleId"
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
            v-model="form.carrosserieId"
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
          <input
            id="annee"
            v-model="form.annee"
            type="number"
            min="1900"
            max="2099"
            step="1"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            placeholder="Ex : 2020"
            required
          />
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
            v-model="form.isNegotiable"
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
            v-model="form.couleurId"
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

      <!-- Section : Carburant et Transmission -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <div>
          <label for="carburant" class="block text-sm font-medium text-gray-700">Carburant</label>
          <select
            id="carburant"
            v-model="form.carburantId"
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
            v-model="form.transmissionId"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            required
          >
            <option value="" disabled>Choisir une transmission</option>
            <option v-for="transmission in transmissions" :key="transmission.id" :value="transmission.id">
              {{ transmission.label }}
            </option>
          </select>
        </div>
      </div>

      <!-- Bouton de soumission -->
      <div class="text-right">
        <button
          type="submit"
          class="px-6 py-2 bg-blue-600 text-white font-bold rounded-md hover:bg-blue-700 focus:ring focus:ring-blue-300"
        >
          Ajouter l'annonce
        </button>
      </div>
    </form>
  </div>
</template>


<script>
export default {
  data() {
    return {
      form: {
        marqueId: "",
        modeleId: "",
        carrosserieId: "",
        annee: null,
        kilometrage: null,
        prix: null,
        isNegotiable: false,
        couleurId: "",
        climatisation: false,
        carburantId: "",
        transmissionId: "",
      },
      marques: [],
      modeles: [],
      carrosseries: [],
      carburants: [],
      transmissions: [],
      couleurs: [],
    };
  },
  methods: {
    async loadMarques() {
      // Charger les marques depuis l'API ou la base
      this.marques = await fetch("/api/marques").then((res) => res.json());
    },
    async loadModeles() {
      // Charger les modèles associés à une marque
      if (this.form.marqueId) {
        this.modeles = await fetch(`/api/modeles?marque_id=${this.form.marqueId}`).then((res) =>
          res.json()
        );
      }
    },
    async loadOthers() {
      // Charger les autres entités
      this.carrosseries = await fetch("/api/carrosseries").then((res) => res.json());
      this.carburants = await fetch("/api/carburants").then((res) => res.json());
      this.transmissions = await fetch("/api/transmissions").then((res) => res.json());
      this.couleurs = await fetch("/api/couleurs").then((res) => res.json());
    },
    async submitForm() {
      // Soumettre le formulaire
      console.log("Form data:", this.form);
      alert("Annonce ajoutée avec succès !");
    },
  },
  mounted() {
    this.loadMarques();
    this.loadOthers();
  },
};
</script>
