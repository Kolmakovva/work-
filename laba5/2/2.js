function findProduct(arr, e) {
    var startIndex = -1;
    var endIndex = -1;

    // Находим индексы первого и последнего элементов, удовлетворяющих условию
    for (var i = 0; i < arr.length; i++) {
        if (Math.abs(arr[i] - e) <= 10 ** -5) {
            if (startIndex === -1) {
                startIndex = i;
            }
            endIndex = i;
        }
    }

    // Если нет элементов, удовлетворяющих условию, возвращаем null
    if (startIndex === -1 || endIndex === -1) {
        return null;
    }

    var product = 1;

    // Умножаем элементы массива между найденными индексами
    for (var j = startIndex + 1; j < endIndex; j++) {
        product *= arr[j];
    }

    return product;
}

var array = [1, 2, 3, 4, 5, 0.9999, 6, 7, 8, 9];
var e = 1;
var result = findProduct(array, e);
document.body.innerHTML = "Произведение элементов массива: " + result;