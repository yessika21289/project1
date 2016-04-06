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
<!-- charts scripts -->
<script src="<?php echo base_url(); ?>assets/jquery-knob/js/jquery.knob.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.sparkline.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="<?php echo base_url(); ?>assets/js/owl.carousel.js"></script>
<!-- jQuery full calendar -->
<
<script src="<?php echo base_url(); ?>assets/js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
<script src="<?php echo base_url(); ?>assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
<!--script for this page only-->
<script src="<?php echo base_url(); ?>assets/js/calendar-custom.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.rateit.min.js"></script>
<!-- custom select -->
<script src="<?php echo base_url(); ?>assets/js/jquery.customSelect.min.js"></script>
<script src="<?php echo base_url(); ?>assets/chart-master/Chart.js"></script>

<!--custome script for all page-->
<script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
<!-- custom script for this page-->
<script src="<?php echo base_url(); ?>assets/js/sparkline-chart.js"></script>
<script src="<?php echo base_url(); ?>assets/js/easy-pie-chart.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?php echo base_url(); ?>assets/js/xcharts.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.autosize.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.placeholder.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/gdp-data.js"></script>
<script src="<?php echo base_url(); ?>assets/js/morris.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/sparklines.js"></script>
<script src="<?php echo base_url(); ?>assets/js/charts.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.min.js"></script>
<!--<script type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.uploadPreview.min.js"></script>
<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/locales/bootstrap-datepicker.en-GB.min.js"></script>

<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript" language="javascript"></script>-->
<script src="<?php echo base_url(); ?>assets/multifile-master/jquery.MultiFile.js" type="text/javascript"
        language="javascript"></script>

<script type="text/javascript" src="<?php echo base_url() . 'assets/tinymce/tinymce.min.js'; ?>"></script>

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

    //knob
    $(function () {
        $(".knob").knob({
            'draw': function () {
                $(this.i).val(this.cv + '%')
            }
        })
    });

    //carousel
    $(document).ready(function () {
        $("#owl-slider").owlCarousel({
            navigation: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true

        });
    });

    //custom select box

    $(function () {
        $('select.styled').customSelect();
    });

    /* ---------- Map ---------- */
    $(function () {
        $('#map').vectorMap({
            map: 'world_mill_en',
            series: {
                regions: [{
                    values: gdpData,
                    scale: ['#000', '#000'],
                    normalizeFunction: 'polynomial'
                }]
            },
            backgroundColor: '#eef3f7',
            onLabelShow: function (e, el, code) {
                el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
            }
        });
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

    //    $('#sandbox-container .input-append.date').datepicker({
    //        clearBtn: true,
    //        todayHighlight: true
    //    });

    function addAlbum() {
        $("#add-album-form").toggle('slow');
    }

</script>

</body>
</html>
