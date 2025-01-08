<template>
  <div class="min-h-screen flex flex-col bg-gradient-to-b from-blue-50 to-blue-100">
    <!-- Header -->
    <header class="bg-white shadow-md sticky top-0 z-50">
      <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <div class="text-sm text-red-400">
          <a href="mailto:mirijarazafimbelo30@gmail.com" class="hover:underline">
            <i class="fas fa-envelope text-orange-500"></i>
            mirijarazafimbelo30@gmail.com
          </a>
        </div>
        <div class="flex space-x-6">
          <a href="https://linkedin.com/in/your-profile" target="_blank" class="text-gray-500 hover:text-blue-500 transition duration-200">
            <i class="fab fa-linkedin text-xl"></i>
          </a>
          <a href="https://github.com/your-profile" target="_blank" class="text-gray-500 hover:text-gray-800 transition duration-200">
            <i class="fab fa-github text-xl"></i>
          </a>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1 container mx-auto px-6 py-16 flex flex-col md:flex-row items-center space-y-12 md:space-y-0">
      <!-- Left Content -->
      <div class="md:w-1/2 text-center md:text-left space-y-6">
        <h1 class="text-5xl font-extrabold text-gray-800 leading-snug">
          Trouvez votre véhicule idéal
        </h1>
        <p class="text-lg text-gray-600">
          Des voitures élégantes et des motos performantes, toutes au même endroit.
        </p>
        <p class="text-xl text-blue-500 font-medium">
          "Conduisez avec style, explorez avec passion."
        </p>
        <div class="mt-8 flex justify-center md:justify-start space-x-4">
          <router-link to="/voiture" class="px-6 py-3 bg-blue-500 text-white text-lg rounded-full shadow-lg hover:bg-blue-600 focus:outline-none">
            <i class="fas fa-car text-xl"></i>
            Voir les Voitures
          </router-link>
          <router-link to="/moto" class="px-6 py-3 bg-green-500 text-white text-lg rounded-full shadow-lg hover:bg-green-600 focus:outline-none">
            <i class="fas fa-motorcycle text-xl"></i>
            Voir les Motos
          </router-link>
        </div>
      </div>
      <!-- Right Content -->
      <div class="md:w-1/2 flex justify-center">
        <div class="relative w-full max-w-md">
          <div class="absolute -top-8 -left-8 bg-gradient-to-r from-blue-400 to-green-300 rounded-full h-32 w-32 blur-lg"></div>
          <img src="@/assets/images/Vehicle Sale-pana.svg" alt="Car" class="w-full z-10 relative">
          <div class="absolute -bottom-8 -right-8 bg-gradient-to-r from-green-300 to-blue-400 rounded-full h-32 w-32 blur-lg"></div>
        </div>
      </div>
    </main>

        <!-- Services Section -->
        <section class="bg-white py-16">
      <div class="container mx-auto px-6 text-center space-y-12">
        <h2 class="text-4xl font-extrabold text-gray-800">Nos Services</h2>
        <p class="text-gray-600 text-lg">
          Nous offrons des solutions pour vous aider à trouver, acheter et profiter de votre véhicule préféré.
        </p>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
          <!-- Service 1 -->
          <div class="bg-blue-50 rounded-lg shadow-lg p-6 hover:shadow-xl transition duration-300">
            <i class="fas fa-car text-4xl text-blue-500 mb-4"></i>
            <h3 class="text-2xl font-bold text-gray-800">Vente de Voitures</h3>
            <p class="text-gray-600 mt-2">
              Découvrez notre large sélection de voitures pour tous les budgets et préférences.
            </p>
          </div>
          <!-- Service 2 -->
          <div class="bg-blue-50 rounded-lg shadow-lg p-6 hover:shadow-xl transition duration-300">
            <i class="fas fa-motorcycle text-4xl text-green-500 mb-4"></i>
            <h3 class="text-2xl font-bold text-gray-800">Vente de Motos</h3>
            <p class="text-gray-600 mt-2">
              Des motos pour les amateurs de vitesse, de confort et d'aventure.
            </p>
          </div>

        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 py-8">
      <div class="container mx-auto px-6 text-center space-y-3">
        <p>Contactez-nous en cas de problème</p>
        <a href="mailto:mirijarazafimbelo30@gmail.com" class="text-blue-400 hover:underline">
          mirijarazafimbelo30@gmail.com
        </a>
        <div class="text-sm text-gray-500 mt-4">
          © {{ new Date().getFullYear() }} RAZAFIMBELO Mirija Marc. Tous droits réservés.
        </div>
      </div>
    </footer>
  </div>
</template>

<script>
export default {
  name: "HomePage",
};
</script>

<style>
/* Ajout d'un style personnalisé si nécessaire */
</style>
