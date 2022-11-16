$(document).ready(function(){
    $('#error').hide();
    $('#email').keyup(function(){
        var userInput = $(this).val();
        console.log(userInput);
        $.getJSON('jsonStudentsEmails.php',function(data){
            var input = $('#email').val();
            for(var i = 0;i<data.length;i++){
                var email = data[i].email;
                console.log(email);
                if(input === email){
                    $('#error').hide();
                    break;
                }
                else{
                    $('#error').show();
                }
            }
        });
    });
})