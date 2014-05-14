var numberofquestion = 0,
	wrongscore = 0,
	correctscore = 0,
	perc=0;
	endval=0;
var radioinfo = "";
var startDate = new Date('2010/11/11 08:00');
var endDate = new Date('2010/11/11 08:20');
var spantime = (endDate - startDate)/1000;


$(document).ready(function() {
		$("#submitOrder").click(function() {
			
				alert(parseInt($('#potatoQTY').val())*6.95);
			
		});
	});