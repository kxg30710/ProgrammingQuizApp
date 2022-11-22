$('#num').focusout(function(event) {
      
      var txt = $('#num').val();
     
      if (txt != "") {
        $.getJSON('getjson.php', function(data) {
          $('#result').empty()
          var count = 0;
          for (var i = 0; i < data.length; i++) {
           
            row = data[i];

            if(row.stud_id == txt) count = count + 1;
         
          if (count != 0) $('#result').empty().append("This Student ID is already inserted Please add new ID").css("color", "red");
          }
        })
      }
});

$('#email').focusout(function(event) {
  
  var txt = $('#email').val();
      console.log(txt);
      if (txt != "") {
        $.getJSON('getjson.php', function(data) {
          $('#result1').empty()
          var count = 0;
          for (var i = 0; i < data.length; i++) {
            row = data[i];
            if(row.email == (txt+"@ucmo.edu")) count = count + 1;
         
          if (count != 0) $('#result1').empty().append("This Email ID is already inserted Please add new Email ID").css("color", "red");
          }
        })
      }
});