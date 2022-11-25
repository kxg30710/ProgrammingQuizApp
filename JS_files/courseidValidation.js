$('#course_id').focusout(function(event) {
     
    var txt = $('#course_id').val();
    
    if (txt != "") {
      $.getJSON('getjson_batch.php', function(data) {
        $('#result').empty()
        var count = 0;
        for (var i = 0; i < data.length; i++) {
         
          row = data[i];
          
          if(row.course_id == txt) count = count + 1;
       
        if (count != 0) $('#result').empty().append("This Course ID is already inserted Please add new ID").css("color", "red");
        }
      })
    }
});

$('#course_name').focusout(function(event) {

var txt = $('#course_name').val();
    console.log(txt);
    if (txt != "") {
      $.getJSON('getjson_batch.php', function(data) {
        $('#result1').empty()
        var count = 0;
        for (var i = 0; i < data.length; i++) {
          row = data[i];
          if(row.course_name == txt) count = count + 1;
       
        if (count != 0) $('#result1').empty().append("This course name is already inserted Please add new course name").css("color", "red");
        }
      })
    }
});