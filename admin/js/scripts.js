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
    let div_box = "<div id='load-screen'><div id='loading'></div></div>";
    $('body').prepend(div_box);
    $('#load-screen').delay(700).fadeOut(600,function(){
        $(this).remove();
    });
    $('div_box').prependTo('body')
});

    