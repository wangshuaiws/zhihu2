 function show(sbutton) {
        if ($(sbutton).parent().next().css('display') == 'none') {
            var answer_id = $(sbutton).parent().next().children("div.form-group").children().children("input.answer_id").val();
            var type = $(sbutton).parent().next().children("div.form-group").children().children("input.answer_id").attr('name');
            if(type == 'answer') { type = 2; }   if(type == 'article') { type = 1; }
            $.ajax({
                url: '/api/comments',
                method: 'post',
                dataType: 'json',
                data: {answer_id: answer_id,type:type},
                success: function (data) {
                    if(data) {
                        $.each(data, function (n, value) {
                            // console.log(value.body);
                            var lbody = "<li class='list-group-item'>" + "<span class='badge'>" + value.updated_at + "</span><img class='avatar' src=" + value.avatar + "alt=''>"
                                + value.user_name + "<br>" + value.body + "</li>";
                            $(".list-group").append(lbody);
                        })
                    }
                }
            });
        } else {
            $(".list-group").empty();
        }
        $(sbutton).parent().next().toggle();
        //console.log($(sbutton).parent().parent().prev().prev().children("a:first-child").attr("href"));
    }

$('.main').on('click',function(e){
    let target = e.target;
    if(target.className.toLowerCase()==='btn btn-primary read') {
        if($(target).prev().height() == 90) {
            $(target).prev().css('height','auto');
            $(target).text('收起');
        } else {
            $(target).prev().css('height','90px');
            $(target).text('阅读全文');
        }

        //$(target).hide();
    }
})

function vote(votebutton,status){
    var type = $(votebutton).parent().parent().next().children("div.form-group").children().children("input.answer_id").attr('name');
    var answer_id = $(votebutton).parent().parent().next().children("div.form-group").children().children("input.answer_id").val();
    var now_id = $(votebutton).parent().prev().val();
    var is_agree;
    if(status == 'up') {
        is_agree = 1;

    }
    if(status == 'down') {
        is_agree = 0;
    }
    $.ajax({
        url: '/api/votes',
        method: 'post',
        dataType: 'json',
        data: {id: answer_id,is:is_agree,now_id:now_id,type:type},
        success: function (data) {
            $(votebutton).parent().find("span.votes_count").text(data.count);
        }
    });
}

function collections(cbutton){
    var answer_id = $(cbutton).parent().next().children("div.form-group").children().children("input.answer_id").val();
    var type = $(cbutton).parent().next().children("div.form-group").children().children("input.answer_id").attr('name');
    var now_id = $(cbutton).parent().children("input").val();
    $.ajax({
        url: '/api/collections',
        method: 'post',
        dataType: 'json',
        data: {id: answer_id,now_id:now_id,type:type},
        success: function (data) {
            $(cbutton).find("span").text(data.collections);
        }
    });
}

function delContent(dbutton){
    var content = $(dbutton).parent().parent();
    content.remove();
}
