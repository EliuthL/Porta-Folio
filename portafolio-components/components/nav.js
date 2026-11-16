class Navigation extends HTMLElement {
  connectedCallback() {
    this.innerHTML = `
      <nav class="bg-gray-800 text-white w-full">
        <div class="relative w-full max-w-7xl mx-auto flex justify-between items-center py-4 p-4 md:px-8">
            <ul class="flex space-x-4">
                <li><a href="#home"><h3 class="text-2xl md:text-3xl tracking-[-0.02em] text-white font-bold">InnerTech</h3></a></li>
            </ul>

            <button id="menu-toggle" class="md:hidden text-white focus:outline-none" onclick="menuToggle()">
              <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
              </svg>
            </button>

            <ul id="menu" class="bg-gray-800 absolute top-full left-0 w-full hidden items-end md:flex flex-col space-y-6 p-4 md:block md:static md:w-auto md:flex-row md:space-y-0 md:space-x-6 md:p-0 md:space-between md:items-center">
              <li><a href="#works">Trabajos</a></li>
              <li><a href="#about">Sobre mí</a></li>
              <li><a href="#contact">Contactar</a></li> 
              <li><button onclick="downloadCV()" class="bg-transparent border border-white rounded px-4 py-2 hover:bg-white hover:text-gray-800 transition duration-300">Descargar CV</button></li>
            </ul>
        </div>
        
      </nav>
    `;
  }
}
customElements.define("navigation-bar", Navigation);