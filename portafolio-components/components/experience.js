class Experience extends HTMLElement {
connectedCallback() {
this.innerHTML = `
<section class="bg-slate-50 py-20">
  <div class="w-full max-w-7xl mx-auto px-8">
    <div class="flex flex-col gap-8 justify-center">
      <div class="self-center">
        <p class="bg-slate-300 flex text-zinc-700 rounded-full text-lg font-semibold px-4">Experiencia</p>
      </div>
      <p class="text-gray-700 text-center text-xl space-y-6 pb-16">
        A continuación se presentan algunos de los proyectos en los que he trabajado:
      </p>
    </div>

    <div class="space-y-8 space-x-6">

      <card-element title="Desarrollo de Landing Page"
        image="/img/portafolio-programador.jpg"
        description="Desarrollé una landing page para una startup tecnológica utilizando HTML, CSS y JavaScript. La página incluye secciones sobre el producto, testimonios de clientes y un formulario de contacto.">
      </card-element>
      <card-element title="Desarrollo de Landing Page"
        image="img/laptop_adm2.jpg"
        description="Desarrollé una landing page para una startup tecnológica utilizando HTML, CSS y JavaScript. La página incluye secciones sobre el producto, testimonios de clientes y un formulario de contacto.">
      </card-element>
      <card-element title="Desarrollo de Landing Page"
        image="https://via.placeholder.com/400x200"
        description="Desarrollé una landing page para una startup tecnológica utilizando HTML, CSS y JavaScript. La página incluye secciones sobre el producto, testimonios de clientes y un formulario de contacto.">
      </card-element>

      

    </div>
  </div>
</section>
`;
}
}

customElements.define("experience-section", Experience);