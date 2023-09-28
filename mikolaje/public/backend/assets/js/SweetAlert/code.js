$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");


                  Swal.fire({
                    title: 'Czy napewno chcesz usunąć wizytę?',
                    text: "Ta operacja usunie dane bezpowrotnie.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
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
    $(document).on('click','#cancel',function(e){
        e.preventDefault();
        var link = $(this).attr("href");


                  Swal.fire({
                    title: 'Potwierdź anulowanie wizyty.',
                    text: "Czy napewno chcesz anulować wizytę?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
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


  $(function(){
    $(document).on('click','#reserve_to_new',function(e){
        e.preventDefault();
        var link = $(this).attr("href");


                  Swal.fire({
                    title: 'Zmiana statusu wizyty',
                    text: "Czy napewno chcesz zmienić status wizyty z \"Lista Rezerwowa\" na \"Nowa Wizyta\"?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
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
    $(document).on('click','#deleteCandidate',function(e){
        e.preventDefault();
        var link = $(this).attr("href");


                  Swal.fire({
                    title: 'Czy napewno chcesz usunąć Kandydata?',
                    text: "Ta operacja usunie dane bezpowrotnie.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
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
