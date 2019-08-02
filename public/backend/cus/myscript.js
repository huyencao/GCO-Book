$(document).ready(function(){
	$(function () {
        $("#example1,#example2").DataTable({
            language:{
                "sProcessing":   "Đang xử lý...",
                "sLengthMenu":   "Xem _MENU_ mục",
                "sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
                "sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
                "sInfoEmpty":    "Đang xem 0 đến 0 trong tổng số 0 mục",
                "sInfoFiltered": "(được lọc từ _MAX_ mục)",
                "sInfoPostFix":  "",
                "sSearch":       "Tìm:",
                "sUrl":          "",
                "oPaginate": {
                    "sFirst":    "Đầu",
                    "sPrevious": "Trước",
                    "sNext":     "Tiếp",
                    "sLast":     "Cuối"
                }
            }

        });
	});
});

tinymce.init({
    selector: 'textarea#content',
    height: 350,
    width:"",
    content_style: ".mce-content-body {font-size:14pt;font-family:Times New Roman;}",
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern imagetools code fullscreen"
    ],

    toolbar1: "undo redo bold italic underline strikethrough cut copy paste| alignleft aligncenter alignright alignjustify bullist numlist outdent indent blockquote searchreplace | styleselect formatselect fontselect fontsizeselect ",
    toolbar2: "table | hr removeformat | subscript superscript | charmap emoticons ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft | link unlink anchor image media | insertdatetime preview | forecolor backcolor print fullscreen code ",

    font_formats: 'Andale Mono=andale mono,times;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier;'
        + 'Dancing Script=cursive;' 
    + 'Georgia=georgia,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;'
        + 'Oswald=sans-serif;'
    + 'Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times new roman,times;Trebuchet MS=trebuchet ms,geneva;Verdana=verdana,geneva;Webdings=webdings;Wingdings=wingdings,zapf dingbats',

    image_advtab: true,
    menubar: false,
    toolbar_items_size: 'small',
    relative_urls: false, 
    remove_script_host : false,
    // forced_root_block: false,

    filemanager_title:"Media Manager",  
    external_filemanager_path: homeUrl() + "/file/",
    external_plugins: { "filemanager" : homeUrl() + "/file/plugin.min.js"},
});

tinymce.init({
    selector: 'textarea#desc',
    toolbar_items_size: 'small',
    content_style: ".mce-content-body {font-size:14pt;font-family:Times New Roman;}",
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern imagetools code fullscreen"
    ],
    toolbar1: "undo redo bold italic underline strikethrough | alignleft aligncenter alignright alignjustify bullist numlist outdent indent blockquote link unlink anchor | preview | forecolor backcolor formatselect fontselect fontsizeselect fullscreen code",

    font_formats: 'Andale Mono=andale mono,times;Arial=arial,helvetica,sans-serif;Arial Black=arial black,avant garde;Book Antiqua=book antiqua,palatino;Comic Sans MS=comic sans ms,sans-serif;Courier New=courier new,courier;'
        + 'Dancing Script=cursive;' 
    + 'Georgia=georgia,palatino;Helvetica=helvetica;Impact=impact,chicago;Symbol=symbol;'
        + 'Oswald=sans-serif;'
    + 'Tahoma=tahoma,arial,helvetica,sans-serif;Terminal=terminal,monaco;Times New Roman=times new roman,times;Trebuchet MS=trebuchet ms,geneva;Verdana=verdana,geneva;Webdings=webdings;Wingdings=wingdings,zapf dingbats',

    image_advtab: true,
    menubar: false,
    toolbar_items_size: 'small',
    relative_urls: false,
    remove_script_host : false,
    // forced_root_block: false,

    filemanager_title:"Media Manager",  
    external_filemanager_path: homeUrl()+"/file/",
    external_plugins: { "filemanager" : homeUrl()+"/file/plugin.min.js"}
});

$(document).ready( function ( e ){
    $('input#name').keyup(function(event) {
		var title, slug;
	
        title = $(this).val();

        slug = title.toLowerCase();

        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        slug = slug.replace(/ /gi, "-");
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');

        slug = slug.replace(/\[|\]|\{|\}|\\/gi, '');
        
        $('input#slug').val(slug);
	});
});

// $(document).ready(function(){
//     $('a#select-img').click(function(event){
//         event.preventDefault();
//         $('#modal-media-imge').modal('show');
//         $('#modal-media-imge').on('hide.bs.modal',function(e){
//             var imgUrl = $('input#image').val();
//             $('img#show-img').attr('src',imgUrl);
//         });
//     });
// });
// $(document).ready(function(){
//     $('a#remove-img').click(function(event){
//         event.preventDefault();
//         $('input#image').val('');
//         $('img#show-img').attr('src','');
//     });
// });

$(document).ready(function(){
    $('a#del_img').on('click', function(){
        var url =  homeUrl() + "/backend/product/delimg/";
        var _token = $("form[name='frmEditProduct']").find("input[name='_token']").val();
        var idImg = $(this).parent().find("img").attr("idImg");
        var img = $(this).parent().find("img").attr("src");
        var rid = $(this).parent().find("img").attr("id");
        
        $.ajax({
            url: url + idImg,
            type: 'GET',
            cache: false,
            data: {"_token":_token,"idImg":idImg,"urlImg":img},
            success: function(data){
                if (data == 'OK') {
                    $('#'+rid).remove();
                }else{
                    alert('Error ! Please contact admin !');
                }
            }
        });
    });
});

$(document).ready(function(){
    $('a#del_gallery').on('click', function(){
        var url =  homeUrl() + "/backend/inf/delimg/";
        var _token = $("form[name='frmEditImg']").find("input[name='_token']").val();
        var idImg = $(this).parent().find("img").attr("idImg");
        var img = $(this).parent().find("img").attr("src");
        var rid = $(this).parent().find("img").attr("id");
        
        $.ajax({
            url: url + idImg,
            type: 'GET',
            cache: false,
            data: {"_token":_token,"idImg":idImg,"urlImg":img},
            success: function(data){
                if (data == 'OK') {
                    $('#'+rid).remove();
                }else{
                    alert('Error ! Please contact admin !');
                }
            }
        });
    });
});

$(document).on('ready', function() {
    $("#inpImg").fileinput({
        allowedFileTypes: ["image"],
        maxFileSize: 2000,
        showUpload: false
    });
});
$(document).on('ready', function() {
    $("#detailImg").fileinput({
        allowedFileTypes: ["image"],
        maxFileSize: 2000,
        showUpload: false
    });
});
$(document).on('ready', function() {
    $("#inpImg3").fileinput({
        allowedFileTypes: ["image"],
        maxFileSize: 2000,
        showUpload: false
    });
});
$(document).on('ready', function() {
    $("#gallery").fileinput({
        allowedFileTypes: ["image"],
        maxFileSize: 2000
    });
});

$(document).ready(function(){
    $('#chkAll').change(function(event){
        var checkAll = $('#chkAll:checked').length > 0;

        if (checkAll) {
            $('input[name="chkItem[]"]').prop('checked', true);
        }else{
            $('input[name="chkItem[]"]').prop('checked', false);
        }
    });
});

$(document).on('ready', function() {
    $('.multislt').select2({
        placeholder: "Chọn danh mục",
    });
});

$(document).ready(function(){
    var id = $('.liColor').attr('id');
    $("#iphiColor").val(id);

    $('.liColor').on('click', function(ev){
        ev.preventDefault();
        $('.liColor').removeClass('active');
        $(this).addClass('active');

        var id = $(this).attr('id');
        $("#iphiColor").val(id);
    });
});

// jQuery(".tm-input").tagsManager();

// $(document).ready(function(){
//     $('input[name=hidden-txtTag]').change(function(event){
//         var hidetag = $("input[name=hidden-txtTag]").val();
//         $("#iphTag").val(hidetag);
//     });
// });

