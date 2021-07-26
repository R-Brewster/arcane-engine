jQuery( document ).ready(function() {
    console.log( "ready now!" );
    styleButtons();
});

function styleButtons() {
    jQuery(".wp-block-button__link").each(function() {
        var verticalDecoration = "<div class='button_ornament button_ornament--vertical'><div class='button_ornament-top-bottom'></div><div class='button_ornament-left-right'></div></div>";
        var horizontalDecoration = "<div class='button_ornament button_ornament--horizontal'><div class='button_ornament-top-bottom'></div><div class='button_ornament-left-right'></div></div>";

        jQuery(this).wrapInner("<span class='button_label'></span>").addClass('button');

        jQuery(this).prepend(horizontalDecoration);
        jQuery(this).prepend(verticalDecoration);
    })
}