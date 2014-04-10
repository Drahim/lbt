//HELPER FUNCTIONS

//EOF HELPER FUNCTIONS

$('[data-toggle=offcanvas]').click(function() {
    $("#navtog").toggleClass('visible-xs text-center').find('i').toggleClass('glyphicon-chevron-right glyphicon-chevron-left');
    $('.row-offcanvas').toggleClass('active');
    $('#lg-menu').toggleClass('hidden-xs').toggleClass('visible-xs');
    $('#xs-menu').toggleClass('visible-xs').toggleClass('hidden-xs');
    $('#btnShow').toggle();
});


$('[data-toggle=offcanvasuser]').click(function() {
    $("#navtog").toggleClass('visible-xs text-center').find('i').toggleClass('glyphicon-chevron-right glyphicon-chevron-left');
    $('.row-offcanvas').toggleClass('active');
    $('#lg-menu').toggleClass('hidden-xs').toggleClass('visible-xs');
    $('#xs-menu').toggleClass('visible-xs').toggleClass('hidden-xs');
    $('#btnShow').toggle();
});

/* modal popup for login */
$('.login').click(function(){
    $('#myModal').modal({show:true})
    $("#logininfo").removeClass("hidden");
    $("#loginfail").addClass("hidden");
    $("#loginsuccess").addClass("hidden");
    var $form = $("#loginform");
    $form.find("input[name='username']").val('');
    $form.find("input[name='password']").val('');
});

/* LOGIN FORM FUNCTIONALITY */
$("#usrlogin").click(function(e) {
    // Get some values from elements on the page:
    var $form = $("#loginform"),
        uname = $form.find("input[name='username']").val(),
        upassword = $form.find("input[name='password']").val(),
        url = $form.attr("action");
    // Send the data using post
    var posting = $.post(url, {username: uname, password: upassword});

    posting.done(function(data) {
       if(data == "fail"){
           $("#logininfo").toggleClass("hidden");
           $("#loginfail").toggleClass("hidden");
       } else {
           $("#logininfo").toggleClass("hidden");
           $("#loginsuccess").toggleClass("hidden");
       }
    });
});


$("#penaltylist").ready(function() {
    var penalties = $.post("assets/pages/backend/penaltiesconf.php", "json");
    var penaltyHTML = "";
    var tmp = "";
    penalties.done(function(data) {
        for (penalty in data) {
            tmp = "";

//            CHANGE FORMATTING OF TEXTS
              var penaltyCost = data[penalty].cost.replace(".", ",")
            tmp = ('<div class="row borderbottom" id="penalty'+ data[penalty].id +'">' +
                    '<div class="col-lg-6">' +
                        '<div class="input-group">' +
                            '<span class="input-group-btn">' +
                                '<button class="btn btn-primary" type="button" disabled>' +
                                    '<i class="glyphicon glyphicon-minus"></i>' +
                                '</button>' +
                                '<button class="btn btn-primary" type="button" disabled>' +
                                    '<i class="glyphicon glyphicon-plus"></i>' +
                                '</button>' +
                            '</span>' +
                            '<input type="text" class="form-control" value="'+ data[penalty].penalty +'" disabled>' +
                        '</div>' +
                    '</div>' +
                    '<div class="col-lg-6">' +
                        '<div class="input-group">' +
                            '<span class="input-group-addon"><i class="glyphicon glyphicon-euro"></i></span>' +
                            '<input type="text" class="form-control" value="'+ penaltyCost +'" disabled>' +
                            '<span class="input-group-addon">' +
                                '<label for="penaltyTeam'+ data[penalty].id +'">Team&nbsp;&nbsp;</label>' +
                                '<input type="checkbox" name="penaltyTeam'+ data[penalty].id +'" value="'+ data[penalty].team +'" disabled>' +
                            '</span>' +
                            '<span class="input-group-btn">' +
                            '<button class="btn btn-danger" type="button" disabled>' +
                                '<i class="glyphicon glyphicon-remove"></i>' +
                            '</button>' +
                            '</span>' +
                        '</div>' +
                    '</div>' +
                '</div>');
            penaltyHTML += tmp;
        }
//        $("#penaltybody").html(penaltyHTML);
        $('#replace_penalties').replaceWith(penaltyHTML);
    });
});