function processString() {
    let inputString = document.getElementById('inputString').value;
    let processedString = inputString.replace(/\s+/g, ' ');
    let outputDiv = document.getElementById('output');
    outputDiv.innerHTML = "Результат: " + processedString;
}