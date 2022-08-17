<?php
foreach ($isi as $i) :
	?>
	<script>
		$(document).ready(function () {
			// set text to select company logo
			$("#thumbnail").after("<span class='file_placeholder1'><?= $i['thumbnail'] ?></span>");
			// on change
			$('#thumbnail').change(function () {
				//  show file name
				if ($("#thumbnail").val().length > 0) {
					$(".file_placeholder1").empty();
					$('#thumbnail').removeClass('vendor_logo_hide1').addClass('vendor_logo1');
					console.log($("#thumbnail").val());
				} else {
					// show select company logo
					$('#thumbnail').removeClass('vendor_logo1').addClass('vendor_logo_hide1');
					$("#thumbnail").after("<span class='file_placeholder1'><?= $i['thumbnail'] ?></span>");
				}

			});

		});
	</script>
	<script>
		$(document).ready(function () {
			// set text to select company logo
			$("#header").after("<span class='file_placeholder2'><?= $i['header'] ?></span>");
			// on change
			$('#header').change(function () {
				//  show file name
				if ($("#header").val().length > 0) {
					$(".file_placeholder2").empty();
					$('#header').removeClass('vendor_logo_hide2').addClass('vendor_logo2');
					console.log($("#header").val());
				} else {
					// show select company logo
					$('#header').removeClass('vendor_logo2').addClass('vendor_logo_hide2');
					$("#header").after("<span class='file_placeholder2'><?= $i['header'] ?></span>");
				}

			});

		});
	</script>
	<script>
		$(document).ready(function () {
			// set text to select company logo
			$("#event1").after("<span class='file_placeholder3'><?= $i['event1'] ?></span>");
			// on change
			$('#event1').change(function () {
				//  show file name
				if ($("#event1").val().length > 0) {
					$(".file_placeholder3").empty();
					$('#event1').removeClass('vendor_logo_hide3').addClass('vendor_logo3');
					console.log($("#event1").val());
				} else {
					// show select company logo
					$('#event1').removeClass('vendor_logo3').addClass('vendor_logo_hide3');
					$("#event1").after("<span class='file_placeholder3'><?= $i['event1'] ?></span>");
				}

			});

		});
	</script>
	<script>
		$(document).ready(function () {
			// set text to select company logo
			$("#event2").after("<span class='file_placeholder4'><?= $i['event2'] ?></span>");
			// on change
			$('#event2').change(function () {
				//  show file name
				if ($("#event2").val().length > 0) {
					$(".file_placeholder4").empty();
					$('#event2').removeClass('vendor_logo_hide4').addClass('vendor_logo4');
					console.log($("#event2").val());
				} else {
					// show select company logo
					$('#event2').removeClass('vendor_logo4').addClass('vendor_logo_hide4');
					$("#event2").after("<span class='file_placeholder4'><?= $i['event2'] ?></span>");
				}

			});

		});
	</script>
	<script>
		$(document).ready(function () {
			// set text to select company logo
			$("#event3").after("<span class='file_placeholder5'><?= $i['event3'] ?></span>");
			// on change
			$('#event3').change(function () {
				//  show file name
				if ($("#event3").val().length > 0) {
					$(".file_placeholder5").empty();
					$('#event3').removeClass('vendor_logo_hide5').addClass('vendor_logo5');
					console.log($("#event3").val());
				} else {
					// show select company logo
					$('#event3').removeClass('vendor_logo5').addClass('vendor_logo_hide5');
					$("#event3").after("<span class='file_placeholder5'><?= $i['event3'] ?></span>");
				}

			});

		});
	</script>
<?php endforeach; ?>
