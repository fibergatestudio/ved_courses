<div class="bootstrap-restylingStudent modal fade" id="{{ $modalId ?? '' }}{{ $secondId ?? '' }}"
    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog_restyle">
        <div class="modal-content">
            <div class="deleteMenu-wrapper">
                <div class="deleteMenu-topImg">
                    <img src="{{ asset('img/graduation-cap.png') }}" alt="icon">
                </div>
                <div class="deleteMenu-text">Ви точно бажаєте видалити <br> студента {{ $target ?? '' }}?</div>
                <div class="deleteMenu-btn">
                    <a class="flexTable-btn_delete" href="{{ $modalPath ?? '' }}"
                        onclick="{{ isset($secondId) ? 'removeStud('.$secondId.')' : '' }}">
                        <span>Видалити</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
