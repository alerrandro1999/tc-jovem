(function ($) {
	//    "use strict";


	/*  Data Table
	-------------*/




	$('#bootstrap-data-table').DataTable({
		lengthMenu: [[10, 20, 50, -1], [10, 20, 50, "All"]],
	});



	$('#cadastro-table').DataTable({
		dom: 'lBfrtip',
		lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
		buttons: [
			{
				extend: 'excel',
				exportOptions: {
					columns: [0, 1, 2, 3, 4, 5] 
				}
			},
			{
				extend: 'print',
				exportOptions: {
					columns: [0, 1, 2, 3, 4, 5] 
				}
			}
		],
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/pt-BR.json"
		},
		"lengthChange": false
	});

	$('#row-select').DataTable({
		initComplete: function () {
			this.api().columns().every(function () {
				var column = this;
				var select = $('<select class="form-control"><option value=""></option></select>')
					.appendTo($(column.footer()).empty())
					.on('change', function () {
						var val = $.fn.dataTable.util.escapeRegex(
							$(this).val()
						);

						column
							.search(val ? '^' + val + '$' : '', true, false)
							.draw();
					});

				column.data().unique().sort().each(function (d, j) {
					select.append('<option value="' + d + '">' + d + '</option>')
				});
			});
		}
	});






})(jQuery);