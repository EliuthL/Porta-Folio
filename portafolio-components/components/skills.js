class Skills extends HTMLElement {
connectedCallback() {
this.innerHTML = `
<section class="bg-white py-20">
  <div class="w-full max-w-7xl mx-auto px-8">
    <div class="flex flex-col gap-8 justify-center">
      <div class="self-center">
        <p class="bg-slate-300 flex text-zinc-700 rounded-full text-lg font-semibold px-4">Habilidades</p>

      </div>
      <p class="text-gray-700 text-center text-xl space-y-6 pb-16">
        Estas son algunas de las tecnologías y herramientas con las que he trabajado:
      </p>
    </div>


    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4 space-y-6">
      <skill-icon icon="./img/PHP.svg.png" label="PHP"></skill-icon>
      <skill-icon icon="./img/laravel.png" label="Laravel"></skill-icon>
      <skill-icon icon="./img/javascript.svg" label="JavaScript"></skill-icon>
      <skill-icon icon="./img/vuej.png" label="Vue.js"></skill-icon>
      <skill-icon icon="./img/tailwind.png" label="Tailwind CSS"></skill-icon>
      <skill-icon icon="./img/figma.svg" label="Figma"></skill-icon>
      <skill-icon icon="./img/git.jpeg" label="Git"></skill-icon>
      <skill-icon icon="./img/github.svg" label="GitHub"></skill-icon>
      <skill-icon icon="./img/mysql.png" label="MySQL"></skill-icon>
      <skill-icon icon="./img/SSH.svg.png" label="SSH"></skill-icon>

    </div>
  </div>
</section>
`;
}
}
customElements.define("skills-section", Skills);