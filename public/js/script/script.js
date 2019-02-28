var main = function() { //главная функция
click_event_ksk = false;
click_event_ra = false;
    $('.group-ksk').click(function () {
        if (click_event_ksk){
            $('.courses-ksk').css('top','-80%');
            click_event_ksk = false;
        }
        else {
            $('.courses-ksk').css('top' , '100%');
            click_event_ksk = true;
            click_event_ra = false;
            $('.courses-ra').css('top','-80%');
        }
    });

    $('.group-ra').click(function () {
        if (click_event_ra){
            $('.courses-ra').css('top','-80%');
            click_event_ra = false;
        }
        else {
            $('.courses-ra').css('top','100%');
            click_event_ra = true;
            click_event_ksk = false;
            $('.courses-ksk').css('top','-80%');
        }
    });

    };

$(document).on('click', function(e) {
    if (!$(e.target).closest(".group-ra ").length) {
        $('.courses-ra').css('top','-80%');
        click_event_ra = false;
    }
    if (!$(e.target).closest(".group-ksk ").length) {
        $('.courses-ksk').css('top','-80%');
        click_event_ksk = false;
    }
    e.stopPropagation();
});
$(document).ready(main);
