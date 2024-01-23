<?php session_start(); ?>

<!DOCTYPE html>
<!-- saved from url=(0014)about:internet -->
<html xmlns="http://www.w3.org/1999/xhtml" lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
    <meta name="title" content="">
    <meta name="keywords" content="free books, books to read, free ebooks, audio books, read books for free, read books online, online library">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="OpenLibrary.org">
    <meta name="creator" content="OpenLibrary.org">
    <meta name="copyright" content="Original content copyright; 2007-2015">
    <meta name="distribution" content="Global">
    <meta name="theme-color" content="#e2dcc5">


    <link rel="canonical" href="https://openlibrary.org/account/login">
    <link rel="preconnect" href="https://analytics.archive.org/">

    <link rel="search" type="application/opensearchdescription+xml" title="Open Library" href="https://openlibrary.org/static/opensearch.xml">
    <link rel="manifest" href="https://openlibrary.org/static/manifest.json">

    <link href="https://openlibrary.org/static/images/openlibrary-128x128.png" rel="apple-touch-icon">
    <link href="https://openlibrary.org/static/images/openlibrary-152x152.png" rel="apple-touch-icon" sizes="152x152">
    <link href="https://openlibrary.org/static/images/openlibrary-167x167.png" rel="apple-touch-icon" sizes="167x167">
    <link href="https://openlibrary.org/static/images/openlibrary-180x180.png" rel="apple-touch-icon" sizes="180x180">
    <link href="https://openlibrary.org/static/images/openlibrary-192x192.png" rel="icon" sizes="192x192">
    <link href="https://openlibrary.org/static/images/openlibrary-128x128.png" rel="icon" sizes="128x128">
    <link href="./Login_page_files/page-user.css" rel="stylesheet" type="text/css">

    <noscript>
        <style>
            /* Don't hide content with clamp if no js to show more/less */
            .clamp {
                -webkit-line-clamp: unset !important;
            }

            /* @width-breakpoint-tablet media query: */
            @media only screen and (min-width: 768px) {
                /* Sticky navbar to top of screen if compact title cannot be stickied */
                .work-menu {
                    top: 0 !important;
                }
            }
        </style>
    </noscript>
 

    <!-- JavaScript execution queue that will be emptied at the bottom of the page -->
    <script type="text/javascript">window.q = [];</script>
    <meta name="google-site-verification" content="KrqcZD4l5BLNVyjzSi2sjZBiwgmkJ1W7n6w7ThD7A74">
    <meta name="google-site-verification" content="vtXGm8q3UgP-f6qXTvQBo85uh3nmIYIotVqqdJDpyz4">
    <meta name="alexaVerifyID" content="wJKlTRj1Z1OI4G-J0w9R-cWhJjw"> <!-- Necessary for Alexa -->
    <!-- Drini, Google Search Console -->
    <meta name="google-site-verification" content="XYOJ9Uj0MBr6wk7kj1IkttXrqY-bbRstFMADTfEt354">


    <meta name="description" content="Open Library is an open, editable library catalog, building towards a web page for every book ever published. Read, borrow, and discover more than 3M books for free.">
    
    <title>Login page || Ta Quang Buu Library</title>

    <script src="https://cdn.tailwindcss.com"></script>
<style>/**


.ui-widget-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: hsl(0, 0%, 0%);
    opacity: 0.5;
    filter: alpha(opacity=50);
    z-index: 9999 !important;
}
.ui-sortable {
    min-height: 90px;
    max-height: 270px;
    overflow: auto;
}
.ui-sortable-placeholder {
    border: 1px dotted hsl(0, 0%, 60%);
    visibility: visible !important;
    height: 70px !important;
    border-radius: 6px;
}
.ui-sortable-placeholder * {
    visibility: hidden;
}
/**
 * HeaderBar (JS)
 * https://github.com/internetarchive/openlibrary/wiki/Design-Pattern-Library#headerbar
 * This stylesheet will only apply if JS is present on the page.
 */
.search-facet select {
    padding: 10px;
    top: 2px;
    left: 2px;
}
/* COLORBOX POP-UP */
#colorbox,
#cboxOverlay,
#cboxWrapper {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 999999;
}
#colorbox {
    outline: none;
    box-sizing: content-box;
}
#colorbox > * {
    box-sizing: content-box;
}
#colorbox img {
    height: auto;
}
#colorbox img,
#colorbox iframe {
    width: 100%;
}
#cboxOverlay {
    position: fixed;
    width: 100%;
    height: 100%;
    opacity: 0.5;
    filter: alpha(opacity=50);
    background-color: hsl(0, 0%, 0%);
}
#cboxMiddleLeft,
#cboxBottomLeft {
    clear: left;
}
#cboxTitle {
    margin: 0;
    display: none !important;
}
#cboxLoadingOverlay,
#cboxLoadingGraphic {
    position: absolute;
    top: 25px;
    left: 25px;
    width: 100%;
}
#cboxPrevious,
#cboxNext,
#cboxClose,
#cboxSlideshow {
    cursor: pointer;
}
#cboxContent {
    box-sizing: content-box;
    position: relative;
    background: hsl(0, 0%, 100%);
    padding: 10px;
    border: 1px solid hsl(64, 9%, 71%);
    border-radius: 12px;
    -webkit-box-shadow: 1px 3px 5px hsl(0, 0%, 27%);
    box-shadow: 1px 3px 5px hsl(0, 0%, 27%);
}
#cboxLoadedContent {
    background: hsl(0, 0%, 100%);
    margin: 0;
    overflow: visible !important;
}
#cboxLoadedContent iframe {
    display: block;
    border: 0;
}
#cboxLoadingOverlay {
    background: transparent;
}
#cboxClose {
    display: none !important;
    position: absolute;
    top: 20px;
    right: 20px;
    width: 32px;
    height: 32px;
    background-image: url(/images/icons/icon_close-pop.png);
    background-position: 0 0;
    background-repeat: no-repeat;
}
#cboxClose:hover {
    background-position: 0 -32px;
}
.dialog--close {
    color: hsl(0, 0%, 20%);
    font-size: 1.2em;
    display: inline-block;
    position: relative;
    z-index: 1;
    padding: 11px 17px;
    margin: -11px -17px;
}
.dialog--close:visited,
.dialog--close:link,
.dialog--close:hover {
    text-decoration: none;
}
/* VIEW LARGER COVER POP-UP */
div.coverFloat {
    font-family: "Lucida Grande", Verdana, Geneva, Helvetica, Arial, sans-serif;
    background: hsl(0, 0%, 100%);
    text-align: left;
}
div.coverFloat a.dialog--close:hover {
    background-position: 0 -16px;
}
div.coverFloatHead {
    display: flex;
    font-size: 1em;
}
div.coverFloatHead h2 {
    font-weight: normal;
    color: hsl(0, 0%, 20%);
    font-size: 1em;
    margin: 0;
    padding: 0;
    flex: 1;
}
/* ADD IMAGE/COVER POP-UP */
div.floater {
    position: relative;
    font-family: "Lucida Grande", Verdana, Geneva, Helvetica, Arial, sans-serif;
    min-height: 550px;
    background: hsl(0, 0%, 100%);
    text-align: left;
}
div.floaterHead {
    display: flex;
    padding: 10px 5px;
}
div.floaterHead h2 {
    font-weight: normal;
    text-align: center;
    color: hsl(0, 0%, 20%);
    font-size: 1.25em;
    margin: 0;
    padding: 0;
    flex: 1;
}
div.floaterHead.right-justify {
    justify-content: right;
}
div.floaterBody {
    padding: 20px;
    font-size: 14px;
}
div.floaterBody p {
    margin-bottom: 14px;
}
.floatform {
    font-family: "Lucida Grande", Verdana, Geneva, Helvetica, sans-serif;
}
.floatform .label label {
    font-size: 1em;
    font-family: "Lucida Grande", "Trebuchet MS", Geneva, Helvetica, Arial, sans-serif;
    font-weight: 700;
}
.floatform .label span {
    font-weight: normal;
}
.floatform .dialog--close-parent {
    cursor: pointer;
}
.floatform div#covers.input {
    max-height: 132px;
    overflow: hidden;
    margin-left: -80px;
    text-align: center;
}
.floatform input[type=text],
.floatform input[type=file] {
    font-size: 1.125em;
    font-family: "Lucida Grande", Verdana, Geneva, Helvetica, Arial, sans-serif;
    padding: 3px;
    margin-left: 30px;
}
.floatform input::file-selector-button {
    cursor: pointer;
}
.floatform button[type=submit] {
    font-size: 1.125em;
    width: auto !important;
    cursor: pointer;
}
.floatform a {
    cursor: pointer;
}
.floatform__body {
    text-align: center;
    width: 100%;
    position: relative;
}
.floatform__body .carousel-section {
    padding: 0 20px;
}
div.imageIntro {
    margin: 0 0 10px;
}
/* ADD ROLES, ETC. */
div.floaterAdd {
    position: relative;
    font-family: "Lucida Grande", Verdana, Geneva, Helvetica, Arial, sans-serif;
    background: hsl(0, 0%, 100%);
    text-align: left;
}
div.floaterAdd .formElement {
    margin: 0 20px;
}
div.floaterAdd form.floatform .input {
    padding-top: 5px;
}
div.floaterAdd form.floatform .label {
    padding-top: 20px;
}
div.floaterAdd form.floatform .label label {
    font-size: 1em;
    font-family: "Lucida Grande", "Trebuchet MS", Geneva, Helvetica, Arial, sans-serif;
    font-weight: 700;
}
div.floaterAdd form.floatform input[type=text],
div.floaterAdd form.floatform textarea {
    margin-left: 0;
}
div.floaterAdd form.floatform textarea {
    padding: 3px;
}
@media only screen and (min-width: 768px) {
    .floatform div#covers.input,
    .floatform .label,
    .floatform .input {
        width: 560px;
        padding-top: 20px;
    }
    .floatform > div {
        margin: 0 80px;
        text-align: left;
    }
    .floatform input[type=text],
    .floatform input[type=file] {
        width: 350px;
    }
    div.imageIntro {
        margin: 10px;
    }
    .floatform__body > div {
        margin: 0 80px;
    }
    div.floaterAdd .input,
    div.floaterAdd .label,
    div.floaterAdd input[type=text],
    div.floaterAdd textarea {
        width: 560px;
    }
}
.native-dialog {
    padding: 10px;
    border: 1px solid hsl(64, 9%, 71%);
    border-radius: 12px;
    -webkit-box-shadow: 1px 3px 5px hsl(0, 0%, 27%);
    box-shadow: 1px 3px 5px hsl(0, 0%, 27%);
}
.native-dialog--close {
    color: hsl(0, 0%, 20%);
    font-size: 1.2em;
}
.native-dialog--close:visited,
.native-dialog--close:link,
.native-dialog--close:hover {
    text-decoration: none;
}
.native-dialog::backdrop {
    opacity: 0.5;
    background-color: hsl(0, 0%, 0%);
}
/**
 * FlashMessage
 * https://github.com/internetarchive/openlibrary/wiki/Design-Pattern-Library#flashmessage
 */
.flash-messages {
    font-size: 1em;
    font-family: "Lucida Grande", Verdana, Geneva, Helvetica, Arial, sans-serif;
    clear: both;
}
.flash-messages span {
    display: block;
    background-color: hsl(58, 100%, 90%);
    background-position: 10px 50%;
    background-repeat: no-repeat;
    padding: 15px 52px;
    text-align: left;
    background-image: url(/images/icons/icon_check.png);
}
.flash-messages .error span {
    background-image: url(/images/icons/icon_alert.png);
}
.flash-messages .bookadded span {
    background: hsl(58, 100%, 90%) url(/images/icons/icon_check.png) no-repeat 40px 40px;
    padding: 40px 40px 40px 80px;
    font-family: "Georgia", "Times New Roman", serif;
    position: relative;
}
.flash-messages .bookadded span span {
    display: inline;
    padding: 0;
    font-family: "Lucida Grande", Verdana, Geneva, Helvetica, sans-serif;
}
.flash-messages .bookadded h3 {
    font-family: "Georgia", "Times New Roman", serif;
    font-size: 1.5em;
    font-weight: normal;
    margin: 0;
    color: hsl(0, 0%, 0%);
}
.flash-messages .bookadded .brown {
    font-size: 1.125em;
    margin: 15px 0 30px;
}
.flash-messages .bookadded .list {
    font-size: 1.5em;
    margin: 0;
}
.flash-messages .bookadded h3 em {
    font-style: italic;
    font-weight: 700;
    color: hsl(113, 38%, 29%);
}
.flash-messages .bookadded .red {
    font-family: "Georgia", "Times New Roman", serif;
}
.flash-messages .bookadded .close {
    position: absolute;
    display: block;
    top: 20px;
    right: 20px;
    width: 16px;
    height: 16px;
}
/* stylelint-disable no-descending-specificity */
.ac_results {
    padding: 0;
    margin: 0;
    overflow: auto;
    z-index: 99999;
    position: absolute;
    display: none;
    top: -5px;
    max-height: 290px;
    max-width: 600px;
    background-color: hsl(0, 0%, 100%);
    border: 1px solid hsl(0, 0%, 80%);
    opacity: 0.95;
    text-align: left;
    list-style: none;
}
.ac_results li {
    margin: 0;
    padding: 5px;
    display: block;
    font-family: "Lucida Grande", Verdana, Geneva, Helvetica, sans-serif;
    font-size: 12px;
    cursor: pointer;
    color: hsl(0, 0%, 20%);
    /*
        it is very important, if line-height not set or set
        in relative units scroll will be broken in firefox
        */
    line-height: 16px;
    overflow: hidden;
    border-bottom: 1px solid hsl(0, 0%, 80%);
}
.ac_results li:last-child {
    border-bottom: 0;
}
.ac_results li.ac_over {
    background-color: hsl(58, 100%, 90%);
}
.ac_results .ac_language {
    font-size: 16px;
    color: hsl(0, 0%, 0%);
}
.ac_results .ac_author .action {
    font-size: 9px;
    color: hsl(81, 39%, 35%);
}
.ac_results .ac_author .books {
    font-size: 12px;
    color: hsl(113, 38%, 29%);
    font-weight: 700;
    padding: 0;
}
.ac_results .ac_author .subject {
    font-size: 11px;
}
.ac_results .ac_author .olid {
    font-family: monospace;
}
.ac_results .ac_author .name {
    font-size: 16px;
    display: block;
    color: hsl(0, 0%, 0%);
}
.ac_results .ac_author .work {
    font-size: 11px;
}
.ac_results .ac_author .work i {
    color: hsl(40, 32%, 29%);
}
.ac_results .ac_work .cover {
    float: left;
    margin-right: 5px;
    width: 5em;
    height: 5em;
    overflow: hidden;
    border-radius: 2px;
    mask-image: linear-gradient(to top, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0) 15%);
}
.ac_results .ac_work .cover img {
    width: 100%;
}
.ac_results .ac_work .edition_count {
    font-size: 12px;
    color: hsl(113, 38%, 29%);
    font-weight: 700;
    padding: 0;
}
.ac_results .ac_work .olid {
    font-family: monospace;
}
.ac_results .ac_work .name {
    display: block;
}
.ac_results .ac_work .title {
    font-size: 16px;
    color: hsl(0, 0%, 0%);
}
.ac_results .ac_work .first_publish_year {
    font-size: 12px;
}
.ac_loading {
    background: hsl(0, 0%, 100%) url(/images/indicator.gif) right center no-repeat;
}
.ac_odd {
    background-color: hsl(0, 0%, 93%);
}
.ac_even,
.ac_odd {
    background-color: inherit;
}
/**
 * ReadStatuses
 * https://github.com/internetarchive/openlibrary/wiki/Design-Pattern-Library#readstatuses
 */
.read-statuses {
    border-bottom: 1px solid hsl(0, 0%, 93%);
    /* stylelint-disable selector-max-specificity */
    /* stylelint-enable selector-max-specificity */
}
.read-statuses button {
    border: none;
    background: none;
    cursor: pointer;
    color: hsl(0, 0%, 20%);
    font-weight: bold;
    width: 100%;
    text-align: left;
    font-size: 0.8em;
    padding: 10px;
    border-bottom: 1px solid hsl(0, 0%, 93%);
}
.read-statuses button:hover {
    color: hsl(0, 0%, 0%);
    background-color: hsl(0, 0%, 100%);
}
.read-statuses .remove-from-list {
    color: hsl(8, 78%, 49%);
}
.read-statuses form:last-child button.nostyle-btn {
    border: none;
}
/**
 * ManageCoversBtn
 * https://github.com/internetarchive/openlibrary/wiki/Design-Pattern-Library#manage-covers
 */
.manageCovers {
    max-width: 140px;
    margin: 0 auto;
    padding: 8px;
    border-radius: 3px;
    border: 3px solid hsl(0, 0%, 20%);
    background-color: hsl(0, 0%, 100%);
    color: hsl(0, 0%, 20%);
    font-size: 12px;
    cursor: pointer;
}
.manageCovers a {
    color: hsl(0, 0%, 20%);
}
.manageCoversContainer {
    width: 100%;
    z-index: 99999;
    position: absolute;
    bottom: 15px;
}
.manageCoversContainer a {
    display: block;
    text-decoration: none;
    opacity: 0;
}
.manageCoversContainer a:hover,
.manageCoversContainer a:focus {
    text-decoration: underline;
}
div:hover > .manageCoversContainer a {
    opacity: 0.9;
}
/**
 * Throbber
 * https://github.com/internetarchive/openlibrary/wiki/Design-Pattern-Library#throbber
 * Used in openlibrary/templates/covers/change.html
 */
.throbber {
    position: absolute;
    width: 220px;
    height: 19px;
    top: 120px;
    left: 0;
    text-align: center;
    background-color: transparent;
    background-image: url(/images/ajax-loader-bar.gif);
    background-repeat: no-repeat;
}
.throbber h3 {
    margin-top: 35px;
}
@media only screen and (min-width: 768px) {
    .throbber {
        top: 280px;
        left: 210px;
    }
}
/**
 * CtaBtn
 * https://github.com/internetarchive/openlibrary/wiki/Design-Pattern-Library#ctabtn
 * This stylesheet will only apply if JS is present on the page.
 */
.cta-btn--available--load,
a.cta-btn--available--load {
    background: url(/static/images/indicator.gif) center center no-repeat;
    background-color: hsl(202, 96%, 37%) !important;
    opacity: 0.6;
}
.cta-btn--unavailable--load,
a.cta-btn--unavailable--load {
    background: url(/static/images/indicator.gif) center center no-repeat;
    background-color: hsl(202, 96%, 37%) !important;
    opacity: 0.6;
}
/**
 * TabPanel
 * https://github.com/internetarchive/openlibrary/wiki/Design-Pattern-Library#tabspanel
 */
.ui-tabs-nav,
.ui-tabs-panel {
    font-family: "Lucida Grande", Verdana, Geneva, Helvetica, Arial, sans-serif;
}
.ui-tabs-nav {
    list-style: none !important;
    margin: 0 0 18px !important;
    clear: right;
    /* stylelint-disable selector-max-specificity */
    /* stylelint-disable no-descending-specificity */
    /* stylelint-enable no-descending-specificity */
    /* stylelint-enable selector-max-specificity */
}
.ui-tabs-nav:after {
    /* clearing without presentational markup, IE gets extra treatment */
    display: block;
    clear: both;
    content: " ";
}
.ui-tabs-nav li {
    list-style: none !important;
    margin: 0 0 0 1px;
    min-width: 54px;
    /* be nice to Opera */
}
.ui-tabs-nav a {
    display: block;
    font-weight: 600;
    font-size: 0.6875em;
    background: hsl(0, 0%, 100%);
    border-bottom: 3px solid hsl(0, 0%, 93%);
    padding: 4px 8px 3px;
    text-decoration: none;
    text-transform: uppercase;
    white-space: nowrap;
    /* required in IE 6 */
    outline: 0;
    /* prevent dotted border in Firefox */
    /* stylelint-disable max-nesting-depth */
    /* stylelint-enable max-nesting-depth */
}
.ui-tabs-nav a:link,
.ui-tabs-nav a:visited {
    color: hsl(202, 96%, 28%);
}
.ui-tabs-nav a:hover {
    color: hsl(202, 96%, 28%);
    text-decoration: underline;
}
.ui-tabs-nav .ui-tabs-active {
    /* stylelint-disable max-nesting-depth */
    /* stylelint-enable max-nesting-depth */
}
.ui-tabs-nav .ui-tabs-active a:link,
.ui-tabs-nav .ui-tabs-active a:visited {
    /* @ Opera, use pseudo classes otherwise it confuses cursor... */
    background: hsl(0, 0%, 93%);
    border: 1px solid hsl(0, 0%, 93%);
    border-bottom: 3px solid hsl(0, 0%, 93%);
    color: hsl(184, 100%, 21%);
    cursor: default;
}
.ui-tabs-nav a:hover,
.ui-tabs-nav a:focus,
.ui-tabs-nav a:active,
.ui-tabs-nav .ui-tabs-deselectable a:hover,
.ui-tabs-nav .ui-tabs-deselectable a:focus,
.ui-tabs-nav .ui-tabs-deselectable a:active {
    /* @ Opera, we need to be explicit again here now... */
    cursor: pointer;
}
.ui-tabs-disabled {
    opacity: 0.4;
    filter: alpha(opacity=40);
}
.ui-tabs-panel {
    border: 3px solid hsl(0, 0%, 93%);
    background: hsl(0, 0%, 100%);
    /* declare background color for container to avoid distorted fonts in IE while fading */
}
.ui-tabs-loading em {
    padding: 0 0 0 20px;
}
.floater .ui-tabs-panel {
    border: none;
    background: hsl(0, 0%, 100%);
    /* declare background color for container to avoid distorted fonts in IE while fading */
}
/* Additional IE specific bug fixes... */
* html .ui-tabs-nav {
    /* auto clear, @ IE 6 & IE 7 Quirks Mode */
    display: inline-block;
}
*:first-child + html .ui-tabs-nav {
    /* @ IE 7 Standards Mode - do not group selectors,
    otherwise IE 6 will ignore complete rule (because of the unknown + combinator)... */
    display: inline-block;
}
@media only screen and (min-width: 768px) {
    .floater .ui-tabs-panel {
        border-top: 3px solid hsl(0, 0%, 93%);
        padding: 15px 30px !important;
        /* declare background color for container to avoid distorted fonts in IE while fading */
    }
    .tabs-panel {
        padding: 15px 30px 20px !important;
    }
    .ui-tabs-nav {
        margin-bottom: -3px !important;
    }
    .ui-tabs-nav li {
        float: left;
    }
    .ui-tabs-nav a {
        margin: 8px 3px 0;
    }
    .ui-tabs-nav .ui-tabs-active a {
        padding: 2px 8px 3px;
    }
}
/* Caution! Ensure accessibility in print and other media types... */
@media projection, screen, print {
    /* Use class for showing/hiding tab content,
    so that visibility can be better controlled in different media types... */
    .ui-tabs-hide {
        display: none;
    }
}
/**
 * UI-Dialog
 * https://github.com/internetarchive/openlibrary/wiki/Design-Pattern-Library#ui-dialog
 */
.ui-dialog {
    position: relative;
    width: 400px;
    padding: 10px;
    background-color: hsl(0, 0%, 100%);
    border-radius: 12px;
    -webkit-box-shadow: 1px 3px 10px hsl(0, 0%, 0%);
    box-shadow: 1px 3px 10px hsl(0, 0%, 0%);
    z-index: 10000 !important;
}
.ui-dialog .ui-dialog-titlebar {
    position: relative;
    font-weight: normal;
    color: hsl(0, 0%, 20%);
    font-size: 1em;
    margin: 0.2em 0;
    padding: 8px 0;
    display: flex;
}
.ui-dialog .ui-dialog-titlebar-close span {
    display: contents;
}
.ui-dialog .i-dialog-title {
    flex: 1;
}
.ui-dialog .ui-dialog-content {
    padding: 0.5em 1em;
    background: none;
    overflow: auto;
    zoom: 1;
}
.ui-dialog .ui-dialog-content p {
    min-height: 28px;
    padding: 6px 33px 0;
    background: url(/images/icons/icon_alert.png) no-repeat 0 0;
    margin: 0;
}
.ui-dialog .ui-dialog-buttonpane {
    text-align: center;
    margin-bottom: 10px;
}
.ui-dialog .ui-dialog-buttonpane button {
    cursor: pointer;
    width: auto;
    overflow: visible;
    font-size: 18px;
    margin: 0 8px;
}
.ui-draggable .ui-dialog-titlebar {
    display: flex;
    cursor: move;
}
.ui-draggable .ui-dialog-title {
    flex: 1;
}
.ui-draggable .ui-dialog-titlebar-close span {
    display: contents;
}
* html .ui-helper-clearfix {
    height: 1%;
}
/**
 * Wmd Prompt Dialog
 * https://github.com/internetarchive/openlibrary/wiki/Design-Pattern-Library#wmdpromptdialog
 * these dialogs can be seen when wmd-button-bar icon is clicked e.g. add link
 */
@media all and (max-width: 768px) {
    .wmd-prompt-dialog {
        margin-left: 10px !important;
        margin-top: 10px !important;
        top: 100px !important;
        left: 0 !important;
        right: 0 !important;
        width: 300px !important;
    }
}
.wmd-prompt-dialog {
    width: 400px;
    border: 10px solid hsl(40, 32%, 29%);
    background-color: hsl(0, 0%, 100%);
    -webkit-border-radius: 12px;
    -moz-border-radius: 12px;
    border-radius: 12px;
    -moz-box-shadow: 1px 3px 10px hsl(0, 0%, 0%);
    -webkit-box-shadow: 1px 3px 10px hsl(0, 0%, 0%);
    box-shadow: 1px 3px 10px hsl(0, 0%, 0%);
    text-align: left;
}
.wmd-prompt-dialog > div {
    font-size: 14px;
    font-family: "Lucida Grande", Verdana, Geneva, Helvetica, sans-serif;
    color: hsl(0, 0%, 27%);
    padding: 20px !important;
}
.wmd-prompt-dialog > div p {
    margin-bottom: 0 !important;
    position: relative;
}
.wmd-prompt-dialog > form {
    width: 480px;
    padding: 20px;
    padding-top: 0;
}
.wmd-prompt-dialog > form > input[type=text] {
    float: left;
    margin-left: 20px !important;
    clear: both;
    width: 350px;
    font-size: 1.125em;
    font-family: "Lucida Grande", Verdana, Geneva, Helvetica, Arial, sans-serif;
    padding: 3px;
}
.wmd-prompt-dialog > form > input[type="button"] {
    font-size: 1.125em;
    width: auto !important;
}
.wmd-prompt-dialog p b {
    display: block;
    position: relative;
    background-color: hsl(40, 32%, 29%);
    padding: 0 10px 10px;
    color: hsl(0, 0%, 100%);
    font-family: "News Gothic MT", "Arial Rounded MT", Geneva, Helvetica, sans-serif;
    font-size: 1.75em;
    top: -20px;
    left: -21px;
    width: 282px;
}
@media all and (min-width: 768px) {
    .wmd-prompt-dialog p b {
        width: 380px;
    }
}
.coverEbook {
    cursor: pointer;
    z-index: 1000;
}
.coverEbook img {
    opacity: 0.85;
    filter: alpha(opacity=85);
}
.coverEbook a.cta-btn {
    position: absolute;
    padding: 0 5px;
    right: 0;
    bottom: 3px;
    border-radius: 3px;
}
.tools a.on,
.tools a.on:hover,
.tools a.on:active {
    color: hsl(0, 0%, 20%);
    cursor: default;
    text-decoration: none;
}





<body class=" client-js">
    <script>
            // Provide a signal that JS will load
            document.body.className += ' client-js';
    </script>
    <span id="top"></span>
    <div id="offline-info">It looks like you're offline.</div>
    
    
    
        <div id="donato"><div class="js-ia-donation-iframe-wrapper"><iframe src="./Login_page_files/donate.html" scrolling="no" frameborder="0" style="width:100%; height: 100%;" title="Banner for donating to the Internet Archive"></iframe></div><style>.js-ia-donation-iframe-wrapper { position: relative; height: 0px; transition: height 0.5s; } body.overflow-hidden { position: relative !important;height: auto !important; overflow: hidden !important; margin: 0 !important; } #donato .open-modal {position: fixed !important; top: 0;bottom: 0; left: 0; right: 0; z-index: 1000000 !important; } #donato .keep-above-all-dom { z-index: 10000000 !important; position: absolute; } </style></div>
        <script src="./Login_page_files/donate.js.download" data-platform="ol"></script>
        

    <div id="topNotice">
        <div class="page-banner page-banner-black page-banner-center">
            <div class="iaBar">
                <a class="iaLogo"><img alt="Internet Archive logo" src="./Home_page_files/ia-logo.svg" width="160"></a>

                <div class="language-component header-dropdown" id="footer-locale-menu">
                </div>
            </div>
        </div>
    </div>


    
    <header id="header-bar" class="header-bar">
        <div class="logo-component" style="flex: 2; margin-right: 5px;">
            <a href="./Home_page.php" title="The Internet Archive&#39;s Open Library: One page for every book">
                <div class="logo-txt">
                    <img class="logo-icon" src="./Home_page_files/openlibrary-logo-tighter.svg" width="189" height="47" alt="Open Library logo">
                </div>
            </a>
        </div>

        <div class="navigation-component" style="flex: 2; margin-right: 5px;">
            <div class="auth-component bg-white mx-5 rounded-lg"> 
                <a href="./History_page.php" class="text-white bg-white-700 hover:text-green hover:bg-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    LOAN HISTORY
                </a>
            </div>
        </div>

        <div class="search-component" style="flex: 4; margin-right: 5px; ">
            <form id="search" style="display: flex; justify-content: space-between;">
                <div style="flex: 3; margin-right: 5px;">
                    <div class="select-wrapper">
                        <select name="filter" id="filter" class="w-full my-2 p-2 rounded-lg">
                            <option value="title">Title</option>
                            <option value="author">Author</option>
                            <option value="genre_name">Genre</option>
                            <option value="publisher_name">Publisher</option>
                        </select>

                    </div>
                </div>

                <div style="flex: 5; margin-right: 5px;">
                    <input placeholder="Input information" name="information" class="w-full my-2 p-2 rounded-lg">
                </div>

                <div style="flex: 1;">
                    <button class="bg-white w-full my-2 p-2 rounded-lg btn" type="submit">Find</button>
                </div>
            </form>

            <script type="text/javascript">
                document.addEventListener("DOMContentLoaded", function() {
                    // Get the form element
                    const form = document.getElementById("search");

                    // Add an event listener for form submission
                    form.addEventListener("submit", function(event) {
                        // Prevent the default form submission
                        event.preventDefault();

                        // Get the input values
                        var filter = document.querySelector('select[name="filter"]').value;
                        var information = document.querySelector('input[name="information"]').value;

                        // Construct the URL with parameters
                        var url = './Search_page.php?filter=' + encodeURIComponent(filter) + '&information=' + encodeURIComponent(information);

                        // Redirect to the search results page
                        window.location.href = url;
                    });
                });
            </script>
        </div>

        <style>
            .search-component {
                display: flex;
                align-items: center;
            }

            .select-wrapper {
                position: relative;
            }
        </style>

        <div class="auth-component bg-white mx-5 rounded-lg " style="flex: 2; margin-right: 5px;"> 
            <?php 
                if (!empty($_SESSION['user_id'])) {
                    // User is logged in
                    echo '<a> Hello,'. $_SESSION['username'].' </a>';
                    echo '<div><a href="./controller/logout.php">Log out</a></div>';
                } else {
                    // User is not logged in
                    echo '<div><a href="./Login_page.php">Log in</a></div>';
                }
            ?>
            

        </div>

        <div class="hamburger-component header-dropdown">
            <!-- Hamburger code here -->
        </div>
    </header>

    
    <div id="test-body-mobile">
        
        <div class="flash-messages">
        </div>
        
        
        

    <div id="contentHead">
        <h1>Log In</h1>
    </div>

    <div id="contentBody">

    <script>
        window.addEventListener(
                'message',
                function(e) {
                        if (!/[\.\/]archive\.org$/.test(e.origin)) return;
                        if (e.data.type == 'resize') {
                                var iframe = document.getElementById('ia-third-party-logins');
                                iframe.setAttribute('scrolling', 'no');
                                if (e.data.height) iframe.style.height = e.data.height + 'px';
                        }
                        else if (e.data.type == 's3-keys') {
                                fetch('/account/login.json', {
                                        method: 'POST',
                                        credentials: 'include',
                                        body: JSON.stringify(e.data.s3)
                                }).then(function() {
                                        window.location = new URLSearchParams(window.location.search).get('redirect') || '/account/loans';
                                });
                        }
                },
                false
        );
    </script>

    <div class="login-big-or"></div>
    
    <p>Please enter your username and password to access your Library account.</p>
    
    <form action="./controller/login.php" method="post" class="bg-white shadow-md rounded-md px-10 pt-8 pb-10 mb-6">
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="username">Username</label>
            <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="Username" name="username">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2" for="password">Password</label>
            <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" type="password" placeholder="********" name="password">
        </div>

        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="submit">
                Submit
            </button>
        </div>
    </form>
        
    </div>
    </div>
    <footer>
        <div id="footer-content">
            <div id="footer-details">
                <img id="archive-logo" src="./Home_page_files/pantheon.png" alt="Open Library logo">
                <div id="legal-details">
                    <span>Ta Quang Buu Library at Hanoi University of Technology</span>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>