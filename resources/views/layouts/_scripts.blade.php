<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

<!-- jquery -->
<script src="{{ asset('jquery/jquery-3.2.1.min.js') }}" crossorigin="anonymous"></script>

<!-- jquery ui -->
<script src="{{ asset('jquery/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}" crossorigin="anonymous"></script>

<!-- popper -->
<script src="{{ asset('jquery/popper.min.js') }}" crossorigin="anonymous"></script>

<!--bootstrap javascript-->
<script src="{{ asset('bootstrap/bootstrap-4.0.0-beta.2-dist/js/bootstrap.min.js') }}" crossorigin="anonymous"></script>

<script>
// button go to top
	// When the user scrolls down 100px from the top of the document, show the button
	window.onscroll = function() {scrollFunction()};
	function scrollFunction() {
		if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
			document.getElementById("btnGoToTop").style.display = "block";
		} else {
			document.getElementById("btnGoToTop").style.display = "none";
		}
	}
	// When the user clicks on the button, scroll to the top of the document
	function topFunction() {
		document.body.scrollTop = 0; // For Chrome, Safari and Opera 
		document.documentElement.scrollTop = 0; // For IE and Firefox
	}

// sidenav
	/* Set the width of the side navigation to 250px */
	function openNav() {
		document.getElementById("mySidenav").style.width = "250px";
		document.getElementById("mySidenav").style.opacity = "1";
	}
	// side navbar background
	function openNavBG() {
		document.getElementById("mySidenavBG").style.width = "100%";
		document.getElementById("mySidenavBG").style.opacity = "0.5";
	}

	/* Set the width of the side navigation to 0 */
	function closeNav() {
		document.getElementById("mySidenav").style.width = "0%";
		document.getElementById("mySidenav").style.opacity = "0";
		// document.body.style.backgroundColor = "white";
		document.getElementById("mySidenavBG").style.width = "0%";
		document.getElementById("mySidenavBG").style.opacity = "0";
	}

// form input datepicker
	$(function() {
		$("#datepicker").datepicker({
			dateFormat: 'dd/mm/yy',
			changeMonth: true,
			changeYear: true
		});
	});
	// form input datepickeryear
	$(function() {
		$("#datepickeryear").datepicker({
			dateFormat: 'yy',
			changeYear: true,
			showButtonPanel: true,
			onClose: function(dateText, inst) {
				$(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
				$(".ui-datepicker-calendar").hide();
				$(".ui-datepicker-month").hide();
				$(".ui-datepicker-prev").hide();
				$(".ui-datepicker-next").hide();
			}
		});
		// 
		$("#datepickeryear").focus(function() {
			$(".ui-datepicker-calendar").hide();
			$(".ui-datepicker-month").hide();
			$(".ui-datepicker-prev").hide();
			$(".ui-datepicker-next").hide();
			// $(".ui-datepicker-calendar").css('display', 'none');
			// $("<style type='text/css'>.ui-datepicker-calendar { display: none; } </style>").appendTo("head");
			$("#ui-datepicker-div").position( {
				my: "left top",
				at: "left bottom",
				of: $(this)
			});
		});
	});

// menghitung detail nilai
	function startCalc() {
		interval = setInterval("calc()", 1);
	}
	function calc() {
		document.autoSumForm.nilai_akhir.value = 0;

		ntug = document.autoSumForm.nilai_tugas.value;
		nula = document.autoSumForm.nilai_ulangan.value;
		nuts = document.autoSumForm.nilai_uts.value;
		nuas = document.autoSumForm.nilai_uas.value;

		hasil1 = ((ntug*1) + (nula*1) + (nuts*1) + (nuas*1)) / 4;
		hasil2 = hasil1.toFixed(2);

		document.autoSumForm.nilai_akhir.value = hasil2;
	}
	function stopCalc() {
		clearInterval(interval);
	}
</script>