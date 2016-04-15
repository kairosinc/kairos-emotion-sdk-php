var ajaxFormOptions = { 
    success:       afterFormSubmitSuccess,  // post-submit callback 
    beforeSubmit:  beforeFormSubmit,  // pre-submit callback 
    resetForm: true        // reset the form after successful submit 
}; 
$('#mediaUploadForm').submit(function() { 
    $(this).ajaxSubmit(ajaxFormOptions);            
    // always return false to prevent standard browser submit and page navigation 
    return false; 
});
//function after succesful file upload (when server response)
function afterFormSubmitSuccess(data) {
    $(".ui-container").hide();
    $("#processing-spinner").hide();
    $("#highcharts-containers").show();
    highchartsApp.displayData(JSON.stringify(JSON.parse(data).frames));
}
function beforeFormSubmit(){
    $(".ui-container").hide();
    $("#processing-spinner").show();
}
$("#retry").click(function () {
    location.reload();
});


