@extends('layouts.front.front_child')

@section('content')
    <section class="courseControl">
        <div class="courseControl-separator direction-separator">
        </div>
        <div class="courseControl-container sticky-container container">

            @include('layouts.front.includes.admin_sidebar_vrst', ['headTitle' => 'Управління курсами', 'imgPath' => 'img/teacher-mobileMenu-2.png'])

            <div class="cource-container--mobile">
                <form action="{{ route('create_course') }}" method="POST" id="create_course" enctype="multipart/form-data">
                    @csrf
                    <h3 class="courseEdit-title courseControl-title">Створити курс</h3>

                    <div class="courseEdit-block">
                        <div class="courseEdit-top">Назва та опис курсу</div>
                        <div class="courseAdd-wrapper">
                            <div class="courseAdd-inner courseAdd-inner_margbottom">
                                <div class="courseAdd-inner_left">
                                    <div class="courseAdd_left--name">Назва<sup>*</sup></div>
                                </div>
                                <div class="courseAdd-inner_right">
                                    <input class="course-faq--input courseAdditional--input" id="course_name" name="name" type="text" required>
                                </div>
                            </div>

                            <div class="courseAdd-inner courseAdd-inner_margbottom">
                                <div class="courseAdd-inner_left">
                                    <div class="courseAdd_left--name">Опис<sup>*</sup></div>
                                </div>
                                <div class="courseAdd-inner_right">
                                    <textarea class="tinyMCE-area" id="description" name="description"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="courseEdit-block">
                        <div class="courseEdit-top">Фото курсу</div>
                        <div class="courseAdd-wrapper">
                            <div class="courseAdd-grid">
                                <div class="courseAdd-grid_item">Додати фото</div>
                                <div class="courseAdd-grid_item">
                                    <div class="courseAdditional-input-wrapper">
                                        <input class="courseAdditional-input_input" type="text" id="img_upload_field" placeholder="Назва файлу">
                                        <input class="courseAdditional-input_button" type="file" name="course_image">
                                        <a class="courseAdditional-input_FakeButton" href="##">Завантажити</a>
                                    </div>

                                    <div class="courseAdd-info-wrapper">
                                        <img src="" id="imgprev" heigth="150" width="150">
                                        <a class="courseAdditional-docName docName-restyling" style="padding-right: 145px;" id="img_upload_name" href="##">
                                            Нема фото
                                        </a>
                                    </div>

                                </div>
                                <div class="courseAdd-grid_item">
                                    Файли з розширенням JPG, JPEG, або PNG. Максимальний розмір - 5 Мб
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="courseEdit-btn-watch_wrapper">
                        <a class="courseEdit-btn-watch btn-watch--more" onclick="submitForm()" href="##"><span>Зберегти курс</span></a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    <script>
        tinymce.init({
            selector: '.tinyMCE-area',
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar:
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist | ' +
                'insertfile link image media pageembed template ' ,
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });
    </script> 
    <script>
        $(document).ready(function() {
            $('#img_upload_name').hide();
            $('input[type="file"]').change(function(e) {
                var geekss = e.target.files[0].name; 
                //var filetype = e.target.files[0];
                var fileExtension = ['jpeg', 'jpg', 'png'];

                //var fileName = e.files[0].name;

                if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                    alert("Неправильний формат файлу! Доступнi формати: "+fileExtension.join(', '));
                } else if(e.target.files[0].size >= 5000000){
                    alert("Файл перевищує 5мб!");
                } else {
                    readURL(this);
                    $('#img_upload_name').show();
                    alert("Фото "+ geekss + " успішно додано!");
                    $("#img_upload_field").val(geekss);
                    $("#img_upload_name").text(geekss);
                }
            });
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#imgprev').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        function submitForm(){

            // Получаем инфу
            var name = $.trim( $('#course_name').val() );

            // var myContent = tinymce.activeEditor.getContent();
            var description = tinymce.get('description').getContent();
            //alert(myContent);

            if (name  === '') {
                alert('Введіть назву курсу!');
                return false;
            } else if(description == ""){
                alert('Введіть опис курсу!');
                return false;
            } else {
                document.getElementById('create_course').submit();
            }
        }

    </script>
    <script>
        $( "#submit_button" ).click(function() {
            $( "#create_course" ).submit();
        });
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
    <script src="assets/js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
    $(document).ready(function(){

        $('#student').keyup(function(){
            var query = $(this).val();
            if(query != ''){
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('autocomplete.fetch') }}",
                    method:"POST",
                    data:{query:query, _token:_token},
                    success:function(data){
                        $('#studentList').fadeIn();
                        $('#studentList').html(data);
                    }
                });
            }
        });

        $(document).on('click', 'li', function(){
            $('#student').val($(this).text());
            $('#studentList').fadeOut();
        });

        /* Создаем аррей с студентами */
        var students_array = new Array();

        $('#addstudent').click(function() {
            /* Берем имя текущего студента */
            var curr_stud = $('#student').val();
            console.log(curr_stud);
            console.log(students_array);
            /* Если студент есть в аррее */
            if(jQuery.inArray(curr_stud, students_array) != -1 ){
                alert("Студент "+ curr_stud + " Уже добавлен!");
            } else {
                $('#studentsAdd').append( "<button class='btn btn-success m-1' disabled>"+ curr_stud + "</button>" );
                $('#studentsAdd').append( "<input type='hidden' name='student_name[]' value='" + curr_stud +"'>" );
                /* Добавляем текущего студента в аррей */
                students_array.push(curr_stud);
            }

        });

    });
</script>
@endsection
