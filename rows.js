$(document).ready(function(e){
    var html= '<br><div><form method="POST" action="" class="input-container"><div class="box-1"><input type="text" name="electronics" id="childelectronics" placeholder="Enter Name of Electronics"></div><div class="box-2"><input type="number" name="power" id="childpower" placeholder="Enter Amount in Watts"></div><div class="box-3"><input type="number" name="hours" id="childhours" placeholder="Enter No. of Hours"></div><div class="box-5"><a href="#" id="remove"><i class="fas fa-minus-circle fa-2x"></i></a></div></form></div>'
    ;

    var maxRows = 4;

    var x = 1;


    $("#add").click(function(e){
        if(x <= maxRows) {
            $(".js-container").append(html);
            x++;
        }
        
    });

    $(".js-container").on('click','#remove',function(e){

        $(this).parent('div').remove() ;
    });


});