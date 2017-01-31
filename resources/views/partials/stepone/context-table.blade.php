<?php
    // Getting all variables
    $variables = App\Variable::all();
    // Getting all States
    $states = App\State::all();
    // Index of current variable (pivot_2 for the loop)
    $variable_index = 0;
    // Fix pivot to last element in array
    $pivot = count($variables) - 1;
    // Fix the pivot_2 to the pivot
    $pivot_2 = $pivot;
    $loop = 0;
    for($i = 0; $i < count($variables); $i++) {
        $allStates[$variable_index] = [];
        for ($j = 0; $j < count($states); $j++) {
            if ($variables[$i]->id == $states[$j]->variable_id){
                array_push($allStates[$variable_index], $states[$j]->name);
            }
        }
        $variable_index++;
    }
    $total_loop = 1;
    for ($i = 0; $i < count($allStates); $i++) {
        $number_of_states[$i] = count($allStates[$i]);
        $combination_array[$i] = 0;
        $total_loop *= count($allStates[$i]);
    }
    $rule = App\Rules::where('controlaction_id', $ca->id)->get();

    $total_index = App\Rules::distinct()->select('index')->where('controlaction_id', $ca->id)->get();
    $rle = [];
    if (count($total_index) > 0) {
        foreach($total_index as $index) {
            array_push($rle, App\Rules::where('controlaction_id', $ca->id)->where('index', $index->index)->orderBy('index', 'asc')->orderBy('variable_id', 'asc')->get());
        }
    }


?>
<div class="substep__title">
    Context Table - {{$ca->name}}
</div>

<div class="substep__content">

    <div class="container">

        <div class="container-fluid" style="margin-top: 10px">

        <div class="table-row header">
        @foreach ($variables as $variable)
            <div class="text">{{$variable->name}}</div>
        @endforeach
        <div class="text">Index Rule</div>
        <div class="text">Control Action provided</div>
        <div class="text">Control Action not provided</div>
        <div class="text">Wrong time/order of Control Action</div>
        <div class="text">Control Action provided too early</div>
        <div class="text">Control Action provided too late</div>
        <div class="text">Control Action stopped too soon</div>
        <div class="text">Control Action applied too long</div>
        </div>

        @while($total_loop > 0)
        <?php
            $rules = [];
            foreach($total_index as $index) {
                array_push($rules, "true");
            }
        ?>
            <div class="table-row">

                @for($i = 0; $i < count($allStates); $i++)
                    <div class="text">
                        {{$allStates[$i][$combination_array[$i]]}} <br/>
                    </div>
                    <?php
                        // Verifying if the rule fits
                        if(count($rle) > 0) {
                            foreach($rle as $key => $r) {
                                if (count($r) > 0) {
                                    if($r[$i]->state_id == 0){
                                        if ($rules[$key] == "true")
                                            $rules[$key] = "true";
                                    } else if ( ($allStates[$i][$combination_array[$i]] == App\State::find($r[$i]->state_id)->name) && ($rules[$key] == "true") ){
                                        $rules[$key] = "true";
                                    } else {
                                        $rules[$key] = "false";
                                    }
                                }
                            }
                        }
                    ?>
                @endfor

                <?php

                    $loop++;
                    for ($i = 0; $i < count($combination_array); $i++) {
                        $multiple = (count($combination_array)-($i+1));
                        $divisor = 2 ** $multiple;
                        $resto = $loop % $divisor;
                        if ($resto == 0) {
                            $combination_array[$i] = ($combination_array[$i]+1 >= $number_of_states[$i]) ? 0 : $combination_array[$i]+1;
                        }
                    }
                    
                    $total_loop--;
                ?>                

                <div class="text" id="rule-row-{{$total_loop}}" name="rule-row-{{$total_loop}}">
                <?php
                    foreach ($rules as $key => $r) {
                        if ($r == "true" && count($r) > 0) {
                            echo "R".($key+1)." ";
                        } else {
                            $r[$key] = "false";
                        }
                    }
                ?>
                </div>

                <!--Control Action Provided-->
                <select class="text" id="provided-row-{{$total_loop}}" name="ca-provided-row-{{$total_loop}}">
                    <option>-</option>
                    @if ($rules == "true")
                        <option selected>True</option>
                    @else
                        <option>True</option>
                    @endif
                    <option>False</option>
                </select>

                <!--Control action not provided-->
                <select class="text" id="notprovided-row-{{$total_loop}}" name="ca-not-provided-row-{{$total_loop}}">
                    <option selected>-</option>
                    <option>True</option>
                    <option>False</option>
                </select>

                <!--Wrong time or order causes hazard-->
                <select class="text" id="wrongtime-row-{{$total_loop}}" name="wrongtime-row-{{$total_loop}}">
                    <option selected>-</option>
                    <option>True</option>
                    <option>False</option>
                </select>

                <!--Control Action provided too early-->
                <select class="text" id="early-row-{{$total_loop}}" name="early-row-{{$total_loop}}">
                    <option selected>-</option>
                    <option>True</option>
                    <option>False</option>
                </select>

                <!--Control Action provided too late-->
                <select class="text" id="late-row-{{$total_loop}}" name="late-row-{{$total_loop}}">
                    <option selected>-</option>
                    <option>True</option>
                    <option>False</option>
                </select>
                <!--Control action stopped too soon-->
                <select class="text" id="soon-row-{{$total_loop}}" name="soon-row-{{$total_loop}}">
                    <option selected>-</option>
                    <option>True</option>
                    <option>False</option>
                </select>
                <!--Control Action applied too long-->
                <select class="text" id="long-row-{{$total_loop}}" name="long-row-{{$total_loop}}">
                    <option selected>-</option>
                    <option>True</option>
                    <option>False</option>
                </select>
            </div>
        @endwhile   

        </div>
    </div>
</div>