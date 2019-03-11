<div class="boxed sticky push-down-30">
    <div class="row">
        <div class="col-xs-10  col-xs-offset-1">
            <div class="widget-author__content">
                <form action="" method="POST" id="ajaxForm">
                    {{ csrf_field() }}
                    Name: <input name="name" type="text"><br>
                    Surname: <input name="surname" type="text"><br>
                    Age: <input name="age" type="text"><br>
                    <button type="submit">Send</button>
                </form>
                <div id="ajaxContent"></div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script>
    $(() => {
        $('#ajaxForm').on('submit', e => {
            const name = $('[name="name"]').val(),
                surname = $('[name="surname"]').val(),
                age = $('[name="age"]').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            e.stopPropagation();
            e.preventDefault();

            const postPromise = $.post('/ajax', {
                name: name,
                surname: surname,
                age: age
            });

            postPromise.then(data => {
                console.log(data);
                $('#ajaxContent').html(data);
            }, error => {
                console.error(error);
                $('#ajaxContent').html('<h3 style="color: red">Error fetching data from server with code: ' + error.message + '</h3>');
            });
        });
    });
</script>
