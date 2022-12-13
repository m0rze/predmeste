class EditorFuncs {
    constructor(textAreaClass) {
        this.textAreaClass = textAreaClass;
        this.textArea = document.querySelector(this.textAreaClass);
        console.log(this.textArea);
    }

    h1() {
        const start = this.textArea.selectionStart;
        console.log(start);
        const finish = this.textArea.selectionEnd;
        console.log(finish);
        const allText = this.textArea.value;
        const sel = allText.substring(start, finish);
        console.log(sel);
        const newText = allText.substring(0, start) + "<center>" + sel + "</center>" + allText.substring(finish, allText.length);
        console.log(newText);
        this.textArea.value = newText;
    }

    h2() {

    }

    h3() {

    }

    strong() {

    }

    strike() {

    }

    link() {

    }

    file() {

    }

    image() {

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
