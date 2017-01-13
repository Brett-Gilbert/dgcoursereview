<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title>Persona, Use Case, and Interaction Flow</title>
	</head>
	<body>
		<h1>Persona, Use Case, and Interaction Flow</h1>
		<img src="images/Lawyer.jpg" alt="Jack Donovan">
		<h2>Persona</h2>
		<p>Name: Jack Donovan</p>
		<p>Age: 32</p>
		<p>Profession: Junior attorney at an established copyright law firm</p>
		<p>Technology: Samsung Galaxy S7 running Android Marshmallow, 15" Macbook Pro running OS X Sierra</p>
		<p>Needs: As a junior attorney at a copyright lawfirm, Jack is often assigned the legwork for the more senior attorney's cases. This legwork often sends Jack across the country as cheaply as possible to places that are not generally considered tourist destinations. Jack likes to play disc golf wherever he happens to be but needs help finding courses.</p>
		<p>Goals: Jack's flight schedule often affords him spare time to spend wherever his job has taken him. Jack enjoys spending this time playing otherwise overlooked disc golf gourses. Jack is always careful to review these courses on Dgcoursereview so that others can enjoy (or sometimes avoid) the courses he discovered.</p>
		<h2>Use Case</h2>
		<p>Jack is on a red-eye flight home from Dayton, Ohio. Unable to sleep, he decides to write up a review for the disc  golf course he played earlier that afternoon. He takes out his work laptop, connects to the plane's wi-fi, opens Safari, and clicks his bookmark for Dgcoursereview. He then logs into the site and reflects upon his earlier round. He begins to type his review:</p>
		<p>"3.5 - very good course.</p>
		<p>Pros - The course is in fairly good shape. It is easy enough to navigate with a glance or two at the course map. Most of the holes are adequately challenging and the pars seem appropriate.</p>
		<p>Cons - A couple of the hole markers sould use some work. Number 13 is way too difficult to be a par 3 and should be adjusted.</p>
		<p>Other Thoughts - Overall, a very good course. A little rough around the edges, but nothing that detracts from the experience too much. A great, unpopulated place to catch a round.</p>
		<p>J.D."</p>
		<h2>Interaction Flow</h2>
		<ol>
			<li>Jack types the course name into the search field and clicks the magnifying glass, search button</li>
			<li>The site displays the search result</li>
			<li>Jack selects the course from the results list</li>
			<li>The site displays the course's info page</li>
			<li>Jack clicks the 'Reviews' tab and then the 'Review this course' button</li>
			<li>The site displays the course review page</li>
			<li>Jack fills in his review and clicks the 'Submit Review!' button</li>
			<li>The site displays a confirmation that Jack's review has been submitted</li>
		</ol>
		<h2>Conceptual Model</h2>
		<h3>Entities & Attributes</h3>
		<h4>Profile</h4>
		<ul>
			<li>profileId</li>
			<li>profileEmail</li>
			<li>profilePdgaNumber</li>
			<li>profileLocation</li>
			<li>profileThrowingStyle</li>
		</ul>
		<h4>Review</h4>
		<ul>
			<li>reviewId</li>
			<li>reviewAuthorId</li>
			<li>reviewCourseId</li>
			<li>reviewTitle</li>
			<li>reviewAuthor</li>
			<li>reviewRating</li>
			<li>reviewContent</li>
			<li>reviewDate</li>
		</ul>
		<h4>Course</h4>
		<ul>
			<li>courseId</li>
			<li>courseName</li>
			<li>courseLocation</li>
			<li>courseDescription</li>
		</ul>
		<h3>Relations</h3>
		<ul>
			<li>Many <strong>user</strong> can review many <strong>courses</strong>(m to n).</li>
		</ul>
	</body>
</html>'