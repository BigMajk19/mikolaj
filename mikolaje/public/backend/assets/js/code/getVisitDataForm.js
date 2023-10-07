$(document).ready(function() {
  // Obsługa zmiany wyboru w pierwszym polu select
  $('#typeName').on('change', function() {
    var typeName = $(this).val();

    // Wyślij żądanie AJAX do kontrolera Laravel, aby pobrać opcje dla drugiego pola select
    $.ajax({
      url: '/get/type/name/visit/' + typeName,
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        // Wyczyść istniejące opcje w drugim polu select
        $('#visitName').empty();

        // Dodaj nowe opcje na podstawie odpowiedzi AJAX
        $.each(data, function(key, value) {
          $('#visitName').append($('<option>', {
            value: key,
            text: value
          }));
        });
      }
    });
  });

  // Obsługa zmiany wyboru w drugim polu select
  $('#visitName').on('change', function() {
    var visitName = $(this).val();

    // Wyślij żądanie AJAX, aby pobrać długość trwania i cenę na podstawie wyboru w drugim polu select
    $.ajax({
      url: '/get/data/visit/' + visitName,
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
});
