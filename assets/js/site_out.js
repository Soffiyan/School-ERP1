$(function () {
    $('#upload_file').submit(function (e) {
        e.preventDefault();
        $.ajaxFileUpload({
            url: './upload_file_out/',
            secureuri: false,
            fileElementId: 'userfile',
            dataType: 'json',
            data: {
                'title': $('#title').val(),
                'doc_id': $('#doc_id').val(),
                'doc_remark': $('#doc_remark').val(),
                'user' : $('#user').val()
            },
            success: function (data, status)
            {
                if (data.status != 'error')
                {
                    $('#files').html('<p>Reloading files...</p>');
                    refresh_files();
                    $('#title').val('');
                }
                alert(data.msg);
            }
        });
        return false;
    });
});

$(document).ready(function () {
    refresh_files();
    $('.delete_file_link').live('click', function (e) {
        e.preventDefault();
        if (confirm('Are you sure you want to delete this file?'))
        {
            var link = $(this);
            $.ajax({
                url: './delete_file_out/' + link.data('file_id'),
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
                        refresh_files();
                        //alert(data.msg);
                    }
                }, error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("some error");
                }
            });
        }
    });
});

function refresh_files()
{
    var doc_id = $('#doc_id').val();
    //alert(doc_id);
    $.get('./files_out/' + doc_id)
            .success(function (data) {
                $('#files').html(data);
            });
}