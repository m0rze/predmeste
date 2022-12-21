class Widgets
{
    constructor() {
        this.API = "/api/admin/widgets";
        this.token = document.querySelector(".token").value;
        this.axios = window.axios;
        this.deleteItems = document.querySelectorAll(".delete-item");
        this.setEvents();
    }

    setEvents() {
        this.deleteItems.forEach(el => {
            el.addEventListener("click", (event) => {
                const tdEl = event.target.closest("td");
                const itemId = tdEl.dataset.id;
                if (itemId) {
                    this.deletePage(itemId).then(response => {
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

    async deletePage(itemId) {
        return await this.axios.delete(this.API + "/delete/" + itemId, {
            headers: {
                token: this.token
            },
            data: JSON.stringify({
                widget_id: itemId
            })
        });
    }
}

new Widgets();
