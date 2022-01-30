$(function() {
    $("select[name='advo1']").change(function(){
        var pilih1 = $("select[name='advo1']").val();
        $.post("http://localhost/advokat_new/ketua/optTimAdvokat", {'id_1':pilih1,'id_2':null}, function(respon) {
            $("select[name='advo2']").html(respon);
            $("select[name='advo3']").html("<option disabled selected>Pilih Pengacara</option>");
        })
    })
    $("select[name='advo2']").change(function(){
        var pilih1 = $("select[name='advo1']").val();
        var pilih2 = $("select[name='advo2']").val();
        $.post("http://localhost/advokat_new/ketua/optTimAdvokat", {'id_1':pilih1,'id_2':pilih2}, function(respon) {
            $("select[name='advo3']").html(respon);
        })
    })
});