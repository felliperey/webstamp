<div class="substep__title">
    Components
</div>

<div class="substep__add" data-component="add-button" data-add="component">
    +
</div>

<div class="substep__content">
    <ul class="substep__list">
        @foreach ($components as $component)
            <li class="item">
                <div class="item__title">
                    {{ $component->name }}
                </div>
                <div class="item__actions__action">
                    {{ $component->type }}
                </div>
                <div class="item__actions">
                    <div class="item__title">
                        <img src="{{ asset('images/edit.ico') }}" alt="Edit" width="20" class="navbar__logo">
                    </div>
                    <div class="item__title">
                        <img src="{{ asset('images/delete.ico') }}" alt="Delete" width="20" class="navbar__logo">
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>