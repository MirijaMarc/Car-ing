<template>
  <div class="min-h-screen bg-gray-100 flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg overflow-hidden w-full max-w-4xl">
      <!-- Header Section -->
      <div class="bg-gradient-to-r from-green-500 to-green-700 h-32"></div>
      <div class="relative -mt-16 flex flex-col items-center">
        <img
          :src="user.image || 'https://via.placeholder.com/150'"
          alt="Profile Picture"
          class="w-32 h-32 rounded-full border-4 border-white shadow-md"
        />
        <h1 class="mt-4 text-xl font-semibold text-gray-800">{{ user.nom }}</h1>
        <p class="text-gray-500">{{ user.email }}</p>
        <p class="text-gray-500">{{ user.telephone }}</p>

        <div v-if="user.etat === 1" class="mt-2 text-green-500 font-semibold">Status: Active</div>
        <div v-else class="mt-2 text-red-500 font-semibold">Status: Inactive</div>

        <button
          class="mt-4 px-6 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700"
          @click="toggleEdit"
        >
          {{ isEditing ? 'Save Changes' : 'Edit Profile' }}
        </button>
      </div>

      <!-- Contact & Information Section -->
      <div class="p-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Contact Information</h2>
        <div class="space-y-4">
          <div>
            <label for="name" class="block text-gray-700">Name</label>
            <input
              id="name"
              type="text"
              v-model="user.nom"
              :readonly="!isEditing"
              class="w-full px-4 py-2 bg-gray-100 text-gray-700 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
          </div>
          <div>
            <label for="email" class="block text-gray-700">Email</label>
            <input
              id="email"
              type="email"
              v-model="user.email"
              :readonly="!isEditing"
              class="w-full px-4 py-2 bg-gray-100 text-gray-700 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
          </div>
          <div>
            <label for="telephone" class="block text-gray-700">Phone Number</label>
            <input
              id="telephone"
              type="text"
              v-model="user.telephone"
              :readonly="!isEditing"
              class="w-full px-4 py-2 bg-gray-100 text-gray-700 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
          </div>
        </div>
      </div>

      <!-- Profile Edit Button -->
      <div class="p-6 bg-gray-50 text-center">
        <button
          class="px-6 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700"
          @click="saveProfile"
          v-if="isEditing"
        >
          Save Profile
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      user: {
        id: 1,
        nom: 'John Doe',
        email: 'john.doe@example.com',
        telephone: '+1234567890',
        etat: 1, // 1 = actif, 0 = inactif
        image: 'https://via.placeholder.com/150' // Image de profil
      },
      isEditing: false, // L'état pour savoir si l'utilisateur est en mode édition
    };
  },
  methods: {
    toggleEdit() {
      this.isEditing = !this.isEditing;
    },
    saveProfile() {
      // Logique pour enregistrer les modifications du profil (envoi à l'API par exemple)
      console.log('Profile saved:', this.user);
      // Après l'enregistrement, on passe en mode non-édition
      this.isEditing = false;
    }
  }
};
</script>

<style scoped>
/* Styles supplémentaires pour personnaliser la page si nécessaire */
</style>
