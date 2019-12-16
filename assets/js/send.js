
var base_url = $('meta[name="base_url"]').attr('content');

// $('body').ready(function(){
//     CKEDITOR.replace('konten');
// })

$(function () {
    $('#konten').summernote({
        height: 400
    })
})

$("#btn_kirim").on('click', function(){
    var emails = $('#emails');
    var email = emails.val().split('\n');
    var subject_ = $('#subject');
    var konten = $('#konten');
    var log = $('#log');
    var value_ = 0;
    var success = 0;
    var fail = 0;
    log.append("Starting . . .\n");
    emails.attr("disabled", true);
    subject_.attr("disabled", true);
    konten.attr("disabled", true);
    $('#konten').summernote('disable');
    $('#proses').attr('style', "width:" + Math.floor(value_) + "%");
    $("#proses").html(value_ + " %");
    $('#btn_kirim').html('Sending . . .');
    $("#btn_kirim").attr("disabled", true);
    email.forEach(data_ => {
        if (data_.trim() != null || data_.trim() != '' || data_ != '\n') {
            $.ajax({
                url: base_url + "send/email",
                type: "POST",
                data: {
                    email: data_,
                    subject: subject_.val(),
                    konten: konten.val()
                },
                success: function (result) {
                    console.log(result);
                    let response = JSON.parse(result);
                    if (response.stat == "sukses") {    
                        value_++;
                        toastr.success('Success : ' + data_);
                        log.append("Success : " + data_ + "\n");
                        success++;
                    } else {
                        value_++;
                        toastr.error('Fail : ' + data_);
                        log.append("Fail : " + data_ + "\n");
                        fail++;
                    }
                    var percent = value_ / email.length * 100;
                    if (value_ == email.length) {
                        $('#btn_kirim').html('SEND');
                        $("#btn_kirim").attr("disabled", false);
                        $('#konten').summernote('enable');
                        toastr.success("Done");
                        log.append("Done !\n");
                        log.append("Success : " + success + "\n");
                        log.append("Fail : " + fail + "\n");
                        emails.attr("disabled", false);
                        subject_.attr("disabled", false);
                        konten.attr("disabled", false);
                    }
                    if (log.length)
                        log.scrollTop(log[0].scrollHeight - log.height());
                    $('#proses').attr('style', "width:" + Math.floor(percent) + "%");
                    $("#proses").html(Math.floor(percent) + " %");
                },
                error: function () {
                    // alert("error");
                    toastr.error('Error');
                }
            })  
        }
    })
})