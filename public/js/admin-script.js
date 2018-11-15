$(document).ready(function () {
    $(":file").filestyle({
        iconName: "glyphicon glyphicon-inbox"
    });


    // Add new input for social links
    $('#add_input').on('click', function () {
        var newInput = '<br> <input type="url" name="social_links[]" class="form-control" placeholder="Enter social_links" required>';
        $(this).parent().append(newInput);
    });

});
