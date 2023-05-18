// Using the revealing module pattern
var MyDOMLibrary = (function () {
	// Private functions
	function changeClass(element, className) {
		element.className = className;
	}

	function getDataSets(element) {
		return element.dataset;
	}

	function injectElement(parent, tagName) {
		var newElement = document.createElement(tagName);
		parent.appendChild(newElement);
	}

	function makeRequest(url, callback) {
		var xhr = new XMLHttpRequest();
		xhr.open("GET", url, true);
		xhr.onload = function () {
			if (xhr.status >= 200 && xhr.status < 400) {
				callback(xhr.responseText);
			} else {
				console.error(
					"Error: " + xhr.statusText
				);
			}
		};
		xhr.onerror = function () {
			console.error("Request failed");
		};
		xhr.send();
	}

	function getRequest(url, callback) {
		makeRequest(url, callback);
	}

	function postRequest(url, data, callback) {
		var xhr = new XMLHttpRequest();
		xhr.open("POST", url, true);
		xhr.setRequestHeader("Content-Type", "application/json");
		xhr.onload = function () {
			if (xhr.status >= 200 && xhr.status < 400) {
				callback(xhr.responseText);
			} else {
				console.error(
					"Error: " + xhr.statusText
				);
			}
		};
		xhr.onerror = function () {
			console.error("Request failed");
		};
		xhr.send(JSON.stringify(data));
	}

	function getValue(element) {
		return element.value;
	}

	function setValue(element, value) {
		element.value = value;
	}

	return {
		changeClass: changeClass,
		getDataSets: getDataSets,
		injectElement: injectElement,
		getRequest: getRequest,
		postRequest: postRequest,
		getValue: getValue,
		setValue: setValue,
	};
})();

var element = document.getElementById("myElement");
MyDOMLibrary.changeClass(element, "updatedClass");

var dataSets = MyDOMLibrary.getDataSets(element);

var parentElement = document.getElementById("parentElement");
MyDOMLibrary.injectElement(parentElement, "div");

MyDOMLibrary.getRequest("https://yesno.wtf/api", function (response) {
	console.log(response);
});

MyDOMLibrary.postRequest(
	"https://api.example.com/submit",
	{ name: "John" },
	function (response) {
		console.log(response);
	}
);

var inputElement = document.getElementById("textInput");
console.log(MyDOMLibrary.getValue(inputElement));

var inputElement = document.getElementById("checkboxInput");
console.log(MyDOMLibrary.getValue(inputElement));

MyDOMLibrary.setValue(inputElement, "New value");
