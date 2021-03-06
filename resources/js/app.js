require('./bootstrap');
var postId = 0;
var postBodyElement = null;

$('.post').find('.interaction').find('.edit').on('click', function (event) {
    event.preventDefault();
    postBodyElement = event.target.parentNode.parentNode.childNodes[1];
    var postBody = postBodyElement.textContent;
    postId = event.target.parentNode.parentNode.dataset['postid'];
    $('#post-body').val(postBody);
    $('#edit-modal').modal();
});

$('#modal-save').on('click', function () {
    $.ajax({
        method: 'POST',
        url: urlEdit,
        data: {body: $('#post-body').val(), postId: postId, _token: token}
    })
        .done(function (msg) {
            $(postBodyElement).text(msg['new_body']);
            $('#edit-modal').modal('hide');
        });
});

$('.vote').on('click', function(event) {
    event.preventDefault();
    postId = event.target.id;
    var radioId = "vote_"+postId;
    var radio = $('input[id="'+radioId+'"]:checked').val();
    $.ajax({
        method: 'POST',
        url: urlVote,
        data: {vote:radio,postId: postId, _token: token}
    })
        .done(function() {
            event.target.innerText = 'You gained 1 point!';
        });
});


