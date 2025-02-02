
<script src="https://cdn.tailwindcss.com"></script>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Meta Tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="CameraZone - Buy high-quality cameras, drones, and accessories at unbeatable prices.">
  <meta name="keywords" content="cameras, drones, photography, accessories, CameraZone">
  <meta name="author" content="CameraZone">
  <title>CameraZone - Best Camera Store</title>
  <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {},
      },
    };
  </script>
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">
  <!-- Navbar -->
  <header class="bg-red-600 text-white py-4 fixed top-0 w-full z-50 shadow-md">
    <div class="container mx-auto flex justify-between items-center px-4">
      <!-- Logo -->
      <div class="text-2xl font-bold">CameraZone</div>

      <!-- Desktop Navigation -->
      <nav class="hidden lg:flex space-x-6">
        <a href="" class="hover:text-gray-200">Products</a>
        <a href="{{ route('login') }}" class="hover:text-gray-200">Login</a>
        <a href="#" class="hover:text-gray-200">My Cart</a>
        <a href="#" class="hover:text-gray-200">0771234567</a>
      </nav>

      <!-- Hamburger Menu (Mobile & Tablet) -->
      <div class="lg:hidden">
        <button id="menu-toggle" aria-controls="mobile-menu" aria-expanded="false" class="focus:outline-none">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
          </svg>
        </button>
      </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden flex-col bg-red-700 text-white py-4 px-6 lg:hidden">
      <a href="" class="opacity-0 transform translate-y-[-10px] transition-all duration-300 delay-100 hover:text-gray-200">Products</a>
      <a href="{{ route('login') }}" class="opacity-0 transform translate-y-[-10px] transition-all duration-300 delay-200 hover:text-gray-200">Login</a>
      <a href="#" class="opacity-0 transform translate-y-[-10px] transition-all duration-300 delay-300 hover:text-gray-200">My Cart</a>
      <a href="tel:0771234567" class="opacity-0 transform translate-y-[-10px] transition-all duration-300 delay-400 hover:text-gray-200">0771234567</a>
    </div>
  </header>

  <!-- Page Content -->
  <main class="flex-grow mt-20">
    <!-- Cover Image Section -->
    <section class="bg-gray-900">
      <div class="w-full h-[250px] sm:h-[350px] md:h-[450px] lg:h-[550px] xl:h-[650px] overflow-hidden">
        <img src="{{ asset('images/cover.jpg') }}" alt="Cover Image" class="w-full h-full object-cover" loading="lazy">
      </div>
    </section>

    <!-- Features Section -->
    <section class="my-8 px-4 mt-10">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-7xl mx-auto">

        <div class="bg-gray-200 p-6 rounded-lg text-center shadow-lg">
          <img src="{{ asset('images/canonR5.webp') }}" alt="Camera" class="mx-auto w-full h-56 sm:h-64 object-cover rounded-md" loading="lazy">
          <p class="mt-4 font-semibold text-lg">High-Quality Cameras</p>
          <p class="text-gray-700 mt-2">Shop high-quality cameras from top brands at the best prices.</p>
        </div>

        <!-- Feature 2: Drones -->
          <div class="bg-gray-200 p-6 rounded-lg text-center shadow-lg">
            <img src="{{ asset('images/djidrone.png') }}" alt="Drone" 
                class="mx-auto w-full h-52 sm:h-60 object-cover rounded-md" loading="lazy">
            <p class="mt-4 font-semibold text-lg">Explore Stunning Aerial Views</p>
            <p class="text-gray-700 mt-2">Discover high-tech drones for professional and hobbyist use.</p>
          </div>

          <!-- Feature 3: Accessories -->
          <div class="bg-gray-200 p-6 rounded-lg text-center shadow-lg">
            <img src="{{ asset('images/tripodC.png') }}" alt="Tripod" 
                class="mx-auto w-full h-56 sm:h-64 object-cover rounded-md" loading="lazy">
            <p class="mt-4 font-semibold text-lg">Premium Accessories</p>
            <p class="text-gray-700 mt-2">Lenses, tripods, bags, and more to enhance your photography.</p>
          </div>

      </div>
    </section>

    <!-- Products Section -->
    <section class="my-8 text-center px-4 mt-10">

      <h2 class="text-3xl font-bold mb-6">Our Products</h2>
      
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 max-w-7xl mx-auto">
        <div class="bg-gray-200 p-6 rounded-lg text-center shadow-lg">
          <img src="{{ asset('images/gopro13.png') }}" alt="GoPro" class="mx-auto w-full h-56 object-contain" loading="lazy">
          <p class="mt-4 font-bold text-lg">GoPro HERO13 Black</p>
          <p class="text-gray-700">145 500 LKR</p>
        </div>

         <!-- Product 2: Sony 85mm Lens -->
          <div class="bg-gray-200 p-6 rounded-lg text-center shadow-lg">
            <img src="{{ asset('images/sony85.webp') }}" alt="Sony Lens" 
                class="mx-auto w-full h-56 object-contain" loading="lazy">
            <p class="mt-4 font-bold text-lg">Sony FE 85mm f/1.4 Lens</p>
            <p class="text-gray-700">449,500 LKR</p>
          </div>

          <!-- Product 3: DJI Osmo Mobile 6 -->
          <div class="bg-gray-200 p-6 rounded-lg text-center shadow-lg">
            <img src="{{ asset('images/djiosmo.png') }}" alt="DJI Osmo Mobile 6" 
                class="mx-auto w-full h-56 object-contain" loading="lazy">
            <p class="mt-4 font-bold text-lg">DJI Osmo Mobile 6</p>
            <p class="text-gray-700">48,000 LKR</p>
          </div>

          <!-- Product 4: Sony Alpha A7 III -->
          <div class="bg-gray-200 p-6 rounded-lg text-center shadow-lg">
            <img src="{{ asset('images/sonya7ii.webp') }}" alt="Sony Alpha A7 III" 
                class="mx-auto w-full h-56 object-contain" loading="lazy">
            <p class="mt-4 font-bold text-lg">Sony Alpha A7 III (Body Only)</p>
            <p class="text-gray-700">399,000 LKR</p>
          </div>

      </div>
    </section>


        <!-- Brands Section -->
          <section class="my-8 text-center px-4 mt-10">
            <h2 class="text-lg sm:text-xl md:text-2xl lg:text-3xl xl:text-4xl font-bold mb-6">
              Our Brands
            </h2>

            <div class="bg-gray-200 p-6 rounded-lg flex flex-wrap justify-center items-center gap-6 max-w-4xl mx-auto">

              <img src="{{ asset('images/canon.png') }}" alt="Canon" class="w-24 h-24 sm:w-20 sm:h-20 object-contain" loading="lazy">
              <img src="{{ asset('images/nikon.png') }}" alt="Nikon" class="w-24 h-24 sm:w-20 sm:h-20 object-contain" loading="lazy">
              <img src="{{ asset('images/sony.png') }}" alt="Sony" class="w-24 h-24 sm:w-20 sm:h-20 object-contain" loading="lazy">
              <img src="{{ asset('images/goprologo.png') }}" alt="GoPro" class="w-24 h-24 sm:w-20 sm:h-20 object-contain" loading="lazy">
              <img src="{{ asset('images/dji.png') }}" alt="DJI" class="w-24 h-24 sm:w-20 sm:h-20 object-contain" loading="lazy">
              <img src="{{ asset('images/insta.png') }}" alt="Insta360" class="w-24 h-24 sm:w-20 sm:h-20 object-contain" loading="lazy">

            </div>
          </section>

  </main>

          <!-- Footer -->
        <footer class="bg-gray-900 text-white p-6 w-full">
          <div class="container mx-auto grid gap-6 text-center md:text-left md:grid-cols-3">

            <!-- Quick Links -->
            <div>
              <h4 class="text-lg font-bold mb-2">Quick Links</h4>
              <ul class="space-y-1">
                <li><a href="#" class="hover:text-gray-400 transition">Home</a></li>
                <li><a href="#" class="hover:text-gray-400 transition">Products</a></li>
                <li><a href="#" class="hover:text-gray-400 transition">About Us</a></li>
                <li><a href="#" class="hover:text-gray-400 transition">Contact</a></li>
              </ul>
            </div>

            <!-- Store Hours -->
            <div>
              <h4 class="text-lg font-bold mb-2">Store Opening Hours</h4>
              <p>Monday - Saturday: <span class="font-semibold">9.00 AM - 7.00 PM</span></p>
              <p>Sunday: <span class="font-semibold">9.00 AM - 3.00 PM</span></p>
              <p class="text-red-400 font-semibold">Closed on Poya Days</p>
            </div>

            <!-- Contact Details -->
            <div>
              <h4 class="text-lg font-bold mb-2">Contact Us</h4>
              <p>No 40, 5th Floor,</p>
              <p>Majestic City, Colombo 04,</p>
              <p>Western Province, Sri Lanka</p>
              <p class="mt-2 font-semibold">Phone:</p>
              <p><a href="tel:0771234567" class="hover:text-gray-400 transition">077 123 4567</a></p>
              <p class="mt-2 font-semibold">Email:</p>
              <p><a href="mailto:camerazone@gmail.com" class="hover:text-gray-400 transition">camerazone@gmail.com</a></p>
            </div>

          </div>

          <!-- Social Media Icons -->
          <div class="flex justify-center space-x-4 mt-6">
            <a href="#" aria-label="Facebook" class="hover:text-blue-500 transition">
              <svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M22,12A10,10,0,1,0,12,22V14H9v-2h3V9.5A3.5,3.5,0,0,1,15.5,6h2V8h-2a1.5,1.5,0,0,0-1.5,1.5V12h3l-.5,2H14v8A10,10,0,0,0,22,12Z"/>
              </svg>
            </a>
            <a href="#" aria-label="Instagram" class="hover:text-pink-500 transition">
              <svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M7 2C4.24 2 2 4.24 2 7v10c0 2.76 2.24 5 5 5h10c2.76 0 5-2.24 5-5V7c0-2.76-2.24-5-5-5H7zm10 18H7c-1.65 0-3-1.35-3-3V7c0-1.65 1.35-3 3-3h10c1.65 0 3 1.35 3 3v10c0 1.65-1.35 3-3 3zm-5-12a5 5 0 100 10 5 5 0 000-10zm0 8a3 3 0 110-6 3 3 0 010 6zm5.5-8.5A1.5 1.5 0 1116 6a1.5 1.5 0 011.5 1.5z"/>
              </svg>
            </a>
            <a href="#" aria-label="Twitter" class="hover:text-blue-400 transition">
              <svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M22.46 6c-.77.35-1.61.58-2.48.69a4.28 4.28 0 001.88-2.36 8.52 8.52 0 01-2.69 1.03 4.27 4.27 0 00-7.29 3.89 12.14 12.14 0 01-8.81-4.46 4.27 4.27 0 001.32 5.71A4.25 4.25 0 013 9.8v.05a4.26 4.26 0 003.42 4.18 4.3 4.3 0 01-1.92.07 4.28 4.28 0 003.99 2.97 8.56 8.56 0 01-6.3 1.76 12.07 12.07 0 006.5 1.91c7.8 0 12.08-6.46 12.08-12.08 0-.18 0-.36-.01-.53A8.67 8.67 0 0022.46 6z"/>
              </svg>
            </a>
          </div>

          <!-- Footer Bottom -->
          <div class="text-center text-gray-400 text-sm mt-6">
            &copy; 2025 CameraZone. All Rights Reserved.
          </div>
        </footer>


  <!-- JavaScript for Mobile Menu Toggle -->
  <script>
    document.getElementById('menu-toggle').addEventListener('click', function () {
      let menu = document.getElementById('mobile-menu');
      let links = menu.querySelectorAll("a");
      let isOpen = !menu.classList.contains("hidden");

      this.setAttribute("aria-expanded", isOpen ? "false" : "true");
      menu.classList.toggle("hidden");

      if (!menu.classList.contains("hidden")) {
        links.forEach((link, index) => {
          setTimeout(() => {
            link.classList.remove("opacity-0", "translate-y-[-10px]");
            link.classList.add("opacity-100", "translate-y-0");
          }, index * 100);
        });
      } else {
        links.forEach(link => {
          link.classList.add("opacity-0", "translate-y-[-10px]");
          link.classList.remove("opacity-100", "translate-y-0");
        });
      }
    });
  </script>
</body>
</html>
