$(document).ready(function() {

// 1-й вариант
	// $('.file').click(function(){
		// var path_file_name = this.id;

		// $.ajax ({
			// url		: '../src/fload.php',
			// method	: 'GET',
			// success: function() {
				// window.location = '../src/fload.php?dir_f='+path_file_name;
			// }
		// });
	// });

	$('.view').click(function(){
		var path_file_name = $(this).parent().attr('full'),
			regVjsd = /default\.js/gi,
			regVjsi = /index\.js/gi,
			regVmyp = /my_sql\.php/gi,
			regVjsn = /\.json/gi;
			regVflp = /fload\.php/gi,
			regVfvp = /fview\.php/gi,
			regVstt = /templates\/struct\.php/gi;

		if (path_file_name.match(regVjsd)) {
			return false;
		}else if (path_file_name.match(regVjsi)) {
			return false;
		}else if (path_file_name.match(regVmyp)) {
			return false;
		}else if (path_file_name.match(regVjsn)) {
			return false;
		}else if (path_file_name.match(regVflp)) {
			return false;
		}else if (path_file_name.match(regVfvp)) {
			return false;
		}else if (path_file_name.match(regVstt)) {
			return false;
		}else {
			$.ajax ({
				url		: '../src/fview.php?dir_f='+path_file_name,
				method	: 'POST',
				success: function(msg) {
					$('.listing').html(msg);
					$('.listing').show();
					// console.log(msg);
				}
			});
		}
	});

	$('.download').click(function(){
		var path_file_name = $(this).parent().attr('full'),
			regVjsd = /default\.js/gi,
			regVjsi = /index\.js/gi,
			regVmyp = /my_sql\.php/gi,
			regVjsn = /\.json/gi;
			regVflp = /fload\.php/gi,
			regVfvp = /fview\.php/gi,
			regVstt = /templates\/struct\.php/gi;

		if (path_file_name.match(regVjsd)) {
			return false;
		}else if (path_file_name.match(regVjsi)) {
			return false;
		}else if (path_file_name.match(regVmyp)) {
			return false;
		}else if (path_file_name.match(regVjsn)) {
			return false;
		}else if (path_file_name.match(regVflp)) {
			return false;
		}else if (path_file_name.match(regVfvp)) {
			return false;
		}else if (path_file_name.match(regVstt)) {
			return false;
		}else {
			$.ajax ({
				url		: '../src/fload.php',
				method	: 'GET',
				success: function() {
					window.location = '../src/fload.php?dir_f='+path_file_name;
				}
			});
		}
	});

})