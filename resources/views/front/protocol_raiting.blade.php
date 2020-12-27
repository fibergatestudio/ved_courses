@extends('layouts.front.front_child')

@section('title')
    Протокол
@endsection

@section('content')
<section class="direction">
    <!-- protocol modal window start -->
    <form id="protocolForm" class="protocol d-block" method="POST" action="{{ route('protocol.store') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="course_id" value="{{ $protocol->course_id }}">
        <input type="hidden" name="lesson_id" value="{{ $protocol->lesson_id }}">
        <input type="hidden" name="user_id" value="{{ $protocol->user_id }}">
        <h3 class="protocol__title mt-1">ПРОТОКОЛ ОГЛЯДУ</h3>
        <div class="protocol__section">
            <div class="protocol__purple-separator"></div>
            <div class="protocol__section-title">місця події</div>
            <div class="protocol__content">
                <div class="protocol__row protocol__mt-50">
                    <div class="descr-input-block city">
                        <label for="city" class="input-descr">Місто (сел.) </label>
                        <textarea class="input-textarea" id="city" disabled>{{ $protocol->city }}</textarea>
                    </div>
                    <div class="descr-input-block date">
                        <label for="date" class="input-descr">Дата </label>
                        <input class="protocol__input" type="text" id="date" disabled value="{{ $protocol->date }}">
                    </div>
                </div>
                <div class="protocol__row protocol__mt-45">
                    <div class="inspection inspect">
                        <p class="input-descr protocol__pt-2em">Огляд розпочато о</p>
                        <div class="time-block">
                            <div class="hours">
                                <p class="descr-above">Години</p>
                                <div class="select-time">
                                    <select class="select-field inspection-select" disabled>
                                        <option>{{ $protocol->hour_start }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="minutes">
                                <p class="descr-above">Хвилини</p>
                                <div class="select-time">
                                    <select class="select-field inspection-select" disabled>
                                        <option>{{ $protocol->minute_start }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="inspection inspect">
                        <p class="input-descr protocol__pt-2em">Огляд закінчено о</p>
                        <div class="time-block">
                            <div class="hours">
                                <p class="descr-above">Години</p>
                                <div class="select-time">
                                    <select class="select-field inspection-select" disabled>
                                        <option>{{ $protocol->hour_end }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="minutes">
                                <p class="descr-above">Хвилини</p>
                                <div class="select-time">
                                    <select class="select-field inspection-select" disabled>
                                        <option>{{ $protocol->minute_end }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="protocol__row protocol__mt-40">
                    <div class="descr-input-block">
                        <div class="protocol__label-i-block">
                            <label for="cop-initials" class="input-descr">ПІБ слідчого</label>
                            <div class="prompt-block-wrapper">
                                <div class="prompt-block">
                                    <p class="question-mark">?</p>
                                    <p class="question"><span class="text_bold">Слідчий</span> – посадова особа,
                                        уповноважена в межах компетенції, передбаченої кримінально-процесуальним
                                        законодавством,
                                        здійснювати досудове розслідування у кримінальному провадженні. Слідчий несе
                                        відповідальність за законність та своєчасність здійснення процесуальних дій.
                                        Слідчий,
                                        здійснюючи свої повноваження є самостійним у своїй процесуальній діяльності,
                                        втручання в
                                        яку забороняється.</p>
                                </div>
                                <div class="prompt-block">
                                    <p class="exclamation-mark">i</p>
                                    <p class="exclamation" id="exclamation-cop">Слідчий, посада, найменування
                                        органу,
                                        ініціали, прізвище</p>
                                </div>
                            </div>
                        </div>

                        <textarea class="input-textarea" id="cop-initials" disabled>{{ $protocol->cop_initials }}</textarea>
                    </div>
                </div>
                <div class="protocol__row protocol__mt-25">
                    <div class="descr-input-block">
                        <div class="protocol__label-i-block">
                            <label for="basis-of" class="input-descr">На підставі </label>
                            <div class="prompt-block-wrapper">
                                <div class="prompt-block">
                                    <p class="exclamation-mark">i</p>
                                    <p class="exclamation" id="exclamation-basis">(вказується ухвала слідчого судді,
                                        якщо проводиться огляд
                                        житла чи: іншого володіння особи, якщо огляд місця
                                        події проводиться до початку кримінального провадження, вказуються відомості
                                        про
                                        заяву чи повідомлення
                                        про подію)
                                    </p>
                                </div>
                            </div>
                        </div>

                        <textarea class="input-textarea" id="basis-of" disabled>{{ $protocol->basis_of }}</textarea>
                    </div>
                </div>
                <div class="protocol__row protocol__mt-45">
                    <p class="law-articles-par">У відповідності до ст.ст. 104, 105, 106, 234, 237, 223 КПК України:
                    </p>
                </div>
                <div class="protocol__row protocol__mt-10">
                    <p class="block-header-descr">В присутності понятих:
                    </p>
                </div>
                <div class="protocol__row protocol__mt-25">
                    <div class="descr-input-block">
                        <div class="protocol__label-i-block">
                            <div class="p-witness-count">
                                <div class="p-count">1.</div>
                                <label for="witnessed-one" class="input-descr">Понятий</label>
                            </div>
                            <div class="prompt-block-wrapper">
                                <div class="prompt-block">
                                    <p class="question-mark">?</p>
                                    <p class="question" id="question-witnessed1"><span class="text_bold">Понятий
                                        </span>–
                                        фізична особа, яка
                                        залучається до проведення певної процесуальної дії, з метою засвідчення
                                        відповідності записів в протоколі виконаним діям. Понятими не можуть бути
                                        потерпілий, родичі підозрюваного, обвинуваченого і потерпілого, працівники
                                        правоохоронних органів, а також особи, заінтересовані в результатах
                                        кримінального провадження. </p>
                                </div>
                                <div class="prompt-block">
                                    <p class="exclamation-mark">i</p>
                                    <p class="exclamation" id="exclamation-witnessed1">(прізвище, ім’я, по батькові,
                                        дата народження, місце
                                        проживання, особистий підпис)</p>
                                </div>
                            </div>
                        </div>


                        <textarea class="input-textarea" id="witnessed-one" disabled>{{ $protocol->witnessed_one }}</textarea>
                    </div>
                </div>
                <div class="protocol__row protocol__mt-25">
                    <div class="descr-input-block">
                        <div class="p-witness-count">
                            <div class="p-count">2.</div>
                            <label for="witnessed-two" class="input-descr">Понятий</label>
                        </div>
                        <textarea class="input-textarea" id="witnessed-two" disabled>{{ $protocol->witnessed_two }}</textarea>
                    </div>
                </div>
                <div class="protocol__row protocol__mt-20">
                    <p class="law-articles-par">яким у відповідності до ст.ст. 11, 13, 15, 223 КПК України
                        роз’яснені їхні права і обов’язки.

                    </p>
                </div>
            </div>
            <div class="protocol__purple-separator protocol__row protocol__mt-25"></div>
            <div class="protocol__content">
                <div class="protocol__row protocol__mt-40">
                    <p class="block-header-descr">За участі потерпілого:
                    </p>
                </div>
                <div class="protocol__row protocol__mt-20">
                    <div class="descr-input-block">
                        <div class="protocol__label-i-block">
                            <label for="victim" class="input-descr">ПІБ потерпілого</label>
                            <div class="prompt-block-wrapper">
                                <div class="prompt-block">
                                    <p class="question-mark">?</p>
                                    <p class="question" id="question-victim"><span class="text_bold">Потерпілий
                                        </span>-
                                        фізична особа, якій
                                        кримінальним правопорушенням завдано моральної, фізичної або майнової шкоди,
                                        а
                                        також юридична особа, якій кримінальним правопорушенням завдано майнової
                                        шкоди.
                                    </p>
                                </div>
                                <div class="prompt-block">
                                    <p class="exclamation-mark">i</p>
                                    <p class="exclamation" id="exclamation-victim">(прізвище, ім’я, по батькові, дата народження, місце
                                        проживання, особистий підпис)</p>
                                </div>
                            </div>
                        </div>

                        <textarea class=" input-textarea" id="victim" disabled>{{ $protocol->victim }}</textarea>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-20">
                                <p class="law-articles-par">якому у відповідності до ч.ч. 1, 2 ст. 56, ст. 57 КПК
                                    України
                                    роз’яснені його права і обов’язки.
                                </p>
                            </div>
                        </div>

                        <div class="protocol__purple-separator protocol__row protocol__mt-40"></div>
                        <div class="protocol__content">
                            <div class="protocol__row protocol__mt-40">
                                <p class="block-header-descr">За участі підозрюваного:
                                </p>
                            </div>
                            <div class="protocol__row protocol__mt-20">
                                <div class="descr-input-block">
                                    <label for="suspect" class="input-descr">ПІБ підозрюваного</label>
                                    <div class="prompt-block-wrapper">
                                        <div class="prompt-block">
                                            <p class="question-mark">?</p>
                                            <p class="question" id="question-suspect"><span
                                                    class="text_bold">Підозрюваний </span> -
                                                особа, якій у
                                                порядку, передбаченому статтями 276-279 КПК України, повідомлено про
                                                підозру,
                                                особа, яка затримана за підозрою у вчиненні кримінального
                                                правопорушення, або
                                                особа, щодо якої складено повідомлення про підозру, однак його не
                                                вручено їй
                                                внаслідок невстановлення місцезнаходження особи, проте вжито заходів
                                                для
                                                вручення у спосіб, передбачений КПК України для вручення
                                                повідомлень.
                                            </p>
                                        </div>
                                        <div class="prompt-block">
                                            <p class="exclamation-mark">i</p>
                                            <p class="exclamation" id="exclamation-suspect">(прізвище, ім’я, по
                                                батькові, дата народження,
                                                місце
                                                проживання, особистий підпис)</p>
                                        </div>
                                    </div>
                                    <textarea class="input-textarea" id="suspect" disabled>{{ $protocol->suspect }}</textarea>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-20">
                                <p class="law-articles-par">якому у відповідності до ч.ч. 3, 5, 6, 7 ст. 42 КПК
                                    України
                                    роз’яснені його права і обов’язки.


                                </p>
                            </div>
                        </div>
                        <div class="protocol__purple-separator protocol__row protocol__mt-40"></div>
                        <div class="protocol__content">
                            <div class="protocol__row protocol__mt-40">
                                <p class="block-header-descr">За участі захисника:

                                </p>
                            </div>
                            <div class="protocol__row protocol__mt-20">
                                <div class="descr-input-block">
                                    <label for="advocate" class="input-descr">ПІБ захисника</label>
                                    <div class="prompt-block-wrapper">
                                        <div class="prompt-block">
                                            <p class="question-mark">?</p>
                                            <p class="question" id="question-advocate"><span
                                                    class="text_bold">Захисник </span>
                                                - адвокат, який
                                                здійснює захист підозрюваного, обвинуваченого, засудженого,
                                                виправданого, особи,
                                                стосовно якої передбачається застосування примусових заходів
                                                медичного чи
                                                виховного характеру або вирішувалося питання про їх застосування, а
                                                також особи,
                                                стосовно якої передбачається розгляд питання про видачу іноземній
                                                державі
                                                (екстрадицію). Захисник користується процесуальними правами
                                                підозрюваного,
                                                обвинуваченого, захист якого він здійснює, крім процесуальних прав,
                                                реалізація
                                                яких здійснюється безпосередньо підозрюваним, обвинуваченим і не
                                                може бути
                                                доручена захиснику.
                                            </p>
                                        </div>
                                        <div class="prompt-block">
                                            <p class="exclamation-mark">i</p>
                                            <p class="exclamation">(прізвище, ім’я, по батькові, дата народження,
                                                місце
                                                проживання, особистий підпис)</p>
                                        </div>
                                    </div>
                                    <textarea class="input-textarea" id="advocate" disabled>{{ $protocol->advocate }}</textarea>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-20">
                                <p class="law-articles-par">якому у відповідності до ст.ст. 46, 47 КПК України
                                    роз’яснені його
                                    права і обов’язки.
                                </p>
                            </div>
                        </div>
                        <div class="protocol__purple-separator protocol__row protocol__mt-40"></div>
                        <div class="protocol__content">
                            <div class="protocol__row protocol__mt-40">
                                <p class="block-header-descr">За участі представника:

                                </p>
                            </div>
                            <div class="protocol__row protocol__mt-20">
                                <div class="descr-input-block">
                                    <label for="representative" class="input-descr">ПІБ представника:</label>
                                    <div class="prompt-block-wrapper">
                                        <div class="prompt-block">
                                            <p class="question-mark">?</p>
                                            <p class="question" id="question-representative"><span
                                                    class="text_bold">Законними
                                                    представниками</span> - можуть
                                                бути залучені батьки
                                                (усиновлювачі), а в разі їх відсутності - опікуни чи піклувальники
                                                особи,
                                                інші повнолітні близькі родичі чи члени сім’ї, а також представники
                                                органів
                                                опіки і піклування, установ і організацій, під опікою чи піклуванням
                                                яких
                                                перебуває неповнолітній, недієздатний чи обмежено дієздатний.
                                                Законний
                                                представник користується процесуальними правами особи, інтереси якої
                                                він
                                                представляє, крім процесуальних прав, реалізація яких здійснюється
                                                безпосередньо підозрюваним, обвинуваченим і не може бути доручена
                                                представнику.
                                            </p>
                                        </div>
                                        <div class="prompt-block">
                                            <p class="exclamation-mark">i</p>
                                            <p class="exclamation" id="exclamation-representative">(прізвище, ім’я,
                                                по батькові, дата народження,
                                                місце
                                                проживання, особистий підпис)</p>
                                        </div>
                                    </div>
                                    <textarea class="input-textarea" id="representative" disabled>{{ $protocol->representative }}</textarea>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-40">
                                <p class="law-articles-par">якому у відповідності до ч. 5 ст. 44, ч. 4 ст. 58, ч. 2
                                    ст. 59 КПК
                                    України роз’яснені його права і обов’язки.
                                </p>
                            </div>
                        </div>
                        <div class="protocol__purple-separator protocol__row protocol__mt-40"></div>
                        <div class="protocol__content">
                            <div class="protocol__row protocol__mt-40">
                                <p class="block-header-descr">За участі спеціаліста:

                                </p>
                            </div>
                            <div class="protocol__row protocol__mt-20">
                                <div class="descr-input-block">
                                    <label for="specialist" class="input-descr">ПІБ спеціаліста</label>
                                    <div class="prompt-block-wrapper">
                                        <div class="prompt-block">
                                            <p class="question-mark">?</p>
                                            <p class="question" id="question-specialist"><span class="text_bold">
                                                    Спеціалістом у
                                                    кримінальному
                                                    провадженні</span> - є особа, яка володіє спеціальними знаннями
                                                та навичками
                                                і може надавати консультації та висновки під час досудового
                                                розслідування і
                                                судового розгляду з питань, що потребують відповідних спеціальних
                                                знань і
                                                навичок. Спеціаліст може бути залучений для надання безпосередньої
                                                технічної
                                                допомоги (фотографування, складення схем, планів, креслень, відбір
                                                зразків для
                                                проведення експертизи тощо) сторонами кримінального провадження під
                                                час
                                                досудового розслідування і судом під час судового розгляду, а також
                                                для надання
                                                висновків у випадках, передбачених пунктом 7 частини четвертої
                                                статті 71 КПК
                                                України.
                                            </p>
                                        </div>
                                        <div class="prompt-block">
                                            <p class="exclamation-mark">i</p>
                                            <p class="exclamation" id="exclamation-specialist">(прізвище, ім’я, по
                                                батькові, дата народження,
                                                місце
                                                проживання, особистий підпис)</p>
                                        </div>
                                    </div>
                                    <textarea class="input-textarea" id="specialist" disabled>{{ $protocol->specialist }}</textarea>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-20">
                                <p class="law-articles-par">якому у відповідності до ч.ч. 4, 5 ст. 71 КПК України
                                    роз’яснені
                                    їхні права і обов’язки.
                                </p>
                            </div>
                        </div>
                        <div class="protocol__purple-separator protocol__row protocol__mt-40"></div>
                        <div class="protocol__content">

                            <div class="protocol__row protocol__mt-40">
                                <p class="block-header-descr">За участі інших учасників:

                                </p>
                            </div>
                            <div class="protocol__row protocol__mt-20">
                                <div class="descr-input-block">
                                    <label for="other-participant-one" class="input-descr">1. ПІБ учасника</label>
                                    <div class="prompt-block-wrapper">
                                        <div class="prompt-block">
                                            <p class="exclamation-mark">i</p>
                                            <p class="exclamation exclamation-participant">(прізвище, ім’я, по
                                                батькові,
                                                особистий підпис)</p>
                                        </div>
                                    </div>
                                    <textarea class="input-textarea" id="other-participant-one" disabled>{{ $protocol->other_participant_one }}</textarea>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-20">
                                <div class="descr-input-block">
                                    <label for="other-participant-two" class="input-descr">2. ПІБ учасника</label>
                                    <div class="prompt-block-wrapper">
                                        <div class="prompt-block">
                                            <p class="exclamation-mark">i</p>
                                            <p class="exclamation exclamation-participant">(прізвище, ім’я, по
                                                батькові,
                                                особистий підпис)</p>
                                        </div>
                                    </div>
                                    <textarea class="input-textarea" id="other-participant-two" disabled>{{ $protocol->other_participant_two }}</textarea>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-35">
                                <p class="block-header-descr">За участі власника (користувача) приміщення чи іншого
                                    володіння
                                    особи

                                </p>
                            </div>
                            <div class="protocol__row protocol__mt-35">
                                <div class="descr-input-block">
                                    <label for="owner" class="input-descr">ПІБ власника (користувача)</label>
                                    <div class="prompt-block-wrapper">
                                        <div class="prompt-block">
                                            <p class="exclamation-mark">i</p>
                                            <p class="exclamation exclamation-participant" id="exclamation-owner">
                                                (прізвище
                                                ім'я, по батькові, адреса)</p>
                                        </div>
                                    </div>
                                    <textarea class="input-textarea" id="owner" disabled>{{$protocol->owner}}</textarea>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-40">
                                <p class="law-articles-par">Перед початком огляду зазначеним вище особам роз'яснено
                                    їхнє право
                                    бути присутніми при всіх діях, які проводяться в процесі огляду, робити
                                    зауваження, що
                                    підлягають занесенню до протоколу. Особам, які беруть участь у проведенні
                                    огляду, також
                                    роз’яснено вимоги ч. 3 ст. 66 КПК України про їх обов’язок не розголошувати
                                    відомості щодо
                                    проведеної процесуальної дії, а також про застосування технічних засобів
                                    фіксації, умови та
                                    порядок їх використання:
                                </p>
                            </div>
                            <div class="protocol__row protocol__mt-40">
                                <input class="protocol__input" type="text" id="users-signs" placeholder="(підписи осіб, які беруть участь у проведенні огляду)" value="{{$protocol->users_signs}}" disabled>
                            </div>
                        </div>
                        <div class="protocol__purple-separator protocol__mt-25"></div>
                        <div class="protocol__content">
                            <div class="protocol__section-block-title protocol__mt-30">технічні засоби</div>
                            <div class="protocol__row direction_column protocol__mt-30">
                                <div class="descr-input-block justify_start">
                                    <label for="tech-devices" class="input-descr">Під час огляду застосовані
                                        технічні
                                        засоби: </label>
                                    <div class="prompt-block">
                                        <p class="exclamation-mark">i</p>
                                        <p class="exclamation" id="exclamationtech-devices">(вказуються
                                            застосовування
                                            фото-,
                                            відеозйомки, інших технічних та спеціальних засобів, їх найменування,
                                            технічні
                                            параметри)</p>
                                    </div>
                                </div>
                                <textarea class="input-textarea" id="tech-devices" disabled>{{$protocol->tech_devices}}</textarea>
                            </div>
                            <div class="protocol__row direction_column protocol__mt-50">
                                <div class="descr-input-block justify_start">
                                    <label for="recording-devs" class="input-descr">Фотоапарат; відеокамера; носії
                                        інформації,
                                        на які здійснюється запис: </label>
                                </div>
                                <textarea class="input-textarea" id="recording-devs" disabled>{{$protocol->recording_devs}}</textarea>
                            </div>
                            <div class="protocol__row direction_column protocol__mt-40">
                                <div class="descr-input-block justify_start">
                                    <label for="review-conducted" class="input-descr">Огляд проводився:</label>
                                    <div class="prompt-block-wrapper">
                                        <div class="prompt-block">
                                            <p class="question-mark">?</p>
                                            <p class="question" id="question-review-conducted">(огляд необхідно
                                                проводити
                                                зліва на право, зверху до низу. В
                                                першу чергу проводиться огляд місця проникнення ззовні приміщення. У
                                                подальшому огляд здійснюється від входу до приміщення. Якщо в
                                                будівлі
                                                декілька приміщень, починати огляд необхідно зліва на право. Окремо
                                                описується місце проникнення. Вказується адреса житла чи іншого
                                                володіння
                                                особи та детально описується чіткими і загальнозрозумілими фразами
                                                загальна
                                                обстановка на місці події, всі предмети і сліди в тій послідовності,
                                                в якій
                                                вони досліджувались, якими технічними засобами вони виявлені і
                                                зафіксовані,
                                                які зміни обстановки проведено в ході динамічного огляду. Якщо слід
                                                або
                                                предмет оглядався повторно, результати кожного огляду описуються
                                                окремо.
                                                Якщо після закінчення огляду виникла потреба щось додатково
                                                оглянути,
                                                результат описується в кінці протоколу, робити дописки або
                                                виправлення в
                                                тексті протоколу категорично заборонено. Спеціальні терміни, названі
                                                спеціалістом, пишуться дослівно, але, як правило, повинні
                                                роз’яснюватись. В
                                                описовій частині протоколу фіксується обстановка місця події,
                                                вказується
                                                взаєморозташування основних об'єктів і речових доказів, описуються
                                                виявлені
                                                сліди й інші об'єкти: їхній зовнішній вигляд, розмір, колір, захід,
                                                номерний
                                                знак, напису, матеріал, з якого виготовлені, інші індивідуальні
                                                ознаки. При
                                                описі обстановки слідчий завжди повинен виходити з того, що в
                                                подальшому
                                                може виникнути необхідність у реконструкції обстановки місця події
                                                (слідчого
                                                експерименту) й що це стане можливим лише в тому випадку, якщо
                                                якісно буде
                                                складений протокол. Неприпустимо вживати в протоколі невизначені
                                                слова й
                                                вираження типу: "поблизу", "поруч", "біля" або робити в ньому якісь
                                                припущення)


                                            </p>
                                        </div>
                                        <div class="prompt-block">
                                            <p class="exclamation-mark">i</p>
                                            <p class="exclamation" id="exclamation-review-conducted">(вказуються
                                                погодні
                                                умови, освітлення, температура
                                                повітря, інші дані, які необхідні)</p>
                                        </div>
                                    </div>
                                </div>

                                <textarea class="input-textarea" id="review-conducted" disabled>{{$protocol->review_conducted}}</textarea>
                            </div>
                            <div class="protocol__row protocol__mt-30">
                                <div class="inspection inspect-w-t protocol_mr-10">
                                    <p class="input-descr">Погодні умови</p>
                                    <div class="weather-time-block">
                                        <div class="select-time weather-select">
                                            <select class="select-field inspection-select" disabled>
                                                <option>{{ $protocol->weather }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="inspection protocol__mw-450">
                                    <p class="input-descr">Пора доби</p>
                                    <div class="weather-time-block">
                                        <div class="select-time daytime-select">
                                            <select class="select-field inspection-select" disabled>
                                                <option>{{ $protocol->day_time }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-30">
                                <div class="inspection">
                                    <p class="input-descr">Освітлення</p>
                                    <div class="select-time lightning">
                                        <select class="select-field inspection-select" disabled>
                                            <option>{{ $protocol->lightning }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="protocol__purple-separator protocol__mt-30"></div>
                        <div class="protocol__section-title">Проведеним оглядом встановлено:</div>
                        <div class="protocol__content">
                            <div class="protocol__row protocol__mt-50">
                                <div class="descr-input-block">
                                    <div class="protocol__label-i-block">
                                        <label for="address" class="input-descr">Адреса</label>
                                        <div class="prompt-block-wrapper">
                                            <div class="prompt-block">
                                                <p class="exclamation-mark">i</p>
                                                <p class="exclamation" id="exclamation-address">(вказати місто,
                                                    вулицю, номер будинку, номер
                                                    корпусу;
                                                    номер
                                                    під’їзду, номер квартири, інше)</p>
                                            </div>
                                        </div>
                                    </div>

                                    <textarea class="input-textarea" id="address" disabled>{{$protocol->address}}</textarea>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-50">
                                <div class="inspection inspect-w-t protocol_mr-10">
                                    <p class="input-descr">Підходи</p>
                                    <div class="weather-time-block justify_end">
                                        <div class="select-time weather-select">
                                            <select class="select-field inspection-select" disabled>
                                                <option>{{ $protocol->approach_select }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="descr-input-block other">
                                    <label for="approach" class="input-descr">Інше</label>
                                    <textarea class="input-textarea" id="approach" disabled>{{$protocol->approach}}</textarea>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-50">
                                <div class="inspection inspect-w-t protocol_mr-10">
                                    <p class="input-descr">Схеми перехресть і площ </p>
                                    <div class="weather-time-block justify_end streets-sheme">
                                        <div class="select-time streets-sheme">
                                            <select class="select-field inspection-select" disabled>
                                                <option>{{ $protocol->ways_schemes_select }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="descr-input-block other">
                                    <label for="ways-schemes" class="input-descr">Інше</label>
                                    <textarea class="input-textarea" id="ways-schemes" disabled>{{$protocol->ways_schemes}}</textarea>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-50">
                                <div class="inspection inspect-w-t protocol_mr-10">
                                    <p class="input-descr">Дорога</p>
                                    <div class="weather-time-block justify_end">
                                        <div class="select-time weather-select">
                                            <select class="select-field inspection-select" disabled>
                                                <option>{{ $protocol->roads_select }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="descr-input-block other">
                                    <label for="roads" class="input-descr">Інше</label>
                                    <textarea class="input-textarea" type="text" id="roads" disabled>{{$protocol->roads}}</textarea>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-50">
                                <div class="inspection inspect-w-t protocol_mr-10">
                                    <p class="input-descr">Профіль вулиці </p>
                                    <div class="weather-time-block justify_end">
                                        <div class="select-time streets-and-elems">
                                            <select class="select-field inspection-select" disabled>
                                                <option>{{ $protocol->streets_select }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="descr-input-block other">
                                    <label for="streets" class="input-descr">Інше</label>
                                    <textarea class="input-textarea" id="streets" disabled>{{$protocol->streets}}</textarea>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-50">
                                <div class="inspection inspect-w-t protocol_mr-10">
                                    <p class="input-descr">Елементи вулиці </p>
                                    <div class="weather-time-block justify_end">
                                        <div class="select-time streets-and-elems">
                                            <select class="select-field inspection-select" disabled>
                                                <option>{{ $protocol->streets_elems_select }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="descr-input-block other">
                                    <label for="streets-elems" class="input-descr">Інше</label>
                                    <textarea class="input-textarea" id="streets-elems" disabled>{{$protocol->streets_elems}}</textarea>
                                </div>

                            </div>
                            <div class="protocol__row direction_column protocol__mt-50">
                                <div class="descr-input-block justify_start">
                                    <label for="cameras-devs" class="input-descr">Наявні камери відеонагляду
                                        (спостереження)
                                        на місцях огляду та прилеглій території </label>
                                </div>
                                <textarea class="input-textarea" id="cameras-devs" disabled>{{$protocol->cameras_devs}}</textarea>
                            </div>
                            <div class="protocol__row protocol__mt-50">
                                <div class="inspection inspect-w-t protocol_mr-10">
                                    <p class="input-descr">Житловий будинок </p>
                                    <div class="weather-time-block living-house justify_end">
                                        <div class="select-time living-house">
                                            <select class="select-field inspection-select" disabled>
                                                <option>{{ $protocol->house_select }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="descr-input-block other">
                                    <label for="house" class="input-descr">Поверх</label>
                                    <div class="prompt-block protocol_mr-10">
                                        <p class="exclamation-mark">i</p>
                                        <p class="exclamation" id="exclamation-floor1">(вказати скільки поверхів у
                                            будинку та на
                                            якому поверсі проводиться огляд)</p>
                                    </div>
                                    <textarea class="input-textarea" id="house" disabled>{{$protocol->house}}</textarea>
                                </div>

                            </div>
                            <div class="protocol__row protocol__mt-40">
                                <p class="block-header-descr">Об'єкти торгівлі і публічного харчування </p>
                                <div class="select-time  catering">
                                    <select class="select-field inspection-select" disabled>
                                        <option>{{ $protocol->catering }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-50">
                                <div class="descr-input-block other">
                                    <label for="floor-others" class="input-descr">Інше</label>
                                    <textarea class="input-textarea"
                                        id="floor-others" disabled>{{$protocol->floor_others}}</textarea>
                                </div>
                                <div class="descr-input-block other">
                                    <label for="floor" class="input-descr">Поверх</label>
                                    <div class="prompt-block protocol_mr-10">
                                        <p class="exclamation-mark">i</p>
                                        <p class="exclamation" id="exclamation-floor2">(вказати скільки поверхів у
                                            приміщенні та
                                            на якому поверсі проводиться огляд)</p>
                                    </div>
                                    <textarea class="input-textarea" id="floor" disabled>{{$protocol->floor}}</textarea>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-50">
                                <div class="inspection inspect-w-t protocol_mr-10">
                                    <p class="input-descr">Сходи і ліфт </p>
                                    <div class="weather-time-block justify_end">
                                        <div class="select-time doorhandle">
                                            <select class="select-field inspection-select" disabled>
                                                <option>{{ $protocol->stairs_elevators }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="descr-input-block other_mw-515">
                                    <label for="elevators-stairs" class="input-descr">Інше</label>
                                    <textarea class="input-textarea" type="text" id="elevators-stairs" disabled>{{$protocol->elevators_stairs}}</textarea>
                                </div>

                            </div>
                        </div>
                        <div class="protocol__purple-separator protocol__mt-50"></div>
                        <div class="protocol__content">
                            <div class="protocol__section-block-title protocol__mt-30">Двері та ручки</div>
                            <div class="protocol__row protocol__mt-30">
                                <div class="inspection inspect-w-t protocol_mr-10">
                                    <p class="input-descr">Двері</p>
                                    <div class="weather-time-block doors justify_end">
                                        <div class="select-time doors">
                                            <select class="select-field inspection-select" disabled>
                                                <option>{{ $protocol->doors }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="descr-input-block other other_mw-505">
                                    <label for="door-other" class="input-descr">Інше</label>
                                    <textarea class="input-textarea" id="door-other" disabled>{{$protocol->door_other}}</textarea>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-25">
                                <div class="inspection inspect-w-t protocol_mr-10">
                                    <p class="input-descr">Дверні ручки </p>
                                    <div class="weather-time-block doorhandle justify_end">
                                        <div class="select-time doorhandle">
                                            <select class="select-field inspection-select" disabled>
                                                <option>{{ $protocol->doorhandle }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="descr-input-block other other_mw-505">
                                    <label for="doorhandle-other" class="input-descr">Інше</label>
                                    <textarea class="input-textarea" id="doorhandle-other" disabled>{{ $protocol->doorhandle_other }}</textarea>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-25">
                                <div class="inspection inspect-w-t protocol_mr-10">
                                    <p class="input-descr">Дверні прилади </p>
                                    <div class="weather-time-block door-device justify_end">
                                        <div class="select-time door-device">
                                            <select class="select-field inspection-select" disabled>
                                                <option>{{ $protocol->door_device }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="descr-input-block other other_mw-505">
                                    <label for="traces" class="input-descr">Сліди</label>
                                    <div class="prompt-block protocol_mr-10">
                                        <p class="exclamation-mark">i</p>
                                        <p class="exclamation" id="exclamation-traces">(вказуються сліди,
                                            пошкодження, характер та механізм
                                            слідоутворення)</p>
                                    </div>
                                    <textarea class="input-textarea" id="traces" disabled>{{ $protocol->traces }}</textarea>
                                </div>
                            </div>


                        </div>
                        <div class="protocol__purple-separator protocol__mt-50"></div>
                        <div class="protocol__content">
                            <div class="protocol__section-block-title protocol__mt-30">Замок</div>
                            <div class="protocol__row protocol__mt-30">
                                <div class="inspection inspect-w-t protocol_mr-10">
                                    <p class="input-descr">Врізний</p>
                                    <div class="weather-time-block doors justify_end">
                                        <div class="select-time doors">
                                            <select class="select-field inspection-select" disabled>
                                                <option>{{ $protocol->mortise_lock }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="inspection inspect-w-t protocol_mr-10">
                                    <p class="input-descr">Навісний</p>
                                    <div class="weather-time-block doors justify_end">
                                        <div class="select-time doors">
                                            <select class="select-field inspection-select" disabled>
                                                <option>{{ $protocol->padlock }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-30">
                                <div class="descr-input-block">
                                    <label for="lock-other" class="input-descr">Сліди</label>
                                    <div class="prompt-block-wrapper">
                                        <div class="prompt-block">
                                            <p class="exclamation-mark">i</p>
                                            <p class="exclamation" id="exclamation-lock">(вказуються сліди,
                                                пошкодження,
                                                характер та механізм
                                                слідоутворення)</p>
                                        </div>
                                    </div>
                                    <textarea class="input-textarea" id="lock-other" disabled>{{ $protocol->lock_other }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="protocol__purple-separator protocol__mt-40"></div>
                        <div class="protocol__content">
                            <div class="protocol__section-block-title protocol__mt-30 protocol__jc-center">опис
                                приміщень</div>
                            <div class="protocol__row protocol__mt-30">
                                <div class="descr-input-block">
                                    <div class="protocol__label-i-block">
                                        <label for="rooms-count-size"
                                            class="input-descr  protocol__ai-f-start pt-10 protocol__mw-225">Кількість
                                            та
                                            розмір</label>
                                        <div class="prompt-block-wrapper">
                                            <div class="prompt-block">
                                                <p class="exclamation-mark">i</p>
                                                <p class="exclamation" id="exclamation-rooms-other">(перерахувати та
                                                    пронумерувати, вказати розміри в метрах, квадратних метрах)</p>
                                            </div>
                                        </div>
                                    </div>
                                    <textarea class="input-textarea protocol__mw-800 protocol_mnh-115"
                                        id="rooms-count-size" disabled>{{ $protocol->rooms_count_size_texta }}</textarea>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-30">
                                <div class="descr-input-block">
                                    <div class="protocol__label-i-block">
                                        <label for="rooms-corridor"
                                            class="input-descr protocol__ai-f-start pt-10 protocol__mw-225 protocol__tt-uc_c-purple">Коридор</label>
                                        <div class="prompt-block-wrapper">
                                            <div class="prompt-block">
                                                <p class="exclamation-mark">i</p>
                                                <p class="exclamation" id="exclamation-determed-and-removed">
                                                    (перерахувати та
                                                    вказати розташування предметів один до одного та вказати їх
                                                    розміри,
                                                    особливості)</p>
                                            </div>
                                        </div>
                                    </div>
                                    <textarea class="input-textarea protocol__mw-800" id="rooms-corridor"
                                       disabled>{{ $protocol->rooms_corridor_texta }}</textarea>
                                </div>
                            </div>
                            <div class="protocol__row direction_column protocol__mt-50">
                                <div class="descr-input-block justify_start">
                                    <label for="break-or-not1" class="input-descr">Обстановка: не порушено; порушено
                                        (в чому
                                        проявляється порушення обстановки): </label>
                                </div>
                                <textarea class="input-textarea"
                                    id="break-or-not1" disabled>{{ $protocol->break_or_not1 }} </textarea>
                            </div>
                        </div>
                        <div class="protocol__purple-separator protocol__mt-30"></div>
                        <div class="protocol__content">
                            <div class="protocol__row protocol__mt-30">
                                <div class="descr-input-block">
                                    <div class="protocol__label-i-block">
                                        <label for="bathroom"
                                            class="input-descr protocol__ai-f-start pt-10 protocol__mw-225 protocol__tt-uc_c-purple">Ванна
                                            кімната </label>
                                        <div class="prompt-block-wrapper">
                                            <div class="prompt-block">
                                                <p class="exclamation-mark">i</p>
                                                <p class="exclamation" id="exclamation-bathroom">(перерахувати та
                                                    вказати
                                                    розташування предметів один до одного та вказати їх розміри,
                                                    особливості)
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <textarea class="input-textarea protocol__mw-800 protocol_mnh-115" id="bathroom"
                                        disabled>{{ $protocol->bathroom_texta }}</textarea>
                                </div>
                            </div>
                            <div class="protocol__row direction_column protocol__mt-50">
                                <div class="descr-input-block justify_start">
                                    <label for="break-or-not2" class="input-descr">Обстановка: не порушено; порушено
                                        (в чому
                                        проявляється порушення обстановки): </label>
                                </div>
                                <textarea class="input-textarea"
                                    id="break-or-not2" disabled>{{ $protocol->break_or_not2 }} </textarea>
                            </div>
                        </div>
                        <div class="protocol__purple-separator protocol__mt-40"></div>
                        <div class="protocol__content">
                            <div class="protocol__row protocol__mt-30">
                                <div class="descr-input-block">
                                    <div class="protocol__label-i-block">
                                        <label for="kitchen"
                                            class="input-descr protocol__ai-f-start pt-10 protocol__mw-225 protocol__tt-uc_c-purple">Кухонна
                                            кімната </label>
                                        <div class="prompt-block-wrapper">
                                            <div class="prompt-block">
                                                <p class="exclamation-mark">i</p>
                                                <p class="exclamation" id="exclamation-kitchen">(перерахувати та
                                                    вказати
                                                    розташування предметів один до одного та вказати їх розміри,
                                                    особливості)
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <textarea class="input-textarea protocol__mw-800 protocol_mnh-115" id="kitchen"
                                         disabled>{{ $protocol->kitchen_texta }}</textarea>
                                </div>
                            </div>
                            <div class="protocol__row direction_column protocol__mt-50">
                                <div class="descr-input-block justify_start">
                                    <label for="break-or-not7" class="input-descr">Обстановка: не порушено; порушено
                                        (в чому
                                        проявляється порушення обстановки): </label>
                                </div>
                                <textarea class="input-textarea"
                                    id="break-or-not7" disabled>{{ $protocol->break_or_not7 }} </textarea>
                            </div>
                        </div>
                        <div class="protocol__purple-separator protocol__mt-45"></div>
                        <div class="protocol__section-title protocol__title_restyle toggle-content">Опис кімнат
                            <div class="protocol__title_dropdown-white"></div>
                        </div>
                        <div class="protocol__content protocol__colored-content">
                            <div class="protocol__row protocol__mt-30">
                                <textarea class="input-textarea protocol_mnh-115" id="rooms-descr1"
                                     disabled>{{ $protocol->rooms_descr1 }}</textarea>
                            </div>
                            <div class="protocol__row direction_column protocol__mt-50">
                                <div class="descr-input-block justify_start">
                                    <label for="break-or-not3" class="input-descr">Обстановка: не порушено; порушено
                                        (в чому
                                        проявляється порушення обстановки): </label>
                                </div>
                                <textarea class="input-textarea protocol__mb-45"
                                    id="break-or-not3" disabled>{{ $protocol->break_or_not3 }} </textarea>
                            </div>
                        </div>
                        <div class="protocol__section-title protocol__title_restyle-black-text toggle-content ">
                            продовження
                            опису кімнат
                            <div class="protocol__title_dropdown-black"></div>
                        </div>
                        <div class="protocol__content protocol__colored-content p__hide">
                            <div class="protocol__row protocol__mt-30">
                                <textarea class="input-textarea protocol_mnh-115" id="rooms-descr2"
                                     disabled>{{ $protocol->rooms_descr2 }}</textarea>
                            </div>
                            <div class="protocol__row direction_column protocol__mt-50">
                                <div class="descr-input-block justify_start">
                                    <label for="break-or-not4" class="input-descr">Обстановка: не порушено; порушено
                                        (в чому
                                        проявляється порушення обстановки): </label>
                                </div>
                                <textarea class="input-textarea protocol__mb-45"
                                    id="break-or-not4" disabled>{{ $protocol->break_or_not4 }} </textarea>
                            </div>
                        </div>
                        <div class="protocol__section-title protocol__title_restyle-black-text toggle-content">
                            продовження
                            опису кімнат
                            <div class="protocol__title_dropdown-black"></div>
                        </div>
                        <div class="protocol__content protocol__colored-content p__hide">
                            <div class="protocol__row protocol__mt-30">
                                <textarea class="input-textarea protocol_mnh-115" id="rooms-descr3"
                                     disabled>{{ $protocol->rooms_descr3 }}</textarea>
                            </div>
                            <div class="protocol__row direction_column protocol__mt-50">
                                <div class="descr-input-block justify_start">
                                    <label for="break-or-not5" class="input-descr">Обстановка: не порушено; порушено
                                        (в чому
                                        проявляється порушення обстановки): </label>
                                </div>
                                <textarea class="input-textarea protocol__mb-45"
                                    id="break-or-not5" disabled>{{ $protocol->break_or_not5 }} </textarea>
                            </div>
                        </div>
                        <div class="protocol__section-title protocol__title_restyle-black-text toggle-content">
                            продовження
                            опису кімнат
                            <div class="protocol__title_dropdown-black "></div>
                        </div>
                        <div class="protocol__content protocol__colored-content p__hide">
                            <div class="protocol__row protocol__mt-30">
                                <textarea class="input-textarea protocol_mnh-115" id="rooms-descr4"
                                     disabled>{{ $protocol->rooms_descr4 }}</textarea>
                            </div>
                            <div class="protocol__row direction_column protocol__mt-50">
                                <div class="descr-input-block justify_start">
                                    <label for="break-or-not6" class="input-descr">Обстановка: не порушено; порушено
                                        (в чому
                                        проявляється порушення обстановки): </label>
                                </div>
                                <textarea class="input-textarea"
                                    id="break-or-not6" disabled>{{ $protocol->break_or_not6 }} </textarea>
                            </div>
                        </div>
                        <div class="protocol__purple-separator protocol__mt-50"></div>
                        <div class="protocol__content">
                            <div class="protocol__section-block-title protocol__mt-30">Віконні і дверні балконні
                                прилади:
                            </div>
                            <div class="protocol__row protocol__mt-30">
                                <div class="inspection protocol_mr-10">
                                    <p class="input-descr">Дерев'яні (металопластикові) віконні і дверні балконні
                                        палітурки
                                    </p>
                                    <div class="weather-time-block balcony justify_end">
                                        <div class="select-time balcony">
                                            <select  class="select-field inspection-select">
                                                <option>{{ $protocol->balcony }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-35">
                                <div class="descr-input-block">
                                    <div class="protocol__label-i-block">
                                        <label for="traces-damage" class="input-descr">Сліди та пошкоження</label>
                                        <div class="prompt-block-wrapper">
                                            <div class="prompt-block">
                                                <p class="exclamation-mark">i</p>
                                                <p class="exclamation exclamation-participant"
                                                    id="exclamation-balcony">
                                                    (вказуються
                                                    сліди, пошкодження, характер та механізм слідоутворення)</p>
                                            </div>
                                        </div>
                                    </div>

                                    <textarea class="input-textarea"
                                        id="traces-damage" disabled>{{ $protocol->traces_damage }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="protocol__purple-separator protocol__mt-25"></div>
                        <div class="protocol__section-title">Під час огляду
                            виявлено та вилучено
                            <div class="prompt-block title-information">
                                <p class="exclamation-mark">i</p>
                                <p class="exclamation" id="exclamation-determed-and-removed-title">вказується що та
                                    в
                                    якій
                                    послідовності
                                    виявлено і яким чином
                                    вилучено та опечатано</p>
                            </div>
                        </div>
                        <div class="protocol__content">
                            <div class="protocol__row protocol__mt-30">
                                <textarea class="input-textarea" id="determed-and-removed"
                                     disabled>{{ $protocol->rooms_other_texta }}</textarea>
                            </div>
                            <div class="protocol__row direction_column protocol__mt-30">
                                <label for="object-traces" class="input-descr">Об’єкти, предмети (фрагменти, речі,
                                    фунт,
                                    документи, цінності, грошові кошти та інше)</label>
                                <textarea class="input-textarea"  id="object-traces" disabled>{{ $protocol->object_traces }}</textarea>
                            </div>
                            <div class="protocol__row direction_column protocol__mt-30">
                                <div class="descr-input-block justify_start">
                                    <div class="protocol__label-i-block">
                                        <label for="finger-traces" class="input-descr">Сліди пальців рук</label>
                                        <div class="prompt-block">
                                            <p class="exclamation-mark">i</p>
                                            <p class="exclamation" id="exclamation-finger-traces">(вказується місце
                                                розташування, із
                                                зазначенням розмірних характеристик (відстань від того чи іншого
                                                об’єкту);
                                                поверхня,
                                                на якій виявлено та вилучено слід; методи та способи виявлення і
                                                вилучення;
                                                матеріал, на, який вилучається слід (дактоплівка, липка стрічка, з
                                                об’єктом -
                                                носієм, та інше); з обов’язковим зазначенням реактивів, порошків та
                                                реагентів,
                                                за
                                                допомогою яких вилучається слідова інформація, вид пензлика
                                                (магнітний,
                                                флейцевий,
                                                та інше); зазначити: тип, вид, форму, розмір та кількість слідів;
                                                спосіб
                                                пакування
                                                та опечатування)</p>
                                        </div>
                                    </div>

                                </div>
                                <textarea class="input-textarea"  id="finger-traces" disabled>{{ $protocol->finger_traces }}</textarea>
                            </div>
                            <div class="protocol__row direction_column protocol__mt-30">
                                <div class="descr-input-block justify_start">
                                    <div class="protocol__label-i-block">
                                        <label for="shoes-traces" class="input-descr">Сліди низу взуття</label>
                                        <div class="prompt-block">
                                            <p class="exclamation-mark">i</p>
                                            <p class="exclamation" id="exclamation-shoes-traces">(вказується місце
                                                розташування,
                                                із
                                                зазначенням розмірних характеристик (відстань від того чи іншого
                                                об’єкту);
                                                поверхня,
                                                на якій виявлено та вилучено слід; методи та способи виявлення та
                                                вилучення;
                                                матеріал, на, який вилучається слід (дактоплівка, липка стрічка, з
                                                об’єктом -
                                                носієм, та інше); з обов’язковим зазначенням реактивів, порошків,
                                                реагентів та
                                                приладів, за допомогою яких вилучається слідова інформація;
                                                зазначити: тип, вид,
                                                форму, розмір (загальна довжина, найбільша ширина, найменша ширина)
                                                та кількість
                                                слідів; схематично відобразити слід та/або слідову доріжку; спосіб
                                                пакування та
                                                опечатування)</p>
                                        </div>
                                    </div>

                                </div>
                                <textarea class="input-textarea"  id="shoes-traces" disabled>{{ $protocol->shoes_traces }}</textarea>
                            </div>
                            <div class="protocol__row direction_column protocol__mt-30">
                                <div class="descr-input-block justify_start">
                                    <div class="protocol__label-i-block">
                                        <label for="vehicle-traces" class="input-descr">Сліди транспортних
                                            засобів</label>
                                        <div class="prompt-block">
                                            <p class="exclamation-mark">i</p>
                                            <p class="exclamation" id="exclamation-vehicle-traces">(вказується місце
                                                розташування,
                                                із
                                                зазначенням розмірних характеристик бази автомобіля, шин; поверхня,
                                                на якій
                                                виявлено
                                                та вилучено слід; методи та способи виявлення та вилучення; з
                                                обов’язковим
                                                зазначенням матеріалу, за допомогою якого вилучається слідова
                                                інформація;
                                                зазначити:
                                                тип, вид, форму, розмір та кількість слідів; схематично відобразити
                                                у протоколі,
                                                вказати спосіб пакування та опечатування)</p>
                                        </div>
                                    </div>

                                </div>
                                <textarea class="input-textarea"
                                    id="vehicle-traces" disabled>{{ $protocol->vehicle_traces }}</textarea>
                            </div>
                            <div class="protocol__row direction_column protocol__mt-30">
                                <div class="descr-input-block justify_start">
                                    <div class="protocol__label-i-block">
                                        <label for="break-traces" class="input-descr">Сліди знарядь зламу</label>
                                        <div class="prompt-block">
                                            <p class="exclamation-mark">i</p>
                                            <p class="exclamation" id="exclamation-break-traces">(вказується місце
                                                розташування,
                                                із
                                                зазначенням розмірних характеристик (відстань від того чи іншого
                                                об’єкту);
                                                поверхня,
                                                на якій виявлено та вилучено слід; методи та способи виявлення і
                                                вилучення; з
                                                обов’язковим зазначенням матеріалу за допомогою якого вилучається
                                                слідова
                                                інформація
                                                (зліпкова маса, обєкт-носій, інформаційний носій); зазначити: тип,
                                                вид, форму,
                                                розмір (загальна довжина, найбільша ширина, найменша ширина) та
                                                кількість
                                                слідів;
                                                спосіб пакування та опечатування)</p>
                                        </div>
                                    </div>

                                </div>
                                <textarea class="input-textarea"  id="break-traces" disabled>{{ $protocol->break_traces }}</textarea>
                            </div>
                            <div class="protocol__row direction_column protocol__mt-30">
                                <div class="descr-input-block justify_start">
                                    <div class="protocol__label-i-block">
                                        <label for="blood-traces" class="input-descr">Сліди речовини бурого
                                            кольору</label>
                                        <div class="prompt-block">
                                            <p class="exclamation-mark">i</p>
                                            <p class="exclamation" id="exclamation-blood-traces">(Вказується місце,
                                                поверхня, на
                                                якій
                                                виявлений слід; методи та способи виявлення і вилучення; з
                                                обов’язковим
                                                зазначенням
                                                матеріалу за допомогою якого вилучається слідова інформація;
                                                зазначити: тип,
                                                вид,
                                                форму, розмір та кількість слідів; спосіб пакування та опечатування)
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <textarea class="input-textarea"  id="blood-traces" disabled>{{ $protocol->blood_traces }}</textarea>
                            </div>
                            <div class="protocol__row direction_column protocol__mt-30">
                                <div class="descr-input-block justify_start">
                                    <div class="protocol__label-i-block">
                                        <label for="micro-traces" class="input-descr">Мікрооб’єкти, волокна</label>
                                        <div class="prompt-block">
                                            <p class="exclamation-mark">i</p>
                                            <p class="exclamation" id="exclamation-micro-traces">(вказується місце
                                                виявлення та
                                                вилучення об’єкту; розмірні характеристики; способи та методи
                                                вилучення;
                                                кількість
                                                слідів; спосіб пакування та опечатування)</p>
                                        </div>
                                    </div>

                                </div>
                                <textarea class="input-textarea"  id="micro-traces" disabled>{{ $protocol->micro_traces }}</textarea>
                            </div>
                            <div class="protocol__row direction_column protocol__mt-30">
                                <div class="descr-input-block justify_start">
                                    <div class="protocol__label-i-block">
                                        <label for="bio-traces" class="input-descr">Сліди біологічного та запахового
                                            походження
                                            (епітеліальні клітини, волосся, піт, слина, тощо)</label>
                                        <div class="prompt-block">
                                            <p class="exclamation-mark">i</p>
                                            <p class="exclamation" id="exclamation-bio-traces">(вказується місце,
                                                поверхня, на
                                                якій
                                                виявлений слід; методи та способи виявлення та вилучення; матеріал,
                                                па який
                                                вилучається слід; зазначити: тип, вид, форму, розмір та кількість
                                                слідів; спосіб
                                                пакування та опечатування)
                                            </p>
                                        </div>
                                    </div>

                                </div>
                                <textarea class="input-textarea" id="bio-traces" disabled>{{ $protocol->bio_traces }}</textarea>
                            </div>
                            <div class="protocol__row direction_column protocol__mt-30">
                                <div class="descr-input-block justify_start">
                                    <div class="protocol__label-i-block">
                                        <label for="other-traces" class="input-descr">Інші сліди</label>
                                        <div class="prompt-block">
                                            <p class="exclamation-mark">i</p>
                                            <p class="exclamation" id="exclamation-other-traces">Всі інші сліди які
                                                не підходять
                                                під опис вище

                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <textarea class="input-textarea" id="other-traces" disabled>{{ $protocol->other_traces }}</textarea>
                            </div>
                        </div>
                        <div class="protocol__purple-separator protocol__mt-30"></div>
                        <div class="protocol__section-title">До протоколу огляду додаються:</div>
                        <div class="protocol__content">
                            <div class="protocol__row direction_column protocol__mt-30">
                                <label for="p-add-plan" class="input-descr">План (схематичний чи масштабний): схема
                                    місцевості; схема огляду місця події; схема доріжки слідів; схема сліду низу
                                    взуття;
                                    схема
                                    сліду знаряддя зламу; спеціально виготовлені предмети, зліпки об’єктів, інше)
                                </label>
                                <textarea class="input-textarea"  id="p-add-plan" disabled>{{ $protocol->p_add_plan }}</textarea>
                            </div>
                            <div class="protocol__row direction_column protocol__mt-30">
                                <label for="p-add-plan-info" class="input-descr">(носії комп’ютерної інформації,
                                    пояснення
                                    спеціалістів та інші матеріали, які пояснюють зміст протоколу)
                                </label>
                                <textarea class="input-textarea"  id="p-add-plan-info" disabled>{{ $protocol->p_add_plan_info }}</textarea>
                            </div>
                            <div class="protocol__row protocol__mt-35">
                                <div class="descr-input-block">
                                    <div class="protocol__label-i-block">
                                        <label for="p-signed" class="input-descr">Протокол прочитано,
                                            записано</label>
                                        <div class="prompt-block-wrapper">
                                            <div class="prompt-block">
                                                <p class="exclamation-mark">i</p>
                                                <p class="exclamation exclamation-participant"
                                                    id="exclamation-signed">
                                                    (зауваження учасників огляду)</p>
                                            </div>
                                        </div>
                                    </div>

                                    <textarea class="input-textarea"  id="p-signed" disabled>{{ $protocol->p_signed }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="protocol__purple-separator protocol__mt-30"></div>
                        <div class="protocol__section-title">Учасники:</div>
                        <div class="protocol__content">
                            <div class="protocol__row protocol__mt-30">
                                <div class="participant-blocks">
                                    <div class="participant-first-block">
                                        <div class="participant-count-full-name">
                                            <div class="p-count">1.</div>
                                            <label for="participant1" class="input-descr">ПІБ </label>
                                        </div>
                                        <textarea class="input-textarea fullname-input"
                                            id="participant1" disabled>{{ $protocol->participant1 }}</textarea>
                                    </div>
                                    <div class="participant-second-block">
                                        <label for="participant1-sign"
                                            class="input-descr protocol__ai-center">Підпис</label>
                                        <textarea class="input-textarea sign-input"
                                            id="participant1-sign" disabled>{{ $protocol->participant1_sign }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-30">
                                <div class="participant-blocks">
                                    <div class="participant-first-block">
                                        <div class="participant-count-full-name">
                                            <div class="p-count">2.</div>
                                            <label for="participant2" class="input-descr">ПІБ </label>
                                        </div>
                                        <textarea class="input-textarea fullname-input"
                                            id="participant2" disabled>{{ $protocol->participant2 }}</textarea>
                                    </div>
                                    <div class="participant-second-block">
                                        <label for="participant2-sign"
                                            class="input-descr protocol__ai-center">Підпис</label>
                                        <textarea class="input-textarea sign-input"
                                            id="participant2-sign" disabled>{{ $protocol->participant2_sign }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-30">
                                <div class="participant-blocks">
                                    <div class="participant-first-block">
                                        <div class="participant-count-full-name">
                                            <div class="p-count">3.</div>
                                            <label for="participant3" class="input-descr">ПІБ </label>
                                        </div>
                                        <textarea class="input-textarea fullname-input"
                                            id="participant3" disabled>{{ $protocol->participant3 }}</textarea>
                                    </div>
                                    <div class="participant-second-block">
                                        <label for="participant3-sign"
                                            class="input-descr protocol__ai-center">Підпис</label>
                                        <textarea class="input-textarea sign-input"
                                            id="participant3-sign" disabled>{{ $protocol->participant3_sign }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-30">
                                <div class="participant-blocks">
                                    <div class="participant-first-block">
                                        <div class="participant-count-full-name">
                                            <div class="p-count">4.</div>
                                            <label for="participant4" class="input-descr">ПІБ </label>
                                        </div>
                                        <textarea class="input-textarea fullname-input"
                                            id="participant4" disabled>{{ $protocol->participant4 }}</textarea>
                                    </div>
                                    <div class="participant-second-block">
                                        <label for="participant4-sign"
                                            class="input-descr protocol__ai-center">Підпис</label>
                                        <textarea class="input-textarea sign-input"
                                            id="participant4-sign" disabled>{{ $protocol->participant4_sign }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-30">
                                <div class="participant-blocks">
                                    <div class="participant-first-block">
                                        <div class="participant-count-full-name">
                                            <div class="p-count">5.</div>
                                            <label for="participant5" class="input-descr">ПІБ </label>
                                        </div>
                                        <textarea class="input-textarea fullname-input"
                                            id="participant5" disabled>{{ $protocol->participant5 }}</textarea>
                                    </div>
                                    <div class="participant-second-block">
                                        <label for="participant5-sign"
                                            class="input-descr protocol__ai-center">Підпис</label>
                                        <textarea class="input-textarea sign-input"
                                            id="participant5-sign" disabled>{{ $protocol->participant5_sign }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-30">
                                <div class="participant-blocks">
                                    <div class="participant-first-block">
                                        <div class="participant-count-full-name">
                                            <div class="p-count">6.</div>
                                            <label for="participant6" class="input-descr">ПІБ </label>
                                        </div>
                                        <textarea class="input-textarea fullname-input"
                                            id="participant6" disabled>{{ $protocol->participant6 }}</textarea>
                                    </div>
                                    <div class="participant-second-block">
                                        <label for="participant6-sign"
                                            class="input-descr protocol__ai-center">Підпис</label>
                                        <textarea class="input-textarea sign-input"
                                            id="participant6-sign" disabled>{{ $protocol->participant6_sign }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="protocol__purple-separator protocol__mt-30"></div>
                        <div class="protocol__section-title">Поняті:</div>
                        <div class="protocol__content">
                            <div class="protocol__row protocol__mt-30">
                                <div class="participant-blocks">
                                    <div class="participant-first-block">
                                        <div class="participant-count-full-name">
                                            <div class="p-count">1.</div>
                                            <label for="witness1" class="input-descr">ПІБ </label>
                                        </div>
                                        <textarea class="input-textarea fullname-input"
                                            id="witness1" disabled>{{ $protocol->witness1 }}</textarea>
                                    </div>
                                    <div class="participant-second-block">
                                        <label for="witness1-sign"
                                            class="input-descr protocol__ai-center">Підпис</label>
                                        <textarea class="input-textarea sign-input"
                                            id="witness1-sign" disabled>{{ $protocol->witness1_sign }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-30">
                                <div class="participant-blocks">
                                    <div class="participant-first-block">
                                        <div class="participant-count-full-name">
                                            <div class="p-count">2.</div>
                                            <label for="witness2" class="input-descr">ПІБ </label>
                                        </div>
                                        <textarea class="input-textarea fullname-input"
                                            id="witness2" disabled>{{ $protocol->witness2 }}</textarea>
                                    </div>
                                    <div class="participant-second-block">
                                        <label for="witness2-sign"
                                            class="input-descr protocol__ai-center">Підпис</label>
                                        <textarea class="input-textarea sign-input"
                                            id="witness2-sign" disabled>{{ $protocol->witness2_sign }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="protocol__purple-separator protocol__mt-30"></div>
                        <div class="protocol__content">
                            <div class="protocol__row protocol__mt-35">
                                <div class="descr-input-block">
                                    <div class="protocol__label-i-block">
                                        <label for="survey-conducted" class="input-descr">Огляд провів:</label>
                                        <div class="prompt-block-wrapper">
                                            <div class="prompt-block">
                                                <p class="exclamation-mark">i</p>
                                                <p class="exclamation" id="exclamation-survey-conducted">(слідчий,
                                                    посада,
                                                    найменування, органу, підпис, прізвище, ініціали)</p>
                                            </div>
                                        </div>
                                    </div>

                                    <textarea class="input-textarea"
                                        id="survey-conducted" disabled>{{ $protocol->survey_conducted }}</textarea>
                                </div>
                            </div>
                        </div>
                        <!-- photoblock -->
                        <div class="protocol__purple-separator protocol__mt-30"></div>
                        <div class="protocol__section-title protocol__title_restyle toggle-content">ФОТОТАБЛИЦЯ</br> до
                            протоколу
                            огляду місця події
                            <div class="protocol__title_dropdown-white"></div>
                        </div>
                        <div class="protocol__content protocol__colored-content">
                            <div class="protocol__row protocol__mt-50">
                                <img class="img-fluid mx-auto text-center" src="{{ asset($protocol->p_add_photo1) }}">
                            </div>
                            <div class="protocol__row protocol__mt-35">
                                <div class="descr-input-block">
                                    <label for="photo-descr1" class="input-descr p-photo-descr">Опис
                                        фотознімку</label>
                                    <textarea class="input-textarea p-photo-input"
                                        id="photo-descr1" disabled>{{ $protocol->photo_descr1 }}</textarea>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-35">
                                <div class="descr-input-block">
                                    <label for="investigator-photo-block1"
                                        class="input-descr protocol__ai-f-start protocol__mt-08em">Слідчий
                                    </label>
                                    <div class="prompt-block-wrapper">
                                        <div class="prompt-block">
                                            <p class="exclamation-mark">i</p>
                                            <p class="exclamation photo-block-investigators">(слідчий, посада,
                                                найменування,
                                                органу, підпис, прізвище, ініціали) </p>
                                        </div>
                                    </div>
                                    <textarea class="input-textarea protocol__mb-45"
                                        id="investigator-photo-block1" disabled>{{ $protocol->investigator_photo_block1 }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="protocol__section-title protocol__title_restyle-black-text toggle-content">
                            продовження
                            фототаблиці
                            <div class="protocol__title_dropdown-black"></div>
                        </div>
                        <div class="protocol__content protocol__colored-content p__hide">
                            <div class="protocol__row protocol__mt-50">
                                <img class="img-fluid mx-auto text-center" src="{{ asset($protocol->p_add_photo2) }}">
                            </div>
                            <div class="protocol__row protocol__mt-35">
                                <div class="descr-input-block">
                                    <label for="2" class="input-descr p-photo-descr">Опис фотознімку</label>
                                    <textarea class="input-textarea p-photo-input"
                                        id="photo-descr2" disabled>{{ $protocol->photo_descr2 }}</textarea>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-35">
                                <div class="descr-input-block">
                                    <label for="investigator-photo-block2"
                                        class="input-descr protocol__ai-f-start protocol__mt-08em">Слідчий
                                    </label>
                                    <div class="prompt-block-wrapper">
                                        <div class="prompt-block">
                                            <p class="exclamation-mark">i</p>
                                            <p class="exclamation photo-block-investigators">(слідчий, посада,
                                                найменування,
                                                органу, підпис, прізвище, ініціали) </p>
                                        </div>
                                    </div>
                                    <textarea class="input-textarea protocol__mb-45"
                                        id="investigator-photo-block2" disabled>{{ $protocol->investigator_photo_block2 }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="protocol__section-title protocol__title_restyle-black-text toggle-content">
                            продовження
                            фототаблиці
                            <div class="protocol__title_dropdown-black"></div>
                        </div>
                        <div class="protocol__content protocol__colored-content p__hide">
                            <div class="protocol__row protocol__mt-50">
                                <img class="img-fluid mx-auto text-center" src="{{ asset($protocol->p_add_photo3) }}">
                            </div>
                            <div class="protocol__row protocol__mt-35">
                                <div class="descr-input-block">
                                    <label for="photo-descr3" class="input-descr p-photo-descr">Опис
                                        фотознімку</label>
                                    <textarea class="input-textarea p-photo-input"
                                        id="photo-descr3" disabled>{{ $protocol->photo_descr3 }}</textarea>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-35">
                                <div class="descr-input-block">
                                    <label for="investigator-photo-block3"
                                        class="input-descr protocol__ai-f-start protocol__mt-08em">Слідчий
                                    </label>
                                    <div class="prompt-block-wrapper">
                                        <div class="prompt-block">
                                            <p class="exclamation-mark">i</p>
                                            <p class="exclamation photo-block-investigators">(слідчий, посада,
                                                найменування,
                                                органу, підпис, прізвище, ініціали) </p>
                                        </div>
                                    </div>
                                    <textarea class="input-textarea protocol__mb-45"
                                        id="investigator-photo-block3" disabled>{{ $protocol->investigator_photo_block3 }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="protocol__section-title protocol__title_restyle-black-text toggle-content">
                            продовження
                            фототаблиці
                            <div class="protocol__title_dropdown-black"></div>
                        </div>
                        <div class="protocol__content protocol__colored-content p__hide">
                            <div class="protocol__row protocol__mt-50">
                                <img class="img-fluid mx-auto text-center" src="{{ asset($protocol->p_add_photo4) }}">
                            </div>
                            <div class="protocol__row protocol__mt-35">
                                <div class="descr-input-block">
                                    <label for="photo-descr4" class="input-descr p-photo-descr">Опис
                                        фотознімку</label>
                                    <textarea class="input-textarea p-photo-input"
                                        id="photo-descr4" disabled>{{ $protocol->photo_descr4 }}</textarea>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-35">
                                <div class="descr-input-block">
                                    <label for="investigator-photo-block4"
                                        class="input-descr protocol__ai-f-start protocol__mt-08em">Слідчий
                                    </label>
                                    <div class="prompt-block-wrapper">
                                        <div class="prompt-block">
                                            <p class="exclamation-mark">i</p>
                                            <p class="exclamation photo-block-investigators">(слідчий, посада,
                                                найменування,
                                                органу, підпис, прізвище, ініціали) </p>
                                        </div>
                                    </div>
                                    <textarea class="input-textarea protocol__mb-45"
                                        id="investigator-photo-block4" disabled>{{ $protocol->investigator_photo_block4 }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="protocol__section-title protocol__title_restyle-black-text toggle-content">
                            продовження
                            фототаблиці
                            <div class="protocol__title_dropdown-black"></div>
                        </div>
                        <div class="protocol__content protocol__colored-content p__hide">
                            <div class="protocol__row protocol__mt-50">
                                <img class="img-fluid mx-auto text-center" src="{{ asset($protocol->p_add_photo5) }}">
                            </div>
                            <div class="protocol__row protocol__mt-35">
                                <div class="descr-input-block">
                                    <label for="photo-descr5" class="input-descr p-photo-descr">Опис
                                        фотознімку</label>
                                    <textarea class="input-textarea p-photo-input"
                                        id="photo-descr5" disabled>{{ $protocol->photo_descr5 }}</textarea>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-35">
                                <div class="descr-input-block">
                                    <label for="investigator-photo-block5"
                                        class="input-descr protocol__ai-f-start protocol__mt-08em">Слідчий
                                    </label>
                                    <div class="prompt-block-wrapper">
                                        <div class="prompt-block">
                                            <p class="exclamation-mark">i</p>
                                            <p class="exclamation photo-block-investigators">(слідчий, посада,
                                                найменування,
                                                органу, підпис, прізвище, ініціали) </p>
                                        </div>
                                    </div>
                                    <textarea class="input-textarea protocol__mb-45"
                                        id="investigator-photo-block5" disabled>{{ $protocol->investigator_photo_block5 }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="protocol__section-title protocol__title_restyle-black-text toggle-content">
                            продовження
                            фототаблиці
                            <div class="protocol__title_dropdown-black"></div>
                        </div>
                        <div class="protocol__content protocol__colored-content p__hide">
                            <div class="protocol__row protocol__mt-50">
                                <img class="img-fluid mx-auto text-center" src="{{ asset($protocol->p_add_photo6) }}">
                            </div>
                            <div class="protocol__row protocol__mt-35">
                                <div class="descr-input-block">
                                    <label for="photo-descr6" class="input-descr p-photo-descr">Опис
                                        фотознімку</label>
                                    <textarea class="input-textarea p-photo-input"
                                        id="photo-descr6" disabled>{{ $protocol->photo_descr6 }}</textarea>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-35">
                                <div class="descr-input-block">
                                    <label for="investigator-photo-block6"
                                        class="input-descr protocol__ai-f-start protocol__mt-08em">Слідчий
                                    </label>
                                    <div class="prompt-block-wrapper">
                                        <div class="prompt-block">
                                            <p class="exclamation-mark">i</p>
                                            <p class="exclamation photo-block-investigators">(слідчий, посада,
                                                найменування,
                                                органу, підпис, прізвище, ініціали) </p>
                                        </div>
                                    </div>
                                    <textarea class="input-textarea protocol__mb-45"
                                        id="investigator-photo-block6" disabled>{{ $protocol->investigator_photo_block6 }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="protocol__section-title protocol__title_restyle-black-text toggle-content">
                            продовження
                            фототаблиці
                            <div class="protocol__title_dropdown-black"></div>
                        </div>
                        <div class="protocol__content protocol__colored-content p__hide">
                            <div class="protocol__row protocol__mt-50">
                                <img class="img-fluid mx-auto text-center" src="{{ asset($protocol->p_add_photo7) }}">
                            </div>
                            <div class="protocol__row protocol__mt-35">
                                <div class="descr-input-block">
                                    <label for="photo-descr7" class="input-descr p-photo-descr">Опис
                                        фотознімку</label>
                                    <textarea class="input-textarea p-photo-input"
                                        id="photo-descr7" disabled>{{ $protocol->photo_descr7 }}</textarea>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-35">
                                <div class="descr-input-block">
                                    <label for="investigator-photo-block7"
                                        class="input-descr protocol__ai-f-start protocol__mt-08em">Слідчий
                                    </label>
                                    <div class="prompt-block-wrapper">
                                        <div class="prompt-block">
                                            <p class="exclamation-mark">i</p>
                                            <p class="exclamation photo-block-investigators">(слідчий, посада,
                                                найменування,
                                                органу, підпис, прізвище, ініціали) </p>
                                        </div>
                                    </div>
                                    <textarea class="input-textarea protocol__mb-45"
                                        id="investigator-photo-block7" disabled>{{ $protocol->investigator_photo_block7 }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="protocol__section-title protocol__title_restyle-black-text toggle-content">
                            продовження
                            фототаблиці
                            <div class="protocol__title_dropdown-black"></div>
                        </div>
                        <div class="protocol__content protocol__colored-content p__hide">
                            <div class="protocol__row protocol__mt-50">
                                <img class="img-fluid mx-auto text-center" src="{{ asset($protocol->p_add_photo8) }}">
                            </div>
                            <div class="protocol__row protocol__mt-35">
                                <div class="descr-input-block">
                                    <label for="photo-descr8" class="input-descr p-photo-descr">Опис
                                        фотознімку</label>
                                    <textarea class="input-textarea p-photo-input"
                                        id="photo-descr8" disabled>{{ $protocol->photo_descr8 }}</textarea>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-35">
                                <div class="descr-input-block">
                                    <label for="investigator-photo-block8"
                                        class="input-descr protocol__ai-f-start protocol__mt-08em">Слідчий
                                    </label>
                                    <div class="prompt-block-wrapper">
                                        <div class="prompt-block">
                                            <p class="exclamation-mark">i</p>
                                            <p class="exclamation photo-block-investigators">(слідчий, посада,
                                                найменування,
                                                органу, підпис, прізвище, ініціали) </p>
                                        </div>
                                    </div>
                                    <textarea class="input-textarea protocol__mb-45"
                                        id="investigator-photo-block8" disabled>{{ $protocol->investigator_photo_block8 }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="protocol__purple-separator protocol__mt-30"></div>
                        <div class="protocol__section-title">Оцінка:</div>
                        <div class="protocol__row protocol__mt-25">
                            <div class="descr-input-block justify-content-center">
                                <label for="raiting" class="input-descr ml-4">Оцінка</label>
                                <input class="protocol__input" type="text" id="raiting" name="raiting" value="{{ $protocol->raiting }}">
                            </div>
                        </div>
                        <div class="protocol__content">
                            <div class="protocol__row protocol__mt-35">
                                <div class="protocol-btns-block">

                                    <button type="submit" class="groups-edit__create-group sce__buttons-restyle"
                                        id="sendProtocol">Зберегти
                                    </button>


                                    <a class="groups-edit__back-to-groups sce__buttons-restyle" href="{{ url($referer)}}">Назад</a>
                                </div>
                            </div>
                        </div>

                    </div>
    </form>



    <div class="scroll-wrapper">
        <div class="to-top-button">></div>
    </div>
</section>
@endsection

@section('js')

@endsection
