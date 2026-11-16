class Footer extends HTMLElement {
  connectedCallback() {
    this.innerHTML = `
      <footer class="bg-gray-800 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
          <div>
            <p>&copy; 2023 InnerTech</p>
          </div>
          <div>
            <ul class="flex space-x-4">
              <li><a href="#projects" class="hover:underline">Proyectos</a></li>
              <li><a href="#contact" class="hover:underline">Contactar</a></li>
            </ul>
          </div>
        </div>
      </footer>
    `;
  }
}
customElements.define('footer-bar', Footer);