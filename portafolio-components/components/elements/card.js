class Card extends HTMLElement {
static get observedAttributes() {
return ["title", "image", "description"];
}

constructor() {
super();
this.title = this.getAttribute("title");
this.image = this.getAttribute("image");
this.description = this.getAttribute("description");
}

connectedCallback() {
this.render();
}

attributeChangedCallback(name, oldValue, newValue) {
if (oldValue !== newValue) {
this[name] = newValue;
this.render();
}
}

render() {
this.innerHTML = `
<section c>
    <div class="bg-white px-8 shadow-lg py-8 shadow-gray-300 rounded-lg hover:shadow-xl transition-shadow">
        <div class="w-full max-w-7xl mx-auto">
            <div class="flex flex-col lg:flex-row justify-between gap-6">
                <div class="lg:w-1/3 self-center">
                    <img class="w-full max-w-xs rounded-sm" src="${this.image}" alt="image" />
                </div>
                <div class="flex flex-col gap-4 lg:w-2/3">
                    <p class="font-semibold text-2xl">
                        ${this.title}
                    </p>

                    <p>${this.description}</p>
                </div>
                <p class="lg:w-1/3 lg:text-right text-lg">
                    Abril 2025 - Junio 2025
                </p>

            </div>

        </div>
    </div>
</section>
`;
}

}

customElements.define("card-element", Card);