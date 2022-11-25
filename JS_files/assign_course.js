var openBtn = document.getElementsByName('assignsdfsdf');
var hiddeninput = document.getElementsByName('assign_course');
//console.log(hiddeninput[0].value);
if(openBtn){
    for(var i=0; i<openBtn.length;i++){
        
        openBtn[i].addEventListener('click',function(hiddeninput){
           // var id = hiddeninput[i].value;
            var left=(screen.width - 200)/2;
            var top=(screen.height - 200)/4;
          console.log(hiddeninput[i].value);
            window.open('assign_course.php','assigncourse', 'location=no,menubar=no,width=300,height=300,left='+left+',top='+top)
        })
    }

}

