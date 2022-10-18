function loadLink(){
    let url = $("#send_url").val();
    $.ajax({
        url: './ajax/getLinkByUrl.php',
        data: {
            url: url
        },
        method: 'post',
        beforeSend: function() {
            $('#generate_button').html(spinnerLoad());
            $('#generate_button').attr("disabled", "disabled");
            $('#ajax-result').html(spinnerLoad());
        },
        success: function (returnHtml) {    
            $('#ajax-result').html(returnHtml);
            $('#generate_button').html("Generar URL");
            $('#generate_button').removeAttr("disabled", "disabled"); 

        }
    })
}
function spinnerLoad(){
    return '<div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>';
}
function copyToClipboard() {
  var copyText = document.getElementById("ktly_url");
  navigator.clipboard.writeText(copyText.innerHTML);
  $('.toast').toast('show');
}