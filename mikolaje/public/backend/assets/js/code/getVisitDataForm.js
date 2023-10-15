$(document).ready(function() {
  // Obsługa zmiany wyboru w pierwszym polu select
  $('#typeName').on('change', function() {
    var selectedTypeName = $('#typeName option:selected').text();
    $('#selectedTypeName').val(selectedTypeName);
    var typeNameId = $(this).val();

    // Wyślij żądanie AJAX do kontrolera Laravel, aby pobrać opcje dla drugiego pola select
    $.ajax({
      url: '/get/type/name/visit/' + typeNameId,
      type: 'GET',
      dataType: 'json',

      success: function(data) {
        // Wyczyść istniejące opcje w drugim polu select
        $('#visitName').empty();

        // Dodaj stałą opcję "Wybierz wizytę"
        $('#visitName').append($('<option>', {
          value: '',
          text: 'Wybierz wizytę',
          selected: true,
          disabled: true
        }));

        // Dodaj nowe opcje na podstawie odpowiedzi AJAX
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

  // Obsługa zmiany wyboru w drugim polu select
  $('#visitName').on('change', function() {
    var selectedOption = $('#visitName option:selected');
    var visitNameId = selectedOption.data('id');
    // var visitNameId = $(this).val(); - stary KOD

    // Wyślij żądanie AJAX, aby pobrać długość trwania i cenę na podstawie wyboru w drugim polu select
    $.ajax({
      url: '/get/data/visit/' + visitNameId,
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

});
