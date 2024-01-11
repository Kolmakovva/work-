function calculateDayNumber() {
    var dateInput = document.getElementById("date-input").value;
    var dateParts = dateInput.split(".");
    var day = parseInt(dateParts[0]);
    var month = parseInt(dateParts[1]);
    var year = parseInt(dateParts[2]);

    var daysInMonth = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    
    // Проверяем високосный год
    if (isLeapYear(year)) {
      daysInMonth[1] = 29;
    }

    var dayNumber = day;
    
    // Суммируем дни в предыдущих месяцах
    for (var i = 0; i < month - 1; i++) {
      dayNumber += daysInMonth[i];
    }

    document.getElementById("result").innerHTML = "Порядковый номер дня относительно начала года: " + dayNumber;
  }

  function isLeapYear(year) {
    return (year % 4 === 0 && year % 100 !== 0) || year % 400 === 0;
  }