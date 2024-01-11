function isGeometricProgression(num) {
    let numStr = num.toString();
    for (let j = 0; j < numStr.length - 2; j++) {
        if (parseInt(numStr[j + 1]) / parseInt(numStr[j]) !== parseInt(numStr[j + 2]) / parseInt(numStr[j + 1])) {
            return false;
        }
    }
    return true;
}

let numbers = [123, 256, 345, 1024, 729, 2];
let result = numbers.filter(num => !isGeometricProgression(Math.abs(num)));

let outputDiv = document.getElementById('output');
outputDiv.innerHTML = "Исходный массив: " + numbers + "<br>";
outputDiv.innerHTML += "Результат: " + result + "<br>";