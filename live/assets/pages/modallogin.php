<div class="modal rounddiag" id="myModal">
    <div class="modal-dialog roundTop">
        <div class="modal-content rounddiag">
            <div class="modal-header roundTop">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="glyphicon glyphicon-remove-sign"></i></button>
                <h4 class="modal-title">Login</h4>
            </div>
            <div class="modal-body rounddiag">
                <div class="alert alert-info" id="logininfo""><i class="glyphicon glyphicon-circle-arrow-right"></i> Bitte einloggen</div>
                <div class="alert alert-success hidden" id="loginsuccess"><i class="glyphicon glyphicon-ok"></i> Login erfolgreich.</div>
                <div class="alert alert-danger hidden" id="loginfail"><i class="glyphicon glyphicon glyphicon-remove"></i> Falscher Benutzername und/oder Passwort.</div>
                <form role="form" name="loginform" method="post" id="loginform" action="assets/pages/backend/pdoconnection.php">
                    <div class="form-group">
                    <!-- MAIL ADDRESS -->
                        <label for="username">E-Mail Addresse</label>
                        <input type="email" autofocus="autofocus" class="form-control" id="username" name="username" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                    <!-- PASSWORD -->
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" autocomplete="off" placeholder="Password">
                    </div>
            </div>
            <div class="modal-footer roundBot">
<!--                <a href="#" data-dismiss="modal" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i> Schlie&szlig;en</a>-->
                <button type="button" class="btn btn-primary btn-sm" id="usrlogin">
                    <span class="glyphicon glyphicon-ok"></span> Login
                </button>
            </div>
                </form>
        </div>
    </div>
</div>
