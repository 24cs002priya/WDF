// === JSON DATA (simple Indian names) ===
const jsonData = `
{
  "events": [
    {"title": "Web Dev Workshop", "date": "2025-10-10", "location": "Lab 301"},
    {"title": "Hackathon 2025", "date": "2025-11-02", "location": "Auditorium"},
    {"title": "AI Seminar", "date": "2025-11-20", "location": "Seminar Hall"},
    {"title": "Cultural Fest", "date": "2025-12-05", "location": "Main Ground"}
  ],
  "students": [
    {"name": "Amit Sharma", "dept": "CSE", "year": "3rd"},
    {"name": "Priya Singh", "dept": "ECE", "year": "2nd"},
    {"name": "Rohit Kumar", "dept": "IT", "year": "1st"},
    {"name": "Sneha Patel", "dept": "EEE", "year": "4th"},
    {"name": "Vikram Joshi", "dept": "ME", "year": "2nd"},
    {"name": "Ananya Reddy", "dept": "CSE", "year": "3rd"},
    {"name": "Karan Mehta", "dept": "CIVIL", "year": "1st"},
    {"name": "Shreya Nair", "dept": "ECE", "year": "4th"}
  ]
}`;

const data = JSON.parse(jsonData);
const events = data.events;
const students = data.students;

// === Display Events ===
function displayEvents() {
  const container = document.getElementById('eventList');
  container.innerHTML = '';

  events.forEach(event => {
    const card = document.createElement('div');
    card.classList.add('event-card');
    card.innerHTML = `
      <h3>${event.title}</h3>
      <p><b>Date:</b> ${event.date}</p>
      <p><b>Location:</b> ${event.location}</p>
    `;
    container.appendChild(card);
  });
}

// === Student Pagination Logic ===
let currentPage = 1;
const studentsPerPage = 3;

function displayStudents(page = 1) {
  const container = document.getElementById('studentList');
  container.innerHTML = '';

  const start = (page - 1) * studentsPerPage;
  const end = start + studentsPerPage;
  const paginatedStudents = students.slice(start, end);

  paginatedStudents.forEach(student => {
    const card = document.createElement('div');
    card.classList.add('student-card');
    card.innerHTML = `
      <h3>${student.name}</h3>
      <p><b>Dept:</b> ${student.dept}</p>
      <p><b>Year:</b> ${student.year}</p>
    `;
    container.appendChild(card);
  });

  updatePageInfo();
}

// === Update Page Info ===
function updatePageInfo() {
  const totalPages = Math.ceil(students.length / studentsPerPage);
  document.getElementById('pageInfo').textContent = `Page ${currentPage} of ${totalPages}`;
  document.getElementById('prevBtn').disabled = currentPage === 1;
  document.getElementById('nextBtn').disabled = currentPage === totalPages;
}

// === Pagination Buttons ===
document.getElementById('prevBtn').addEventListener('click', () => {
  if (currentPage > 1) {
    currentPage--;
    displayStudents(currentPage);
  }
});

document.getElementById('nextBtn').addEventListener('click', () => {
  const totalPages = Math.ceil(students.length / studentsPerPage);
  if (currentPage < totalPages) {
    currentPage++;
    displayStudents(currentPage);
  }
});

// === Initialize Page ===
displayEvents();
displayStudents();
