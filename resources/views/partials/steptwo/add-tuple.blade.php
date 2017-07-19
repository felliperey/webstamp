<div id="add-tuple" style="display: none;">
	<form action="/addtuple" class="adding-tuple" method="POST">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="vex-dialog-form">
			<div class="container">
        		<div class="container-fluid">
        			<div class="table-row header">
        				<div class="text">Scenario</div>
        				<div class="text">Associated Causal Factors</div>
        				<div class="text">Recommendations</div>
        				<!-- <div class="text">Role</div> -->
        				<div class="text">Rationale</div>
        			</div>

        			<div class="table-row" id="guidewords">
	        			<div class="text center">
	        				<select id="guideword" class="guideword-combo-tuple" style="background-color: #f0f0f0;">
	        					<option disabled selected value="0">[Guideword]</option>
						    	@foreach(App\Guidewords::all() as $guideword)
						    		<option value="{{$guideword->id}}" title="{{$guideword->guideword}}">{{$guideword->guideword}}</option>
						    	@endforeach
						    </select>
	        				<textarea class="step2_textarea__modal" name="scenario" id="scenario" placeholder="Add the scenario here"></textarea>
	        			</div>
                        <div class="text center"><br/>
                        	<textarea class="step2_textarea__modal" name="associated" id="associated" placeholder="Add the associated causal factors here"></textarea>
                        </div>
                        <div class="text center"><br/>
                        	<textarea class="step2_textarea__modal" name="requirement" id="requirement" placeholder="Add the recommendations here"></textarea>
                        </div>
<!--                         <div class="text center"><br/>
                        	<textarea class="step2_textarea__modal" name="role" id="role" placeholder="Add the role here"></textarea>
                        </div> -->
                        <div class="text center"><br/>
                        	<textarea class="step2_textarea__modal" name="rationale" id="rationale" placeholder="Add the rationales here"></textarea>
                        </div>
	        		</div>
	        		<input type="hidden" name="uca" id="uca" value="0">
        		</div>
        	</div>
        	<div class="vex-dialog-input"></div>
        	<div class="vex-dialog-buttons">
	        	<div style="display: table; margin: 0 auto;">
	        		<button class="vex-dialog-button-primary vex-dialog-button vex-first">Add</button>
	        		<!--<button class="vex-dialog-button-secondary vex-dialog-button vex-last">Cancel</button>-->
	        	</div>
	        </div>
		</div>
	</form>
</div>