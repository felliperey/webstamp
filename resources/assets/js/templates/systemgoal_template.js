module.exports = function(context) {
    return `
        <li class="item" id="systemgoal-${context.id}">
                <div class="item__title">
                    G-${context.id}: ${context.name}
                </div>
                <div class="item__actions">
	                <div class="item__title">
	                    <img src="/images/edit.ico" alt="Edit" width="20" class="navbar__logo">
	                </div>
                    <form action="deletesystemgoal" method="POST"  class="delete-form ajaxform" data-delete="systemgoal">
	                   <div class="item__title">
	                       <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input id="project_id" name="project_id" type="hidden" value="1">
                            <input id="systemgoal_id" name="systemgoal_id" type="hidden" value="${context.id}">
                            <input type="image" src="/images/delete.ico" alt="Delete" width="20" class="navbar__logo">
	                   </div>
                    </form>
             	</div>
        </li>`;
};
