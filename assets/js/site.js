//////////New Ajax
$(function () {
    upload_files();
    $('#myform').on('submit', function (e) {

        // prevent native form submission here
        e.preventDefault();
        // now do whatever you want here
        var form = $('#myform')[0];
        var data = new FormData(form);
        $.ajax({
            type: $(this).attr('method'), // <-- get method of form
            url: $(this).attr('action'), // <-- get action of form
            data: data, // <-- serialize all fields into a string that is ready to be posted to your PHP file
            dataType: 'JSON',
            enctype: 'multipart/form-data',
            processData: false, // Important!
            contentType: false,
            cache: false,
            success: function (data, status) {
                if (data.status != 'error')
                {
                    $('#files').html('<p>Reloading files...</p>');
                    upload_files();
                    $('#title').val('');
                }
                alert(data.msg);

            }, error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert("some error");
            }
        });
    });
});


function upload_files()
{
    var doc_id = $('#doc_id').val();

    /*$.get('./files/' + doc_id)
     .success(function (data) {
     
     $('#files').html(data);
     
     });*/
    $.get('./files/' + doc_id, function (data, status) {
        $('#files').html(data);
    });
}

$(function () {
    $(document).on('click', '.delete_file_link', function (e) {
        e.preventDefault();
        if (confirm('Are you sure you want to delete this file?'))
        {
            var link = $(this);
            $.ajax({
                url: './delete_file/' + link.data('file_id'),
                secureuri: false,
                dataType: 'html',
                success: function (data, status)
                {
                    var files = $('#files');
                    if (data.status === "success")
                    {
                        link.parents('li').fadeOut('fast', function () {
                            $(this).remove();
                            if (files.find('li').length == 0)
                            {
                                files.html('<p>No Files Uploaded</p>');
                            }
                        });
                        //alert('tessdg');
                    } else
                    {
                        upload_files();
                        //alert(data.msg);
                    }
                }, error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("some error");
                }
            });
        }
    });
});