$(document).ready(function(){
    $("#date").datepicker({
      format: 'DD dd/mm/yyyy',
      language: 'nb',
      todayHighlight: true,
    }).datepicker("setDate", new Date()); 

    var date_input=$('div[name="date"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
      format: 'DD DD/MM/YYYY',
      container: container,
      todayHighlight: true,
      autoclose: true,
      language: 'nb',
      setDate: new Date(),
    });

    $('.next-day').on("click", function () {
      var date = $('#date').datepicker('getDate');
      date.setTime(date.getTime() + (1000*60*60*24))
        $('#date').datepicker("setDate", date);
    });

    $('.prev-day').on("click", function () {
      var date = $('#date').datepicker('getDate');
      date.setTime(date.getTime() - (1000*60*60*24))
        $('#date').datepicker("setDate", date);
    });    
  });