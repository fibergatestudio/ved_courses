<div class="bootstrap-restylingStudent modal fade show" id="adminPanelModal" tabindex="-1" role="dialog"
    aria-labelledby="adminPanelModalLabel" aria-modal="true" style="padding-right: 16px; display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <ul class="student-menu-wrapper">
                <li class="student-menu-inner">
                    <a class="student-menu-link" href="{{ route('home') }}">Панель курсів</a>
                </li>
                <li class="student-menu-inner">
                    <a class="student-menu-link" href="##">Профіль</a>
                </li>
                <li class="student-menu-inner">
                    <a class="student-menu-link" href="##">Налаштування</a>
                </li>
                <li class="student-menu-inner">
                    <a class="student-menu-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Вийти</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
