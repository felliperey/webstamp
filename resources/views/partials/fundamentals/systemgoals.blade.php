<div class="substep__title">
    System Goals
</div>

<div class="substep__add" data-component="add-button" data-add="systemgoal">
    +
</div>

<div class="substep__content">
    <ul class="substep__list">
        @foreach (App\SystemGoals::all() as $systemGoal)
            <li class="item" id="systemgoal-{{$systemGoal->id}}">
                <div class="item__title">
                    G-{{$systemGoal->id}}: {{$systemGoal->name}}
                </div>
                <div class="item__actions">
                    <div class="item__title">
                        <img src="{{ asset('images/edit.ico') }}" alt="Edit" width="20" class="navbar__logo">
                    </div>
                    <form action ="/deletesystemgoal" method="POST" class="delete-form ajaxform" data-delete="systemgoal">
                        <div class="item__title">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input id="project_id" name="project_id" type="hidden" value="1">
                            <input id="systemgoal_id" name="systemgoal_id" type="hidden" value="{{$systemGoal->id}}">
                            <input type="image" src="{{ asset('images/delete.ico') }}" alt="Delete" width="20" class="navbar__logo">
                        </div>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
