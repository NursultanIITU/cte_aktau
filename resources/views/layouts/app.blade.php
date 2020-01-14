<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1">
    <link rel="shortcut icon" href="{{asset('/static/favicon/favicon.png')}}">
    <meta property="og:image" content="{{asset('/static/img/og_image.jpeg')}}">
    <link rel="shortcut icon" href="{{asset('/static/favicon/favicon.png')}}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{asset('/static/favicon/apple-touch-icon.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('/static/favicon/apple-touch-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="167x167" href="{{asset('/static/favicon/apple-touch-icon-167x167.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="../public/static/favicon/apple-touch-icon-180x180.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('/css/style.bundle.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <title>Main</title>
    <style>
        .preloader{width: 100%;height: 100%;position: fixed;background-color: #fff;z-index: 9999;}
        .select2 {
            width: -webkit-fill-available !important;
        }
        .select2-selection {
            height: 40px !important;
            display: flex !important;
            align-items: center !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            top: 7px !important;
        }


        .input-group {
            margin-bottom: 15px;
        }

        .sendBtn {
            max-width: calc(100% / 2 - 50px);
            min-width: calc(100% / 3 - 50px);
            height: 40px;
            display: block;
            line-height: 40px;
            border: none;
            cursor: pointer;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .sendBtn:hover {
            color: white !important;
        }

        .btn-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        button {
            outline: none;
            border: none;
            color : white !important;
        }

        button:hover {
            cursor: pointer;
            color: #ffffff !important;
        }

        .calculator .btn {
            line-height: 0px;
        }
    </style>
</head>
<body>
<div class="preloader"></div>
<div class="wrapper">
    @include('assets.header')

    @yield('content')

    @include('assets.footer')
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        {{--action="{{route('send.message')}}" method="POST"--}}
        <form id="form-feedback">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Оформить заявку</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="input-group">
                        <input required  type="text" name="name" placeholder="Введите Ваше имя"/>
                    </div>
                    <div class="input-group">
                        <input required type="text" name="phone" placeholder="Ваш номер телефона"/>
                    </div>
                </div>
                <div class="modal-footer">

                    <button id="submit" type="submit" class="btn btn--blue text-center">Оформить заявку</button>
                </div>
            </div>
        </form>
    </div>
</div>

</body>

<script src="/js/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="{{asset('/js/bundle.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    $('#select_from').select2();
    $('#select_to').select2();
    $('#type_of_train').select2();
</script>
<script>
    //For get event Form Feedback on submit
    $('#form-feedback').on('submit', function(event){
        event.preventDefault();
        var formData = new FormData(this);

        var selectFrom=$( "#select_from option:selected" ).text();
        var selectTo=$( "#select_to option:selected" ).text();
        var type_of_train=$( "#type_of_train option:selected" ).text();
        var weight=$('#weight').val();
        var title=$('#title').val();

        formData.append('selectFrom', selectFrom);
        formData.append('selectTo', selectTo);
        formData.append('type_of_train', type_of_train);
        formData.append('weight', weight);
        formData.append('title', title);

        //Ajax Send Request
        $.ajax({
            url: '{{ route('send.message') }}', //Name Api Route
            method: 'POST', //Method Request
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            beforeSend:function() {
                $('#submit').attr('disabled', 'disabled');
                $('#submit').html('Отправляется...');
            },
            success:function(data) {
                $('#submit').attr('disabled', false);
                $('#submit').html('Оформить заявку');
                $('#form-feedback')[0].reset();


                //Json Parse for Response of Request
                data = JSON.parse(data);

                //If response message success
                if (data.message == "success") {
                    $('#exampleModal').modal('hide');

                    //Show Sweet Alert Success
                    Swal.fire({
                        type: 'success',
                        title: 'Удачно!',
                        text: 'Ваша заявка отправлена!'
                    });


                    //If response message failed
                } else if (data.message == "failed") {

                    //Show Sweet Alert Error
                    Swal.fire({
                        type: 'error',
                        title: 'Opps...!',
                        text: 'Что-то пошло не так!'
                    });
                } else {

                    //Show Sweet Alert Error
                    Swal.fire({
                        type: 'error',
                        title: 'Opps...!',
                        text: 'Что-то пошло не так!',
                        footer: 'Error: ' + data.message
                    });
                }
            },
            error:function(data, xhr) {
                $('#submit').attr('disabled', false);
                $('#submit').html('Оформить заявку');

                //Show Sweet Alert Error
                Swal.fire({
                    type: 'error',
                    title: 'Opps...!',
                    text: 'Что-то пошло не так!',
                    footer: 'Error: ' + data
                });
            }
        });
    });
</script>
</html>