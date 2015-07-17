(function (factory) {

    if (typeof define === 'function' && define.amd) {
        define(['jquery'], factory);
    } else {
        factory(window.jQuery);
    }

}(function ($) {

    var tmpl = $.summernote.renderer.getTemplate();

    $.summernote.addPlugin({

        name: 'placeholder',

        buttons: {
            placeholders: function () {

                if(typeof summernote_placeholder != 'undefined'){

                    var list = '';

                    $.each(summernote_placeholder, function(i, item) {
                        list += '<li><a data-event="placeholders" href="javascript:;" data-value="'+i+'">'+item+'</a></li>';
                    });

                    var dropdown = '<ul class="dropdown-menu">' + list + '</ul>';

                    return tmpl.iconButton('fa fa-plus-square', {
                        title: 'Inserir Espaços Resevados',
                        hide: true,
                        dropdown : dropdown
                    });
                }
                return '';
            }
        },

        events: {
            placeholders: function (event, editor, layoutInfo, value) {
                var $editable = layoutInfo.editable();
                editor.insertText($editable, value);
            }
        }
    });
}));