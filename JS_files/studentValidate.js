$(document).ready(function(){
    $('#studentForm').on('submit',function(event){
        event.preventDefault();
        var student_id = $('#studentid').val();
        var password = $('#password').val();
        console.log(student_id);
        console.log(password);
        $.getJSON('jsonStudentsEmails.php',function(data){
            for(var i =0;i<data.length;i++){
                var id = data[i].stud_id;
                var pass = data[i].password;
                if(id === student_id){
                    if(pass === password){
                        $("#studentForm").unbind('submit').submit();
                    }
                    else{
                        alert("Incorrect student ID or  password. Kindly enter the correct details !!");
                        console.log("incorrect password");
                    }
                    break;
                }
            }
        });
    })
})