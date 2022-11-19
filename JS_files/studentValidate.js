$(document).ready(function(){
    $('#studentForm').on('submit',function(event){
        event.preventDefault();
        var studentEmail = $('#studentEmail').val();
        var password = $('#password').val();
        console.log(studentEmail);
        console.log(password);
        $.getJSON('jsonStudentsEmails.php',function(data){
            for(var i =0;i<data.length;i++){
                var email = data[i].email;
                var pass = data[i].password;
                if(email === studentEmail){
                    if(pass === password){
                        $("#studentForm").unbind('submit').submit();
                    }
                    else{
                        alert("Incorrect password. Kindly enter the correct password !!");
                        console.log("incorrect password");
                    }
                    break;
                }
            }
        });
    })
})