$(document).ready(function() {
  // Obsługa zmiany wyboru w pierwszym polu select >>>TypeName<<<
  $('#typeName').on('change', function() {
    var selectedTypeName = $('#typeName option:selected').text();
    $('#selectedTypeName').val(selectedTypeName);
    var typeNameId = $(this).val();

    // Wyślij żądanie AJAX do kontrolera Laravel, aby pobrać opcje dla drugiego pola select Visit Name
    $.ajax({
      url: '/get/type/name/visit/' + typeNameId,
      type: 'GET',
      dataType: 'json',

      success: function(data) {
        // Wyczyść istniejące opcje w drugim polu select Visit Name
        $('#visitName').empty();

        // Dodaj stałą opcję "Wybierz wizytę" w Visit Name
        $('#visitName').append($('<option>', {
          value: '',
          text: 'Wybierz wizytę',
          selected: true,
          disabled: true
        }));

        // Dodaj nowe opcje na podstawie odpowiedzi AJAX Visit Name
        $.each(data, function(key, value) {
          $('#visitName').append($('<option>', {
            value: value,
            text: value,
            data: {
                id: key
            }
          }));
        });
      }
    });

    var selectedValue = $(this).val();
      if (selectedValue === '2' || selectedValue === '3') {
        // Jeśli wybrano "Firmowa" lub "Przedszkolna", pokaż dodatkowe pola
        $('#additionalFields').show();
      } else {
        // W przeciwnym razie ukryj dodatkowe pola
        $('#additionalFields').hide();
      }

      updateTable();
  });

  // Obsługa zmiany wyboru w drugim polu select >>>Visit Name<<<
  $('#visitName').on('change', function() {
    var selectedOption = $('#visitName option:selected');
    var visitNameId = selectedOption.data('id');

    // Wyślij żądanie AJAX, aby pobrać długość trwania i cenę na podstawie wyboru w drugim polu select w Visit Name
    $.ajax({
      url: '/get/data/visitname/' + visitNameId,
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        // Ustaw wartości pól input na podstawie odpowiedzi AJAX
        $('#lengthVisit').val(data.lengthVisit);
        $('#priceNet').val(data.priceNet);
        $('#priceGross').val(data.priceGross);
      }
    });

    updateTable();
  });

  // Obsługa zmiany ilości wizyt
  $('#visit_qty').on('change', function() {
    // Aktualizuj tabelę po zmianie ilości wizyt
    updateTable();
    });
  $('#driveFee').on('change', function() {
    // Aktualizuj tabelę po zmianie Opłaty dojazdowej
    updateTable();
    });

  function updateTable() {
    var selectedTypeName = $('#typeName option:selected').text();
    var selectedVisitName = $('#visitName option:selected').text();
    var lengthVisit = parseFloat($('#lengthVisit').val()); // Pobierz długość wizyty jako float
    var priceNet = parseFloat($('#priceNet').val()); // Pobierz cenę netto jako float
    var priceGross = parseFloat($('#priceGross').val()); // Pobierz cenę netto jako float
    var visitQty = parseInt($('#visit_qty').val()); // Pobierz ilość wizyt jako int
    var driveFee = parseFloat($('#driveFee').val());


    // Aktualizuj div z podsumowaniem
    $('#selectedTypeHeader').text(selectedTypeName +' '+ selectedVisitName);

    // Oblicz długość wizyty i cenę pomnożone przez ilość wizyt
    var totalLength = lengthVisit * visitQty;
    var totalVisitPriceNet = priceNet * visitQty;
    var totalVisitPriceGross = priceGross * visitQty;
    var totalDriveFeeNet = driveFee;
    var totalDriveFeeGross = driveFee;
    var totalPriceNet = priceNet * visitQty;
    var totalPriceGross = priceGross * visitQty;

    $('#lengthVisitCell').text(totalLength + " minut");
    $('#priceVisitNetCell').text(totalVisitPriceNet + " PLN");
    $('#priceVisitGrossCell').text(totalVisitPriceGross + " PLN");
    $('#priceDriveFeeCell').text(totalDriveFeeGross + " PLN");

    $('#totalPriceNetCell').text(totalPriceNet + " PLN");
    $('#totalPriceGrossCell').text(totalPriceGross + totalDriveFeeGross + " PLN");

    // Ustawienie wartości ukrytych pól
    $('#totalLengthInput').val(totalLength);
    $('#totalPriceNetInput').val(totalPriceNet);
    $('#totalPriceGrossInput').val(totalPriceGross);
}

  // Obsługa zmiany wyboru w pierwszym polu select VoivodeshipName
  $('#voivodeshipName').on('change', function() {
    var selectedVoivodeshipName = $('#voivodeshipName option:selected').text();
    $('#selectedVoivodeshipName').val(selectedVoivodeshipName);
    var voivodeshipNameId = $(this).val();

    // Wyślij żądanie AJAX do kontrolera Laravel, aby pobrać opcje dla drugiego pola select
    $.ajax({
      url: '/get/voivodeship/name/' + voivodeshipNameId,
      type: 'GET',
      dataType: 'json',

      success: function(data) {
        // Wyczyść istniejące opcje w drugim polu select
        $('#cityName').empty();

        // Dodaj stałą opcję "Wybierz wizytę"
        $('#cityName').append($('<option>', {
          value: '',
          text: 'Wybierz...',
          selected: true,
          disabled: true
        }));

        // Dodaj nowe opcje na podstawie odpowiedzi AJAX
        $.each(data, function(key, value) {
          $('#cityName').append($('<option>', {
            value: value,
            text: value,
            data: {
                id: key
            }
          }));
        });
      }
    });
  });

  // Obsługa zmiany wyboru w drugim polu select
  $('#cityName').on('change', function() {
    var selectedOption = $('#cityName option:selected');
    var cityNameId = selectedOption.data('id');
    // var visitNameId = $(this).val(); - stary KOD

    // Wyślij żądanie AJAX, aby pobrać długość trwania i cenę na podstawie wyboru w drugim polu select
    $.ajax({
      url: '/get/city/name/' + cityNameId,
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        // Wyczyść istniejące opcje w drugim polu select
        $('#districtName').empty();

        // Dodaj stałą opcję "Wybierz wizytę"
        $('#districtName').append($('<option>', {
          value: '',
          text: 'Wybierz...',
          selected: true,
          disabled: true
        }));

        // Dodaj nowe opcje na podstawie odpowiedzi AJAX
        $.each(data, function(key, value) {
          $('#districtName').append($('<option>', {
            value: value,
            text: value,
            data: {
                id: key
            }
          }));
        });
      }
    });
  });

  // Obsługa zmiany Switchera przy fakturze
  $('#invoiceSwitcher').on('change', function() {
    if ($(this).is(':checked')) {
        // Jeśli przełącznik jest zaznaczony, pokaż dodatkowe pola
        $('#additionalFieldsInvoice').show();
    } else {
        // W przeciwnym razie ukryj dodatkowe pola
        $('#additionalFieldsInvoice').hide();
    }
  });

  $('#cityName').on('change', function() {
    var selectedCity = $(this).val();

    if (selectedCity === 'Inne') {
      // Jeśli wybrano "okolice", pokaż pole wprowadzania miejscowości i ukryj pole wyboru dzielnicy
      $('#countiesField').show();
      $('#driveFeeField').show();
      $('#districtField').hide();
    } else {
      // W przeciwnym razie pokaż pole wyboru dzielnicy i ukryj pole wprowadzania miejscowości
      $('#countiesField').hide();
      $('#driveFeeField').hide();
      $('#districtField').show();

      // Tutaj można wykonać zapytanie AJAX, aby pobrać opcje dzielnic na podstawie wybranego miasta
      // Otrzymane dane umieść w polu select o id "districtName"
    }
});






});
