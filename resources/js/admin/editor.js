class EditorFuncs {
    constructor(textAreaClass) {
        this.textAreaClass = textAreaClass;
        this.textArea = document.querySelector(this.textAreaClass);
    }

    p() {
        this.tagSelected("p");
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

    }

    file() {

    }

    image() {

    }

    tagSelected(tag) {
        const start = this.textArea.selectionStart;
        const finish = this.textArea.selectionEnd;
        const allText = this.textArea.value;
        const sel = allText.substring(start, finish);

        const startTag = "<" + tag + ">";
        const startTagLen = startTag.length;
        const endTag = "</" + tag + ">";
        const endTagLen = endTag.length;
        if(allText.indexOf("<" + tag + ">" + sel + "</" + tag + ">") !== -1)
        {
            const startWithTag = start - startTagLen;
            const endWithTag = finish + endTagLen;
            let newSel = allText.substring(startWithTag, endWithTag);
            newSel = newSel.replace(/<\/?[^>]+(>|$)/g, "");
            this.textArea.value = allText.substring(0, startWithTag) + newSel + allText.substring(endWithTag, allText.length);
            this.textArea.selectionStart = startWithTag;
            this.textArea.selectionEnd = endWithTag - startTagLen - endTagLen;
        } else {
            this.textArea.value = allText.substring(0, start) + "<" + tag + ">" + sel + "</" + tag + ">" + allText.substring(finish, allText.length);
            this.textArea.selectionStart = start + startTagLen;
            this.textArea.selectionEnd = finish + startTagLen;
        }


    }
}

class Editor {
    constructor(textAreaClass) {
        this.textAreaClass = textAreaClass
        this.editor = document.querySelector(".editor-buttons");
        this.addEvents();
        this.editorFuncs = new EditorFuncs(this.textAreaClass);
    }

    addEvents() {
        this.editor.addEventListener("click", event => {
            if (event.target.tagName === "BUTTON") {
                this.executeEvent(event.target);
            }
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
