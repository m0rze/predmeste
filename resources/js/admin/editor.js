class EditorFuncs {
    constructor(textAreaClass) {
        this.startPositionInTextArea = null;
        this.textAreaClass = textAreaClass;
        this.textArea = document.querySelector(this.textAreaClass);
        this.editorModal = document.querySelector(".editor-modal");
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

    }

    image() {

    }

    addEvents() {

        document.querySelector(".add-link").addEventListener("click", () => {
            const url = document.querySelector(".link-url").value;
            const anchor = document.querySelector(".link-anchor").value;
            if(url && anchor)
            {
                const allText = this.textArea.value;
                const link = `<a href="${url}">${anchor}</a>`;
                this.textArea.value = `${allText.substring(0, this.startPositionInTextArea)}${link}${allText.substring(this.startPositionInTextArea, allText.length)}`;
                document.querySelector(".make-link").classList.toggle("deactivated");
                document.querySelector(".editor-modal").classList.toggle("deactivated");
                document.querySelector(".link-url").value = "";
                document.querySelector(".link-anchor").value = "";
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
        if(allText.indexOf(`<${tag}>${sel}</${tag}>`) !== -1)
        {
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
            // document.querySelector(".cat_id").value = "";
            // document.querySelector(".cat_name").value = "";
            document.querySelector(".editor-modal").classList.toggle("deactivated");
            document.querySelector(".make-link").classList.toggle("deactivated");
            document.querySelector(".link-url").value = "";
            document.querySelector(".link-anchor").value = "";

            // document.querySelector("#wrapper").classList.toggle("low-opacity");
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
