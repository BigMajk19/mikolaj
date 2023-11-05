$(document).ready( function () {
    var table = $('#example').DataTable({
    //   lengthChange: false,
      dom: 'Bfrtip',
      select: true,
      buttons: [
        // {
        //   extend:'excel',
        //   className: 'fred'
        // },
        // {
        //   extend:'pdf',
        //   className: 'fred'
        // },
        {
          extend:'colvis',
          text: 'Ukryj kolumny',
          className: 'fred'
        },
        {
          extend:'pageLength',
          text: 'Pokaż',
          className: 'fred'
        },
      ],

    });
  });

    $.extend( $.fn.dataTable.defaults, {
      order: [[0, 'desc']],
      responsive: true,
      colReorder: true,
      keys: false,
      select: false,
    });
