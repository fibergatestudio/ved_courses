@extends('layouts.front.front_child')

@section('title')
    Протокол
@endsection

@section('content')
<section class="direction">
    <!-- protocol modal window start -->
    <form id="protocolForm" class="protocol" method="POST" action="{{ route('protocol.store') }}" enctype="multipart/form-data">
        @csrf
        <h3 class="protocol__title">ПРОТОКОЛ ОГЛЯДУ</h3>
        <div class="protocol__section">
            <div class="protocol__purple-separator"></div>
            <div class="protocol__section-title">місця події</div>
            <div class="protocol__content">
                <div class="protocol__row protocol__mt-50">
                    <div class="descr-input-block city">
                        <label for="city" class="input-descr">Місто (сел.) </label>
                        <textarea class="input-textarea" name='city' id="city"></textarea>
                    </div>
                    <div class="descr-input-block date">
                        <label for="date" class="input-descr">Дата </label>
                        <input class="protocol__input" type="date" name='date' id="date">
                    </div>
                </div>
                <div class="protocol__row protocol__mt-45">
                    <div class="inspection inspect">
                        <p class="input-descr protocol__pt-2em">Огляд розпочато о</p>
                        <div class="time-block">
                            <div class="hours">
                                <p class="descr-above">Години</p>
                                <div class="select-time">
                                    <select name="hour-start" class="select-field inspection-select">
                                        <option value="00">00</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                    </select>
                                </div>
                            </div>
                            <div class="minutes">
                                <p class="descr-above">Хвилини</p>
                                <div class="select-time">
                                    <select name="minute-start" class="select-field inspection-select">
                                        <option value="00">00</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                        <option value="32">32</option>
                                        <option value="33">33</option>
                                        <option value="34">34</option>
                                        <option value="35">35</option>
                                        <option value="36">36</option>
                                        <option value="37">37</option>
                                        <option value="38">38</option>
                                        <option value="39">39</option>
                                        <option value="40">40</option>
                                        <option value="41">41</option>
                                        <option value="42">42</option>
                                        <option value="43">43</option>
                                        <option value="44">44</option>
                                        <option value="45">45</option>
                                        <option value="46">46</option>
                                        <option value="47">47</option>
                                        <option value="48">48</option>
                                        <option value="49">49</option>
                                        <option value="50">50</option>
                                        <option value="51">51</option>
                                        <option value="52">52</option>
                                        <option value="53">53</option>
                                        <option value="54">54</option>
                                        <option value="55">55</option>
                                        <option value="56">56</option>
                                        <option value="57">57</option>
                                        <option value="58">58</option>
                                        <option value="59">59</option>
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
                                    <select name="hour-end" class="select-field inspection-select">
                                        <option value="00">00</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                    </select>
                                </div>
                            </div>
                            <div class="minutes">
                                <p class="descr-above">Хвилини</p>
                                <div class="select-time">
                                    <select name="minute-end" class="select-field inspection-select">
                                        <option value="00">00</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <option value="29">29</option>
                                        <option value="30">30</option>
                                        <option value="31">31</option>
                                        <option value="32">32</option>
                                        <option value="33">33</option>
                                        <option value="34">34</option>
                                        <option value="35">35</option>
                                        <option value="36">36</option>
                                        <option value="37">37</option>
                                        <option value="38">38</option>
                                        <option value="39">39</option>
                                        <option value="40">40</option>
                                        <option value="41">41</option>
                                        <option value="42">42</option>
                                        <option value="43">43</option>
                                        <option value="44">44</option>
                                        <option value="45">45</option>
                                        <option value="46">46</option>
                                        <option value="47">47</option>
                                        <option value="48">48</option>
                                        <option value="49">49</option>
                                        <option value="50">50</option>
                                        <option value="51">51</option>
                                        <option value="52">52</option>
                                        <option value="53">53</option>
                                        <option value="54">54</option>
                                        <option value="55">55</option>
                                        <option value="56">56</option>
                                        <option value="57">57</option>
                                        <option value="58">58</option>
                                        <option value="59">59</option>
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

                        <textarea class="input-textarea" name='cop-initials' id="cop-initials"></textarea>
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

                        <textarea class="input-textarea" name='basis-of' id="basis-of"></textarea>
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


                        <textarea class="input-textarea" name='witnessed-one' id="witnessed-one"></textarea>
                    </div>
                </div>
                <div class="protocol__row protocol__mt-25">
                    <div class="descr-input-block">
                        <div class="p-witness-count">
                            <div class="p-count">2.</div>
                            <label for="witnessed-two" class="input-descr">Понятий</label>
                        </div>
                        <textarea class="input-textarea" name='witnessed-two' id="witnessed-two"></textarea>
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
                                    <p class="exclamation" id="exclamation-victim"">(прізвище, ім’я, по батькові, дата народження, місце
                                        проживання, особистий підпис)</p>
                                </div>
                            </div>
                        </div>

                        <textarea class=" input-textarea" name='victim' id="victim"></textarea>
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
                                    <textarea class="input-textarea" name='suspect' id="suspect"></textarea>
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
                                    <textarea class="input-textarea" name='advocate' id="advocate"></textarea>
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
                                    <textarea class="input-textarea" name='representative'
                                        id="representative"></textarea>
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
                                    <textarea class="input-textarea" name='specialist' id="specialist"></textarea>
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
                                    <textarea class="input-textarea" name='other-participant-one'
                                        id="other-participant-one"></textarea>
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
                                    <textarea class="input-textarea" name='other-participant-two'
                                        id="other-participant-two"></textarea>
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
                                    <textarea class="input-textarea" name='owner' id="owner"></textarea>
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
                                <input class="protocol__input" type="text" name='users-signs' id="users-signs"
                                    placeholder="(підписи осіб, які беруть участь у проведенні огляду)">
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
                                <textarea class="input-textarea" name='tech-devices' id="tech-devices"></textarea>
                            </div>
                            <div class="protocol__row direction_column protocol__mt-50">
                                <div class="descr-input-block justify_start">
                                    <label for="recording-devs" class="input-descr">Фотоапарат; відеокамера; носії
                                        інформації,
                                        на які здійснюється запис: </label>
                                </div>
                                <textarea class="input-textarea" name='recording-devs'
                                    id="recording-devs"></textarea>
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

                                <textarea class="input-textarea" name='review-conducted'
                                    id="review-conducted"></textarea>
                            </div>
                            <div class="protocol__row protocol__mt-30">
                                <div class="inspection inspect-w-t protocol_mr-10">
                                    <p class="input-descr">Погодні умови</p>
                                    <div class="weather-time-block">
                                        <div class="select-time weather-select">
                                            <select name="weather" class="select-field inspection-select">
                                                <option value="Ясно">Ясно</option>
                                                <option value="Сонячно">Сонячно</option>
                                                <option value="Похмуро">Похмуро</option>
                                                <option value="Туман">Туман</option>
                                                <option value="Вітряно ">Вітряно </option>
                                                <option value="Без опадів">Без опадів</option>
                                                <option value="Мряка">Мряка</option>
                                                <option value="Дощ">Дощ</option>
                                                <option value="Легкий сніг">Легкий сніг</option>
                                                <option value="Снігопад">Снігопад</option>
                                                <option value="Заметіль температура повітря">Заметіль температура
                                                    повітря</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="inspection protocol__mw-450">
                                    <p class="input-descr">Пора доби</p>
                                    <div class="weather-time-block">
                                        <div class="select-time daytime-select">
                                            <select name="day-time" class="select-field inspection-select">
                                                <option value="Світла">Світла
                                                </option>
                                                <option value="Темна">Темна
                                                </option>
                                                <option value="Сутінки ">Сутінки </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-30">
                                <div class="inspection">
                                    <p class="input-descr">Освітлення</p>
                                    <div class="select-time lightning">
                                        <select name="lightning" class="select-field inspection-select">
                                            <option
                                                value="Міським електроосвітленням (зазначити ліхтарі, що не функціонують)">
                                                Міським електроосвітленням (зазначити ліхтарі, що не функціонують)
                                            </option>
                                            <option value="Світло вікон будинків">Світло вікон будинків
                                            </option>
                                            <option value="Похмуро">Іншими джерелами світла
                                            </option>
                                            <option value="Туман">Не освітлюється</option>
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

                                    <textarea class="input-textarea" name='address' id="address"></textarea>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-50">
                                <div class="inspection inspect-w-t protocol_mr-10">
                                    <p class="input-descr">Підходи</p>
                                    <div class="weather-time-block justify_end">
                                        <div class="select-time weather-select">
                                            <select name="approach-select" class="select-field inspection-select">
                                                <option value="Дорога">Дорога</option>
                                                <option value="Прибудинковий майданчик">Прибудинковий майданчик
                                                </option>
                                                <option value="Місце під'їзду автомобіля - (заасфальтований, ґрунтовий
                                    бетонний, тротуарна плитка (бруківка), кам’яний, пісочний
                                    засаджений газоном, інше)">Місце під'їзду автомобіля - (заасфальтований,
                                                    ґрунтовий
                                                    бетонний, тротуарна плитка (бруківка), кам’яний, пісочний
                                                    засаджений газоном, інше)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="descr-input-block other">
                                    <label for="approach" class="input-descr">Інше</label>
                                    <textarea class="input-textarea" name='approach' id="approach"></textarea>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-50">
                                <div class="inspection inspect-w-t protocol_mr-10">
                                    <p class="input-descr">Схеми перехресть і площ </p>
                                    <div class="weather-time-block justify_end streets-sheme">
                                        <div class="select-time streets-sheme">
                                            <select name="ways-schemes-select"
                                                class="select-field inspection-select">
                                                <option value="Хрестоподібний">Хрестоподібний
                                                </option>
                                                <option value="Т-подібний">Т-подібний
                                                </option>
                                                <option value="Х-подібний">Х-подібний
                                                </option>
                                                <option value="У-подібний">У-подібний
                                                </option>
                                                <option value="Багатобічний ">Багатобічний
                                                </option>
                                                <option value="Площа, сквер">Площа, сквер</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="descr-input-block other">
                                    <label for="ways-schemes" class="input-descr">Інше</label>
                                    <textarea class="input-textarea" name='ways-schemes'
                                        id="ways-schemes"></textarea>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-50">
                                <div class="inspection inspect-w-t protocol_mr-10">
                                    <p class="input-descr">Дорога</p>
                                    <div class="weather-time-block justify_end">
                                        <div class="select-time weather-select">
                                            <select name="roads-select" class="select-field inspection-select">
                                                <option value="Ясно">Проїжджа частина
                                                </option>
                                                <option value="Земляне полотно">Земляне полотно
                                                </option>
                                                <option value="Дорожнє полотно">Дорожнє полотно
                                                </option>
                                                <option value="Дорожня обстановка">Дорожня обстановка
                                                </option>
                                                <option value="Смуга відведення">Смуга відведення
                                                </option>
                                                <option value="Узбіччя">Узбіччя</option>
                                                <option value="Кювет">Кювет</option>
                                                <option value="Обріз">Обріз</option>
                                                <option value="Осьова лінія дороги">Осьова лінія дороги</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="descr-input-block other">
                                    <label for="roads" class="input-descr">Інше</label>
                                    <textarea class="input-textarea" type="text" name='roads' id="roads"></textarea>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-50">
                                <div class="inspection inspect-w-t protocol_mr-10">
                                    <p class="input-descr">Профіль вулиці </p>
                                    <div class="weather-time-block justify_end">
                                        <div class="select-time streets-and-elems">
                                            <select name="streets-select" class="select-field inspection-select">
                                                <option value="Проїжджа частина (дорожнє покриття)">Проїжджа частина
                                                    (дорожнє
                                                    покриття)
                                                </option>
                                                <option value="Смуга зелених насаджень">Смуга зелених насаджень
                                                </option>
                                                <option value="Тротуар">Тротуар</option>
                                                <option value="Газон">Газон</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="descr-input-block other">
                                    <label for="streets" class="input-descr">Інше</label>
                                    <textarea class="input-textarea" name='streets' id="streets"></textarea>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-50">
                                <div class="inspection inspect-w-t protocol_mr-10">
                                    <p class="input-descr">Елементи вулиці </p>
                                    <div class="weather-time-block justify_end">
                                        <div class="select-time streets-and-elems">
                                            <select name="streets-elems-select"
                                                class="select-field inspection-select">
                                                <option value="Ширина вулиці">Ширина вулиці
                                                </option>
                                                <option value="Ширина тротуару">Ширина тротуару
                                                </option>
                                                <option value="Ширина проїжджої частини">Ширина проїжджої частини
                                                </option>
                                                <option value="Ширина трамвайної колії ">Ширина трамвайної колії
                                                </option>
                                                <option value="Посадочний майданчик">Посадочний майданчик
                                                </option>
                                                <option value="Центр перехрестя">Центр перехрестя
                                                </option>
                                                <option value="Острівець безпеки">Острівець безпеки
                                                </option>
                                                <option value="Осьова лінія">Осьова лінія</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="descr-input-block other">
                                    <label for="streets-elems" class="input-descr">Інше</label>
                                    <textarea class="input-textarea" name='streets-elems'
                                        id="streets-elems"></textarea>
                                </div>

                            </div>
                            <div class="protocol__row direction_column protocol__mt-50">
                                <div class="descr-input-block justify_start">
                                    <label for="cameras-devs" class="input-descr">Наявні камери відеонагляду
                                        (спостереження)
                                        на місцях огляду та прилеглій території </label>
                                </div>
                                <textarea class="input-textarea" name='cameras-devs' id="cameras-devs"></textarea>
                            </div>
                            <div class="protocol__row protocol__mt-50">
                                <div class="inspection inspect-w-t protocol_mr-10">
                                    <p class="input-descr">Житловий будинок </p>
                                    <div class="weather-time-block living-house justify_end">
                                        <div class="select-time living-house">
                                            <select name="house-select" class="select-field inspection-select">
                                                <option value="Дім-дача (з мансардою)">Дім-дача (з мансардою)

                                                </option>
                                                <option
                                                    value="Цегляний житловий будинок багатоповерховий панельний (секційний) житловий будинок">
                                                    Цегляний житловий будинок багатоповерховий панельний (секційний)
                                                    житловий
                                                    будинок

                                                </option>
                                                <option value="Панельний (односекційний) житловий будинок">Панельний
                                                    (односекційний) житловий будинок
                                                </option>
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
                                    <textarea class="input-textarea" name='house' id="house"></textarea>
                                </div>

                            </div>
                            <div class="protocol__row protocol__mt-40">
                                <p class="block-header-descr">Об'єкти торгівлі і публічного харчування </p>
                                <div class="select-time  catering">
                                    <select name="catering" class="select-field inspection-select">
                                        <option value="Торгівельний центр, супермаркет, магазин">Торгівельний центр,
                                            супермаркет, магазин

                                        </option>
                                        <option value="Кафе">Кафе
                                        </option>
                                        <option value="Ресторан">Ресторан</option>
                                        <option value="Заклад публічного харчування">Заклад публічного харчування
                                        </option>
                                        <option value="Кіоск (торгівельний намет, ятка)">Кіоск (торгівельний намет,
                                            ятка)
                                        </option>
                                        <option value="Інше">Інше</option>
                                    </select>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-50">
                                <div class="descr-input-block other">
                                    <label for="floor-others" class="input-descr">Інше</label>
                                    <textarea class="input-textarea" name='floor-others'
                                        id="floor-others"></textarea>
                                </div>
                                <div class="descr-input-block other">
                                    <label for="floor" class="input-descr">Поверх</label>
                                    <div class="prompt-block protocol_mr-10">
                                        <p class="exclamation-mark">i</p>
                                        <p class="exclamation" id="exclamation-floor2">(вказати скільки поверхів у
                                            приміщенні та
                                            на якому поверсі проводиться огляд)</p>
                                    </div>
                                    <textarea class="input-textarea" name='floor' id="floor"></textarea>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-50">
                                <div class="inspection inspect-w-t protocol_mr-10">
                                    <p class="input-descr">Сходи і ліфт </p>
                                    <div class="weather-time-block justify_end">
                                        <div class="select-time doorhandle">
                                            <select name="stairs-elevators" class="select-field inspection-select">
                                                <option value="Зовнішні сталеві пожежні сходи">Зовнішні сталеві
                                                    пожежні сходи


                                                </option>
                                                <option value="Ліфт">
                                                    Ліфт
                                                </option>
                                                <option value="Горищна драбина">
                                                    Горищна драбина
                                                </option>
                                                <option
                                                    value="Двомаршеві сходи з дрібнорозмічених залізобетонних елементів">
                                                    Двомаршеві сходи з дрібнорозмічених залізобетонних елементів
                                                </option>
                                                <option value="Дерев'яні сходи">
                                                    Дерев'яні сходи
                                                </option>
                                                <option value="Сходовий майданчик">
                                                    Сходовий майданчик
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="descr-input-block other_mw-515">
                                    <label for="elevators-stairs" class="input-descr">Інше</label>
                                    <textarea class="input-textarea" type="text" name='elevators-stairs'
                                        id="elevators-stairs"></textarea>
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
                                            <select name="doors" class="select-field inspection-select">
                                                <option value="Вхідні тамбура">Вхідні тамбура
                                                </option>
                                                <option value="Квартири">Квартири</option>
                                                <option value="Торгівельногоцентру">Торгівельного центру</option>
                                                <option value="Супермаркету">Супермаркету</option>
                                                <option value="Магазину">Магазину</option>
                                                <option value="Кафе">Кафе</option>
                                                <option value="Ресторану">Ресторану</option>
                                                <option value="Закладу публічного харчування">Закладу публічного
                                                    харчування
                                                </option>
                                                <option value="Кіоску (торгівельного намету)">Кіоску (торгівельного
                                                    намету)
                                                </option>
                                                <option value="Одностулкові або двостулкові">Одностулкові або
                                                    двостулкові
                                                </option>
                                                <option
                                                    value="Матеріал (металеві; дерев’яні; металопластикові; ДВП; ДСП)">
                                                    Матеріал (металеві; дерев’яні; металопластикові; ДВП; ДСП)
                                                </option>
                                                <option value="Інше">Інше</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="descr-input-block other other_mw-505">
                                    <label for="door-other" class="input-descr">Інше</label>
                                    <textarea class="input-textarea" name='door-other' id="door-other"></textarea>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-25">
                                <div class="inspection inspect-w-t protocol_mr-10">
                                    <p class="input-descr">Дверні ручки </p>
                                    <div class="weather-time-block doorhandle justify_end">
                                        <div class="select-time doorhandle">
                                            <select name="doorhandle" class="select-field inspection-select">
                                                <option value="Ручка-скоба на планці">Ручка-скоба на планці
                                                </option>
                                                <option value="Обертова Г-подібна ручка">Обертова Г-подібна ручка
                                                </option>
                                                <option value="Обертова ручка-кнопка">Обертова ручка-кнопка</option>
                                                <option value="Інші">Інші</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="descr-input-block other other_mw-505">
                                    <label for="doorhandle-other" class="input-descr">Інше</label>
                                    <textarea class="input-textarea" name='doorhandle-other'
                                        id="doorhandle-other"></textarea>
                                </div>
                            </div>
                            <div class="protocol__row protocol__mt-25">
                                <div class="inspection inspect-w-t protocol_mr-10">
                                    <p class="input-descr">Дверні прилади </p>
                                    <div class="weather-time-block door-device justify_end">
                                        <div class="select-time door-device">
                                            <select name="door-device" class="select-field inspection-select">
                                                <option value="Перекидний врізаний шпінгалет">Перекидний врізаний
                                                    шпінгалет

                                                </option>
                                                <option value="Шпінгалет-засувка">Шпінгалет-засувка
                                                </option>
                                                <option value="Поперечна засувка з круглим стрижнем">Поперечна
                                                    засувка з круглим
                                                    стрижнем
                                                </option>
                                                <option
                                                    value="Поперечна засувка з плоским стрижнем та кільцем для замка">
                                                    Поперечна засувка з плоским стрижнем та кільцем для замка
                                                </option>
                                                <option value="Заставний крючок на планках">Заставний крючок на
                                                    планках
                                                </option>
                                                <option value="Поперечний пробій">Поперечний пробій
                                                </option>
                                                <option value="Дверний запобіжний ланцюжок">Дверний запобіжний
                                                    ланцюжок
                                                </option>
                                                <option value="Запірна штанга">Запірна штанга
                                                </option>
                                                <option value="Напівшарнірна звичайна петля">Напівшарнірна звичайна
                                                    петля
                                                </option>
                                                <option value="Напівшарнірна кутова петля">Напівшарнірна кутова
                                                    петля
                                                </option>
                                                <option value="Шарнірна петля">Шарнірна петля
                                                </option>
                                                <option value="Петля „стрілою”">Петля „стрілою”
                                                </option>
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
                                    <textarea class="input-textarea" name='traces' id="traces"></textarea>
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
                                            <select name="mortise-lock" class="select-field inspection-select">
                                                <option value="Врізний циліндровий замок">Врізний циліндровий замок
                                                </option>
                                                <option value="Меблевий сувальдний замок">Меблевий сувальдний замок
                                                </option>
                                                <option
                                                    value="Врізний сувальдний замок із рігельним засовом та фіксатором, що регулюється">
                                                    Врізний сувальдний замок із рігельним засовом та фіксатором, що
                                                    регулюється</option>
                                                <option
                                                    value="Врізний сувальдний замок із важелем для відводу клямки ключем)">
                                                    Врізний сувальдний замок із важелем для відводу клямки ключем)
                                                </option>
                                                <option
                                                    value="Накладний (циліндричний двообертовий замок із косою клямкою">
                                                    Накладний (циліндричний двообертовий замок із косою клямкою
                                                </option>
                                                <option value="Циліндричний напівобертів замок">Циліндричний
                                                    напівобертів
                                                    замок
                                                </option>
                                                <option value="Сувальдний двообертовий замок">Сувальдний
                                                    двообертовий замок
                                                </option>
                                                <option value="Скриньовий сувальдний замок">Скриньовий сувальдний
                                                    замок
                                                </option>
                                                <option value="Універсальний меблевий циліндричний прирізний замок">
                                                    Універсальний меблевий циліндричний прирізний замок</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="inspection inspect-w-t protocol_mr-10">
                                    <p class="input-descr">Навісний</p>
                                    <div class="weather-time-block doors justify_end">
                                        <div class="select-time doors">
                                            <select name="padlock" class="select-field inspection-select">
                                                <option value="Сувальдний двообертовий замок">Сувальдний
                                                    двообертовий замок
                                                </option>
                                                <option
                                                    value="Безсувальдний безпружинний замок із дужкою, що знімається">
                                                    Безсувальдний безпружинний замок із дужкою, що знімається
                                                </option>
                                                <option value="Пружинний замок">Пружинний замок</option>
                                                <option value="Циліндричний автоматичний висячий замок">Циліндричний
                                                    автоматичний висячий замок</option>
                                                <option value="Висячий контрольний замок">Висячий контрольний замок
                                                </option>
                                                <option value="Безсувальдний замок">Безсувальдний замок</option>
                                                <option
                                                    value="Висячі замки без ключа з чотиризначним літерним (зліва) та трьохзначним цифровим (справа) кодом">
                                                    Висячі замки без ключа з чотиризначним літерним (зліва) та
                                                    трьохзначним
                                                    цифровим (справа) кодом</option>
                                                <option value="Гвинтовий замок">Гвинтовий замок</option>
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
                                    <textarea class="input-textarea" name='lock-other' id="lock-other"></textarea>
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
                                        id="rooms-count-size" name="rooms-count-size-texta"></textarea>
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
                                        name="rooms-corridor-texta"></textarea>
                                </div>
                            </div>
                            <div class="protocol__row direction_column protocol__mt-50">
                                <div class="descr-input-block justify_start">
                                    <label for="break-or-not1" class="input-descr">Обстановка: не порушено; порушено
                                        (в чому
                                        проявляється порушення обстановки): </label>
                                </div>
                                <textarea class="input-textarea" name='break-or-not1'
                                    id="break-or-not1"> </textarea>
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
                                        name="bathroom-texta"></textarea>
                                </div>
                            </div>
                            <div class="protocol__row direction_column protocol__mt-50">
                                <div class="descr-input-block justify_start">
                                    <label for="break-or-not2" class="input-descr">Обстановка: не порушено; порушено
                                        (в чому
                                        проявляється порушення обстановки): </label>
                                </div>
                                <textarea class="input-textarea" name='break-or-not2'
                                    id="break-or-not2"> </textarea>
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
                                        name="kitchen-texta"></textarea>
                                </div>
                            </div>
                            <div class="protocol__row direction_column protocol__mt-50">
                                <div class="descr-input-block justify_start">
                                    <label for="break-or-not7" class="input-descr">Обстановка: не порушено; порушено
                                        (в чому
                                        проявляється порушення обстановки): </label>
                                </div>
                                <textarea class="input-textarea" name='break-or-not7'
                                    id="break-or-not7"> </textarea>
                            </div>
                        </div>
                        <div class="protocol__purple-separator protocol__mt-45"></div>
                        <div class="protocol__section-title protocol__title_restyle toggle-content">Опис кімнат
                            <div class="protocol__title_dropdown-white"></div>
                        </div>
                        <div class="protocol__content protocol__colored-content">
                            <div class="protocol__row protocol__mt-30">
                                <textarea class="input-textarea protocol_mnh-115" id="rooms-descr1"
                                    name="rooms-descr1"></textarea>
                            </div>
                            <div class="protocol__row direction_column protocol__mt-50">
                                <div class="descr-input-block justify_start">
                                    <label for="break-or-not3" class="input-descr">Обстановка: не порушено; порушено
                                        (в чому
                                        проявляється порушення обстановки): </label>
                                </div>
                                <textarea class="input-textarea protocol__mb-45" name='break-or-not3'
                                    id="break-or-not3"> </textarea>
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
                                    name="rooms-descr2"></textarea>
                            </div>
                            <div class="protocol__row direction_column protocol__mt-50">
                                <div class="descr-input-block justify_start">
                                    <label for="break-or-not4" class="input-descr">Обстановка: не порушено; порушено
                                        (в чому
                                        проявляється порушення обстановки): </label>
                                </div>
                                <textarea class="input-textarea protocol__mb-45" name='break-or-not4'
                                    id="break-or-not4"> </textarea>
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
                                    name="rooms-descr3"></textarea>
                            </div>
                            <div class="protocol__row direction_column protocol__mt-50">
                                <div class="descr-input-block justify_start">
                                    <label for="break-or-not5" class="input-descr">Обстановка: не порушено; порушено
                                        (в чому
                                        проявляється порушення обстановки): </label>
                                </div>
                                <textarea class="input-textarea protocol__mb-45" name='break-or-not5'
                                    id="break-or-not5"> </textarea>
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
                                    name="rooms-descr4"></textarea>
                            </div>
                            <div class="protocol__row direction_column protocol__mt-50">
                                <div class="descr-input-block justify_start">
                                    <label for="break-or-not6" class="input-descr">Обстановка: не порушено; порушено
                                        (в чому
                                        проявляється порушення обстановки): </label>
                                </div>
                                <textarea class="input-textarea" name='break-or-not6'
                                    id="break-or-not6"> </textarea>
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
                                            <select name="balcony" class="select-field inspection-select">
                                                <option value="Віконні - двостулкова">Віконні - двостулкова
                                                </option>
                                                <option value="Одностулкова">Одностулкова</option>
                                                <option value="Тристулкова(для житлових будинків)">Тристулкова(для
                                                    житлових
                                                    будинків)</option>
                                                <option value="Двостулкова з нерівними стулками">Двостулкова з
                                                    нерівними
                                                    стулками</option>
                                                <option value="Тристулкова (для громадських будівель)">Тристулкова
                                                    (для
                                                    громадських будівель)</option>
                                                <option
                                                    value="Дверні балконні - однопільна (для житлових будинків)">
                                                    Дверні
                                                    балконні - однопільна (для житлових будинків)</option>
                                                <option value="Двопільна (для громадських будівель)">Двопільна (для
                                                    громадських
                                                    будівель)</option>
                                                <option value="Віконний вітровий гачок на тумбі">Віконний вітровий
                                                    гачок на
                                                    тумбі</option>
                                                <option value="Віконний дротяний гачок">Віконний дротяний гачок
                                                </option>
                                                <option value="Віконні ручки (Т-подібна; скоба)">Віконні ручки
                                                    (Т-подібна;
                                                    скоба)</option>
                                                <option value="Віконні клямки">Віконні клямки</option>
                                                <option value="Віконна засувка">Віконна засувка</option>
                                                <option value="Розсувний шпінгалет">Розсувний шпінгалет</option>
                                                <option value="Фрамужний прилад з шнуром і блоками">Фрамужний прилад
                                                    з
                                                    шнуром і
                                                    блоками</option>
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

                                    <textarea class="input-textarea" name='traces-damage'
                                        id="traces-damage"></textarea>
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
                                    name="rooms-other-texta"></textarea>
                            </div>
                            <div class="protocol__row direction_column protocol__mt-30">
                                <label for="object-traces" class="input-descr">Об’єкти, предмети (фрагменти, речі,
                                    фунт,
                                    документи, цінності, грошові кошти та інше)</label>
                                <textarea class="input-textarea" name='object-traces' id="object-traces"></textarea>
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
                                <textarea class="input-textarea" name='finger-traces' id="finger-traces"></textarea>
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
                                <textarea class="input-textarea" name='shoes-traces' id="shoes-traces"></textarea>
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
                                <textarea class="input-textarea" name='vehicle-traces'
                                    id="vehicle-traces"></textarea>
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
                                <textarea class="input-textarea" name='break-traces' id="break-traces"></textarea>
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
                                <textarea class="input-textarea" name='blood-traces' id="blood-traces"></textarea>
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
                                <textarea class="input-textarea" name='micro-traces' id="micro-traces"></textarea>
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
                                <textarea class="input-textarea" name='bio-traces' id="bio-traces"></textarea>
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
                                <textarea class="input-textarea" name='other-traces' id="other-traces"></textarea>
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
                                <textarea class="input-textarea" name='p-add-plan' id="p-add-plan"></textarea>
                            </div>
                            <div class="protocol__row direction_column protocol__mt-30">
                                <label for="p-add-plan-info" class="input-descr">(носії комп’ютерної інформації,
                                    пояснення
                                    спеціалістів та інші матеріали, які пояснюють зміст протоколу)
                                </label>
                                <textarea class="input-textarea" name='p-add-plan-info'
                                    id="p-add-plan-info"></textarea>
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

                                    <textarea class="input-textarea" name='p-signed' id="p-signed"></textarea>
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
                                        <textarea class="input-textarea fullname-input" name='participant1'
                                            id="participant1"></textarea>
                                    </div>
                                    <div class="participant-second-block">
                                        <label for="participant1-sign"
                                            class="input-descr protocol__ai-center">Підпис</label>
                                        <textarea class="input-textarea sign-input" name='participant1-sign'
                                            id="participant1-sign"></textarea>
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
                                        <textarea class="input-textarea fullname-input" name='participant2'
                                            id="participant2"></textarea>
                                    </div>
                                    <div class="participant-second-block">
                                        <label for="participant2-sign"
                                            class="input-descr protocol__ai-center">Підпис</label>
                                        <textarea class="input-textarea sign-input" name='participant2-sign'
                                            id="participant2-sign"></textarea>
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
                                        <textarea class="input-textarea fullname-input" name='participant3'
                                            id="participant3"></textarea>
                                    </div>
                                    <div class="participant-second-block">
                                        <label for="participant3-sign"
                                            class="input-descr protocol__ai-center">Підпис</label>
                                        <textarea class="input-textarea sign-input" name='participant3-sign'
                                            id="participant3-sign"></textarea>
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
                                        <textarea class="input-textarea fullname-input" name='participant4'
                                            id="participant4"></textarea>
                                    </div>
                                    <div class="participant-second-block">
                                        <label for="participant4-sign"
                                            class="input-descr protocol__ai-center">Підпис</label>
                                        <textarea class="input-textarea sign-input" name='participant4-sign'
                                            id="participant4-sign"></textarea>
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
                                        <textarea class="input-textarea fullname-input" name='participant5'
                                            id="participant5"></textarea>
                                    </div>
                                    <div class="participant-second-block">
                                        <label for="participant5-sign"
                                            class="input-descr protocol__ai-center">Підпис</label>
                                        <textarea class="input-textarea sign-input" name='participant5-sign'
                                            id="participant5-sign"></textarea>
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
                                        <textarea class="input-textarea fullname-input" name='participant6'
                                            id="participant6"></textarea>
                                    </div>
                                    <div class="participant-second-block">
                                        <label for="participant6-sign"
                                            class="input-descr protocol__ai-center">Підпис</label>
                                        <textarea class="input-textarea sign-input" name='participant6-sign'
                                            id="participant6-sign"></textarea>
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
                                        <textarea class="input-textarea fullname-input" name='witness1'
                                            id="witness1"></textarea>
                                    </div>
                                    <div class="participant-second-block">
                                        <label for="witness1-sign"
                                            class="input-descr protocol__ai-center">Підпис</label>
                                        <textarea class="input-textarea sign-input" name='witness1-sign'
                                            id="witness1-sign"></textarea>
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
                                        <textarea class="input-textarea fullname-input" name='witness2'
                                            id="witness2"></textarea>
                                    </div>
                                    <div class="participant-second-block">
                                        <label for="witness2-sign"
                                            class="input-descr protocol__ai-center">Підпис</label>
                                        <textarea class="input-textarea sign-input" name='witness2-sign'
                                            id="witness2-sign"></textarea>
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

                                    <textarea class="input-textarea" name='survey-conducted'
                                        id="survey-conducted"></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- photoblock -->
                        <div class="protocol__purple-separator protocol__mt-30"></div>
                        <div class="protocol__section-title protocol__title_restyle toggle-content">ФОТОТАБЛИЦЯ до
                            протоколу
                            огляду місця події
                            <div class="protocol__title_dropdown-white"></div>
                        </div>
                        <div class="protocol__content protocol__colored-content">
                            <div class="protocol__row protocol__mt-50">
                                <label for="p-add-photo1"
                                    class="input-descr protocol__ai-center p-photo-descr">Додати
                                    фото</label>

                                <div class="photo-block-wrapper">
                                    <div class="groups-edit__student-add-form p-upload-block protocol__ai-center">
                                        <label class="custom-upload-form p-custom-upload-form" for="p-add-photo1">
                                            <input class='eg-input add-style base-upload' type="file"
                                                id="p-add-photo1" name="p-add-photo1">
                                            Назва файлу
                                        </label>
                                        <button class="add-student add-student_restyle p-btn-upload"
                                            id="p-add-photo1-btn">Завантажити</button>
                                    </div>
                                    <div class="delete-photo-block">
                                        <button class="input-descr protocol__ai-center">x</button>
                                        <p class="input-descr protocol__ai-center">Довга назва фото</p>
                                    </div>
                                </div>

                            </div>
                            <div class="protocol__row protocol__mt-35">
                                <div class="descr-input-block">
                                    <label for="photo-descr1" class="input-descr p-photo-descr">Опис
                                        фотознімку</label>
                                    <textarea class="input-textarea p-photo-input" name='photo-descr1'
                                        id="photo-descr1"></textarea>
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
                                        name='investigator-photo-block1' id="investigator-photo-block1"></textarea>
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
                                <label for="p-add-photo2"
                                    class="input-descr protocol__ai-center p-photo-descr">Додати
                                    фото</label>

                                <div class="photo-block-wrapper">
                                    <div class="groups-edit__student-add-form p-upload-block protocol__ai-center">
                                        <label class="custom-upload-form p-custom-upload-form" for="p-add-photo2">
                                            <input class='eg-input add-style base-upload' type="file"
                                                id="p-add-photo2" name="p-add-photo2">
                                            Назва файлу
                                        </label>
                                        <button class="add-student add-student_restyle p-btn-upload"
                                            id="p-add-photo2-btn">Завантажити</button>
                                    </div>
                                    <div class="delete-photo-block">
                                        <button class="input-descr protocol__ai-center">x</button>
                                        <p class="input-descr protocol__ai-center">Довга назва фото</p>
                                    </div>
                                </div>

                            </div>
                            <div class="protocol__row protocol__mt-35">
                                <div class="descr-input-block">
                                    <label for="2" class="input-descr p-photo-descr">Опис фотознімку</label>
                                    <textarea class="input-textarea p-photo-input" name='photo-descr2'
                                        id="photo-descr2"></textarea>
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
                                        name='investigator-photo-block2' id="investigator-photo-block2"></textarea>
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
                                <label for="3" class="input-descr protocol__ai-center p-photo-descr">Додати
                                    фото</label>

                                <div class="photo-block-wrapper">
                                    <div class="groups-edit__student-add-form p-upload-block protocol__ai-center">
                                        <label class="custom-upload-form p-custom-upload-form" for="p-add-photo3">
                                            <input class='eg-input add-style base-upload' type="file"
                                                id="p-add-photo3" name="p-add-photo3">
                                            Назва файлу
                                        </label>
                                        <button class="add-student add-student_restyle p-btn-upload"
                                            id="p-add-photo3-btn">Завантажити</button>
                                    </div>
                                    <div class="delete-photo-block">
                                        <button class="input-descr protocol__ai-center">x</button>
                                        <p class="input-descr protocol__ai-center">Довга назва фото</p>
                                    </div>
                                </div>

                            </div>
                            <div class="protocol__row protocol__mt-35">
                                <div class="descr-input-block">
                                    <label for="photo-descr3" class="input-descr p-photo-descr">Опис
                                        фотознімку</label>
                                    <textarea class="input-textarea p-photo-input" name='photo-descr3'
                                        id="photo-descr3"></textarea>
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
                                        name='investigator-photo-block3' id="investigator-photo-block3"></textarea>
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
                                <label for="p-add-photo4"
                                    class="input-descr protocol__ai-center p-photo-descr">Додати
                                    фото</label>

                                <div class="photo-block-wrapper">
                                    <div class="groups-edit__student-add-form p-upload-block protocol__ai-center">
                                        <label class="custom-upload-form p-custom-upload-form" for="p-add-photo4">
                                            <input class='eg-input add-style base-upload' type="file"
                                                id="p-add-photo4" name="p-add-photo4">
                                            Назва файлу
                                        </label>
                                        <button class="add-student add-student_restyle p-btn-upload"
                                            id="p-add-photo4-btn">Завантажити</button>
                                    </div>
                                    <div class="delete-photo-block">
                                        <button class="input-descr protocol__ai-center">x</button>
                                        <p class="input-descr protocol__ai-center">Довга назва фото</p>
                                    </div>
                                </div>

                            </div>
                            <div class="protocol__row protocol__mt-35">
                                <div class="descr-input-block">
                                    <label for="photo-descr4" class="input-descr p-photo-descr">Опис
                                        фотознімку</label>
                                    <textarea class="input-textarea p-photo-input" name='photo-descr4'
                                        id="photo-descr4"></textarea>
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
                                        name='investigator-photo-block4' id="investigator-photo-block4"></textarea>
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
                                <label for="p-add-photo5"
                                    class="input-descr protocol__ai-center p-photo-descr">Додати
                                    фото</label>

                                <div class="photo-block-wrapper">
                                    <div class="groups-edit__student-add-form p-upload-block protocol__ai-center">
                                        <label class="custom-upload-form p-custom-upload-form" for="p-add-photo5">
                                            <input class='eg-input add-style base-upload' type="file"
                                                id="p-add-photo5" name="p-add-photo5">
                                            Назва файлу
                                        </label>
                                        <button class="add-student add-student_restyle p-btn-upload"
                                            id="p-add-photo5-btn">Завантажити</button>
                                    </div>
                                    <div class="delete-photo-block">
                                        <button class="input-descr protocol__ai-center">x</button>
                                        <p class="input-descr protocol__ai-center">Довга назва фото</p>
                                    </div>
                                </div>

                            </div>
                            <div class="protocol__row protocol__mt-35">
                                <div class="descr-input-block">
                                    <label for="photo-descr5" class="input-descr p-photo-descr">Опис
                                        фотознімку</label>
                                    <textarea class="input-textarea p-photo-input" name='photo-descr5'
                                        id="photo-descr5"></textarea>
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
                                        name='investigator-photo-block5' id="investigator-photo-block5"></textarea>
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
                                <label for="p-add-photo6"
                                    class="input-descr protocol__ai-center p-photo-descr">Додати
                                    фото</label>

                                <div class="photo-block-wrapper">
                                    <div class="groups-edit__student-add-form p-upload-block protocol__ai-center">
                                        <label class="custom-upload-form p-custom-upload-form" for="p-add-photo6">
                                            <input class='eg-input add-style base-upload' type="file"
                                                id="p-add-photo6" name="p-add-photo6">
                                            Назва файлу
                                        </label>
                                        <button class="add-student add-student_restyle p-btn-upload"
                                            id="p-add-photo6-btn">Завантажити</button>
                                    </div>
                                    <div class="delete-photo-block">
                                        <button class="input-descr protocol__ai-center">x</button>
                                        <p class="input-descr protocol__ai-center">Довга назва фото</p>
                                    </div>
                                </div>

                            </div>
                            <div class="protocol__row protocol__mt-35">
                                <div class="descr-input-block">
                                    <label for="photo-descr6" class="input-descr p-photo-descr">Опис
                                        фотознімку</label>
                                    <textarea class="input-textarea p-photo-input" name='photo-descr6'
                                        id="photo-descr6"></textarea>
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
                                        name='investigator-photo-block6' id="investigator-photo-block6"></textarea>
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
                                <label for="p-add-photo7"
                                    class="input-descr protocol__ai-center p-photo-descr">Додати
                                    фото</label>

                                <div class="photo-block-wrapper">
                                    <div class="groups-edit__student-add-form p-upload-block protocol__ai-center">
                                        <label class="custom-upload-form p-custom-upload-form" for="p-add-photo7">
                                            <input class='eg-input add-style base-upload' type="file"
                                                id="p-add-photo7" name="p-add-photo7">
                                            Назва файлу
                                        </label>
                                        <button class="add-student add-student_restyle p-btn-upload"
                                            id="p-add-photo7-btn">Завантажити</button>
                                    </div>
                                    <div class="delete-photo-block">
                                        <button class="input-descr protocol__ai-center">x</button>
                                        <p class="input-descr protocol__ai-center">Довга назва фото</p>
                                    </div>
                                </div>

                            </div>
                            <div class="protocol__row protocol__mt-35">
                                <div class="descr-input-block">
                                    <label for="photo-descr7" class="input-descr p-photo-descr">Опис
                                        фотознімку</label>
                                    <textarea class="input-textarea p-photo-input" name='photo-descr7'
                                        id="photo-descr7"></textarea>
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
                                        name='investigator-photo-block7' id="investigator-photo-block7"></textarea>
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
                                <label for="p-add-photo8"
                                    class="input-descr protocol__ai-center p-photo-descr">Додати
                                    фото</label>

                                <div class="photo-block-wrapper">
                                    <div class="groups-edit__student-add-form p-upload-block protocol__ai-center">
                                        <label class="custom-upload-form p-custom-upload-form" for="p-add-photo8">
                                            <input class='eg-input add-style base-upload' type="file"
                                                id="p-add-photo8" name="p-add-photo8">
                                            Назва файлу
                                        </label>
                                        <button class="add-student add-student_restyle p-btn-upload"
                                            id="p-add-photo8-btn">Завантажити</button>
                                    </div>
                                    <div class="delete-photo-block">
                                        <button class="input-descr protocol__ai-center">x</button>
                                        <p class="input-descr protocol__ai-center">Довга назва фото</p>
                                    </div>
                                </div>

                            </div>
                            <div class="protocol__row protocol__mt-35">
                                <div class="descr-input-block">
                                    <label for="photo-descr8" class="input-descr p-photo-descr">Опис
                                        фотознімку</label>
                                    <textarea class="input-textarea p-photo-input" name='photo-descr8'
                                        id="photo-descr8"></textarea>
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
                                        name='investigator-photo-block8' id="investigator-photo-block8"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="protocol__content">
                            <div class="protocol__row protocol__mt-35">
                                <div class="protocol-btns-block">
                                    <button type="submit" class="groups-edit__create-group sce__buttons-restyle"
                                        id="sendProtocol">Зберегти
                                    </button>
                                    <button type="reset" class="groups-edit__back-to-groups sce__buttons-restyle"
                                        id="backToContent">Назад

                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
    </form>
    <!-- protocol modal window end -->
    <div class="content-wrapper">
       <div class="direction-separator">
        <div class="direction-separator_badge"><span>{{ $lesson->course_name ?? 'Без назви' }}</span></div>
    </div>
    <div class="container">

        <ul class="breadcrumbs_list">
            <li class="breadcrumbs_item">
                <a href="{{ route('main') }}" class="breadcrumbs_link">Головна</a>
            </li>
            <li class="breadcrumbs_item">
                <a href="{{ route('view_course', $course->id) }}" class="breadcrumbs_link">{{ $course->name }}</a>
            </li>
            <li class="breadcrumbs_item">
                <a href="{{ route('view_lesson', [$course->id, $lesson->id]) }}" class="breadcrumbs_link breadcrumbs_active">{{ $lesson->course_name ?? 'Без назви' }}</a>
            </li>

        </ul>

        <div class="string-menu_wrapper">
            <div class="string-menu_inner">
                <a class="string-menu_btn" href="{{ route('view_lesson', [$course->id, $lesson->id]) }}"><span>Як це працює</span></a>
            </div>
            <div class="string-menu_inner">
                <a class="string-menu_btn" href="{{ route('view_lesson', [$course->id, $lesson->id, 'video']) }}"><span>Відеолекція</span></a>
            </div>
            <div class="string-menu_inner">
                <a class="string-menu_btn" href="{{ route('view_lesson', [$course->id, $lesson->id, 'model']) }}"><span>3D модель</span></a>
            </div>
            <div class="string-menu_inner">
                <a class="string-menu_btn  active" href="{{ route('view_lesson', [$course->id, $lesson->id, 'protocol']) }}"><span>Протокол</span></a>
            </div>
            <div class="string-menu_inner">
                <a class="string-menu_btn" href="{{ route('view_lesson', [$course->id, $lesson->id, 'test']) }}"><span>Завдання</span></a>
            </div>

            @include('layouts.front.includes.nextprevlesson')

        </div>

      <!--<div class="protocole_book programs-item_book">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer Lorem Ipsum has been the industry's </div>-->

      <div class="protocole-text string-text">
        {!! $lesson->course_protocol_descr !!}
      </div>
      <a class="protocole-btn btn-watch--more" href="#" id="modalWindowOpen"><span>відкрити файл</span></a>
      {{--@forelse (collect(json_decode($lesson->add_document)) as $document)
            <a class="protocole-btn btn-watch--more" href="{{ asset('docs/'.$document) }}"><span>Протокол № {{ $loop->iteration }}</span></a>
      @empty
      <div class="string-text">
        Протоколи відсутні
      </div>
      @endforelse--}}

    </div>
    </div>

    <div class="scroll-wrapper">
        <div class="to-top-button">></div>
    </div>
</section>
@endsection

@section('js')
    <script src="{{ asset('js/autosize.js') }}"></script>
@endsection
