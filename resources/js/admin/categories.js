class Categories {
    constructor() {
        this.API = "/api/admin/category";
        this.wasError = false;
        this.token = document.querySelector(".token").value;
        this.axios = window.axios;
        this.newCatButton = document.querySelector(".new-cat-button");
        this.closeModalButton = document.querySelector(".close-modal");
        this.addCatButton = document.querySelector(".add-cat-button");
        this.catNameInput = document.querySelector(".cat_name");
        this.tdTitleEl = document.querySelectorAll(".td-title");
        this.errorEl = document.querySelector(".error-text");
        this.deleteItems = document.querySelectorAll(".delete-item");
        this.setEvents();
    }

    setEvents() {

        this.deleteItems.forEach(el => {
            el.addEventListener("click", (event) => {
                const tdEl = event.target.closest("td");
                const catId = tdEl.dataset.id;
                if (catId) {
                    this.deleteCat(catId).then(response => {
                        if (response.data.result === 1) {
                            tdEl.closest("tr").remove();
                        } else {
                            location.reload();
                        }

                    }).catch((error) => {
                        location.reload();
                    });
                }
            });
        });

        this.tdTitleEl.forEach(el => {
            el.addEventListener("click", () => {
                document.querySelector(".cat_name").value = el.innerHTML;
                document.querySelector(".cat_id").value = el.dataset.id
                this.addCatButton.innerHTML = "Обновить";
                document.querySelector(".new-cat-modal").classList.toggle("deactivated");
                document.querySelector("#wrapper").classList.toggle("low-opacity");
            });
        });

        this.catNameInput.addEventListener("input", () => {
            if (this.wasError) {
                this.errorEl.classList.toggle("deactivated");
                this.errorEl.innerHTML = "";
                this.wasError = false;
            }
        });

        this.newCatButton.addEventListener("click", () => {
            document.querySelector(".cat_name").value = "";
            document.querySelector(".new-cat-modal").classList.toggle("deactivated");
            document.querySelector("#wrapper").classList.toggle("low-opacity");
        });

        this.closeModalButton.addEventListener("click", () => {
            document.querySelector(".cat_id").value = "";
            document.querySelector(".cat_name").value = "";
            document.querySelector(".new-cat-modal").classList.toggle("deactivated");
            document.querySelector("#wrapper").classList.toggle("low-opacity");
        });

        this.addCatButton.addEventListener("click", () => {
            this.addCatButton.disabled = true;
            const catName = document.querySelector(".cat_name").value;
            if (!catName) {
                this.wasError = true;
                this.errorEl.classList.toggle("deactivated");
                this.errorEl.innerHTML = "Заполните имя категории";
                this.addCatButton.disabled = false;
            } else {
                this.addCat(catName).then(response => {
                    if (response.data.result === 1) {
                        location.reload();
                    }
                    if (response.data.error === "catexists") {
                        this.wasError = true;
                        this.errorEl.classList.toggle("deactivated");
                        this.errorEl.innerHTML = "Такая категория уже существует";
                        this.addCatButton.disabled = false;
                    }
                    if (response.data.error === "badinsert") {
                        this.wasError = true;
                        this.errorEl.classList.toggle("deactivated");
                        this.errorEl.innerHTML = "Что-то пошло не так :-( Перезагрузите страницу...";
                    }
                }).catch((error) => {
                    this.wasError = true;
                    this.errorEl.classList.toggle("deactivated");
                    this.errorEl.innerHTML = "Что-то пошло не так :-( Перезагрузите страницу...";
                });
            }
        });
    }

    async deleteCat(catId) {
        return await this.axios.delete(this.API + "/delete/" + catId, {
            headers: {
                token: this.token
            },
            data: JSON.stringify({
                cat_id: catId
            })
        });
    }

    async addCat(catName) {

        return await this.axios.post(this.API + "/add", {
                data: JSON.stringify({
                    title: catName,
                    cat_id: document.querySelector(".cat_id").value
                })
            },
            {
                headers: {
                    token: this.token
                }
            });
    }

}

new Categories();
