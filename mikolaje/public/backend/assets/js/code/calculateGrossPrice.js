function calculateGross() {
  // Pobierz wartość wprowadzoną w polu cena netto
  var netInput = document.getElementById("netInput");
  var netValue = parseFloat(netInput.value);

  // Sprawdź, czy wartość jest liczbą
  if (!isNaN(netValue)) {
    // Oblicz cenę brutto (netto * 1.23) i umieść ją w polu cena brutto
    var grossValue = netValue * 1.23;
    var grossInput = document.getElementById("grossInput");
    grossInput.value = grossValue.toFixed(2); // Zaokrąglenie do dwóch miejsc po przecinku
  } else {
    // Jeśli wprowadzona wartość nie jest liczbą, wyczyść pole cena brutto
    var grossInput = document.getElementById("grossInput");
    grossInput.value = "";
  }
}

function calculateNet() {
    // Pobierz wartość wprowadzoną w polu cena netto
    var grossInput = document.getElementById("grossInput");
    var grossValue = parseFloat(grossInput.value);

    // Sprawdź, czy wartość jest liczbą
    if (!isNaN(grossValue)) {
      // Oblicz cenę brutto (netto * 1.23) i umieść ją w polu cena brutto
      var netValue = grossValue / 1.23;
      var netInput = document.getElementById("netInput");
      netInput.value = netValue.toFixed(2); // Zaokrąglenie do dwóch miejsc po przecinku
    } else {
      // Jeśli wprowadzona wartość nie jest liczbą, wyczyść pole cena brutto
      var netInput = document.getElementById("netInput");
      netInput.value = "";
    }
  }
