@extends('layouts.main')
@section('content')
<!-- project-search-area -->
<section class="project-search-area overflow-fix">
	<div class="container my-container">
		<div class="row">
			<div class="col-lg-12">
				<div class="advance-search-main-area overflow-fix">
					@include( 'project.advancesearch')
				</div>
				<div class="all-search-porject-count-area overflow-fix">
					<p>1245 projects for you</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End project-search-area -->



<!-- project-list-area -->
<section class="project-list-area overflow-fix">
	<div class="container my-container">
		<div class="row">
			<div class="col-lg-12">
				<div class="post-dropdwon-title-area overflow-fix d-flex justify-content-between">
					<div class="project-filter-area overflow-fix">
						  <select id="project-filter" class="project-filter-select">
								<option value="all">Newest project first</option>
								<option value=".fixed-buget-1">Fixed project</option>
								<option value=".hourly-buget-1">Hourly project</option>
						  </select>
					</div>
				</div>
				<div id="porject-list-full-area" class="overflow-fix">
					<div class="single-porject-area mix fixed-buget-1 overflow-fix">
						<div class="row padding-o">
							<div class="col-lg-10">
								<div class="single-porject-single-item overflow-fix">
									<div class="single-porject-heading overflow-fix">
										<h2>Re-design home page and checkout page of website </h2>
									</div>
									<div class="single-porject-type overflow-fix">
										<h6> Hourly - Intermediate ($$) - Est. Time: Less than 1 week, Less than 10 hrs/week - <span>Posted 35 minutes ago<span></h6>
									</div>
									<div class="single-porject-datalist overflow-fix">
										 Hello, I want to re-design my website, I am searching for expert designer only. *Should be user experience design to maximum the sales *The website is built on wordpress *Better if the designer is know QA too. 2 Pages - i prefer photoshop designer...<a href="3.3-Project-Details.php">more</a>
									</div>
									<div class="single-porject-skill overflow-fix">
										<p>Skills:</p>
										<ul>
											<li><i>Graphic Design,</i></li>
											<li><i>Web Design,</i></li>
											<li><i> Adobe Photoshop,</i></li>
											<li><i> WordPress</i></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-2 d-flex align-items-center">
								<div class="see-dtiles-button overflow-fix">
									<a href="{{ url('project-details') }}" class="grren-btn">See Details</a>
								</div>
							</div>
						</div>
					</div>
					<div class="single-porject-area mix hourly-buget-1 overflow-fix">
						<div class="row padding-o">
							<div class="col-lg-10">
								<div class="single-porject-single-item overflow-fix">
									<div class="single-porject-heading overflow-fix">
										<h2>Re-design home page and checkout page of website </h2>
									</div>
									<div class="single-porject-type overflow-fix">
										<h6> Hourly - Intermediate ($$) - Est. Time: Less than 1 week, Less than 10 hrs/week - <span>Posted 35 minutes ago<span></h6>
									</div>
									<div class="single-porject-datalist overflow-fix">
										 Hello, I want to re-design my website, I am searching for expert designer only. *Should be user experience design to maximum the sales *The website is built on wordpress *Better if the designer is know QA too. 2 Pages - i prefer photoshop designer...<a href="3.3-Project-Details.php">more</a>
									</div>
									<div class="single-porject-skill overflow-fix">
										<p>Skills:</p>
										<ul>
											<li><i>Graphic Design,</i></li>
											<li><i>Web Design,</i></li>
											<li><i> Adobe Photoshop,</i></li>
											<li><i> WordPress</i></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-2 d-flex align-items-center">
								<div class="see-dtiles-button overflow-fix">
									<a href="3.3-Project-Details.php" class="grren-btn">See Details</a>
								</div>
							</div>
						</div>
					</div>
					<div class="single-porject-area mix fixed-buget-1 overflow-fix">
						<div class="row padding-o">
							<div class="col-lg-10">
								<div class="single-porject-single-item overflow-fix">
									<div class="single-porject-heading overflow-fix">
										<h2>Re-design home page and checkout page of website </h2>
									</div>
									<div class="single-porject-type overflow-fix">
										<h6> Hourly - Intermediate ($$) - Est. Time: Less than 1 week, Less than 10 hrs/week - <span>Posted 35 minutes ago<span></h6>
									</div>
									<div class="single-porject-datalist overflow-fix">
										 Hello, I want to re-design my website, I am searching for expert designer only. *Should be user experience design to maximum the sales *The website is built on wordpress *Better if the designer is know QA too. 2 Pages - i prefer photoshop designer...<a href="3.3-Project-Details.php">more</a>
									</div>
									<div class="single-porject-skill overflow-fix">
										<p>Skills:</p>
										<ul>
											<li><i>Graphic Design,</i></li>
											<li><i>Web Design,</i></li>
											<li><i> Adobe Photoshop,</i></li>
											<li><i> WordPress</i></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-2 d-flex align-items-center">
								<div class="see-dtiles-button overflow-fix">
									<a href="3.3-Project-Details.php" class="grren-btn">See Details</a>
								</div>
							</div>
						</div>
					</div>
					<div class="single-porject-area mix hourly-buget-1 overflow-fix">
						<div class="row padding-o">
							<div class="col-lg-10">
								<div class="single-porject-single-item overflow-fix">
									<div class="single-porject-heading overflow-fix">
										<h2>Re-design home page and checkout page of website </h2>
									</div>
									<div class="single-porject-type overflow-fix">
										<h6> Hourly - Intermediate ($$) - Est. Time: Less than 1 week, Less than 10 hrs/week - <span>Posted 35 minutes ago<span></h6>
									</div>
									<div class="single-porject-datalist overflow-fix">
										 Hello, I want to re-design my website, I am searching for expert designer only. *Should be user experience design to maximum the sales *The website is built on wordpress *Better if the designer is know QA too. 2 Pages - i prefer photoshop designer...<a href="3.3-Project-Details.php">more</a>
									</div>
									<div class="single-porject-skill overflow-fix">
										<p>Skills:</p>
										<ul>
											<li><i>Graphic Design,</i></li>
											<li><i>Web Design,</i></li>
											<li><i> Adobe Photoshop,</i></li>
											<li><i> WordPress</i></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-2 d-flex align-items-center">
								<div class="see-dtiles-button overflow-fix">
									<a href="3.3-Project-Details.php" class="grren-btn">See Details</a>
								</div>
							</div>
						</div>
					</div>
					<div class="single-porject-area mix hourly-buget-1 overflow-fix">
						<div class="row padding-o">
							<div class="col-lg-10">
								<div class="single-porject-single-item overflow-fix">
									<div class="single-porject-heading overflow-fix">
										<h2>Re-design home page and checkout page of website </h2>
									</div>
									<div class="single-porject-type overflow-fix">
										<h6> Hourly - Intermediate ($$) - Est. Time: Less than 1 week, Less than 10 hrs/week - <span>Posted 35 minutes ago<span></h6>
									</div>
									<div class="single-porject-datalist overflow-fix">
										 Hello, I want to re-design my website, I am searching for expert designer only. *Should be user experience design to maximum the sales *The website is built on wordpress *Better if the designer is know QA too. 2 Pages - i prefer photoshop designer...<a href="3.3-Project-Details.php">more</a>
									</div>
									<div class="single-porject-skill overflow-fix">
										<p>Skills:</p>
										<ul>
											<li><i>Graphic Design,</i></li>
											<li><i>Web Design,</i></li>
											<li><i> Adobe Photoshop,</i></li>
											<li><i> WordPress</i></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-2 d-flex align-items-center">
								<div class="see-dtiles-button overflow-fix">
									<a href="3.3-Project-Details.php" class="grren-btn">See Details</a>
								</div>
							</div>
						</div>
					</div>
					<div class="single-porject-area mix fixed-buget-1 overflow-fix">
						<div class="row padding-o">
							<div class="col-lg-10">
								<div class="single-porject-single-item overflow-fix">
									<div class="single-porject-heading overflow-fix">
										<h2>Re-design home page and checkout page of website </h2>
									</div>
									<div class="single-porject-type overflow-fix">
										<h6> Hourly - Intermediate ($$) - Est. Time: Less than 1 week, Less than 10 hrs/week - <span>Posted 35 minutes ago<span></h6>
									</div>
									<div class="single-porject-datalist overflow-fix">
										 Hello, I want to re-design my website, I am searching for expert designer only. *Should be user experience design to maximum the sales *The website is built on wordpress *Better if the designer is know QA too. 2 Pages - i prefer photoshop designer...<a href="3.3-Project-Details.php">more</a>
									</div>
									<div class="single-porject-skill overflow-fix">
										<p>Skills:</p>
										<ul>
											<li><i>Graphic Design,</i></li>
											<li><i>Web Design,</i></li>
											<li><i> Adobe Photoshop,</i></li>
											<li><i> WordPress</i></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-2 d-flex align-items-center">
								<div class="see-dtiles-button overflow-fix">
									<a href="3.3-Project-Details.php" class="grren-btn">See Details</a>
								</div>
							</div>
						</div>
					</div>
					<div class="single-porject-area mix fixed-buget-1 overflow-fix">
						<div class="row padding-o">
							<div class="col-lg-10">
								<div class="single-porject-single-item overflow-fix">
									<div class="single-porject-heading overflow-fix">
										<h2>Re-design home page and checkout page of website </h2>
									</div>
									<div class="single-porject-type overflow-fix">
										<h6> Hourly - Intermediate ($$) - Est. Time: Less than 1 week, Less than 10 hrs/week - <span>Posted 35 minutes ago<span></h6>
									</div>
									<div class="single-porject-datalist overflow-fix">
										 Hello, I want to re-design my website, I am searching for expert designer only. *Should be user experience design to maximum the sales *The website is built on wordpress *Better if the designer is know QA too. 2 Pages - i prefer photoshop designer...<a href="3.3-Project-Details.php">more</a>
									</div>
									<div class="single-porject-skill overflow-fix">
										<p>Skills:</p>
										<ul>
											<li><i>Graphic Design,</i></li>
											<li><i>Web Design,</i></li>
											<li><i> Adobe Photoshop,</i></li>
											<li><i> WordPress</i></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-2 d-flex align-items-center">
								<div class="see-dtiles-button overflow-fix">
									<a href="3.3-Project-Details.php" class="grren-btn">See Details</a>
								</div>
							</div>
						</div>
					</div>
					<div class="single-porject-area mix fixed-buget-1 overflow-fix">
						<div class="row padding-o">
							<div class="col-lg-10">
								<div class="single-porject-single-item overflow-fix">
									<div class="single-porject-heading overflow-fix">
										<h2>Re-design home page and checkout page of website </h2>
									</div>
									<div class="single-porject-type overflow-fix">
										<h6> Hourly - Intermediate ($$) - Est. Time: Less than 1 week, Less than 10 hrs/week - <span>Posted 35 minutes ago<span></h6>
									</div>
									<div class="single-porject-datalist overflow-fix">
										 Hello, I want to re-design my website, I am searching for expert designer only. *Should be user experience design to maximum the sales *The website is built on wordpress *Better if the designer is know QA too. 2 Pages - i prefer photoshop designer...<a href="3.3-Project-Details.php">more</a>
									</div>
									<div class="single-porject-skill overflow-fix">
										<p>Skills:</p>
										<ul>
											<li><i>Graphic Design,</i></li>
											<li><i>Web Design,</i></li>
											<li><i> Adobe Photoshop,</i></li>
											<li><i> WordPress</i></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-2 d-flex align-items-center">
								<div class="see-dtiles-button overflow-fix">
									<a href="3.3-Project-Details.php" class="grren-btn">See Details</a>
								</div>
							</div>
						</div>
					</div>
					<div class="single-porject-area mix fixed-buget-1 overflow-fix">
						<div class="row padding-o">
							<div class="col-lg-10">
								<div class="single-porject-single-item overflow-fix">
									<div class="single-porject-heading overflow-fix">
										<h2>Re-design home page and checkout page of website </h2>
									</div>
									<div class="single-porject-type overflow-fix">
										<h6> Hourly - Intermediate ($$) - Est. Time: Less than 1 week, Less than 10 hrs/week - <span>Posted 35 minutes ago<span></h6>
									</div>
									<div class="single-porject-datalist overflow-fix">
										 Hello, I want to re-design my website, I am searching for expert designer only. *Should be user experience design to maximum the sales *The website is built on wordpress *Better if the designer is know QA too. 2 Pages - i prefer photoshop designer...<a href="3.3-Project-Details.php">more</a>
									</div>
									<div class="single-porject-skill overflow-fix">
										<p>Skills:</p>
										<ul>
											<li><i>Graphic Design,</i></li>
											<li><i>Web Design,</i></li>
											<li><i> Adobe Photoshop,</i></li>
											<li><i> WordPress</i></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-2 d-flex align-items-center">
								<div class="see-dtiles-button overflow-fix">
									<a href="3.3-Project-Details.php" class="grren-btn">See Details</a>
								</div>
							</div>
						</div>
					</div>
					<div class="single-porject-area mix fixed-buget-1 overflow-fix">
						<div class="row padding-o">
							<div class="col-lg-10">
								<div class="single-porject-single-item overflow-fix">
									<div class="single-porject-heading overflow-fix">
										<h2>Re-design home page and checkout page of website </h2>
									</div>
									<div class="single-porject-type overflow-fix">
										<h6> Hourly - Intermediate ($$) - Est. Time: Less than 1 week, Less than 10 hrs/week - <span>Posted 35 minutes ago<span></h6>
									</div>
									<div class="single-porject-datalist overflow-fix">
										 Hello, I want to re-design my website, I am searching for expert designer only. *Should be user experience design to maximum the sales *The website is built on wordpress *Better if the designer is know QA too. 2 Pages - i prefer photoshop designer...<a href="3.3-Project-Details.php">more</a>
									</div>
									<div class="single-porject-skill overflow-fix">
										<p>Skills:</p>
										<ul>
											<li><i>Graphic Design,</i></li>
											<li><i>Web Design,</i></li>
											<li><i> Adobe Photoshop,</i></li>
											<li><i> WordPress</i></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-2 d-flex align-items-center">
								<div class="see-dtiles-button overflow-fix">
									<a href="3.3-Project-Details.php" class="grren-btn">See Details</a>
								</div>
							</div>
						</div>
					</div>
					<div class="single-porject-area mix fixed-buget-1 overflow-fix">
						<div class="row padding-o">
							<div class="col-lg-10">
								<div class="single-porject-single-item overflow-fix">
									<div class="single-porject-heading overflow-fix">
										<h2>Re-design home page and checkout page of website </h2>
									</div>
									<div class="single-porject-type overflow-fix">
										<h6> Hourly - Intermediate ($$) - Est. Time: Less than 1 week, Less than 10 hrs/week - <span>Posted 35 minutes ago<span></h6>
									</div>
									<div class="single-porject-datalist overflow-fix">
										 Hello, I want to re-design my website, I am searching for expert designer only. *Should be user experience design to maximum the sales *The website is built on wordpress *Better if the designer is know QA too. 2 Pages - i prefer photoshop designer...<a href="3.3-Project-Details.php">more</a>
									</div>
									<div class="single-porject-skill overflow-fix">
										<p>Skills:</p>
										<ul>
											<li><i>Graphic Design,</i></li>
											<li><i>Web Design,</i></li>
											<li><i> Adobe Photoshop,</i></li>
											<li><i> WordPress</i></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-2 d-flex align-items-center">
								<div class="see-dtiles-button overflow-fix">
									<a href="3.3-Project-Details.php" class="grren-btn">See Details</a>
								</div>
							</div>
						</div>
					</div>
					<div class="single-porject-area mix fixed-buget-1 overflow-fix">
						<div class="row padding-o">
							<div class="col-lg-10">
								<div class="single-porject-single-item overflow-fix">
									<div class="single-porject-heading overflow-fix">
										<h2>Re-design home page and checkout page of website </h2>
									</div>
									<div class="single-porject-type overflow-fix">
										<h6> Hourly - Intermediate ($$) - Est. Time: Less than 1 week, Less than 10 hrs/week - <span>Posted 35 minutes ago<span></h6>
									</div>
									<div class="single-porject-datalist overflow-fix">
										 Hello, I want to re-design my website, I am searching for expert designer only. *Should be user experience design to maximum the sales *The website is built on wordpress *Better if the designer is know QA too. 2 Pages - i prefer photoshop designer...<a href="3.3-Project-Details.php">more</a>
									</div>
									<div class="single-porject-skill overflow-fix">
										<p>Skills:</p>
										<ul>
											<li><i>Graphic Design,</i></li>
											<li><i>Web Design,</i></li>
											<li><i> Adobe Photoshop,</i></li>
											<li><i> WordPress</i></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-2 d-flex align-items-center">
								<div class="see-dtiles-button overflow-fix">
									<a href="3.3-Project-Details.php" class="grren-btn">See Details</a>
								</div>
							</div>
						</div>
					</div>
					<div class="single-porject-area mix fixed-buget-1 overflow-fix">
						<div class="row padding-o">
							<div class="col-lg-10">
								<div class="single-porject-single-item overflow-fix">
									<div class="single-porject-heading overflow-fix">
										<h2>Re-design home page and checkout page of website </h2>
									</div>
									<div class="single-porject-type overflow-fix">
										<h6> Hourly - Intermediate ($$) - Est. Time: Less than 1 week, Less than 10 hrs/week - <span>Posted 35 minutes ago<span></h6>
									</div>
									<div class="single-porject-datalist overflow-fix">
										 Hello, I want to re-design my website, I am searching for expert designer only. *Should be user experience design to maximum the sales *The website is built on wordpress *Better if the designer is know QA too. 2 Pages - i prefer photoshop designer...<a href="3.3-Project-Details.php">more</a>
									</div>
									<div class="single-porject-skill overflow-fix">
										<p>Skills:</p>
										<ul>
											<li><i>Graphic Design,</i></li>
											<li><i>Web Design,</i></li>
											<li><i> Adobe Photoshop,</i></li>
											<li><i> WordPress</i></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-2 d-flex align-items-center">
								<div class="see-dtiles-button overflow-fix">
									<a href="3.3-Project-Details.php" class="grren-btn">See Details</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="pagination-area overflow-fix">
					<ul>
						<li class="active"><a href="">1</a></li>
						<li><a href="">2</a></li>
						<li><a href="">3</a></li>
						<li><a href="">4</a></li>
						<li><a href="">5</a></li>
						<li><a href="">6</a></li>
						<li><a href="">7</a></li>
						<li><a href="">8</a></li>
						<li><a href="">9</a></li>
						<li><a href="">10</a></li>
						<li><a href="">>></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End project-list-area -->

@endsection