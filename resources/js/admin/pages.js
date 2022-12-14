class Pages
{
    constructor() {
        this.API = "/api/admin/pages";
        this.token = document.querySelector(".token").value;
        this.axios = window.axios;
        this.deleteItems = document.querySelectorAll(".delete-item");
        this.setEvents();
    }

    setEvents() {
        this.deleteItems.forEach(el => {
            el.addEventListener("click", (event) => {
                const tdEl = event.target.closest("td");
                const pageId = tdEl.dataset.id;
                if (pageId) {
                    this.deletePage(pageId).then(response => {
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

    }

    async deletePage(pageId) {
        return await this.axios.delete(this.API + "/delete/" + pageId, {
            headers: {
                token: this.token
            },
            data: JSON.stringify({
                page_id: pageId
            })
        });
    }
}

new Pages();
