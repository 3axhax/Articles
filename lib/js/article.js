function sentComment(id) {
    $.ajax({
        url: '/comment/add',
        type: 'POST',
        data: { name: $('#name').val(),
                email: $('#email').val(),
                comment: $('#comment').val(),
                id_article: id,
        },
        success: function (res) {
            if(!res) console.log('Error from /comment/add');
            errorReport = $.parseJSON(res);
            console.log(res);
            if (res == 'false') getComments(id);
            checkValidator(errorReport);
        },
        error: function () {
            console.log('Error!');
        }
    });
}

function checkValidator(errorReport) {
    if(errorReport.name)
    {
        $('#name-error').html(errorReport.name);
        $('#name-error').parent().addClass('has-error');
    }
    else
    {
        $('#name-error').html('');
        $('#name-error').parent().removeClass('has-error');
    }
    if(errorReport.email)
    {
        $('#email-error').html(errorReport.email);
        $('#email-error').parent().addClass('has-error');
    }
    else
    {
        $('#email-error').html('');
        $('#email-error').parent().removeClass('has-error');
    }
    if(errorReport.comment)
    {
        $('#comment-error').html(errorReport.comment);
        $('#comment-error').parent().addClass('has-error');
    }
    else
    {
        $('#comment-error').html('');
        $('#comment-error').parent().removeClass('has-error');
    }
}

function getComments(id) {
    $.ajax({
        url: '/comment/get',
        type: 'POST',
        data: { id_article: id },
        beforeSend: function () {
            $('#comment-list').html('Загрузка...');
        },
        success: function (res) {
            if(!res) console.log('Error from /comment/get');
            $('#comment-list').html(res);
        },
        error: function () {
            console.log('Error!');
        }
    });
}