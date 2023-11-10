$(function () {
    var linksTbale=$('#links-table');
    if(linksTbale.length){

        var deleteLinks=linksTbale.find('button.delete-link');
        deleteLinks.on('click',function (e) {



            var yes=confirm('آیا می خواهید حذف انجام شود');

       if(!yes){

           e.preventDefault();
       }


        });
    }
});



function addCommas(number_input)
{
    number_input += '';
    number_input = number_input.replace(',', ''); number_input = number_input.replace(',', ''); number_input = number_input.replace(',', '');
    number_input = number_input.replace(',', ''); number_input = number_input.replace(',', ''); number_input = number_input.replace(',', '');
    x = number_input.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');

    }
    return x1 + x2;
}






