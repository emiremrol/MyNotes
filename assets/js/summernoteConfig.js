/** Summernote configuration*/
$(document).ready(function(){
    $("#summernote").summernote(
        {
            tabsize:2,
            width:750,
            height:300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table',['table']],
                ['insert', []]
            ]
        }
    );
})