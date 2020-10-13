jQuery(document).ready(function () {
    $('.fileupload').change(function(){
        previewURL(this);
        if($(this).val() !== '') {
            var progress = $('#jasny_progress');
            var percent = $('#jasny_percent');
            var formData = new FormData();
            formData.append('image', $(this)[0].files[0]);
            $.ajax({
                url: '/image/upload',
                type: 'POST',
                data: formData,
                beforeSend: function( xhr ) {
                    isPhotoUploaded = false;
                    progress.removeClass('hidden');
                    percent.css("width", '0%');
                    percent.attr('aria-valuenow', '0');
                    percent.html('0%');
                },
                xhr: function () {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function (evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            percentComplete = parseInt(percentComplete * 100);
                            percent.css("width", percentComplete + '%');
                            percent.attr('aria-valuenow', percentComplete);
                            percent.html(percentComplete + '%');
                            if (percentComplete === 100) {
                                setTimeout(function () {
                                    progress.addClass('hidden');
                                }, 500);
                            }
                        }
                    }, false);
                    return xhr;
                },
                success: function (res) {
                    if (res.status){
                        isPhotoUploaded = true;
                        if (res.file_name !== undefined && res.file_name !== ''){
                            $('#image').val(res.file_name);
                        }
                    }else {
                        swal(
                            'Unknown Error Occurred',
                            res.message,
                            'error'
                        )
                    }
                },

                error : function () {
                    swal(
                        'Unknown Error Occurred',
                        '',
                        'error'
                    )
                },
                cache: false,
                contentType: false,
                processData: false
            });
        }
    });
    function previewURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#preview').css("background", "url(" + e.target.result +")" + " right top no-repeat");
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
});
var isPhotoUploaded = true;
