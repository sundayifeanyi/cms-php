tinymce.init({ selector: '#textarea' });

$( document ).ready(function() {
    $('#selectAll').click(function(event){
        if(this.checked){
            $('.checkboxes').each(function(){
                this.checked = true;
            });
        } else{
            $('.checkboxes').each(function(){
                this.checked = false;
            });
        }
        set
    });
  
});

$(function (){
    var div_box = "<div id='load-screen'><div id='loading'></div></div>";
    $('body').prepend(div_box);
    $('#load-screen').delay(700).fadeOut(600,function(){
        $(this).remove();
    });
 //$("body").prepend('div_box');
});
// $(function userSession(){
//     $.get("functions.php?usersonline=result",function(data){
//         $("#useronline").text(data);
//     }
// });
// setInterval (function() {
//     userSession();
// },500);