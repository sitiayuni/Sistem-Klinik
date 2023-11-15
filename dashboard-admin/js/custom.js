// =============  Data Table - (Start) ================= //

$(document).ready(function () {
  var table = $("#myExample").DataTable({
    dom: "Bfrtip",
    buttons: [
      {
        extend: "pdf",
        text: "Cetak",
        filename: "Laporan Administrasi SiAku",
      },
    ],
  });

  table.buttons().container().appendTo(".button-header");
});

// =============  Data Table - (End) ================= //
