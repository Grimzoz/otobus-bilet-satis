$(document).ready(function () {

    $('#btncu').click(function () {

        $.ajax({
            method: "POST",
            url: "ajax.php?type=giris.php",
            data: $('#baslik_form').serialize()
        })
            .done(function( msg ) 
            {
                if(msg == "bos")
                {
                    swal("Boş Bırakılmış Alan!","","error");
                }
                else if(msg == "ok")
                {
                    swal("Giriş Başarılı","","success");
                    location.href = "index.php";
                    
                }
                else if(msg == "hata")
                {
                    swal("Hatalı giriş!","","error");
                }
                
            });

    });

//    $('#uye_btn').click(function () {
  /*  $("#uye_btn").on('click', function() {
        $.ajax({
            method: "POST",
            url: "ajax.php?type=uye_ol.php",
            data: $('#uyelik_form').serialize()
        })
            .done(function( msg ) 
            {
                if(msg == "bos")
                {
                    sweetAlert("Boş Bırakılmış Alan!","","error");
                }
                else if(msg == "ok")
                {
                    sweetAlert("Üyelik Başarılı","","success");
                    //location.href = "index.php";
                   
                }
                else if(msg == "hata")
                {
                    sweetAlert("Üyelik Başarısız","Sorun Oluştu!","error");
                }
                
            });
    
    });
    

 */
});
