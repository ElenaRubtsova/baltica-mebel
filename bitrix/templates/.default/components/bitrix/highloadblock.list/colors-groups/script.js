/*function showPage() {
	var ot = getQ
}*/

$(document).ready(function() {

	// При клике на кнопку "Предыдущая"
	$('#prev-button').click(function () {
		var currentPage = parseInt($('#pagination-container').data('current-page'));
		if (currentPage > 1) {
			// Отправка AJAX-запроса на pagination_ajax.php с указанием предыдущей страницы
			$.ajax({
				url: '/pagination_ajax.php',
				type: 'POST',
				data: {page: currentPage - 1},
				success: function (result) {
					// Обновление контейнера с результатами
					$('#result-container').html(result);
					// Обновление текущей страницы в атрибуте "data-current-page"
					$('#pagination-container').data('current-page', currentPage - 1);
				}
			});
		}
	});

	// При клике на кнопку "Следующая"
	$('#next-button').click(function() {
		var currentPage = parseInt($('#pagination-container').data('current-page'));
		// Отправка AJAX-запроса на pagination_ajax.php с указанием следующей страницы
		$.ajax({
			url: '/pagination_ajax.php',
			type: 'POST',
			data: { page: currentPage + 1 },
			success: function(result) {
				// Обновление контейнера с результатами
				$('#result-container').html(result);
				// Обновление текущей страницы в атрибуте "data-current-page"
				$('#pagination-container').data('current-page', currentPage + 1);
			}
		});
	});

});