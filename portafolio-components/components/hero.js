class Hero extends HTMLElement {
  constructor() {
    super();  
  }

  connectedCallback() {
  this.innerHTML = `
  <section class="bg-white">
    <div class="w-full max-w-7xl mx-auto grid lg:flex px-4 py-16 md:px-8 md:py-24 gap-10">
      <div class="w-full flex flex-col justify-center lg:w-2/3 order-last lg:order-first">
        <h1 class="text-4xl md:text-5xl font-bold">
          Desarrollador PHP Laravel
        </h1>
        <p class="my-4 text-normal md:text-xl text-gray-700">
          Soy Eliuth, desarrollador web backend (PHP y Laravel).
          Me gustan los retos y el inicio de nuevos proyectos me impulsa a
          crear ideas innovadoras que automaticen los procesos en las empresas.
          He sido colavorador en proyectos académicos y desarrollo de soluciones para negocios.
        </p>
        <div class="w-full lg:max-w-sm flex items-center justify-center lg:justify-between">
          <div class="flex flex-col md:flex-row items-start gap-4">
            <button
              class="bg-blue-500 hover:bg-blue-700 text-white font-bold p-2 rounded hover:scale-110 transition-transform w-64 h-12 flex items-center justify-center"
              onclick="downloadCV()">
              Descargar CV
            </button>

            <p class="bg-slate-300 px-4 rounded-lg font-semibold flex items-center gap-2 relative select-none justify-between w-64 h-12">
              eliuthsevilla@gmail.com

              <span class="relative w-8 h-8 cursor-pointer hover:scale-110 transition-transform" onclick="copyEmail()">
                <img id="copyIcon" src="./img/copy.svg"
                  class="absolute inset-0 w-8 h-8" alt="Copiar" />
                <span id="checkIcon"
                  class="absolute inset-0 flex items-center justify-center text-green-600 opacity-0 transition-opacity duration-300">
                  ✔️
                </span>
              </span>
            </p>
          </div>

        </div>
      </div>
      <div class="w-full lg:w-1/3 flex justify-center lg:justify-end items-center order-first lg:order-last mt-8 md:mt-0">
        <img src="/img/hero.jpeg" alt="Hero Image" class="w-64 md:w-80 rounded-lg ">
      </div>

    </div>
  </section>
  `;
}
}

customElements.define('hero-section', Hero);