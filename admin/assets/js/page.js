var page = {
    ajaxMethod: 'POST',

    add: function() {
        var formData = new FormData();

        formData.append('title', window.jQuery('#title').val);
        formData.append('content', window.jQuery('#content').val);
        formData.append('keywords', $('#keywords').val);
        formData.append('description', $('#description').val);

        window.jQuery.ajax({
            url: '/admin/page/add/',
            method: this.ajaxMethod,
            data: formData,

            beforeSend: function() {

            },

            success: function() {

            }
        });
    }
}