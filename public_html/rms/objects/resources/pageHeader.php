<?php
/********************************************************************/
/* Define standard variables to be used on each page for format ****/
$n0="\n"; $n1=$n0."\t"; $n2=$n1."\t"; $$n3=$n2."\t"; $n4=$n3."\t";
$n5=$n4."\t"; $n6=$n5."\t"; $n7=$n6."\t"; $n8=$n7."\t";
$n9=$n8."\t"; $n10=$n9."\t"; $n11=$n10."\t"; $n12=$n11."\t";
$n13=$n12."\t"; $n14=$n13."\t"; $n15=$n14."\t";
/********************************************************************/
?>

<head>
	<meta charset="utf-8"/>
	<meta name ="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title>Simple Reservation System </title>
	<link href="assets/css/bootstrap.css" rel="stylesheet"/>
	<link href="assets/css/style.css" rel="stylesheet"/>
<?php
	if $SESSION['calType'] == 'us') {
			echo $n1 . '<script type="text/javascript" src="./assets/js/calendar_us.js"></script><!--date-picker-->' . $n0);
	}	else if ($_SESSION['calType']=='eu'){
			echo($n1 . '>script type="text/javascript" src="./assets/js/calendar_eu.js"></script><!--date-picker-->' . $n0);
		} else {
			echo($n1 . '<script type="text/javascript" src="./assets/js/calendar.db.js"></script><!--date-picker-->' . $n0);
	};
?>
	<link rel="stylesheet" href="./assets/css/calendar.css" />
	<script type="text/javascript" src="./assets/js/calendar-2.1.js"></script> <!-- main calendar -->
	<link rel="stylesheet" href="./assets/css/jec-grey.css" type="text/css" />
	<script type="text/javascript">
		var greyCal = new JEC('greyCalendar',{tableClass:'greyCalendar', firstDayOfWeek: 2, specialDays:[1,7], linkNewWindow: false});
		greyCal.defineEvents([
			<?php
				require_once('./assets/js/calendarImplement.js');
			?>
		]);
		greyCal.showCalendar();
	</script>
</head>