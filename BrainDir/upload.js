$(document).ready(function () {
    $('#file').on('change', function () {
        var formData = new FormData();
        var file = $(this)[0].files[0];
        formData.append('file', file);
        $.ajax({
            url: 'upload.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log('File upload successful');
            },
            error: function (xhr, status, error) {
                console.error('File upload failed:', error);
            }
        });
    });
});
window.transitionToPage = function(href) {
    document.querySelector('body').style.opacity = 0
    setTimeout(function() { 
        window.location.href = href
    }, 500)
}
document.addEventListener('DOMContentLoaded', function(event) {
    document.querySelector('body').style.opacity = 1
})
