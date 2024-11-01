<?php
/*
Plugin Name: wp-prevent-right-click-content-copy
Plugin URI: 
Description: This plugin is used to disable right click on website to prevent copy content like save image text copy etc. Only the users other than administrator and Editor will have such restrictions. 
Author: Trendytech
Version: 1.0.1
License: GPLv2 or later
Author URI: https://profiles.wordpress.org/rkramesh/
*/

// This function will prevent right click.
wp_enqueue_script('jquery');
function rcbcp_prevent_right_click() {
    if( current_user_can('editor') || current_user_can('administrator') ) {
        //Silence Is Golden
    }else{

        echo '
        <script>
        jQuery(document).ready(function () {
            jQuery(document).bind("contextmenu", function (e) {
                return false;
                });
                });

                </script>
                ';
            }
        }
        add_action( 'wp_footer', 'rcbcp_prevent_right_click' );

        function rcbcp_prevent_right_click12() {
            if( current_user_can('editor') || current_user_can('administrator') ) {
        //Silence Is Golden
            }else{ 
                echo '
                <script>
                document.onkeypress = function (event) {
                    event = (event || window.event);
                    if (event.keyCode == 123) {
                        return false;
                    }
                }
                document.onmousedown = function (event) {
                    event = (event || window.event);
                    if (event.keyCode == 123) {
                        return false;
                    }
                }
                document.onkeydown = function (event) {
                    event = (event || window.event);
                    if (event.keyCode == 123) {
                        return false;
                    }
                }
                </script>
                ';
            }
        }
        add_action( 'wp_footer', 'rcbcp_prevent_right_click12' );


        function rcbcp_prevent_right_clicku() {
            if( current_user_can('editor') || current_user_can('administrator') ) {
        //Silence Is Golden
                }else{   echo '
                <script>
                jQuery(document).keydown(function(event) { 
                    var pressedKey = String.fromCharCode(event.keyCode).toLowerCase();

                    if (event.ctrlKey && (pressedKey == "u")) {
            //alert("Sorry, This Functionality Has Been Disabled!"); 
            //disable key press porcessing
                        return false; 
                    }
                    });
                    </script>
                    ';
                }
            }
            add_action( 'wp_footer', 'rcbcp_prevent_right_clicku' );

            function rcbcp_prevent_content_copy() {
                if( current_user_can('editor') || current_user_can('administrator') ) {
        //Silence Is Golden
                    }else{   echo '<script>
                    (function ($) {
                        jQuery.fn.ctrl = function (key, callback) {
                            if (!jQuery.isArray(key)) {
                                key = [key];
                            }
                            callback =
                            callback ||
                            function () {
                                return false;
                            };
                            return jQuery(this).keydown(function (e) {
                                jQuery.each(key, function (i, k) {
                                    if (e.keyCode == k.toUpperCase().charCodeAt(0) && e.ctrlKey) {
                                        return callback(e);
                                    }
                                    });
                                    return true;
                                    });
                                };

                                jQuery.fn.disableSelection = function () {
                                    this.ctrl(["a", "s", "c"]);

                                    return this.attr("unselectable", "on")
                                    .css({ "-moz-user-select": "-moz-none", "-moz-user-select": "none", "-o-user-select": "none", "-khtml-user-select": "none", "-webkit-user-select": "none", "-ms-user-select": "none", "user-select": "none" })
                                    .bind("selectstart", function () {
                                        return false;
                                        });
                                    };
                                    })(jQuery);

                                    jQuery(":not(input,select,textarea)").disableSelection();
                                    </script>

                                    ';
                                }
                            }
                            add_action( 'wp_footer', 'rcbcp_prevent_content_copy' );



