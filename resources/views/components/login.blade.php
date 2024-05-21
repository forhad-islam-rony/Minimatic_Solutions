<div class="form__container form__register">
    <form action="/register" method="post" class="form">
        @csrf
        <h1 class="form__heading">Register<button onclick="closeForm(event,'register')" class="form__close">X</button></h1>
        <div class="form__content">
            <div class="checkbox__container">
                <label for="loginType" class="checkbox__label">Vendor</label>
                <input type="checkbox" name="loginType" value="1" class="form__checkbox">
                <label for="loginType" class="checkbox__label">User</label>
            </div>
            <div class="input__container">
                <input type="text" name="name" class="input" placeholder="a">
                <label for="email" class="label">Name</label>
            </div>
            <div class="input__container">
                <input type="text" name="email" class="input" placeholder="a">
                <label for="email" class="label">Email</label>
            </div>
            <div class="input__container">
                <input type="text" name="mobile" class="input" placeholder="a">
                <label for="mobile" class="label">Mobile</label>
            </div>
            <div class="input__container">
                <input type="password" name="password" class="input" placeholder="a">
                <label for="password" class="label">Password</label>
            </div>
            <input type="submit" class="submit__button" value="Register">
    </form>
</div>


<div class="form__container form__login">
    <form action="/login" method="post" class="form">
        @csrf
        <h1 class="form__heading">Login<button onclick="closeForm(event,'login')" class="form__close">X</button></h1>
        <div class="form__content">
            <div class="input__container">
                <input type="text" name="email" class="input" placeholder="a">
                <label for="email" class="label">Email</label>
            </div>

            <div class="input__container">
                <input type="password" name="password" class="input" placeholder="a">
                <label for="password" class="label">Password</label>
            </div>

            <input type="submit" class="submit__button" value="Login">
    </form>
</div>

<script>
    var flogin = document.querySelector('.form__login');
    var fregister = document.querySelector('.form__register');
    var fopen = 0;
    var body = document.querySelector('body');

    function openForm(event, form) {
        event.preventDefault();
        body.classList.add('stop__scrolling');
        if (fopen == 0) {
            if (form == "login") {
                fcontainer = flogin;
            } else {
                fcontainer = fregister;
            }
            fcontainer.classList.remove('form__hide');
            fcontainer.classList.add('form__show');
            fopen = 1;
        }
    }

    function closeForm(event, form) {
        event.preventDefault();
        body.classList.remove('stop__scrolling');
        if (fopen == 1) {
            if (form == "login") {
                fcontainer = flogin;
            } else {
                fcontainer = fregister;
            }
            fcontainer.classList.remove('form__show');
            fcontainer.classList.add('form__hide');
            fopen = 0;
        }
    }
</script>
