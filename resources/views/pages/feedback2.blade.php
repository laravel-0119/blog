<div class="boxed push-down-45">
    <div class="row">
        <div class="col-xs-10  col-xs-offset-1">
            <div class="contact">
                <h2>Обратная связь</h2>
                <p class="contact__text">Оставьте ваше сообщение и я обязательно отвечу вам.</p>
                <div class="alert alert-danger alert-dismissable" role="alert" style="display: none">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <strong>Во время заполнения формы возникли ошибки!</strong><br>
                    <div class="errorsOutput"></div>
                </div>
                <form action="" method="POST" id="feedbackForm">
                    <div class="row">
                        <div class="col-xs-6">
                            <input type="text" placeholder="Имя или никнейм *" name="name" value="{{ old('name') }}" data-parsley-required="true" data-parsley-minlength="2" data-parsley-maxlength="50">
                        </div>
                        <div class="col-xs-6">
                            <input type="text" placeholder="Адрес e-mail *" name="email" value="{{ old('email') }}" data-parsley-required="true" data-parsley-type="email" data-parsley-maxlength="255">
                        </div>
                        <div class="col-xs-12">
                            <textarea rows="6" type="text" placeholder="Текст сообщения *" name="message">{{ old('message') }}</textarea>
                            <button type="submit" class="btn btn-primary">Оправить сообщение</button> <span class="contact__obligatory">Поля, помеченные * обязательны для заполнения</span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.8.0/parsley.min.js"></script>

<script>
    Parsley.addMessages('ru', {
        defaultMessage: "Некорректное значение.",
        type: {
            email:        "Введите адрес электронной почты.",
            url:          "Введите URL адрес.",
            number:       "Введите число.",
            integer:      "Введите целое число.",
            digits:       "Введите только цифры.",
            alphanum:     "Введите буквенно-цифровое значение."
        },
        notblank:       "Это поле должно быть заполнено.",
        required:       "Обязательное поле.",
        pattern:        "Это значение некорректно.",
        min:            "Это значение должно быть не менее чем %s.",
        max:            "Это значение должно быть не более чем %s.",
        range:          "Это значение должно быть от %s до %s.",
        minlength:      "Это значение должно содержать не менее %s символов.",
        maxlength:      "Это значение должно содержать не более %s символов.",
        length:         "Это значение должно содержать от %s до %s символов.",
        mincheck:       "Выберите не менее %s значений.",
        maxcheck:       "Выберите не более %s значений.",
        check:          "Выберите от %s до %s значений.",
        equalto:        "Это значение должно совпадать."
    });

    Parsley.setLocale('ru');
    $('#feedbackForm').parsley();

    $(function() {
        $('#feedbackForm').on('submit', function (e) {
            var name = $('[name="name"]').val(),
                email = $('[name="email"]').val(),
                message = $('[name="message"]').val();

            e.stopPropagation();
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var postPromise = $.post('/api/feedback', {
                name: name,
                email: email,
                message: message
            });

            postPromise.then(function (data) {
                console.log(data);

                if (data || data.status === 'OK') {
                    $('div[role="alert"]')
                        .hide()
                        .find('.errorsOutput')
                        .html('');
                    alert('Спасибо за ваше обращение!');
                }
            }, function (errorData) {
                //console.error(errorData);

                var errors = errorData.responseJSON.errors,
                    outErrors = [];


                for (var error in errors) {
                    //console.log(errors[error][0]);
                    outErrors.push(errors[error][0]);
                }

                $('div[role="alert"]').show().find('.errorsOutput').html(outErrors.join('<br>'));
            });
        });
    });

</script>


