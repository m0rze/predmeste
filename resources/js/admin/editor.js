class EditorFuncs {
    constructor(textAreaClass) {
        this.axios = window.axios;
        this.token = document.querySelector(".token").value;
        this.API = "/api/admin/pages";

        this.startPositionInTextArea = null;
        this.textAreaClass = textAreaClass;
        this.textArea = document.querySelector(this.textAreaClass);
        this.editorModal = document.querySelector(".editor-modal");
        this.uploadFileForm = document.querySelector(".upload-file-form");
        this.addEvents();
    }

    p() {
        this.tagSelected("p");
    }

    center() {
        this.tagSelected("div class='text-center'");
    }

    h1() {
        this.tagSelected("h1");
    }

    h2() {
        this.tagSelected("h2");

    }

    h3() {
        this.tagSelected("h3");

    }

    h4() {
        this.tagSelected("h4");
    }

    strong() {
        this.tagSelected("strong");

    }

    strike() {
        this.tagSelected("s");
    }

    link() {
        this.startPositionInTextArea = this.textArea.selectionStart;
        document.querySelector(".editor-modal").classList.toggle("deactivated");
        document.querySelector(".make-link").classList.toggle("deactivated");
    }

    file() {
        this.startPositionInTextArea = this.textArea.selectionStart;
        document.querySelector(".editor-modal").classList.toggle("deactivated");
        document.querySelector(".upload-file").classList.toggle("deactivated");
        document.querySelector(".file-label").innerHTML = "Файл (.doc(x), .pdf, .xls(x), .txt), макс. размер 10Мб";
        document.querySelector(".file-title").style.display = "block";
        document.querySelector(".file-type").value = "doc";
    }

    image() {
        this.startPositionInTextArea = this.textArea.selectionStart;
        document.querySelector(".editor-modal").classList.toggle("deactivated");
        document.querySelector(".upload-file").classList.toggle("deactivated");
        document.querySelector(".file-label").innerHTML = "Файл (.png, .jpeg, .jpg), макс. размер 10Мб";
        document.querySelector(".file-title").style.display = "none";
        document.querySelector(".file-type").value = "img";
    }

    async uploadFile(formData) {
        return await this.axios.post(this.API + "/upload-file", formData, {
                headers: {
                    token: this.token,
                    'Content-Type': 'multipart/form-data'
                }
            }
        );
    }

    addEvents() {
        this.uploadFileForm.addEventListener("submit", (event) => {
            event.preventDefault();
            const formData = new FormData(this.uploadFileForm);
            this.uploadFile(formData).then(response => {
                if(response.data.result === 1)
                {
                    if(!response.data.filename)
                    {
                        document.querySelector(".errors").innerHTML = "Ошибка сохранения";
                    } else {
                        const allText = this.textArea.value;
                        const type = document.querySelector(".file-type").value;
                        let fileTag = "";
                        if(type === "doc")
                        {
                            fileTag = `[DOCFILE:${response.data.filename}:${response.data.filetitle}]`;
                        } else if(type === "img")
                        {
                            fileTag = `[IMAGE:${response.data.filename}]`;
                        }

                        this.textArea.value = `${allText.substring(0, this.startPositionInTextArea)}${fileTag}${allText.substring(this.startPositionInTextArea, allText.length)}`;
                        document.querySelector(".close-modal").click();
                    }
                }
                if(response.data.errors)
                {
                    document.querySelector(".errors").innerHTML = response.data.errors;
                }
            });
        });

        document.querySelector(".add-link").addEventListener("click", () => {
            const url = document.querySelector(".link-url").value;
            const anchor = document.querySelector(".link-anchor").value;
            if (url && anchor) {
                const allText = this.textArea.value;
                const link = `<a href="${url}">${anchor}</a>`;
                this.textArea.value = `${allText.substring(0, this.startPositionInTextArea)}${link}${allText.substring(this.startPositionInTextArea, allText.length)}`;
                // document.querySelector(".make-link").classList.toggle("deactivated");
                // document.querySelector(".editor-modal").classList.toggle("deactivated");
                // document.querySelector(".link-url").value = "";
                // document.querySelector(".link-anchor").value = "";
                document.querySelector(".close-modal").click();
            }
        });

    }

    tagSelected(tag) {
        const start = this.textArea.selectionStart;
        const finish = this.textArea.selectionEnd;
        const allText = this.textArea.value;
        const sel = allText.substring(start, finish);

        const startTag = `<${tag}>`;
        const startTagLen = startTag.length;
        const endTag = `</${tag}>`;
        const endTagLen = endTag.length;
        if (allText.indexOf(`<${tag}>${sel}</${tag}>`) !== -1) {
            const startWithTag = start - startTagLen;
            const endWithTag = finish + endTagLen;
            let newSel = allText.substring(startWithTag, endWithTag);
            const regex = new RegExp(`<\/?${tag}(>|$)`, "g");
            newSel = newSel.replace(regex, "");
            this.textArea.value = `${allText.substring(0, startWithTag)}${newSel}${allText.substring(endWithTag, allText.length)}`;
            this.textArea.selectionStart = startWithTag;
            this.textArea.selectionEnd = endWithTag - startTagLen - endTagLen;
        } else {
            this.textArea.value = `${allText.substring(0, start)}<${tag}>${sel}</${tag}>${allText.substring(finish, allText.length)}`;
            this.textArea.selectionStart = start + startTagLen;
            this.textArea.selectionEnd = finish + startTagLen;
        }


    }
}

class Editor {
    constructor(textAreaClass) {
        this.textAreaClass = textAreaClass
        this.editor = document.querySelector(".editor-buttons");
        this.closeModalButton = document.querySelector(".close-modal");
        this.addEvents();
        this.editorFuncs = new EditorFuncs(this.textAreaClass);

    }

    addEvents() {
        this.editor.addEventListener("click", event => {
            if (event.target.tagName === "BUTTON") {
                this.executeEvent(event.target);
            }
        });

        this.closeModalButton.addEventListener("click", () => {
            document.querySelector(".editor-modal").classList.toggle("deactivated");

            if(!document.querySelector(".make-link").classList.contains("deactivated")){
                document.querySelector(".make-link").classList.toggle("deactivated");
            }
            if(!document.querySelector(".upload-file").classList.contains("deactivated")){
                document.querySelector(".upload-file").classList.toggle("deactivated");
            }
            document.querySelector(".link-url").value = "";
            document.querySelector(".link-anchor").value = "";
            document.querySelector(".selected-file").value = "";
            document.querySelector(".errors").innerHTML = "";
            document.querySelector(".file-title").value = "";

        });
    }

    executeEvent(element) {
        const buttonType = element.classList[0];
        if (buttonType) {
            this.editorFuncs[buttonType]();
        }
    }

}

new Editor(".body");
