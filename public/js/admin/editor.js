/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************************!*\
  !*** ./resources/js/admin/editor.js ***!
  \**************************************/
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
function _regeneratorRuntime() { "use strict"; /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/facebook/regenerator/blob/main/LICENSE */ _regeneratorRuntime = function _regeneratorRuntime() { return exports; }; var exports = {}, Op = Object.prototype, hasOwn = Op.hasOwnProperty, defineProperty = Object.defineProperty || function (obj, key, desc) { obj[key] = desc.value; }, $Symbol = "function" == typeof Symbol ? Symbol : {}, iteratorSymbol = $Symbol.iterator || "@@iterator", asyncIteratorSymbol = $Symbol.asyncIterator || "@@asyncIterator", toStringTagSymbol = $Symbol.toStringTag || "@@toStringTag"; function define(obj, key, value) { return Object.defineProperty(obj, key, { value: value, enumerable: !0, configurable: !0, writable: !0 }), obj[key]; } try { define({}, ""); } catch (err) { define = function define(obj, key, value) { return obj[key] = value; }; } function wrap(innerFn, outerFn, self, tryLocsList) { var protoGenerator = outerFn && outerFn.prototype instanceof Generator ? outerFn : Generator, generator = Object.create(protoGenerator.prototype), context = new Context(tryLocsList || []); return defineProperty(generator, "_invoke", { value: makeInvokeMethod(innerFn, self, context) }), generator; } function tryCatch(fn, obj, arg) { try { return { type: "normal", arg: fn.call(obj, arg) }; } catch (err) { return { type: "throw", arg: err }; } } exports.wrap = wrap; var ContinueSentinel = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} var IteratorPrototype = {}; define(IteratorPrototype, iteratorSymbol, function () { return this; }); var getProto = Object.getPrototypeOf, NativeIteratorPrototype = getProto && getProto(getProto(values([]))); NativeIteratorPrototype && NativeIteratorPrototype !== Op && hasOwn.call(NativeIteratorPrototype, iteratorSymbol) && (IteratorPrototype = NativeIteratorPrototype); var Gp = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(IteratorPrototype); function defineIteratorMethods(prototype) { ["next", "throw", "return"].forEach(function (method) { define(prototype, method, function (arg) { return this._invoke(method, arg); }); }); } function AsyncIterator(generator, PromiseImpl) { function invoke(method, arg, resolve, reject) { var record = tryCatch(generator[method], generator, arg); if ("throw" !== record.type) { var result = record.arg, value = result.value; return value && "object" == _typeof(value) && hasOwn.call(value, "__await") ? PromiseImpl.resolve(value.__await).then(function (value) { invoke("next", value, resolve, reject); }, function (err) { invoke("throw", err, resolve, reject); }) : PromiseImpl.resolve(value).then(function (unwrapped) { result.value = unwrapped, resolve(result); }, function (error) { return invoke("throw", error, resolve, reject); }); } reject(record.arg); } var previousPromise; defineProperty(this, "_invoke", { value: function value(method, arg) { function callInvokeWithMethodAndArg() { return new PromiseImpl(function (resolve, reject) { invoke(method, arg, resolve, reject); }); } return previousPromise = previousPromise ? previousPromise.then(callInvokeWithMethodAndArg, callInvokeWithMethodAndArg) : callInvokeWithMethodAndArg(); } }); } function makeInvokeMethod(innerFn, self, context) { var state = "suspendedStart"; return function (method, arg) { if ("executing" === state) throw new Error("Generator is already running"); if ("completed" === state) { if ("throw" === method) throw arg; return doneResult(); } for (context.method = method, context.arg = arg;;) { var delegate = context.delegate; if (delegate) { var delegateResult = maybeInvokeDelegate(delegate, context); if (delegateResult) { if (delegateResult === ContinueSentinel) continue; return delegateResult; } } if ("next" === context.method) context.sent = context._sent = context.arg;else if ("throw" === context.method) { if ("suspendedStart" === state) throw state = "completed", context.arg; context.dispatchException(context.arg); } else "return" === context.method && context.abrupt("return", context.arg); state = "executing"; var record = tryCatch(innerFn, self, context); if ("normal" === record.type) { if (state = context.done ? "completed" : "suspendedYield", record.arg === ContinueSentinel) continue; return { value: record.arg, done: context.done }; } "throw" === record.type && (state = "completed", context.method = "throw", context.arg = record.arg); } }; } function maybeInvokeDelegate(delegate, context) { var methodName = context.method, method = delegate.iterator[methodName]; if (undefined === method) return context.delegate = null, "throw" === methodName && delegate.iterator["return"] && (context.method = "return", context.arg = undefined, maybeInvokeDelegate(delegate, context), "throw" === context.method) || "return" !== methodName && (context.method = "throw", context.arg = new TypeError("The iterator does not provide a '" + methodName + "' method")), ContinueSentinel; var record = tryCatch(method, delegate.iterator, context.arg); if ("throw" === record.type) return context.method = "throw", context.arg = record.arg, context.delegate = null, ContinueSentinel; var info = record.arg; return info ? info.done ? (context[delegate.resultName] = info.value, context.next = delegate.nextLoc, "return" !== context.method && (context.method = "next", context.arg = undefined), context.delegate = null, ContinueSentinel) : info : (context.method = "throw", context.arg = new TypeError("iterator result is not an object"), context.delegate = null, ContinueSentinel); } function pushTryEntry(locs) { var entry = { tryLoc: locs[0] }; 1 in locs && (entry.catchLoc = locs[1]), 2 in locs && (entry.finallyLoc = locs[2], entry.afterLoc = locs[3]), this.tryEntries.push(entry); } function resetTryEntry(entry) { var record = entry.completion || {}; record.type = "normal", delete record.arg, entry.completion = record; } function Context(tryLocsList) { this.tryEntries = [{ tryLoc: "root" }], tryLocsList.forEach(pushTryEntry, this), this.reset(!0); } function values(iterable) { if (iterable) { var iteratorMethod = iterable[iteratorSymbol]; if (iteratorMethod) return iteratorMethod.call(iterable); if ("function" == typeof iterable.next) return iterable; if (!isNaN(iterable.length)) { var i = -1, next = function next() { for (; ++i < iterable.length;) { if (hasOwn.call(iterable, i)) return next.value = iterable[i], next.done = !1, next; } return next.value = undefined, next.done = !0, next; }; return next.next = next; } } return { next: doneResult }; } function doneResult() { return { value: undefined, done: !0 }; } return GeneratorFunction.prototype = GeneratorFunctionPrototype, defineProperty(Gp, "constructor", { value: GeneratorFunctionPrototype, configurable: !0 }), defineProperty(GeneratorFunctionPrototype, "constructor", { value: GeneratorFunction, configurable: !0 }), GeneratorFunction.displayName = define(GeneratorFunctionPrototype, toStringTagSymbol, "GeneratorFunction"), exports.isGeneratorFunction = function (genFun) { var ctor = "function" == typeof genFun && genFun.constructor; return !!ctor && (ctor === GeneratorFunction || "GeneratorFunction" === (ctor.displayName || ctor.name)); }, exports.mark = function (genFun) { return Object.setPrototypeOf ? Object.setPrototypeOf(genFun, GeneratorFunctionPrototype) : (genFun.__proto__ = GeneratorFunctionPrototype, define(genFun, toStringTagSymbol, "GeneratorFunction")), genFun.prototype = Object.create(Gp), genFun; }, exports.awrap = function (arg) { return { __await: arg }; }, defineIteratorMethods(AsyncIterator.prototype), define(AsyncIterator.prototype, asyncIteratorSymbol, function () { return this; }), exports.AsyncIterator = AsyncIterator, exports.async = function (innerFn, outerFn, self, tryLocsList, PromiseImpl) { void 0 === PromiseImpl && (PromiseImpl = Promise); var iter = new AsyncIterator(wrap(innerFn, outerFn, self, tryLocsList), PromiseImpl); return exports.isGeneratorFunction(outerFn) ? iter : iter.next().then(function (result) { return result.done ? result.value : iter.next(); }); }, defineIteratorMethods(Gp), define(Gp, toStringTagSymbol, "Generator"), define(Gp, iteratorSymbol, function () { return this; }), define(Gp, "toString", function () { return "[object Generator]"; }), exports.keys = function (val) { var object = Object(val), keys = []; for (var key in object) { keys.push(key); } return keys.reverse(), function next() { for (; keys.length;) { var key = keys.pop(); if (key in object) return next.value = key, next.done = !1, next; } return next.done = !0, next; }; }, exports.values = values, Context.prototype = { constructor: Context, reset: function reset(skipTempReset) { if (this.prev = 0, this.next = 0, this.sent = this._sent = undefined, this.done = !1, this.delegate = null, this.method = "next", this.arg = undefined, this.tryEntries.forEach(resetTryEntry), !skipTempReset) for (var name in this) { "t" === name.charAt(0) && hasOwn.call(this, name) && !isNaN(+name.slice(1)) && (this[name] = undefined); } }, stop: function stop() { this.done = !0; var rootRecord = this.tryEntries[0].completion; if ("throw" === rootRecord.type) throw rootRecord.arg; return this.rval; }, dispatchException: function dispatchException(exception) { if (this.done) throw exception; var context = this; function handle(loc, caught) { return record.type = "throw", record.arg = exception, context.next = loc, caught && (context.method = "next", context.arg = undefined), !!caught; } for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i], record = entry.completion; if ("root" === entry.tryLoc) return handle("end"); if (entry.tryLoc <= this.prev) { var hasCatch = hasOwn.call(entry, "catchLoc"), hasFinally = hasOwn.call(entry, "finallyLoc"); if (hasCatch && hasFinally) { if (this.prev < entry.catchLoc) return handle(entry.catchLoc, !0); if (this.prev < entry.finallyLoc) return handle(entry.finallyLoc); } else if (hasCatch) { if (this.prev < entry.catchLoc) return handle(entry.catchLoc, !0); } else { if (!hasFinally) throw new Error("try statement without catch or finally"); if (this.prev < entry.finallyLoc) return handle(entry.finallyLoc); } } } }, abrupt: function abrupt(type, arg) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.tryLoc <= this.prev && hasOwn.call(entry, "finallyLoc") && this.prev < entry.finallyLoc) { var finallyEntry = entry; break; } } finallyEntry && ("break" === type || "continue" === type) && finallyEntry.tryLoc <= arg && arg <= finallyEntry.finallyLoc && (finallyEntry = null); var record = finallyEntry ? finallyEntry.completion : {}; return record.type = type, record.arg = arg, finallyEntry ? (this.method = "next", this.next = finallyEntry.finallyLoc, ContinueSentinel) : this.complete(record); }, complete: function complete(record, afterLoc) { if ("throw" === record.type) throw record.arg; return "break" === record.type || "continue" === record.type ? this.next = record.arg : "return" === record.type ? (this.rval = this.arg = record.arg, this.method = "return", this.next = "end") : "normal" === record.type && afterLoc && (this.next = afterLoc), ContinueSentinel; }, finish: function finish(finallyLoc) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.finallyLoc === finallyLoc) return this.complete(entry.completion, entry.afterLoc), resetTryEntry(entry), ContinueSentinel; } }, "catch": function _catch(tryLoc) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.tryLoc === tryLoc) { var record = entry.completion; if ("throw" === record.type) { var thrown = record.arg; resetTryEntry(entry); } return thrown; } } throw new Error("illegal catch attempt"); }, delegateYield: function delegateYield(iterable, resultName, nextLoc) { return this.delegate = { iterator: values(iterable), resultName: resultName, nextLoc: nextLoc }, "next" === this.method && (this.arg = undefined), ContinueSentinel; } }, exports; }
function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }
function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, _toPropertyKey(descriptor.key), descriptor); } }
function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function _toPropertyKey(arg) { var key = _toPrimitive(arg, "string"); return _typeof(key) === "symbol" ? key : String(key); }
function _toPrimitive(input, hint) { if (_typeof(input) !== "object" || input === null) return input; var prim = input[Symbol.toPrimitive]; if (prim !== undefined) { var res = prim.call(input, hint || "default"); if (_typeof(res) !== "object") return res; throw new TypeError("@@toPrimitive must return a primitive value."); } return (hint === "string" ? String : Number)(input); }
var EditorFuncs = /*#__PURE__*/function () {
  function EditorFuncs(textAreaClass) {
    _classCallCheck(this, EditorFuncs);
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
    value: function file() {
      this.startPositionInTextArea = this.textArea.selectionStart;
      document.querySelector(".editor-modal").classList.toggle("deactivated");
      document.querySelector(".upload-file").classList.toggle("deactivated");
      document.querySelector(".file-label").innerHTML = "Файл (.doc(x), .pdf, .xls(x), .txt), макс. размер 10Мб";
      document.querySelector(".file-title").style.display = "block";
      document.querySelector(".file-type").value = "doc";
    }
  }, {
    key: "image",
    value: function image() {
      this.startPositionInTextArea = this.textArea.selectionStart;
      document.querySelector(".editor-modal").classList.toggle("deactivated");
      document.querySelector(".upload-file").classList.toggle("deactivated");
      document.querySelector(".file-label").innerHTML = "Файл (.png, .jpeg, .jpg), макс. размер 10Мб";
      document.querySelector(".file-title").style.display = "none";
      document.querySelector(".file-type").value = "img";
    }
  }, {
    key: "uploadFile",
    value: function () {
      var _uploadFile = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee(formData) {
        return _regeneratorRuntime().wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                _context.next = 2;
                return this.axios.post(this.API + "/upload-file", formData, {
                  headers: {
                    token: this.token,
                    'Content-Type': 'multipart/form-data'
                  }
                });
              case 2:
                return _context.abrupt("return", _context.sent);
              case 3:
              case "end":
                return _context.stop();
            }
          }
        }, _callee, this);
      }));
      function uploadFile(_x) {
        return _uploadFile.apply(this, arguments);
      }
      return uploadFile;
    }()
  }, {
    key: "addEvents",
    value: function addEvents() {
      var _this = this;
      this.uploadFileForm.addEventListener("submit", function (event) {
        event.preventDefault();
        var formData = new FormData(_this.uploadFileForm);
        _this.uploadFile(formData).then(function (response) {
          if (response.data.result === 1) {
            if (!response.data.filename) {
              document.querySelector(".errors").innerHTML = "Ошибка сохранения";
            } else {
              var allText = _this.textArea.value;
              var type = document.querySelector(".file-type").value;
              var fileTag = "";
              if (type === "doc") {
                fileTag = "[DOCFILE:".concat(response.data.filename, ":").concat(response.data.filetitle, "]");
              } else if (type === "img") {
                fileTag = "[IMAGE:".concat(response.data.filename, "]");
              }
              _this.textArea.value = "".concat(allText.substring(0, _this.startPositionInTextArea)).concat(fileTag).concat(allText.substring(_this.startPositionInTextArea, allText.length));
              document.querySelector(".close-modal").click();
            }
          }
          if (response.data.errors) {
            document.querySelector(".errors").innerHTML = response.data.errors;
          }
        });
      });
      document.querySelector(".add-link").addEventListener("click", function () {
        var url = document.querySelector(".link-url").value;
        var anchor = document.querySelector(".link-anchor").value;
        if (url && anchor) {
          var allText = _this.textArea.value;
          var link = "<a href=\"".concat(url, "\">").concat(anchor, "</a>");
          _this.textArea.value = "".concat(allText.substring(0, _this.startPositionInTextArea)).concat(link).concat(allText.substring(_this.startPositionInTextArea, allText.length));
          // document.querySelector(".make-link").classList.toggle("deactivated");
          // document.querySelector(".editor-modal").classList.toggle("deactivated");
          // document.querySelector(".link-url").value = "";
          // document.querySelector(".link-anchor").value = "";
          document.querySelector(".close-modal").click();
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
        document.querySelector(".editor-modal").classList.toggle("deactivated");
        if (!document.querySelector(".make-link").classList.contains("deactivated")) {
          document.querySelector(".make-link").classList.toggle("deactivated");
        }
        if (!document.querySelector(".upload-file").classList.contains("deactivated")) {
          document.querySelector(".upload-file").classList.toggle("deactivated");
        }
        document.querySelector(".link-url").value = "";
        document.querySelector(".link-anchor").value = "";
        document.querySelector(".selected-file").value = "";
        document.querySelector(".errors").innerHTML = "";
        document.querySelector(".file-title").value = "";
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