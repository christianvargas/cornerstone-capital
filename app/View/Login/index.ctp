<div class="row-fluid login-wrapper">
    <div class="box">
        <div class="content-wrap">
            <h6>Login</h6>
            <form action="/login" method="POST">
                <input name="User[username]" class="span12" type="text" placeholder="Username" value="<?= CakeRequest::data('User.username'); ?>">
                <input name="User[passwd]" class="span12" type="password" placeholder="Password">
                <div class="action">
                    <input type="submit" name="login" value="Login" class="btn-glow primary signup" />
                </div>                
            </form>
        </div>
    </div>

    <div class="span4 already">
        <p>Forgot your username or password?</p>
        <a href="#">Click Here</a>
    </div>
</div>