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
    this.textAreaClass = textAreaClass;
    this.textArea = document.querySelector(this.textAreaClass);
  }
  _createClass(EditorFuncs, [{
    key: "p",
    value: function p() {
      this.tagSelected("p");
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
    value: function link() {}
  }, {
    key: "file",
    value: function file() {}
  }, {
    key: "image",
    value: function image() {}
  }, {
    key: "tagSelected",
    value: function tagSelected(tag) {
      var start = this.textArea.selectionStart;
      var finish = this.textArea.selectionEnd;
      var allText = this.textArea.value;
      var sel = allText.substring(start, finish);
      var startTag = "<" + tag + ">";
      var startTagLen = startTag.length;
      var endTag = "</" + tag + ">";
      var endTagLen = endTag.length;
      if (allText.indexOf("<" + tag + ">" + sel + "</" + tag + ">") !== -1) {
        var startWithTag = start - startTagLen;
        var endWithTag = finish + endTagLen;
        var newSel = allText.substring(startWithTag, endWithTag);
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
  }]);
  return EditorFuncs;
}();
var Editor = /*#__PURE__*/function () {
  function Editor(textAreaClass) {
    _classCallCheck(this, Editor);
    this.textAreaClass = textAreaClass;
    this.editor = document.querySelector(".editor-buttons");
    this.addEvents();
    this.editorFuncs = new EditorFuncs(this.textAreaClass);
  }
  _createClass(Editor, [{
    key: "addEvents",
    value: function addEvents() {
      var _this = this;
      this.editor.addEventListener("click", function (event) {
        if (event.target.tagName === "BUTTON") {
          _this.executeEvent(event.target);
        }
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