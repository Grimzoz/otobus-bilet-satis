
<div class="modal fade" id="giris" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title text-center" id="exampleModalLongTitle">GİRİŞ</h5>
            </div>
                <br>
                <div class="card-body">
                        <form  method="post" id="baslik_form" onsubmit="return false;">
                        <div class="form-label-group">
                            <label for="inputEmail">E-Posta</label>
                            <input type="text" name="kadi" class="form-control" id="kadi" placeholder="E-Posta" required autofocus>
                        </div>
                        <br>
                        <div class="form-label-group">
                            <label for="inputPassword">Şifre</label>
                            <input type="password" name="sifre" class="form-control" id="sifre" placeholder="Şifre">              
                        </div>
                        <br>
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" id="btncu">Giriş Yap</button>
                        <button class="btn btn-lg btn-danger btn-block text-uppercase" type="submit" data-toggle="modal" data-target="#uyelik">Üye Ol</button>
                        </form>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                        </div>
                    </div>
             </div>
     </div>
</div>








