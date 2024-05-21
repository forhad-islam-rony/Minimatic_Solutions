<div class="form__container">
    <form action="#" method="post" class="form">
        <h1 class="form__heading">Register<button onclick="closeForm(event)" class="form__close">X</button></h1>
        <div class="form__content">
            <div class="input__container">
                <input type="text" class="input" placeholder="a">
                <label for="" class="label">Email</label>
            </div>

            <div class="input__container">
                <input type="text" class="input" placeholder="a">
                <label for="" class="label">Username</label>
            </div>

            <div class="input__container">
                <input type="text" class="input" placeholder="a">
                <label for="" class="label">Password</label>
            </div>

            <div class="input__container">
                <input type="text" class="input" placeholder="a">
                <label for="" class="label">Confirm Password</label>
            </div>
            <input type="submit" class="submit__button" value="Sign up">
    </form>
</div>

<script>
    var fcontainer = document.querySelector('.form__container');

    function openForm() {
        fcontainer.classList.remove('hide');
        fcontainer.classList.add('show');
    }

    function closeForm(event) {
        event.preventDefault();
        fcontainer.classList.remove('show');
        fcontainer.classList.add('hide');

    }
</script>
