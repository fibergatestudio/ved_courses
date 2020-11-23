<div class="bootstrap-restylingStudent modal fade" id="{{ $modalId }}{{ $user->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog_restyle">
        <div class="modal-content">
            <div class="deleteMenu-wrapper">
                <div class="deleteMenu-topImg">
                    <img src="{{ asset('img/basket.png') }}" alt="icon">
                </div>
                <div class="deleteMenu-text">
                    Ви точно бажаєте видалити <br> користувача?
                </div>
                <div class="deleteMenu-btn">
                    <a class="flexTable-btn_delete" href="{{ route('user_delete', ['user_id' =>  $user->id ]) }}"><span>Видалити</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
