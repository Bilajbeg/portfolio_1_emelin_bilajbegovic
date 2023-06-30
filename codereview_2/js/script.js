let tasks = [
	{
		name: "Waking up morning<br>",
		notiz: "Washing face and teeth!!!",
		time: "06:00am",
		picture: "img/waking_up_in_the_morning.jpg",
		importance: 0,
		duration: 15,
	}, {
		name: "Morning run 30min.",
		notiz: "Running around the park",
		time: "06:15am",
		picture: "img/running.jpg",
		importance: 0,
		duration: 30,
	}, {
		name: "Taking breakfast",
		notiz: "Muesli with fruit",
		time: "07:00am",
		picture: "img/breakfast.jpg",
		importance: 0,
		duration: 30,
	}, {
		name: "Going to work",
		notiz: "Buy cup of coffee",
		time: "07:30am",
		picture: "img/going_work.jpg",
		importance: 0,
		duration: 45,
	}, {
		name: "Businness meeting",
		notiz: "New stakeholder",
		time: "14:30am",
		picture: "img/meeting.jpg",
		importance: 0,
		duration: 60,
	}, {
		name: "After work - Fitness",
		notiz: "Cardio training 1hour",
		time: "17:00am",
		picture: "img/firness.jpg",
		importance: 0,
		duration: 60,
	}, {
		name: "Shopping",
		notiz: "Avenue Mall",
		time: "18:15am",
		picture: "img/shopping.jpg",
		importance: 0,
		duration: 45,
	}, {
		name: "Dinner with family",
		notiz: "Indian restaurant",
		time: "19:30am",
		picture: "img/dinner.jpg",
		importance: 0,
		duration: 60,
	}, {
		name: "Reading a book",
		notiz: "Before sleep read something",
		time: "21:30am",
		picture: "img/reading_bed_book.jpg",
		importance: 0,
		duration: 30,
	}
];

// Here is the function to sort the importance
function sortByImportancedown() {
	tasks.sort((a, b) => a.importance - b.importance);
	updateTaskDisplay();
}

function sortByImportanceup() {
	tasks.sort((c, d) => d.importance - c.importance);
	updateTaskDisplay();
}

function updateTaskDisplay() {
	const resultElement = document.getElementById("result");
	//  Now the result will be cleared
	resultElement.innerHTML = "";

	for (let i = 0; i < tasks.length; i++) {
		const task = tasks[i];


		const taskElement = document.createElement("div");
		taskElement.className = "card";

		taskElement.innerHTML = `
	<div class="card-header">
	  <h5 class="title"><button class="btn btn-primary">TASK</button></h5>
	  <div class="right">
		<i class="fa-regular fa-bookmark"></i>
		<i class="fa-solid fa-ellipsis-vertical"></i>
	  </div>
	</div>

	<img src="${task.picture}" class="card-img-top" alt="no image loaded!" />
	<div class="card-body">
	  <h5 class="card-title">${task.name}</h5>
	  <p class="card-description">${task.notiz}</p>

	  <hr class="line"/>

	  <p class="card-importance importanceBtn">
		<i class="fa-solid fa-triangle-exclamation"></i>
		Priority level:
		<button type="button" class="btn btn-success important-btn">
		  ${task.importance}
		</button>
	  </p>

	  <p class="card-deadline">
		<i class="fa-sharp fa-solid fa-calendar-days"></i> Deadline: 12.06.2023
	  </p>

	  <p class="card-duration">
		<i class="fa-sharp fa-regular fa-clock"></i> Duration: ${task.duration} minutes
	  </p>

	  <hr class="line"/>

	  <button type="button" class="btn btn-danger">
		<i class="fa-solid fa-trash-can"></i>Delete
        </button>

	  <button type="button" class="btn btn-success">
		<i class="fa-regular fa-circle-check"></i>Done
        </button>
	</div>
	`;

		// Here the card is added to the result
		resultElement.appendChild(taskElement);

		// Here the eventListener for importance is added
		const btnSuccess = taskElement.querySelector(".important-btn");
		btnSuccess.addEventListener("click", function () {
			if (task.importance < 5) {
				task.importance++;
				btnSuccess.innerHTML = task.importance;
				changeBackgroundColor(task.importance, i);
			}
		});

		// Here backgroundcolor by importance will be changed
		changeBackgroundColor(task.importance, i);

		const deleteButton = document.getElementsByClassName("btn-danger");
		console.log(deleteButton);
		for (let i = 0; i < deleteButton.length; i++) {
			let button = deleteButton[i];
			button.addEventListener("click", function (event) {
				let buttonClicked = event.target;
				/* Here it will be removed after clicking the delete button */
				buttonClicked.parentElement.parentElement.remove();
			});
		}
	}
}

// Here the background color will be changed in dependence of the importance
function changeBackgroundColor(importance, index) {
	const btn = document.getElementsByClassName("important-btn")[index];
	/* Here from 0 to 1 it will be green */
	if (importance >= 0 && importance <= 1) {
		btn.style.backgroundColor = "green";
		btn.style.color = "white";
		/* Then from 2 to 3 it will be yellow */
	} else if (importance >= 2 && importance <= 3) {
		btn.style.backgroundColor = "yellow";
		btn.style.color = "black";
		/* In the end from 4 to 5 it will be red */
	} else {
		btn.style.backgroundColor = "red";
		btn.style.color = "white";
	}
}

// Here is the button_down for sorting
const sortButtondown = document.getElementById("sort-buttondown");
sortButtondown.addEventListener("click", sortByImportancedown);

// Here is the button_up for sorting 
const sortButtonup = document.getElementById("sort-buttonup");
sortButtonup.addEventListener("click", sortByImportanceup);

// Here the tasks will be updated
updateTaskDisplay();



