class Index {
    constructor() {
        this.recents = document.querySelectorAll(".feature");
        this.addEvents();
    }

    addEvents() {
        this.recents.forEach(el => {
            el.addEventListener("click", event => {
                if(event.target.tagName !== "A")
                {
                    const slug = event.currentTarget.dataset.slug;
                    const catSlug = event.currentTarget.dataset.cat;
                    location.href = `/${catSlug}/${slug}`;
                }

            });
        });
    }
}

new Index();
