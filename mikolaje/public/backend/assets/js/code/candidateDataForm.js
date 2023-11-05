$(document).ready(function() {
    // Obsługa zmiany wyboru w pierwszym polu select >>>TypeName<<<
    $('#choosePartner').on('change', function() {
      var selectedNamePartner = $('#choosePartner option:selected').text();
      $('#selectedNamePartner').val(selectedNamePartner);
    });

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
    $('#cityName').on('change', function() {
        var selectedCity = $(this).val();

        if (selectedCity === 'Inne') {
          // Jeśli wybrano "okolice", pokaż pole wprowadzania miejscowości i ukryj pole wyboru dzielnicy
          $('#countiesField').show();
        } else {
          // W przeciwnym razie pokaż pole wyboru dzielnicy i ukryj pole wprowadzania miejscowości
          $('#countiesField').hide();

          // Tutaj można wykonać zapytanie AJAX, aby pobrać opcje dzielnic na podstawie wybranego miasta
          // Otrzymane dane umieść w polu select o id "districtName"
        }
    });

});
