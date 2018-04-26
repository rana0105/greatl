<div class="advance-sraech-area overflow-fix box-white-bg overflow-fix d-flex justify-content-between">
	<div class="search-single-field">
		<h2>Category</h2>
		<select id="category" class="project-categories">
			<option value="">Select</option>
			<option value="0">All Category</option>
			@foreach($procat as $pro)
			 <option value="{{ $pro->id }}">{{ $pro->project_cat }}</option>
			@endforeach
		</select>
	</div>
	<div class="search-single-field">
		<h2>Sates</h2>
		<select id="state" class="project-categories schange">
		  <option value="">Select</option>
		  @foreach(config('state.states') as $state)
			<option value="{{ $state['name'] }}">{{ $state['name'] }}</option>
		  @endforeach
		</select>
	</div>
	<div class="search-single-field">	
		<h2>Zip Code</h2>
		<select id="zipcode" class="project-categories" name="zipcode">
			<option value="" selected="selected">Select</option>
		</select>
		{{-- <input id="zipcode" name="zipcode" placeholder="Zip Code" type="text" class=""/> --}}
	</div>
	<div class="search-single-field">
		<h2>Budget</h2>
		<div class="range-slider-wrap">
			<input type="text" id="range" class="range-slider range-slider--single ragecha" name="" value="" />
			<input type="hidden" id="setrange" name="range" value="">
		</div>
	</div>
	<div class="search-single-field">
		<h2>Your Skill</h2>
		<input id="skill" placeholder="Type and enter" name="skill" value="" type="text"/>
	</div>
</div>