//Deleting
  $(function(){
    $(document).on('click','#delete',function(e){
      e.preventDefault();
      var link = $(this).attr("href");
      Swal.fire({
        title: 'Czy napewno chcesz usunąć wizytę?',
        text: "Ta operacja usunie dane bezpowrotnie.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#34b825',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Tak, usuń!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = link
          Swal.fire(
            'Usunięto!',
            'Wizyta została usunięta bezpowrotnie',
            'success'
          )
        }
      })
    });
  });

  $(function(){
    $(document).on('click','#deleteCandidate',function(e){
      e.preventDefault();
      var link = $(this).attr("href");
      Swal.fire({
        title: 'Czy napewno chcesz usunąć Kandydata?',
        text: "Ta operacja usunie dane bezpowrotnie.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#34b825',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Tak, usuń!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = link
          Swal.fire(
            'Usunięto!',
            'Kandydat został usunięty z bazy bezpowrotnie',
            'success'
          )
        }
      })
    });
  });

  $(function(){
    $(document).on('click','#deleteVoivodeship',function(e){
      e.preventDefault();
      var link = $(this).attr("href");
      Swal.fire({
        title: 'Usuńąć województwo?',
        text: "Czy napewno chcesz usunąć województwo?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#34b825',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Tak, potwierdż!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = link
          Swal.fire(
            'Potwierdzono aktywację!',
            'Aktywacja Partnera przebiegła pomyślnie!',
            'success'
          )
        }
      })
    });
  });

  $(function(){
    $(document).on('click','#deleteCity',function(e){
      e.preventDefault();
      var link = $(this).attr("href");
      Swal.fire({
        title: 'Usunąć miasto?',
        text: "Czy napewno chcesz usunąć miasto?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#34b825',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Tak, potwierdż!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = link
          Swal.fire(
            'Potwierdzono aktywację!',
            'Aktywacja Partnera przebiegła pomyślnie!',
            'success'
          )
        }
      })
    });
  });

  $(function(){
    $(document).on('click','#cancel',function(e){
      e.preventDefault();
      var link = $(this).attr("href");
      Swal.fire({
        title: 'Potwierdź anulowanie wizyty.',
        text: "Czy napewno chcesz anulować wizytę?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#34b825',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Tak, anuluj!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = link
          Swal.fire(
            'Anulowano!',
            'Wizyta została anulowana!'
          )
        }
      })
    });
  });

// Confirmations

  $(function(){
    $(document).on('click','#reserve_to_new',function(e){
      e.preventDefault();
      var link = $(this).attr("href");
      Swal.fire({
        title: 'Zmiana statusu wizyty',
        text: "Czy napewno chcesz zmienić status wizyty z \"Lista Rezerwowa\" na \"Nowa Wizyta\"?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#34b825',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Tak, potwierdź!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = link
          Swal.fire(
            'Zmieniono status!',
            'Status wizyty został zmieniony na \"Nowa wizyta\"!'
          )
        }
      })
    });
  });

  $(function(){
    $(document).on('click','#confirm',function(e){
      e.preventDefault();
      var link = $(this).attr("href");
      Swal.fire({
        title: 'Potwierdzić zgłoszenie?',
        text: "Czy napewno chcesz potwierdzić zgłoszenie wizyty?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#34b825',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Tak, potwierdż!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = link
          Swal.fire(
            'Potwierdzono!',
            'Wizyta została potwierdzona!',
            'success'
          )
        }
      })
    });
  });

  $(function(){
    $(document).on('click','#paid',function(e){
      e.preventDefault();
      var link = $(this).attr("href");
      Swal.fire({
        title: 'Potwierdzić opłatę Zgłoszenia?',
        text: "Czy napewno chcesz potwierdzić, że wizyta została opłacona?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#34b825',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Tak, potwierdż!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = link
          Swal.fire(
            'Potwierdzono opłatę!',
            'Wizyta została opłacona!',
            'success'
          )
        }
      })
    });
  });

  $(function(){
    $(document).on('click','#activatePartner',function(e){
      e.preventDefault();
      var link = $(this).attr("href");
      Swal.fire({
        title: 'Aktywować Partnera?',
        text: "Czy napewno chcesz potwierdzić i aktywować nowego Partnera?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#34b825',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Tak, potwierdż!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = link
          Swal.fire(
            'Potwierdzono aktywację!',
            'Aktywacja Partnera przebiegła pomyślnie!',
            'success'
          )
        }
      })
    });
  });
