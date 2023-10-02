$(document).ready( function () {
    var table = $('#example').DataTable({
      lengthChange: false,
      buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
    });
    table.buttons().container()
      .appendTo( '#example_wrapper .col-md-6:eq(0)' );

      let minDate, maxDate;

  // Custom filtering function which will search data in column four between two values
        DataTable.ext.search.push(function (settings, data, dataIndex) {
          let min = minDate.val();
          let max = maxDate.val();
          let date = new Date(data[3]);

          if (
            (min === null && max === null) ||
            (min === null && date <= max) ||
            (min <= date && max === null) ||
            (min <= date && date <= max)
          ) {
            return true;
          }
          return false;
        });

        // Create date inputs
        minDate = new DateTime('#min', {
          format: 'DD-MM-YYYY'
        });
        maxDate = new DateTime('#max', {
          format: 'DD-MM-YYYY'
        });

        // DataTables initialisation
        // let table = new DataTable('#example');

        // Refilter the table
        document.querySelectorAll('#min, #max').forEach((el) => {
          el.addEventListener('change', () => table.draw());
        });
    } );

    $.extend( $.fn.dataTable.defaults, {
      order: [[0, 'desc']],
      responsive: true,
      colReorder: true,
      keys: false,
      select: true,
    } );
