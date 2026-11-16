class SkillIcon extends HTMLElement {
  static get observedAttributes() {
    // 👇 Aquí declaras qué atributos quieres "observar"
    return ["icon", "label"];
  }

  constructor() {
    super();
    this.icon = this.getAttribute("icon");
    this.label = this.getAttribute("label");
  }

  connectedCallback() {
    this.render();
  }

  attributeChangedCallback(name, oldValue, newValue) {
    // 👇 Se ejecuta automáticamente cuando cambia un atributo
    if (oldValue !== newValue) {
      this[name] = newValue; // Actualiza la propiedad (icon o label)
      this.render(); // Vuelve a renderizar el contenido
    }
  }

  render() {
    this.innerHTML = `
      <div class="hover:scale-110 transition-transform flex flex-col items-center space-y-2">
        <img src="${this.icon}" alt="${this.label}" class="w-20 h-20 object-contain" />
        <span class="text-sm text-gray-700">${this.label}</span>
      </div>
    `;
  }
}

customElements.define("skill-icon", SkillIcon);
