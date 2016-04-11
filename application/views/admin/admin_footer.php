<!-- javascripts -->
<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui-1.9.2.custom.min.js"></script>
<!-- bootstrap -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<!-- nice scroll -->
<script src="<?php echo base_url(); ?>assets/js/jquery.scrollTo.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>

<!--custome script for all page-->

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/form-validation-script.js"></script>
<script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>

<!--<script type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.uploadPreview.min.js"></script>

<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript" language="javascript"></script>-->
<script src="<?php echo base_url(); ?>assets/multifile-master/jquery.MultiFile.js" type="text/javascript"
        language="javascript"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/tinymce/tinymce.min.js"></script>

<script>
    tinymce.init({
        selector: ".editor",
        plugins: [
            "advlist autolink autosave link lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker " +
            "textpattern jbimages"
        ],

        toolbar1: "bold italic underline strikethrough subscript superscript | alignleft aligncenter alignright alignjustify " +
        "| bullist numlist | outdent indent blockquote | undo redo | link unlink | jbimages",

        relative_urls: false,
        menubar: false,
        toolbar_items_size: 'small',

        style_formats: [
            {title: 'Bold text', inline: 'b'},
            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
            {title: 'Example 1', inline: 'span', classes: 'example1'},
            {title: 'Example 2', inline: 'span', classes: 'example2'},
            {title: 'Table styles'},
            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ],

        templates: [
            {title: 'Test template 1', content: 'Test 1'},
            {title: 'Test template 2', content: 'Test 2'}
        ]
    });

    tinymce.init({
        selector: ".editor-2",
        plugins: [
            "advlist autolink autosave link lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker " +
            "textpattern jbimages"
        ],

        toolbar1: "bold italic underline strikethrough subscript superscript | alignleft aligncenter alignright alignjustify " +
        "| bullist numlist | outdent indent blockquote | undo redo | link unlink",

        relative_urls: false,
        menubar: false,
        toolbar_items_size: 'small',

        style_formats: [
            {title: 'Bold text', inline: 'b'},
            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
            {title: 'Example 1', inline: 'span', classes: 'example1'},
            {title: 'Example 2', inline: 'span', classes: 'example2'},
            {title: 'Table styles'},
            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ],

        templates: [
            {title: 'Test template 1', content: 'Test 1'},
            {title: 'Test template 2', content: 'Test 2'}
        ]
    });

    // ====== upload song cover ======= //
    $(function () {
        $("#upload-cover-link").on('click', function (e) {
            e.preventDefault();
            $("#upload-cover:hidden").trigger('click');
        });
    });

    $(document).ready(function () {
        $.uploadPreview({
            input_field: "#upload-cover",
            preview_box: "#cover-image-holder",
            label_field: "#upload-cover-link"
        });
    });

    // ====== upload member's avatar ======= //
    $(function () {
        $("#upload-avatar-link").on('click', function (e) {
            e.preventDefault();
            $("#upload-avatar:hidden").trigger('click');
        });
    });

    $(document).ready(function () {
        $.uploadPreview({
            input_field: "#upload-avatar",
            preview_box: "#avatar-image-holder",
            label_field: "#upload-avatar-link"
        });
    });

    // ====== upload merchandise ======= //
    $(function () {
        $("#upload-merchandise-link").on('click', function (e) {
            e.preventDefault();
            $("#upload-merchandise:hidden").trigger('click');
        });
    });

    $(document).ready(function () {
        $.uploadPreview({
            input_field: "#upload-merchandise",
            preview_box: "#merchandise-image-holder",
            label_field: "#upload-merchandise-link"
        });
    });

    function addAlbum() {
        $("#add-album-form").toggle('slow');
    }

</script>

</body>
</html>
