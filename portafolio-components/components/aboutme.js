class Aboutme extends HTMLElement {
connectedCallback() {
this.innerHTML = `
  <section class="bg-slate-50 py-20">
    <div class="w-full max-w-7xl px-8 mx-auto">
      <div class="flex flex-col gap-8">
        <div class="flex justify-center"> 
          <p class="bg-slate-300 text-zinc-700 font-semibold text-lg rounded-full px-4">
            Sobre mí
          </p>
        </div>

        <div class="text-gray-700  space-y-6">
          <p>
            Soy estudiante de octavo semestre de Ingeniería en Sistemas de Iformación, soy apacionado del desarrollo de software
            y aprobecho cada proyecto para dar soluciones creativas a los problemas que tienen las empresas.
            Me gusta aprender nuevas tecnologías y mejorar mis habilidades de programación.
            Tengo experiencia en desarrollo web backend con PHP y Laravel, así como en desarrollo frontend con HTML, CSS y JavaScript.
            Estoy buscando una oportunidad para crecer profesionalmente y contribuir al éxito de una empresa.
          </p>
          <p>
            He desarrollado proyectos academicos para la administración de datos y la gestión de información, utilizando bases de datos como MySQL.
            También he trabajado en sistemas para negocios, como la creación de un blogs, landing pages y catálogos de productos para tiendas de tecnología.
          </p>
          <p>
            Destaco por ser una persona proactiva, responsable y comprometida con mi trabajo. Me gusta trabajar en equipo, aprender de los demás y compartir mis conocimientos.
            Estoy dispuesto a enfrentar nuevos retos. A parte de mi trabajo como desarrollador tengo habilidades en instalaciones eléctricas, conocimiento en electrónica y me gusta practicar deportes, especialmente el fútbol y el baloncesto. Me gusta disfrutar de la música y aprender habilidades nuevas.
          </p>
        </div>

      </div>
    </div>
  </section>
`;
}
}

customElements.define("aboutme-section", Aboutme);