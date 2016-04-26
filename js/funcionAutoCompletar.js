$(function(){
			  var patentes = [ 

			   {value: "ooo 999" , data: " 2016-04-13 12:26:00 " }, 
 {value: "yyy 888" , data: " 2016-04-13 12:26:52 " }, 
 {value: "hhh123" , data: " 2016-04-13 13:10:45 " }, 
 {value: "tre456" , data: " 2016-04-13 13:13:07 " }, 
 {value: "ooo999" , data: " 2016-04-13 13:26:11 " }, 

			   
			  ];
			  
			  // setup autocomplete function pulling from patentes[] array
			  $('#autocomplete').autocomplete({
			    lookup: patentes,
			    onSelect: function (suggestion) {
			      var thehtml = '<strong>patente: </strong> ' + suggestion.value + ' <br> <strong>ingreso: </strong> ' + suggestion.data;
			      $('#outputcontent').html(thehtml);
			         $('#botonIngreso').css('display','none');
      						console.log('aca llego');
			    }
			  });
			  

			});