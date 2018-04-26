<div class="advance-sraech-area overflow-fix box-white-bg overflow-fix d-flex justify-content-between">
	<div class="search-single-field">
		<h2>Category</h2>
		<select id="category"  name="category" class="project-categories">
			<option value="">--Select--</option>
			@foreach($procat as $pro)
			 <option value="{{ $pro->id }}">{{ $pro->project_cat }}</option>
			@endforeach
		</select>
	</div>
	<div class="search-single-field">	
		<h2>Keyword</h2>
		<input id="discription" name="discription" placeholder="Keyword" type="text"/>
	</div>
	<div class="search-single-field">
		<h2>Project type</h2>
		<select id="type" class="project-categories">
			<option value="">--Select--</option>
			<option value="0">Newest project first</option>
			@foreach($rate as $r)
			<option value="{{ $r->id }}">{{ $r->project_type }}</option>
			@endforeach
		</select>
	</div>
	<div class="search-single-field">
		<h2>Budget</h2>
		<div class="range-slider-wrap">
			<input id="budget" type="text" class="range-slider range-slider--single range" name="range_double" value="" />
			<input type="hidden" id="budget" class="setrange" name="budget" value="">
		</div>
	</div>
	<div class="search-single-field">
		<h2>Your Skill</h2>
		<input id="skill" placeholder="Type and enter" value="" type="text"/>
	</div>
</div>