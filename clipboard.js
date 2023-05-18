function copyToClipboard() {
  const tempInput = document.createElement('input');

  // Setting its value to the text content of the span element
  const spanText = document.getElementById('mySpan').textContent;
  tempInput.value = spanText;

  // Append the input element to the DOM
  document.body.appendChild(tempInput);

  // Select the text inside the input element
  tempInput.select();
  // For mobile devices
  tempInput.setSelectionRange(0, 99999);

  // Copy the selected text to the clipboard
  document.execCommand('copy');

  // Remove the temporary input element from the DOM
  document.body.removeChild(tempInput);

  // Alert the user that the text has been copied
  alert('Text copied to clipboard!');
}

function updateSpan(value) {
  // Update the text content of the span element
  document.getElementById('two-way-demo').textContent = value;
}
