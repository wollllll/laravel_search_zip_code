<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>お問い合わせフォーム</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<main>
    <div class="container w-50">
        <section class="mt-5">
            <h1 class="text-center">ゆーびんばんごーけんさく</h1>
        </section>

        <section>
            <div>
                <label for="first_code">郵便番号</label>
                <div class="row">
                    <div class="col-4">
                        <input id="first_code" class="form-control" type="text" name="first_code">
                    </div>
                    <div class="col-2 text-center">
                        <span>ー</span>
                    </div>
                    <div class="col-4">
                        <input id="last_code" class="form-control" type="text" name="first_code">
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <label for="prefecture">都道府県</label>
                <input id="prefecture" class="form-control" type="text" name="prefecture">
            </div>

            <div class="mt-3">
                <label for="city">市町村</label>
                <input id="city" class="form-control" type="text" name="city">
            </div>
        </section>
    </div>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

<script>
    let zipCode = {
        dom: {
            lastCode: $('#last_code')
        },
        modules: {
            _search: function () {
                $.ajax({
                    url: '{{ route('search') }}',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        'first_code': $('#first_code').val(),
                        'last_code': $('#last_code').val()
                    }
                }).done(function (data) {
                    if (data.prefecture) $('input[name="prefecture"]').val(data.prefecture);
                    if (data.city) $('input[name="city"]').val(data.city + data.address);
                }).fail(function () {

                });
            }
        },
        init: function () {
            zipCode.dom.lastCode.on('keyup', zipCode.modules._search);
        }
    };

    $(function () {
        zipCode.init();
    });
</script>
</body>
</html>
