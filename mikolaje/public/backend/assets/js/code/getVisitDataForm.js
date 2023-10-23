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
      if (selectedValue === '1' || selectedValue === '3') {
        // Jeśli wybrano "Firmowa" lub "Przedszkolna", pokaż dodatkowe pola
        $('#additionalFields').show();
      } else {
        // W przeciwnym razie ukryj dodatkowe pola
        $('#additionalFields').hide();
      }
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
  });

  //For Visits Form ONLY
  // Obsługa zmiany wyboru w pierwszym polu select VoivodeshipName
//   $('#voivodeshipNameForVisits').on('change', function() {
//     var selectedVoivodeshipNameForVisits = $('#voivodeshipNameForVisits option:selected').text();
//     $('#selectedVoivodeshipNameForVisits').val(selectedVoivodeshipNameForVisits);
//     var voivodeshipNameId = $(this).val();

//     // Wyślij żądanie AJAX do kontrolera Laravel, aby pobrać opcje dla drugiego pola select
//     $.ajax({
//       url: '/get/voivodeship/name/forvisits/' + voivodeshipNameId,
//       type: 'GET',
//       dataType: 'json',

//       success: function(data) {
//         // Wyczyść istniejące opcje w drugim polu select
//         $('#cityName').empty();

//         // Dodaj stałą opcję "Wybierz wizytę"
//         $('#cityName').append($('<option>', {
//           value: '',
//           text: 'Wybierz...',
//           selected: true,
//           disabled: true
//         }));

//         // Dodaj nowe opcje na podstawie odpowiedzi AJAX
//         $.each(data, function(key, value) {
//           $('#cityName').append($('<option>', {
//             value: value,
//             text: value,
//             data: {
//                 id: key
//             }
//           }));
//         });
//       }
//     });
//   });
// End for visits Form ONLY

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

    if (selectedCity === 'okolice') {
      // Jeśli wybrano "okolice", pokaż pole wprowadzania miejscowości i ukryj pole wyboru dzielnicy
      $('#countiesField').show();
      $('#districtField').hide();
    } else {
      // W przeciwnym razie pokaż pole wyboru dzielnicy i ukryj pole wprowadzania miejscowości
      $('#countiesField').hide();
      $('#districtField').show();

      // Tutaj można wykonać zapytanie AJAX, aby pobrać opcje dzielnic na podstawie wybranego miasta
      // Otrzymane dane umieść w polu select o id "districtName"
    }
});






});
