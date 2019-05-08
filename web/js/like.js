$(document).on("change", "[id^='toggleLike']", function() {
    //alert( 'post id: ' + $(this).attr('data-pid') + '; checked: ' + $(this).is(':checked'));
    /*
    var formData = new FormData();
    formData.append("postId", $(this).attr('data-pid'));
    formData.append("action", ($(this).is(':checked') ? 1 : -1));

    fetch('index.php?r=publications%2Fadd-like', { method: 'POST', body: formData }).then(function(response) {
        if (response.ok) {
            response.json().then(function(json) {
                //update likes
                var lbId = '#labelLike' + json.pid;
                var cnt = json.likes;
                $(lbId).text(cnt);
            });
        } else {
            console.log('Network request for addlike.php failed with response ' + response.status + ': ' + response.statusText);
        }
    });
*/
    var formData = { postId: $(this).attr('data-pid'), action: ($(this).is(':checked') ? 1 : -1) };
    $.ajax({
        url: 'index.php?r=publications%2Fadd-like',
        method: 'POST',
        data: formData,
        dataType: 'JSON',
        success: function(data) {
            //update likes
            var lbId = '#labelLike' + data.pid;
            var cnt = data.likes;
            $(lbId).text(cnt);
        },
        error: function(err) {
            console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
        }
    })

})

const updateToggles = function() {
    $(".fb").removeClass("fbCurrent");
    el = $("input[name='PublicationsSearch[order]']:checked");
    if (el) {
        el.parent().addClass("fbCurrent");
    }
}

updateToggles();

$("input[name='PublicationsSearch[order]']").change(updateToggles);