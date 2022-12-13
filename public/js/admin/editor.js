/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************************!*\
  !*** ./resources/js/admin/editor.js ***!
  \**************************************/
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, _toPropertyKey(descriptor.key), descriptor); } }
function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function _toPropertyKey(arg) { var key = _toPrimitive(arg, "string"); return _typeof(key) === "symbol" ? key : String(key); }
function _toPrimitive(input, hint) { if (_typeof(input) !== "object" || input === null) return input; var prim = input[Symbol.toPrimitive]; if (prim !== undefined) { var res = prim.call(input, hint || "default"); if (_typeof(res) !== "object") return res; throw new TypeError("@@toPrimitive must return a primitive value."); } return (hint === "string" ? String : Number)(input); }
var EditorFuncs = /*#__PURE__*/function () {
  function EditorFuncs(textAreaClass) {
    _classCallCheck(this, EditorFuncs);
    this.startPositionInTextArea = null;
    this.textAreaClass = textAreaClass;
    this.textArea = document.querySelector(this.textAreaClass);
    this.editorModal = document.querySelector(".editor-modal");
    this.addEvents();
  }
  _createClass(EditorFuncs, [{
    key: "p",
    value: function p() {
      this.tagSelected("p");
    }
  }, {
    key: "center",
    value: function center() {
      this.tagSelected("div class='text-center'");
    }
  }, {
    key: "h1",
    value: function h1() {
      this.tagSelected("h1");
    }
  }, {
    key: "h2",
    value: function h2() {
      this.tagSelected("h2");
    }
  }, {
    key: "h3",
    value: function h3() {
      this.tagSelected("h3");
    }
  }, {
    key: "h4",
    value: function h4() {
      this.tagSelected("h4");
    }
  }, {
    key: "strong",
    value: function strong() {
      this.tagSelected("strong");
    }
  }, {
    key: "strike",
    value: function strike() {
      this.tagSelected("s");
    }
  }, {
    key: "link",
    value: function link() {
      this.startPositionInTextArea = this.textArea.selectionStart;
      document.querySelector(".editor-modal").classList.toggle("deactivated");
      document.querySelector(".make-link").classList.toggle("deactivated");
    }
  }, {
    key: "file",
    value: function file() {}
  }, {
    key: "image",
    value: function image() {}
  }, {
    key: "addEvents",
    value: function addEvents() {
      var _this = this;
      document.querySelector(".add-link").addEventListener("click", function () {
        var url = document.querySelector(".link-url").value;
        var anchor = document.querySelector(".link-anchor").value;
        if (url && anchor) {
          var allText = _this.textArea.value;
          var link = "<a href=\"".concat(url, "\">").concat(anchor, "</a>");
          _this.textArea.value = "".concat(allText.substring(0, _this.startPositionInTextArea)).concat(link).concat(allText.substring(_this.startPositionInTextArea, allText.length));
          document.querySelector(".make-link").classList.toggle("deactivated");
          document.querySelector(".editor-modal").classList.toggle("deactivated");
          document.querySelector(".link-url").value = "";
          document.querySelector(".link-anchor").value = "";
        }
      });
    }
  }, {
    key: "tagSelected",
    value: function tagSelected(tag) {
      var start = this.textArea.selectionStart;
      var finish = this.textArea.selectionEnd;
      var allText = this.textArea.value;
      var sel = allText.substring(start, finish);
      var startTag = "<".concat(tag, ">");
      var startTagLen = startTag.length;
      var endTag = "</".concat(tag, ">");
      var endTagLen = endTag.length;
      if (allText.indexOf("<".concat(tag, ">").concat(sel, "</").concat(tag, ">")) !== -1) {
        var startWithTag = start - startTagLen;
        var endWithTag = finish + endTagLen;
        var newSel = allText.substring(startWithTag, endWithTag);
        var regex = new RegExp("</?".concat(tag, "(>|$)"), "g");
        newSel = newSel.replace(regex, "");
        this.textArea.value = "".concat(allText.substring(0, startWithTag)).concat(newSel).concat(allText.substring(endWithTag, allText.length));
        this.textArea.selectionStart = startWithTag;
        this.textArea.selectionEnd = endWithTag - startTagLen - endTagLen;
      } else {
        this.textArea.value = "".concat(allText.substring(0, start), "<").concat(tag, ">").concat(sel, "</").concat(tag, ">").concat(allText.substring(finish, allText.length));
        this.textArea.selectionStart = start + startTagLen;
        this.textArea.selectionEnd = finish + startTagLen;
      }
    }
  }]);
  return EditorFuncs;
}();
var Editor = /*#__PURE__*/function () {
  function Editor(textAreaClass) {
    _classCallCheck(this, Editor);
    this.textAreaClass = textAreaClass;
    this.editor = document.querySelector(".editor-buttons");
    this.closeModalButton = document.querySelector(".close-modal");
    this.addEvents();
    this.editorFuncs = new EditorFuncs(this.textAreaClass);
  }
  _createClass(Editor, [{
    key: "addEvents",
    value: function addEvents() {
      var _this2 = this;
      this.editor.addEventListener("click", function (event) {
        if (event.target.tagName === "BUTTON") {
          _this2.executeEvent(event.target);
        }
      });
      this.closeModalButton.addEventListener("click", function () {
        // document.querySelector(".cat_id").value = "";
        // document.querySelector(".cat_name").value = "";
        document.querySelector(".editor-modal").classList.toggle("deactivated");
        document.querySelector(".make-link").classList.toggle("deactivated");
        document.querySelector(".link-url").value = "";
        document.querySelector(".link-anchor").value = "";

        // document.querySelector("#wrapper").classList.toggle("low-opacity");
      });
    }
  }, {
    key: "executeEvent",
    value: function executeEvent(element) {
      var buttonType = element.classList[0];
      if (buttonType) {
        this.editorFuncs[buttonType]();
      }
    }
  }]);
  return Editor;
}();
new Editor(".body");
/******/ })()
;